<aside class="mdc-drawer mdc-drawer--modal page-sidenav">
  
                        <a href="#" class="h-0"></a>
                        <div class="mdc-card"> 
                            <div class="row start-xs middle-xs p-3">
                                   <?php
                                   $rawN =Auth::user()->name;
                      $nameArray = explode(" ", $rawN);
                      $name  =$nameArray[0];
                      
                      $UserAgent =  App\Models\UserAgent::where('user_id', Auth::user()->id)->first();
                      if($UserAgent){
                      $agent = App\Models\Agent::where('agent_id', $UserAgent->agent_id)->first();
                      $uri = str_replace(" ", "-", $agent->name);
        $uri = str_replace("/", "-", $uri);
        $agenturl = "/property/view/agent/".$uri . "-" . $agent->agent_id."/";
                      }else{
                         $agenturl = "/"; 
                      }
                      ?>
                               
                         <img src="{{ asset('images/others/user.jpg')}}" alt="user-image" class="avatar">
                        
                               
                               <h2 class="text-muted fw-500 mx-3">{{$name}}</h2>  
                            </div>
                            <hr class="mdc-list-divider m-0">
                            <ul class="mdc-list">
                                <li>
                                    <a href="{{ route('home.index') }}" class="mdc-list-item py-1">
                                        <span class="mdc-list-item__graphic material-icons text-muted mx-3">home</span>
                                        <span class="mdc-list-item__text">Home</span>
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ route('property.new') }}" class="mdc-list-item py-1">
                                        <span class="mdc-list-item__graphic material-icons text-muted mx-3">add_circle</span>
                                        <span class="mdc-list-item__text">Submit Property</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$agenturl}}" class="mdc-list-item py-1">
                                        <span class="mdc-list-item__graphic material-icons text-muted mx-3">view_list</span>
                                        <span class="mdc-list-item__text">My Properties</span>
                                    </a>
                                </li>
                               
                               
                                <li>
                                    <a href="{{ route('profile.update') }}" class="mdc-list-item py-1">
                                        <span class="mdc-list-item__graphic material-icons text-muted mx-3">person</span>
                                        <span class="mdc-list-item__text">Profile</span>
                                    </a>
                                </li>
                                <li>
                                        <a class="mdc-list-item py-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="mdc-list-item__graphic material-icons text-muted mx-3">power_settings_new</span>
                                         <span class="mdc-list-item__text">Logout</span>
         <form id= "logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                                    </a>
                                </li>
                            </ul>  
                        </div>
                    </aside>