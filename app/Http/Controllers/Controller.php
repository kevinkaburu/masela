<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
public function generateUrl($name,$property_id){
        $uri = str_replace(" ", "-", $name);
        $uri = str_replace("/", "-", $uri);
        $uri = $uri . "-" . $property_id;
        return $uri;
    }
    public function generateRandomString($length = 12) {
        $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sendsms($msisdn, $message) {
        $token = $this->rt_getToken();
        $response = $this->rt_sendsms($token,$msisdn,$message);
        return $response;
    }

    
    private function rt_getToken() {
        $clientID = $_ENV['RT_CLIENT_ID'];
        $clientSecret = $_ENV['RT_CLIENT_SECRET'];
        $rt_endpoint = $_ENV['RT_SMS_ENDPOINT'];
        $payload = [
            'client_id' => $clientID,
            'client_secret' => $clientSecret,
            'grant_type' => 'client_credentials'
        ];
        $json_data = json_encode($payload);
        $endpoint = $rt_endpoint . "oauth/token";
        $headers = array(
            'Content-Type:application/json', 'Content-Length: ' . strlen($json_data));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        
        $res = json_decode($server_output,true);
        return $res['access_token'];
    }
    
    private function rt_sendsms($token,$msisdn,$message){
        
        $rt_project_id = $_ENV['RT_PROJECT_ID'];
        $rt_endpoint = $_ENV['RT_SMS_ENDPOINT'];
        $payload= [
            "from"=>$_ENV['RT_SENDER_ID'],
            "message"=>$message,
            "to"=>array($msisdn)
        ];
        
        $json_data = json_encode($payload);
        $headers = array(
            'Content-Type:application/json', 
            'Content-Length: ' . strlen($json_data),
            'Authorization:Bearer '.$token,
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $rt_endpoint . "projects/$rt_project_id/sms/simple/send");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        
        $res = json_decode($server_output,true);
        return $res;
        
    }
    /*
     * Array ( [0] => Accept : application/json [1] => Content-Type: application/json ) 
     * {"client_id":"EFxoj2ldH1LW2hZnw1ouozub9pP8N4nZ","client_secret":"JuwttwMJiL3f4UYCsCotToMy0jAydChQXmvTF79m","grant_type":"client_credentials"}
     * https://api.emalify.com/v1/oauth/token

     */

}
