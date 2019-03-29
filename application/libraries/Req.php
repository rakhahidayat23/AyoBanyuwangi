
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
        
        $ch = curl_init('https://partner.api.bri.co.id/sandbox/v1/location/near/atm/15/'.$lat.'/'.$long);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.$token,'BRI-Signature: '.$this->client_id,'BRI-Timestamp: 2019-03-29EST14:13:02365'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
    public function getPayment($time){
        $auth_Bri = $this->auth(); 
        $BarearToken = 'Bearer '.$auth_Bri->access_token;
        
        $payload = 'path=/sandbox/v2/transfer/internal&verb=POST&token='.$BarearToken.'&timestamp='.$time.'&body=';
        $hmacSignature = base64_encode(hash_hmac('sha256',$payload,$this->screat_id,true));
        $datasender = array(
            "NoReferral" => "456",
            "sourceAccount" => "888801000157508",
            "beneficiaryAccount" => "888801000003301",
            "Amount" =>"1000.00",
            "FeeType"=> "OUR",
            "transactionDateTime"=> "29-03-2019 16:50:00",
            "remark"=> "REMARK TEST"
        );

        $ch = curl_init('https://partner.api.bri.co.id/sandbox/v2/transfer/internal');

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','BRI-Timestamp: '.$time,'BRI-Signature: '.$hmacSignature));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($datasender));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $return = array(
            'result' => $result,
            'payload' =>$payload,
            'hash' =>$hmacSignature,
        );
        // return json_decode($result);
        return $return;
    }

}