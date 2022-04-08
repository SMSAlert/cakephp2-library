<?php
include("vendor/autoload.php");
use SMSAlert\Lib\Smsalert\Smsalert;
class SmsAlertLib{
    public $user = '';//enter SMS Alert Username
    public $pass = '';//enter SMS Alert Password
    public $senderid = 'CVDEMO';


// Send Message.................
    public function sendmsg($MOBILENO, $TEXT){
        $smsalert      = (new Smsalert())
		->authWithUserIdPwd($this->user,$this->pass);
		$result =  $smsalert->setSender($this->senderid)
        ->send($MOBILENO, $TEXT);
		return $result;
	}


// Create Group.................
    public function create_group($grpname) {
       $smsalert      = (new Smsalert())
                ->authWithUserIdPwd($this->user, $this->pass);
       $result = $smsalert->creategroup($grpname);
       return $result;
	} 





//  CreateContact.........................
    public function create_contact($grpname, $datas) {
        $smsalert      = (new Smsalert())
                ->authWithUserIdPwd($this->user, $this->pass);
        $datas = array(array('person_name'=>$datas['person_name'],'number'=>$datas['number']));        
        $result = $smsalert->importXmlContact($datas,$grpname);
        return $result;
  
    }

 

   

// Send Group Sms..........................
    public function group_send_sms($grid, $text){
       $smsalert      = (new Smsalert())
                ->authWithUserIdPwd($this->user, $this->pass);
       $result = $smsalert->setSender($this->senderid)
         ->sendGroupSms($grid,$text); 
       return $result;

    }


// Send To Phone Number OTP........................

    public function send_otp_number($mobileno,$msg){
        $smsalert = (new Smsalert())
              ->authWithUserIdPwd($this->user, $this->pass);
        $result = $smsalert->setSender($this->senderid)
        ->generateOtp($mobileno,$msg);
        return $result;
    }



// Validate Otp done..............................

    public  function validate_otp($otp,$mobileno){
        $smsalert = (new Smsalert())
        ->authWithUserIdPwd($this->user, $this->pass);
        $result = $smsalert->setSender($this->senderid)
        ->validateOtp($mobileno,$otp);
        return $result;
    }


//  Set custom endpoint
  public  function setendpoint($endpoint, $datas){
    $smsalert = (new Smsalert())->authWithUserIdPwd($this->user, $this->pass);
    
    $result = $smsalert->setSender($this->senderid)
    ->setendpoint($endpoint, $datas); 
    return $result;

  }
    

   

}


?>