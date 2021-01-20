<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\UserAgent;
use Illuminate\Http\Request;
use  Illuminate\Support\MessageBag;
use App\Models\User;

class ProfileController extends Controller {

    public function update() {
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        $agent = false;
        if (isset($UserAgent) || $UserAgent) {
            $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
        }
        $name = Auth::user()->name;

        return view('profile.update', compact('agent', 'name'));
    }

    public function write(Request $request) {
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        
        if (!isset($UserAgent) || !$UserAgent) {
           return $this->update();
        }
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'agent_id'=>'required|exists:agent,agent_id,agent_id,'.$UserAgent->agent_id,
            'phone_number' => 'required|exists:agent,phone_number|max:12',
            
        ]);

        $data = $request->all();
        $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
        
        if(!isset($agent) || !$agent){
         return redirect('/profile/update');    
         }
         
         if(trim($agent->phone_number) != trim($data['phone_number']) || $agent->status==0){
             if($agent->phone_number_otp != (isset($data['phone_number_otp'])?$data['phone_number_otp']:0)){
                 

                 $errors = new MessageBag();
                 $errors->add('otp_error', 'OTP code sent is not correct.');
                 return redirect('/profile/update')->withErrors($errors);
             }
         }
         $user = User::where('id', '=', Auth::user()->id)->first();
         $user->name = $data['name'];
         $user->save();
         
         
         $agent->name =(isset($data['agent_name']) && !empty($data['agent_name'])) ? $data['agent_name'] : $data['name'];
         $agent->phone_number =$data['phone_number'];
         $agent->phone_number_whatsapp = (isset($data['whatsapp']))? 1 : 0;
         $agent->description = (isset($data['description']) && !empty($data['description'])) ? $data['description'] : $agent->description;
         $agent->status= ($agent->status==0)?1 : $agent->status;
         
         $agent->save();
         return redirect('/home');
         
         
    }

    public function sendOtp(Request $request) {
        $validated = $request->validate([
            'mobile' => 'required|max:12',
        ]);


        $data = $request->all();
        preg_match('/^(254|0)?(1|7)(\d{8})$/', $data['mobile'], $mobilearray);
        
        if (!isset($mobilearray) || empty($mobilearray)) {
            $data['error'] = 1;
            $data['message'] = "The mobile number provided is incorrect.";
            return json_encode($data);
        }
        $msisdn = "254" . $mobilearray[2] . $mobilearray[3];
        //create agent
        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();
        
        if (!isset($UserAgent) || !$UserAgent) {
            $newAgent = Agent::create([
                    'phone_number' =>$msisdn,
                     'phone_number_otp'=> strtoupper($this->generateRandomString(4)),
                    'status'=>0,
                ]);
             
            $newAgent->save();
            
            $newUserAgent = UserAgent::create([
                    'user_id' =>Auth::user()->id,
                    'agent_id'=>$newAgent->agent_id,
                ]);
            $newUserAgent->save();
        }else{
             $newAgent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
             $newAgent->phone_number =$msisdn;
             $newAgent->phone_number_otp= strtoupper($this->generateRandomString(4));
             $newAgent->status=0;
            $newAgent->save();
         
        }
        
            
        //SEND OTP HERE
        

        $data['error'] = 0;
        $data['mobile'] = $msisdn;
        $data['agent_id'] = $newAgent->agent_id;
        return json_encode($data);
    }

}
