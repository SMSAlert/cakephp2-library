## Overview

Sms Alert Codeigniter Library for sending transactional/promotional SMS, through your custom code. Easy to integrate, you just need to write 2 lines of code to send SMS.

## Parameters Details
### If you have no account on smsalert.co.in, kindly register https://www.smsalert.co.in/

* username : SMS Alert User Name

* password : SMS Alert current Password

* senderid : Receiver will see this as sender's ID(for demo account use CVDEMO)


## Usage

### Download zip folder from this github repository and extract the folder SmsAlertLib to app/Lib/
> yourproject/app/Lib/SmsAlertLib

### Change below variables at yourproject/app/Lib/SmsAlertLib/SmsAlertLib.php:

  $user = "Smsalert username";  
  $pass = "Smsalert password";  
  $senderid = "Smsalert senderid"; 
  
### call SMS Alert library as shown below in your controller:

  > App::uses('SmsAlertLib', 'SmsAlertLib')
   
### call smsalertlib object and call sendsms function in your controller:

  > $obj= new SmsAlertLib;
  > $obj->sendmsg($phone,$message);
   
    
## Support 
  Email :  support@cozyvision.com  
  Phone :  080-1055-1055
