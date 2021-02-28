<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
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

        $validated = $request->validate([
            'name' => 'required|max:255',
            // 'agent_id'=>'required|exists:agent,agent_id,agent_id,'.$UserAgent->agent_id,
            'phone_number' => 'required|max:12',
        ]);

        $data = $request->all();
        preg_match('/^(254|0)?(1|7)(\d{8})$/', $data['phone_number'], $mobilearray);

        if (!isset($mobilearray) || empty($mobilearray)) {
            $data['error'] = 1;
            $data['message'] = "The mobile number provided is incorrect.";
            return json_encode($data);
        }

        $msisdn = "254" . $mobilearray[2] . $mobilearray[3];



        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->name = $data['name'];
        $user->save();

        $UserAgent = UserAgent::where('user_id', Auth::user()->id)->first();

        if (!isset($UserAgent) || !$UserAgent) {
            $agent = Agent::create([
                        'phone_number' => $msisdn,
                        'phone_number_otp' => strtoupper($this->generateRandomString(4)),
                        'name' => (isset($data['agent_name']) && !empty($data['agent_name'])) ? $data['agent_name'] : $data['name'],
                        'phone_number_whatsapp' => (isset($data['whatsapp'])) ? 1 : 0,
                        'description' => (isset($data['description']) && !empty($data['description'])) ? $data['description'] : '',
                        'status' => 1,
            ]);

            $agent->save();

            $newUserAgent = UserAgent::create([
                        'user_id' => Auth::user()->id,
                        'agent_id' => $agent->agent_id,
            ]);
            $newUserAgent->save();
        } else {
            $agent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
            $agent->name = (isset($data['agent_name']) && !empty($data['agent_name'])) ? $data['agent_name'] : $data['name'];
            $agent->phone_number = $data['phone_number'];
            $agent->phone_number_whatsapp = (isset($data['whatsapp'])) ? 1 : 0;
            $agent->description = (isset($data['description']) && !empty($data['description'])) ? $data['description'] : $agent->description;
            $agent->status = ($agent->status == 0) ? 1 : $agent->status;
            $agent->save();
        }


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
                        'phone_number' => $msisdn,
                        'phone_number_otp' => strtoupper($this->generateRandomString(4)),
                        'status' => 0,
            ]);

            $newAgent->save();

            $newUserAgent = UserAgent::create([
                        'user_id' => Auth::user()->id,
                        'agent_id' => $newAgent->agent_id,
            ]);
            $newUserAgent->save();
        } else {
            $newAgent = Agent::where('agent_id', '=', $UserAgent->agent_id)->first();
            $newAgent->phone_number = $msisdn;
            $newAgent->phone_number_otp = strtoupper($this->generateRandomString(4));
            $newAgent->status = 0;
            $newAgent->save();
        }

        //SEND OTP HERE
        $text = "Your Masela verification code:\n" . $newAgent->phone_number_otp . "\nDo not share it with anyone.";
        $this->sendsms($msisdn, $text);



        $data['error'] = 0;
        $data['mobile'] = $msisdn;
        $data['agent_id'] = $newAgent->agent_id;
        return json_encode($data);
    }

}
