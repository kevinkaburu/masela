@extends('layouts.masela')

   @section('main')

        <div class="header-image-wrapper">
            <div class="bg" style="background-image: url('{{asset('images/others/contact.jpg')}}');"></div>
            <div class="mask"></div>            
            <div class="header-image-content offset-custom">
               
            </div>
        </div>  
        <div class="section px-3">  
            <div class="theme-container"> 
                <h1 class="section-title">Contact us</h1> 
                <div class="mdc-card main-content-header mb-5"> 
                    <div class="row around-xs">
                       
                        <div class="col-xs-12 col-sm-6">
                            <div class="column center-xs middle-xs text-center">
                                <i class="material-icons mat-icon-lg primary-color">call</i>
                                <h3 class="primary-color py-1">PHONES :</h3>
                                <span class="text-muted fw-500">0792 206 776</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="column center-xs middle-xs text-center">
                                <i class="material-icons mat-icon-lg primary-color">mail_outline</i>
                                <h3 class="primary-color py-1">E-MAIL :</h3>
                                <span class="text-muted fw-500">info@vinuru.com</span>
                            </div>
                        </div> 
                        <div class="col-xs-12 mt-3 px-3 p-relative">
                            <div class="divider w-100"></div>
                        </div> 
                        <h3 class="w-100 text-center py-3">CONTACT US</h3> 
                        <form id="kazi-form" action="" class="contact-form row"> 
                            <input type="hidden" name="property" value="external/contact"/>
                            <div class="col-xs-12 col-sm-12 col-md-6 p-2">  
                                <div class="mdc-text-field mdc-text-field--outlined w-100">
                                    <input class="mdc-text-field__input" name="name" placeholder="Name is required">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Name</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 p-2">  
                                <div class="mdc-text-field mdc-text-field--outlined w-100">
                                    <input class="mdc-text-field__input" name="phone" type="number" placeholder="Phone is required">
                                    <div class="mdc-notched-outline">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Phone</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div> 
                            </div>  
                            
                            <div class="col-xs-12 p-2">
                                <p class="uppercase m-2 fw-500">Check services you need</p>
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
                                
                                
                                
                                
                            </div>
                            <div class="col-xs-12 p-2">  
                                <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100">
                                    <textarea class="mdc-text-field__input" rows="5" name="more_details" placeholder="Message is required"></textarea>
                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                        <div class="mdc-notched-outline__leading"></div>
                                        <div class="mdc-notched-outline__notch">
                                            <label class="mdc-floating-label">Message</label>
                                        </div>
                                        <div class="mdc-notched-outline__trailing"></div>
                                    </div>
                                </div>
                            </div>   
                            <div id="notification-zone"></div>
                            <div class="col-xs-12 w-100 py-3 text-center">
                                <button class="mdc-button mdc-button--raised" type="button" onclick="kaziyetu()">
                                    <span class="mdc-button__ripple"></span> 
                                    <span class="mdc-button__label">Send</span> 
                                </button>   
                            </div> 
                        </form>  
                    </div> 
                    <div class="mt-5">
                        <div id="contact-map"></div>
                    </div> 
                </div>
            </div>  
        </div> 
   
    @endsection
    
    
    @section('jscript')
    <script>
    
   
    function kaziyetu(){
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
