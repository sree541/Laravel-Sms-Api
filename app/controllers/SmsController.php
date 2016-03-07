<?php

class SmsController extends BaseController {

    public function get_sms_credit(){
        
       $input = Input::all();
       if(isset($input['user_id'])){
            $user_id = $input['user_id'];

            $credit = DB::table('user_sms_credit')->where('user_id', $user_id)->pluck('sms_credit');
            if($credit)
                echo $credit;
            else
                echo 'Invalid User Id';
       }else{
           echo 'Invalid User Id';
       }
    }
    
    public function get_sms_pkgs(){
        
        $pkgs = DB::table('sms_packages')->get();
        
        echo json_encode($pkgs);
        
        //return View::make('sms/credit')->with('credit',$credit);
    }
    
    public function send_sms(){
         // create curl resource 
          
          
        $input = Input::all();
        if(isset($input['user_id'])){
            $user_id = $input['user_id'];

            $mob = DB::table('users')->where('user_id', $user_id)->pluck('mobile_number');
            
            if($mob){

                $url = "http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=test1&password =123456&sendername=123456789&mobileno=$mob&message=Hello";
                $ch = curl_init($url); 

                // set url 

               // curl_setopt($ch, CURLOPT_URL, $url); 

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);


                // $output contains the output string 
                $output = curl_exec($ch); 

                // close curl resource to free up system resources 
                curl_close($ch);  

                print_r($output);
            }else{
                echo "Invalid UserId/Mobile number";
            }
        }else{
            echo "Invalid User Id";
        }
    
    }
    
    public function sms_test(){
        
    
    //Your authentication key
    $authKey = "106699AljnReofe56da8123";
    
    //Multiple mobiles numbers separated by comma
    $mobileNumber = "09447062625";
    
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "102234";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode("Test message");
    
    //Define route 
    $route = "default";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    
    echo $output;


    }
    
    


}
