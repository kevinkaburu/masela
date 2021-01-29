
@extends('layouts.masela')

@section('main')
 <div class="px-3"> 
     <input type="hidden" id="single-property-map-data" value="{{$latlong}}"/>
            <div class="theme-container">  
                <div class="page-drawer-container single-property mt-3"> 
                    <div class="page-sidenav-content">
                        <div class="mdc-card row between-xs middle-xs p-3">             
                            <div>
                                <h2 class="uppercase" id="single-property-name"></h2>
                                <p class="row flex-nowrap address mb-0">
                                    <i class="material-icons text-muted">location_on</i>
                                    <span class="fw-500 text-muted" id="single-property-location"></span>
                                </p>
                            </div>
                            <div class="column mx-3"> 
                                <h2 class="primary-color price">
                                    <span id="single-property-price"></span> 
                                </h2> 
                                <div class="row start-xs middle-xs ratings" title="29">      
                                                        <span id="single-property-negotiable"></span>
                                                    </div>
                               
                            </div>
                            <button id="page-sidenav-toggle" class="mdc-icon-button material-icons text-muted d-md-none d-lg-none d-xl-none"> 
                                more_vert 
                            </button>
                        </div>
                        <div class="mdc-card p-3 mt-3">  
                            <div class="main-carousel mb-3"> 
                                <div class="control-icons">
                                    <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                </div>  
                                <div class="swiper-container">
                                    <div class="swiper-wrapper" id="single-property-swiper-wrapper"> 
                                        
                                    </div>     
                                    <button class="swiper-button-prev swipe-arrow mdc-fab mdc-fab--mini primary">
                                        <span class="mdc-fab__ripple"></span>
                                        <span class="mdc-fab__icon material-icons">keyboard_arrow_left</span> 
                                    </button>
                                    <button class="swiper-button-next swipe-arrow mdc-fab mdc-fab--mini primary"> 
                                        <span class="mdc-fab__ripple"></span>
                                        <span class="mdc-fab__icon material-icons">keyboard_arrow_right</span> 
                                    </button>   
                                </div>
                            </div> 

                            <div class="small-carousel">   
                                <div id="small-carousel" class="swiper-container"> 
                                    <div class="swiper-wrapper" id="single-property-swiper-wrapper-view">
                                    </div>  
                                </div>
                            </div>


                        </div>
                        <div class="mdc-card p-3 mt-3"> 
                            <h2 class="uppercase text-center fw-500 mb-2">Details</h2>  
                            <div class="row details">
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Property Type:</span>
                                    <span id="single-property-type"></span>
                                </div> 
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Property size(acres):</span>
                                    <span id="single-property-size-acre"></span>
                                </div> 
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Property size(ft):</span>
                                    <span id="single-property-size-feet"></span>
                                </div>
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Soil type:</span>
                                    <span id="single-property-soil-type"></span>
                                </div> 
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>kms to Tarmac:</span>
                                    <span id="single-property-kms-to-tarmac"></span>
                                </div>
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Access Road:</span>
                                    <span id="single-property-access_rd_type"></span>
                                </div>
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>County:</span>
                                    <span id="single-property-county"></span>
                                </div>
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Nearest Town:</span>
                                    <span id="single-property-nearest-town"></span>
                                </div>
                                <div class="row col-xs-12 col-sm-6 item">
                                    <span>Neighborhood:</span>
                                    <span id="single-property-neighborhood"></span>
                                </div>
                                
                                 <div class="row col-xs-12 col-sm-6 item">
                                    <span>Piped Water:</span>
                                    <span id="single-property-piped-water"></span>
                                 </div><!-- comment -->
                                  <div class="row col-xs-12 col-sm-6 item">
                                    <span>Electricity:</span>
                                    <span id="single-property-electricity"></span>
                                </div>
                                
                            </div>   
                        </div>
                        <div class="mdc-card p-3 mt-3"> 
                            <h2 class="uppercase text-center fw-500 mb-2">Features</h2>  
                            <div class="row" id="single-property-features-list">
                                
                            </div> 
                        </div>
                        
                        <div class="mdc-card p-3 mt-3" id="single-property-installment-details"  style="display: none;"> 
                          
                        </div>
                        
                        
                        
                        
                        
                        <div class="mdc-card p-3 mt-3"> 
                            <h2 class="uppercase text-center fw-500 mb-2">Description</h2>  
                            <p id="single-property-description"></p>
                        </div>
                        <div class="mdc-card p-3 mt-3"> 
                            <h2 class="uppercase text-center fw-500 mb-2">Location</h2> 
                            <div id="single-property-map"></div>
                        </div>
                        
                        
                        <div class="mdc-card p-3 mt-3 row between-xs middle-xs"> 
                            <span>ID:<span class="fw-500 mx-2" id="single-property-id"></span></span>
                            <span>Published:<span class="fw-500 mx-2" id="single-property-created"></span></span>
                            <span>Last Update:<span class="fw-500 mx-2" id="single-property-updated"></span></span>
                            <span>Views:<span class="fw-500 mx-2" id="single-property-views"></span></span> 
                        </div> 
                        

                      
                    </div>  
                    <aside class="mdc-drawer mdc-drawer--modal page-sidenav">
                        <a href="#" class="h-0"></a>
                        <div class="mdc-card p-3"> 
                            
                            <div class="widget">  
                                <div class="widget-title bg-primary" id="single-property-agent-name"></div>
                                <div class="mdc-card o-hidden">
                                    <div class="p-3">
                                        <p class="mt-3 text-muted fw-500" id="single-property-agent-description"></p> 
                                        <p class="row middle-xs"><i class="material-icons primary-color">call</i><span class="mx-2 text-muted fw-500" id="single-property-agent-phone"></span></p>
                                        <p class="row middle-xs primary-color" id="single-property-agent-whatsApp">
                                           
                                        </p>
                                        <div class="row pb-3 p-relative">
                                            <div class="divider"></div>
                                        </div> 
                                        
                                        <div class="row around-xs middle-xs p-2 mb-3" id="single-property-agent-listing"> 
                    
                </div> 
                                        
                                        
                                     
                                        
                                    </div>  
                                </div>  
                            </div>  
                            <div class="widget">
                                <div class="widget-title bg-primary">Need help with transfer?</div>
                                <div class="mdc-card o-hidden">
                                <form action="javascript:void(0);"> 
                                    <p>Need help doing search and due diligence? Then send us an email.</p>
                                    <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Name</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Email</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Phone</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 custom-field my-2">
                                        <textarea class="mdc-text-field__input" rows="5" placeholder="Message is required"></textarea>
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="feedback-message" class="mdc-floating-label">Message</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="row around-xs middle-xs p-2 mb-3"> 
                                        <button class="mdc-button mdc-button--raised bg-accent" type="button">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Send email</span> 
                                        </button> 
                                    </div> 
                                </form>  
                            </div>
                            </div>
                           
                            
                        </div>
                    </aside>
                    <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
                </div> 
            </div>  
        </div>

@endsection
@section('jscript')

<script>
    const elementID = 'home-property-listing-div';
    const elementType = 'single';
    const data = JSON.stringify({limit: 100,property_id: "{{$property_id}}"});
    var timeout = null;


    function init() {
        GetListingProperty(data, elementID, elementType);
    }

    init();

    function doDelayedSearch(val) {
        if (timeout) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            var data = JSON.stringify({agent_id: "{{$agent->agent_id ?? '' }}",query: val});
            GetProperty(data, elementID, elementType);
        }, 300);
    }

</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwn34YxDsAG_m4WHj-KzubB_3NTD-Z8sE&callback=initPropertViewMap&libraries=geometry,places" defer ></script>-->

@endsection
