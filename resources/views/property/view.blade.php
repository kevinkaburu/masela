
@extends('layouts.masela')

@section('main')
<div class="header-image-wrapper">
    <div class="bg" style="background-image: url('{{asset('images/carousel/slide-3.jpg')}}');"></div>
    <div class="mask"></div>            
    <div class="header-image-content offset-custom">

    </div>
</div> 
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
                        <h2 class="price">
                            <span id="single-property-price"></span> 
                        </h2> 
                        <div class="row start-xs middle-xs" title="29">      
                            <span id="single-property-negotiable"></span>
                        </div>

                    </div>

                    <div class="row  d-md-none d-lg-none d-xl-none"> 
                        <a id="page-sidenav-toggle" href="#" class=" sell-land mdc-button mdc-button--raised  d-sm-flex">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Contact seller</span> 
                        </a> 
                    </div>
                    <!--                            <button id="page-sidenav-toggle" class="mdc-icon-button material-icons text-muted d-md-none d-lg-none d-xl-none warn-color "> 
                                                    call 
                                                </button>-->
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
                    <!--                            <h2 class="uppercase text-center fw-500 mb-2">Details</h2> -->
                    <div class="widget-title bg-primary">Details</div>
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
                    <!--                            <h2 class="uppercase text-center fw-500 mb-2">Features</h2>  -->
                    <div class="widget-title bg-primary">Features</div>
                    <div class="row" id="single-property-features-list">

                    </div> 
                </div>

                <div class="mdc-card p-3 mt-3" id="single-property-installment-details"  style="display: none;"> 

                </div>





                <div class="mdc-card p-3 mt-3"> 
                    <!--                            <h2 class="uppercase text-center fw-500 mb-2">Description</h2>-->
                    <div class="widget-title bg-primary">Description</div>
                    <p id="single-property-description"></p>
                </div>
                <div class="mdc-card p-3 mt-3"> 
                    <!--                            <h2 class="uppercase text-center fw-500 mb-2">Location</h2> -->
                    <div class="widget-title bg-primary">Location</div>
                    <div class="google-map" id="single-property-map">
                    </div>
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

                        <div class="mdc-card o-hidden">
                            <div class="p-3">
                                <p class="row middle-xs"><div class="sharethis-inline-share-buttons"></div></p>
                                <div class="widget-title" id="single-property-agent-name">Contact seller</div>
                                <p class="mt-3 text-muted fw-500" id="single-property-agent-description"></p> 
                                <p class="row middle-xs"><span class="mx-2 text-muted fw-500" id="single-property-agent-phone"></span></p>
                                <p class="row middle-xs primary-color" id="single-property-agent-whatsApp">

                                </p>


                                <div class="row around-xs middle-xs p-2 mb-3" id="single-property-agent-listing"> 

                                </div> 




                            </div>  
                        </div>  
                    </div>  
                    <div class="widget"> 
                        <div class="widget-title bg-primary">Need Legal help?</div>
                        <div class="mdc-card o-hidden">
                            <div class="row details">
                                <form id="kazi-form">
                                    <input type="hidden" name="property" value="{{$propertyUri}}"/>
                                    <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                        <input class="mdc-text-field__input" name="name">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Name is required</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="row col-12 item">
                                        <span>

                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" name="due_diligence"/>

                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="due_diligence">Due Diligence</label>
                                            </div>






                                        </span>
                                    </div> 
                                    <div class="row col-12 item">
                                        <span>


                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" id="sale_agreement" name="sale_agreement"/>

                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="sale_agreement">Sale Agreement</label>
                                            </div>



                                        </span>
                                    </div> 
                                    <div class="row col-12 item">
                                        <span>

                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" id="transfer" name="transfer"/>

                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="transfer">Ownership Transfer</label>
                                            </div>
                                        </span>
                                    </div> 


                                    <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field my-2">
                                        <input class="mdc-text-field__input" name="phone" type="number">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label">Your phone number</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100 custom-field my-2">
                                        <textarea class="mdc-text-field__input" rows="5" placeholder="More details" name="more_details"></textarea>
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="feedback-message" class="mdc-floating-label">Anything else we can help you with?</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div> 
                                    <div id="notification-zone"></div>
                                    <div class="row around-xs middle-xs p-2 mb-3"> 
                                        <button class="mdc-button mdc-button--outlined" type="button" onclick="kaziyetu()">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Submit</span> 
                                        </button> 
                                    </div>  
                                </form>
                            </div>
                        </div>   
                    </div>

                    <div class="widget" id="view-featured-property-div">

                    </div>

                </div>
            </aside>
            <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
        </div> 
    </div>  
</div>

@endsection
@section('jscript')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwn34YxDsAG_m4WHj-KzubB_3NTD-Z8sE&libraries=geometry,places" ></script>
<script>

                                            const elementID = 'home-property-listing-div';
                                            const elementType = 'single';
                                            const data = JSON.stringify({limit: 1, property_id: "{{$property_id}}"});
                                            var timeout = null;


                                            function init() {
                                                GetListingProperty(data, elementID, elementType);
                                            }

                                            window.onload = function () {
                                                init();
                                            };
                                            function doDelayedSearch(val) {
                                                if (timeout) {
                                                    clearTimeout(timeout);
                                                }
                                                timeout = setTimeout(function () {
                                                    var data = JSON.stringify({agent_id: "{{$agent->agent_id ?? '' }}", query: val});
                                                    GetProperty(data, elementID, elementType);
                                                }, 300);
                                            }
                                            function kaziyetu() {
                                                var form = document.getElementById("kazi-form");
                                                const data = new FormData(form);

                                                ajax({
                                                    method: "POST",
                                                    url: "/property/view/kaziyetu/",
                                                    data: data,
                                                    processData: false,
                                                    contentType: false,
                                                    cache: false,
                                                    enctype: 'multipart/form-data',
                                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                                                }).then(
                                                        function fulfillHandler(response) {
                                                            var msg = JSON.parse(response);
                                                            elementsuccess("notification-zone", msg['description']);

                                                        },
                                                        function rejectHandler(jqXHR, textStatus, errorThrown) {

                                                        }
                                                ).catch(function errorHandler(error) {

                                                });
                                            }


</script>

@endsection
