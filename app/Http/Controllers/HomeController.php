<?php

namespace App\Http\Controllers;

use App\Models\OperatorUser;
use App\Models\Operator;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get current user's operator details.
         $UserOpdata=OperatorUser::where('user_id', Auth::user()->id)->first();
         
         if(!isset($UserOpdata) || !$UserOpdata){
             $name = Auth::user()->name;
             if($name ==""){
                 $namedata = split("@",Auth::user()->email);
                 $name = $namedata[0];
             }
              $operator = Operator::create([
                    'name' => $name,
                    'description' => "",
                    'created_by'=>Auth::user()->id,
                    'status'=>1,
                ]);
               $operator->save();
               
               $operator_user = OperatorUser::create([
               "operator_id" => $operator->operator_id,
               "user_id" => Auth::user()->id,
               "role" => "ADMIN",
               "status"=>1,
           ]);
            $operator_user->save();
             
             return redirect('/operator');
         }
         
         $UserOpId = $UserOpdata->operator_id;
        $operator_data = Operator::where('operator_id', $UserOpId)->first();
        if($operator_data){
            
            
            
            
        return view('home');
        }else{
            return redirect('/operator');
        }
    }
}
