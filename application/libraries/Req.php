<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Req {

    
    private $client_id = "CG7GN8YXFqjA2kC9KwREF0bMAZB1hoF2";
    private $screat_id = "vNBIjyPII486adCr";  
    function __construct()
	{
          	
    } 
    public function auth(){
        $param = 'client_id='.$this->client_id.'&client_secret='.$this->screat_id;
        $ch = curl_init('https://partner.api.bri.co.id/oauth/client_credential/accesstoken?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$param);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
    public function get_atm($token,$lat,$long){
        
        $ch = curl_init('https://partner.api.bri.co.id/sandbox/v1/location/near/atm/10/'.$lat.'/'.$long);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.$token,'BRI-Signature: '.$this->client_id,'BRI-Timestamp: 2019-03-29EST14:13:02365'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

}