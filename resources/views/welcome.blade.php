@extends('layouts.masela')
@section('carousel')

<div class="header-image-wrapper">
            <div class="bg bg-anime"></div>
            <div class="mask"></div>            
            <div class="header-image-content home-page offset-bottom">
                        <div class="mdc-card main-content-header-landing col-xs-12 col-sm-8 col-md-7">  
                            <form action="/listing" method="GET" id="filters" class="search-wrapper"> 
<!--                                @csrf-->
                        <div class="row" >  
                            <div class="col-xs-12 col-sm-6 col-md-3 p-2">
                                <div class="mdc-select mdc-select--outlined" id="search_county_id">
                                    <input type="hidden" name="county_id" id="input_search_county_id">
                                    <div class="mdc-select__anchor">
                                        <i class="mdc-select__dropdown-icon"></i>
                                        <div class="mdc-select__selected-text"></div>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Which County?</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                    <div class="mdc-select__menu mdc-menu mdc-menu-surface" >
                                        <ul class="mdc-list">
                                            <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                            @foreach ($counties as $key => $county)
                                            <li class="mdc-list-item" data-value="{{ $county->county_id }}">{{ $county->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            
                            
                            <div class="col-xs-12 col-sm-6 col-md-6 p-2">
                                <div class="mdc-text-field mdc-text-field--outlined">
                                    <input class="mdc-text-field__input" name="query">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Enter location, Town or Suburb</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 p-2">
                               <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" name="max_price" type="number">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Max Price</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                            </div>
                            
                              
                            
                        </div>    
                        <div class="row d-none" id="more-filters"> 
                           
                            <div class="col-xs-12 col-sm-4 col-md-4 p-2">  
                                
                                
                                 <div class="mdc-text-field mdc-text-field--outlined">
                                    <input class="mdc-text-field__input" name="max_kms_to_tarmac" type="number">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Max Kms to Tarmac</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div> 
                            
                            
                            <div class="col-xs-12 col-md-4 p-2"> 
                                <div class="mdc-select mdc-select--outlined" id="search_property_type">
                                    <input type="hidden" name="property_type" id="input_search_property_type">
                                    <div class="mdc-select__anchor">
                                        <i class="mdc-select__dropdown-icon"></i>
                                        <div class="mdc-select__selected-text"></div>
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Property Type</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                    <div class="mdc-select__menu mdc-menu mdc-menu-surface" >

                                        <ul class="mdc-list">
                                            <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                            @foreach ($propertydetail as $key => $detail)
                                            <li class="mdc-list-item" data-value="{{ $detail->type }}">{{ $detail->type }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                               <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input" name="min_price" type="number">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Min Price</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                            </div>
                            
                            
                            
                            <div class="col-xs-12 mb-2 p-0"> 
                                <p class="uppercase m-2 fw-500">Features</p> 
                                
                                 <div class="features">
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control" id="ready_title_deed" name="ready_title_deed"/>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <label for="ready_title_deed">Ready Title Deed</label>
                                    </div>    
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control" name="controlled_development" id="controlled_development"/>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <label for="controlled_development">Controlled Development</label>
                                    </div>
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control" name="gated_community" id="gated_community"/>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <label for="gated_community">Gated Community</label>
                                    </div>
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control" name="installments" id="installments"/>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <label for="installments">Pay in Installments</label>
                                    </div>
                                    <div class="mdc-form-field">
                                        <div class="mdc-checkbox">
                                            <input type="checkbox" class="mdc-checkbox__native-control" name="negotiable" id="negotiable"/>
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <label for="negotiable">Negotiable</label>
                                    </div>

                                </div> 
                                
                                
                                
                            </div> 
                        </div>   
                        <div class="row center-xs middle-xs p-2"> 
                            <button class="mdc-button mdc-button--raised bg-warn" type="button" id="clear-filter">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Clear</span> 
                            </button>
                            <button class="mdc-button mdc-button--raised mx-2" type="button" id="show-more-filters">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Advanced</span> 
                            </button>
                            <button class="mdc-button mdc-button--raised mx-2 d-none" type="button" id="hide-more-filters">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Hide</span> 
                            </button>
                            <button class="mdc-button mdc-button--raised" type="button" onclick="searchclicked()">
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon">search</i>
                                <span class="mdc-button__label">Search</span> 
                            </button> 
                            
                        </div>
                    </form> 
                </div>
                
<!--                
                <h1 class="title">Your land verification partner.</h1>
                <p class="desc">Walking you through the journey to land ownership.</p>
                <div class="mt-4">
                    <a href="{{ url('/contact') }}" class="mdc-button mdc-button--raised">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Get intouch</span> 
                    </a>
                </div>-->
            </div>
        </div>  
@endsection

@section('main')<!-- comment -->
<div class="section default">
            <div class="px-3">
                <div class="theme-container">
                    <div class="mdc-card p-0 row o-hidden"> 
                        <div class="col-xs-12 col-lg-6 col-xl-6 p-3">            
                           <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                    <i class="material-icons mat-icon-xlg primary-color">monetization_on</i>
                                    <h2 class="capitalize fw-600 mb-2">Save Money & Time</h2>
                                    <p class="text-muted fw-500">Masela gives you access to all information necessary to make the right decision on what to buy, without having to do those unnecessary site visits, and awkward long calls.</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                    <i class="material-icons mat-icon-xlg primary-color">thumb_up</i>
                                    <h2 class="capitalize fw-600 mb-2">Better Options.</h2>
                                    <p class="text-muted fw-500">Calling a broker to get you a piece of land limits your options. Browsing through the hundreds of pieces on masela gives you access to life time deals.</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                    <i class="material-icons mat-icon-xlg primary-color">group</i>
                                    <h2 class="capitalize fw-600 mb-2">collaboration</h2>
                                    <p class="text-muted fw-500">As an agent, get access to wide variety options from other agents to satisfy your client’s needs when whatever they need is already accessible to you.</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                                    <i class="material-icons mat-icon-xlg primary-color">search</i>
                                    <h2 class="capitalize fw-600 mb-2">easy to find</h2>
                                    <p class="text-muted fw-500">Our Robust search engine, gives you the power to find that hidden gem in seconds, with the capabilities to search by county, price, agent name and much more.</p>
                                </div>
                           </div>                     
                        </div> 
                        <div class="col-xs-12 col-lg-6 col-xl-6 p-0 d-none d-lg-flex d-xl-flex">                    
                            <img src="{{asset('images/others/mission.jpg')}}" alt="mission" class="mw-100 d-block">                
                        </div>            
                    </div>
                        
                </div>
            </div>   
        </div> 







        <div class="section mt-3">
            <div class="px-3">
                <div class="theme-container">
                    <h1 class="section-title">Featured Plots</h1>  
                    <div class="properties-carousel">   
                        <div class="swiper-container carousel-outer"> 
                            <div class="swiper-wrapper" id="blog-related-property-div">  
                              
                            </div>  
                            <button class="prop-prev swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                            </button>
                            <button class="prop-next swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                                <span class="mdc-fab__ripple"></span>
                                <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                            </button> 
                        </div>
                    </div> 
                </div>
            </div>   
        </div>















<div class="section mt-3">
            <div class="px-0">
                <div class="theme-container">
                    <div class="services-wrapper row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-20 w-100 text-center middle-xs p-3">            
                                <i class="material-icons mat-icon-xlg primary-color">location_on</i>
                                <h2 class="capitalize fw-600 my-3">{{count($counties)}} Counties</h2>
                                <p class="text-muted fw-500"></p>           
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-20 w-100 text-center middle-xs p-3">     
                                <i class="material-icons mat-icon-xlg primary-color">supervisor_account</i>
                                <h2 class="capitalize fw-600 my-3">{{count($agents)}} Agents</h2>
                                <p class="text-muted fw-500"></p>             
                            </div> 
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2">  
                            <div class="mdc-card h-20 w-100 text-center middle-xs p-3">  
                                <i class="material-icons mat-icon-xlg primary-color">manage_search</i>
                                <h2 class="capitalize fw-600 my-3">{{count($properties)}} Pieces</h2>
                                <p class="text-muted fw-500"></p>             
                            </div> 
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                            <div class="mdc-card h-20 w-100 text-center middle-xs p-3">     
                                <i class="material-icons mat-icon-xlg primary-color">screen_search_desktop</i>
                                <h2 class="capitalize fw-600 my-3">Over {{$views}} visitors</h2>
                                <p class="text-muted fw-500"></p>             
                            </div> 
                        </div>  
                    </div> 
                </div>
            </div>   
        </div>  
















@endsection


@section('jscript')
<script>
    var timeout = null;
    
    const elementIDRelated = 'blog-related-property-div';
    const elementRelated = 'blog-related';
    const relatedddata = JSON.stringify({limit: 10,status: '10'});
   


    function init() {
       GetListingProperty(relatedddata, elementIDRelated, elementRelated);
    }

    init();

 







//property-search-form-submit
    function searchclicked() {
        var form = document.getElementById("filters");

        var selectlist = form.querySelectorAll('.mdc-select');
        var selects_array = [...selectlist];
        selects_array.forEach(select => {
            var selected = new mdc.select.MDCSelect(select);
            var selectID = select.id
            form.querySelector("#input_" + selectID).value = selected.value;
        });


        form.submit();

    }
    function doDelayedSearch(val) {
        if (timeout) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            var data = JSON.stringify({agent_id: "{{$agent->agent_id ?? '' }}", query: val});
            GetProperty(data, elementID, elementType);
        }, 300);
    }

</script>

@endsection

