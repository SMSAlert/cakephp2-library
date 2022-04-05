<?php
//App::import('Lib', 'SmsAlertLib');
App::uses('SmsAlertLib', 'SmsAlertLib');

class UsersController extends AppController {
    public $name = 'Users';
    

    public function index() {
        if ($this->request->is('post')) {
            $phone=$_POST["phone"];
            echo "Phone Number:  $phone <br>";
            $message = $_POST["message"];
            echo "Message Text: $message "; 
            
            $obj= new SmsAlertLib;
            $obj->sendmsg($phone,$message);
        }
    }



    public function  create_group(){
        if ($this->request->is('post')) {
            $grpname=$_POST["grpname"];
            echo "Group Name:  $grpname <br>";
            $obj= new SmsAlertLib;
            $obj->create_group($grpname);
        }
    }


    public function create_contact(){
        if ($this->request->is('post')) {
            $grpname=$_POST['grpname'];
            $datas['person_name']=$_POST['person_name'];
            $datas['number'] = $_POST["number"];
            echo "Group Name:". $grpname ."<br>";
            echo "Person Name:".  $datas['person_name'] ."<br>";
            echo "Number:".  $datas['number'] ."<br>";
            
            
            $obj= new SmsAlertLib;
            $obj->create_contact($grpname, $datas);
        }
    }


    public function group_send_sms(){        
        if ($this->request->is('post')) {

            $grid=$_POST["grid"];
            echo "Group ID:  $grid <br>";
            $message = $_POST["message"];
            echo "Message Text: $message <br>"; 
            
            $obj= new SmsAlertLib;
            $obj->group_send_sms($grid,$message);
        }          
                  
    }

    public function send_otp_number(){
        if ($this->request->is('post')){
            $mobileno = $_POST['mobileno'];
            echo "Phone Number: $mobileno <br>";
            $msg='User verification code [otp] ';
            $obj= new SmsAlertLib;
            $result = $obj->send_otp_number($mobileno,$msg);
            print_r($result);
            if($result['status'] == "success"){
                $this->redirect(["action" => "validate_otp", "?" =>["mobileno" => $mobileno]]);
            }
        }
    }


    public function validate_otp() {
        if ($this->request->is('post')){
            $otp = $_POST['otp'];
            $mobileno = $_POST['mobileno'];
            $obj= new SmsAlertLib;
            $result =  $obj->validate_otp($otp,$mobileno);
            print_r($result['description']['desc']);
            exit();
            
        }

	}



//============ For Create Template ==============


public function create_template() {
        
    if($this->request->is('post')){
        $endpoint='create_template';
        $datas['name']=$_POST["name"]; //Template Name
        $datas['text']=$_POST["text"]; //Enter Template Msg
        $obj = new SmsAlertLib;
        $result = $obj->setendpoint($endpoint, $datas);

     }
}


   

}


?>