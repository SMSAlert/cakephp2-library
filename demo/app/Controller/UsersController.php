<?php
App::uses('SmsAlertLib', 'SmsAlertLib');
class UsersController extends AppController {
    public $name = 'Users';
    

    public function index() {
        if ($this->request->is('post')) {
            $phone=$_POST["phone"];
            $message 	= $_POST["message"];
			$obj= new SmsAlertLib;
			$result = $obj->sendmsg($phone,$message);
			if($result['status'] == "success"){
                echo $result['description']['desc'];
            }
			
		}
    }



    public function  create_group(){
        if ($this->request->is('post')) {
            $grpname	=$_POST["grpname"];
            $obj		= new SmsAlertLib;
            $result 	= $obj->create_group($grpname);
			echo json_encode($result);
        }
    }


    public function create_contact(){
        if ($this->request->is('post')){
            $grpname=$_POST['grpname'];
            $datas['person_name']=$_POST['person_name'];
            $datas['number'] = $_POST["number"];
            $obj		= new SmsAlertLib;
            $result 	= $obj->create_contact($grpname, $datas);
			echo json_encode($result);
		}
    }


    public function group_send_sms(){        
        if ($this->request->is('post')) {
			$grid=$_POST["grid"];
            $message = $_POST["message"];
            $obj		= 	new SmsAlertLib;
            $result 	=	$obj->group_send_sms($grid,$message);
			echo json_encode($result);
        }          
                  
    }


    public function send_otp_number(){
        if ($this->request->is('post')){
            $mobileno = $_POST['mobileno'];
            $msg='User verification code [otp] ';
			$obj	= new SmsAlertLib;
			$result = $obj->send_otp_number($mobileno,$msg);
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
			$result=$obj->validate_otp($otp,$mobileno);
			if($result['status'] == "success"){
                echo $result['description']['desc'];
            }
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
		echo json_encode($result);

     }
}

   

}


?>