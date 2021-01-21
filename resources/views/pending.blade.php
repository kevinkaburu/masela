@extends('layouts.masela')

@section('main')
<?php

                      
                      $name = Auth::user()->name;
                      if($name ==""){
                          $name = "there";
                      }
                      $email  =Auth::user()->email;
                      ?>
 <div class="px-3">  
            <div class="theme-container">   
               <div class="py-5">
                    <div class="column center-xs middle-xs text-center">  
                        <h1 class="uppercase">Pending Email confirmation</h1>
                    </div>
                    <div class="expansion-panel-wrapper"> 
                        <div class="mdc-card expansion-panel">
                            <div class="row between-xs middle-xs expansion-panel-header">
                                <div class="fw-500">Hi {{$name}},</div>
                                                        
                            </div>
                            <div class="expansion-panel-body">
                                <p>We've sent an email to <strong> {{$email}} </strong> with a verification link. Kindly click on the link to activate your account.</p>
                                <p>Regards,</p>
                                <p>Team Masela!</p>
                                <div class="p-relative py-2 px-4">
                                    <div class="divider"></div>
                                </div>
                                
                            </div>
                        </div> 
                       
                    </div>
                </div> 
                
            </div>  
        </div> 



@endsection

