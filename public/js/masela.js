
jQuery(document).ready(function ($) {
    "use strict";
    $(".send-otp").on("click", function (event) {
        event.preventDefault();
        var mobile = document.getElementById("otp-mobile-no").value;
        var notificationlabel = "mobile-no-label";
        if (mobile) {
            let allowedPrefixes = [
                '2547',
                '2541',
                '07',
                '01'
            ]
            let regex = new RegExp(`(${allowedPrefixes.join('|')})` + '(\\d){8}')
            if (!(regex.test(mobile.toString().replace(' ', '')))) {
                var message = 'Please enter a valid phone number.';
                elementwarning(notificationlabel, message);
                return;
            }
            $.ajax({
                method: "POST",
                url: "/profile/verify/mobile",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "mobile": mobile.toString().replace(' ', ''),
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            }).done(function (response) {
                var msg = JSON.parse(response);
                // console.log(msg.error);
                if (msg.error == 0) {
                    message = "We've sent a message to your number, kindly check and confirm the OTP.";
                    elementsuccess(notificationlabel, message);
                    var otp_input_div = document.getElementById("otp-input-div");
                    otp_input_div.style.display = "inline-block";
                    document.getElementById("otp-mobile-no").value = msg.mobile;
                    document.getElementById("agent-id-input").value = msg.agent_id;
                    document.getElementById("otp-mobile-no").readOnly = true;


                    //show otp input
                } else {
                    message = msg.message;
                    elementwarning(notificationlabel, message);
                }
            });
        } else {
            elementwarning("mobile-no-label", "Enter mobile number below");
            return;

        }
    });

});


async function listingpublishProperty(propertyID, data, elementID, elementType) {
    await ajax({
        method: "POST",
        url: "/property/publish",
        data: propertyID,
        dataType: 'json',
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function processList(response) {
                GetProperty(data, elementID, elementType);
            },
            function rejectprocessList(jqXHR, textStatus, errorThrown) {
                //somehow notify of error
                console.log(errorThrown);
            }
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });
}



async function listingdeleteProperty(propertyID, data, elementID, elementType) {
    await ajax({
        method: "POST",
        url: "/property/delete",
        data: propertyID,
        dataType: 'json',
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function processList(response) {
                GetProperty(data, elementID, elementType);
            },
            function rejectprocessList(jqXHR, textStatus, errorThrown) {
                //somehow notify of error
                console.log(errorThrown);
            }
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });
}

async function GetProperty(data, elementID, elementType) {

    await ajax({
        method: "POST",
        url: "/property/list",
        data: data,
        dataType: 'json',
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function processList(response) {

                if (elementID == 'list-agent-properties') {
                    hometabledata(response, elementID);
                }

            },
            function rejectprocessList(jqXHR, textStatus, errorThrown) {
                //somehow notify of error
                console.log(errorThrown);
            }
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });




}


function hometabledata(data, elementID) {
    var tbody = document.getElementById(elementID);
    tbody.innerHTML = "";
    for (var i = 0; i < data.length; i++) {
        var property = data[i];
        var status = "pending Approval";
        var published = '';
        if(property.queue_type == 1){
               published = '<button class="mdc-icon-button material-icons primary-color" onclick="publishProperty(' + property.property_id + ')">backup</button>';
    }
        if (property.property_status == '1') {
            status = "Active";
            published = '';
        }
        var tr = '<tr class="mdc-data-table__row"><td hidden class="mdc-data-table__cell">' + property.property_id + '</td><td class="mdc-data-table__cell"><img src="' + property.property_image + '" alt="pro-image" width="100" height="80" class="d-block py-3"></td><td class="mdc-data-table__cell"><a href="'+property.property_link+'" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">' + property.property_name + '</a></td><td class="mdc-data-table__cell">' + property.property_views + '</td><td class="mdc-data-table__cell">' + status + '</td><td class="mdc-data-table__cell"><button class="mdc-icon-button material-icons primary-color" onclick="editProperty(' + property.property_id + ')">edit</button>' + published + '<button class="mdc-icon-button material-icons warn-color" onclick="deleteProperty(' + property.property_id + ')">delete</button></td></tr>';
        tbody.insertAdjacentHTML('beforeend', tr);

    }


//    
}


async function MaselasubmitProperty(formID, tabBar, tabindex) {
    var netTab = false;

    var form = document.getElementById(formID);
    var warnings = form.querySelector("#warning-list");
    warnings.innerHTML = "";

    var selectlist = form.querySelectorAll('.mdc-select');
    var selects_array = [...selectlist];
    selects_array.forEach(select => {
        var selected = new mdc.select.MDCSelect(select);
        var selectID = select.id
        form.querySelector("#input_" + selectID).value = selected.value;
    });


    const data = new FormData(form)
    for (var pair of data.entries()) {

    }



    await ajax({
        method: "POST",
        url: "/property/create",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function fulfillHandler(response) {
                var msg = JSON.parse(response);
                if (msg.error == 0) {
                    netTab = true;
                    const propertyInputs = document.querySelectorAll("#input_propety_id");
                    [].forEach.call(propertyInputs, (e) => {
                        if (typeof msg.property_id !== 'undefined') {
                            e.value = msg.property_id;
                        }
                    });
                    tabBar.activateTab(tabindex);
                } else {
                    if (typeof msg.property_id !== 'undefined') {
                        const propertyInputs = document.querySelectorAll("#input_propety_id");
                        [].forEach.call(propertyInputs, (e) => {
                            e.value = msg.property_id;
                        });


                    }
                    for (const property in msg.messages) {
                        var warninghtml = '<div class="alert-danger accent-color">' + msg.messages[property] + '</div>';
                        warnings.insertAdjacentHTML('beforeend', warninghtml);
                    }
                }

            },
            function rejectHandler(jqXHR, textStatus, errorThrown) {
                var warninghtml = '<div class="alert-danger accent-color">We are unable to process your request at the moment. Kindly try again later.</div>';
                warnings.insertAdjacentHTML('beforeend', warninghtml);
            }
    ).catch(function errorHandler(error) {
        var warninghtml = '<div class="alert-danger accent-color">We are unable to process your request at the moment. Kindly try again later.</div>';
        warnings.insertAdjacentHTML('beforeend', warninghtml);
    });


    return  await netTab;
}

function elementwarning(elementID, message) {
    var element = document.getElementById(elementID);
    element.classList.add("alert-danger");
    element.classList.add("accent-color");
    element.innerHTML = message;
}

function elementsuccess(elementID, message) {
    var element = document.getElementById(elementID);
    element.classList.remove("alert-danger");
    element.classList.remove("accent-color");
    element.classList.add("alert-success");
    element.classList.add("primary-color");
    element.innerHTML = message;
}

function ajax(options) {
    return new Promise(function (resolve, reject) {
        $.ajax(options).done(resolve).fail(reject);
    });

}

function initMap() {
    var lat = 0.1768;
    var lng = 37.9083;
    var zoom = 8;
    const latlong_input = document.getElementById("map_lat_long");
    const property_latlong = latlong_input.value;


    if (property_latlong !== '') {

        let latlong = property_latlong.split(',');

        lat = Number(latlong[0]);
        lng = Number(latlong[1]);
        zoom = 13;
    }
    var mapElement = document.getElementById("create-property-map");
    console.log(mapElement);
    const map = new google.maps.Map(mapElement, {
        center: {lat: lat, lng: lng},
        zoom: zoom,
    });
    var marker = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(lat, lng),
    });

    if (property_latlong !== '') {
        if (typeof marker !== 'undefined') {
            marker.setVisible(false);
        }
        marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map
        });
    }

    const card = document.getElementById("map_search_input_card");
    const input = document.getElementById("map_search_input");
    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.setComponentRestrictions({'country': ['ke']});
    autocomplete.bindTo("bounds", map);
    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(["address_components", "geometry", "icon", "name"]);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
    infowindow.setContent(infowindowContent);

    autocomplete.addListener("place_changed", () => {
        infowindow.close();
        if (typeof marker !== 'undefined') {
            marker.setVisible(false);
        }

        const place = autocomplete.getPlace();

        if (place.geometry) {
            marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map
            });

            map.panTo(place.geometry.location);
            map.setZoom(15);

            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            latlong_input.value = latitude + "," + longitude;
        } else {
            document.getElementById("map_search_input").placeholder = "Enter Location";
        }


    });

    map.addListener("click", (mapsMouseEvent) => {
        infowindow.close();
        if (typeof marker !== 'undefined') {
            marker.setVisible(false);
        }
        marker = new google.maps.Marker({
            position: mapsMouseEvent.latLng,
            map: map
        });
        latlong_input.value = mapsMouseEvent.latLng.lat() + "," + mapsMouseEvent.latLng.lng();

        map.panTo(mapsMouseEvent.latLng);

    });

}








async function GetListingProperty(data, elementID, elementType) {

    await ajax({
        method: "POST",
        url: "/property/search",
        data: data,
        dataType: 'json',
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function processList(response) {

                if (elementType == 'cards') {
                    cardsdata(response, elementID);
                }else if (elementType == 'single') {
                    singleProperty(response);
                    
                }else if(elementType == 'blog-featured'){
                    blogFeatured(response, elementID);
                }else if(elementType == 'blog-related'){
                    blogRelated(response, elementID);
                }
                


            },
            function rejectprocessList(jqXHR, textStatus, errorThrown) {
                //somehow notify of error
                console.log(errorThrown);
            }
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });




}
function callseller(phone_number,property_id){
    var callhtml = `<i class="material-icons primary-color">call</i> <a href="tel:${phone_number}">${phone_number}</a>`;
    document.getElementById('single-property-agent-phone').innerHTML=callhtml;
    //make call to view_property call
    contactviewed(property_id,1)
}
function whatsappseller(phone_number,property_id){
    var sms = window.location.href+"\n Hey, I'm reaching out to inquire on this piece of land that you are selling on Masela. ";
    document.getElementById("single-property-agent-whatsApp").innerHTML=agentwhatApp(phone_number,sms);
    //make call to view_property call
    contactviewed(property_id,2)
    var URL="https://api.whatsapp.com/send?phone=+"+phone_number+"&text="+sms+"&"
    $('<a href="'+ URL +'" target="_blank">Open whatsApp messager</a>')[0].click();
}

async function contactviewed(propertyID,type){
    
     await ajax({
        method: "GET",
        url: "/property/view/contact/"+propertyID+"/"+type+"/",
        processData: false,
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });
}

function singleProperty(data) {
     for (var i = 0; i < data.length; i++) {
        var property = data[i];
        var imageswippers = '';
        var imageswippersslide = '';
        document.getElementById('single-property-name').innerHTML=property.property_name; 
        document.getElementById('single-property-location').innerHTML=property.location;//
        document.getElementById('single-property-price').innerHTML="Ksh "+property.kmb;
        if (property.negotiable == 1) {
            document.getElementById("single-property-negotiable").innerHTML="NEGOTIABLE";
        }
        
        //images setup html
        $.each(property.images, function (key, value) {
            imageswippers += imageswiperhtml(property, value);
            imageswippersslide += imageswiperslidehtml(property, value);
        });
        document.getElementById('single-property-swiper-wrapper').innerHTML=imageswippers;
        document.getElementById('single-property-swiper-wrapper-view').innerHTML=imageswippersslide;
        document.getElementById("single-property-type").innerHTML = property.type;
        document.getElementById("single-property-description").innerHTML = property.property_description;
        document.getElementById("single-property-agent-listing").innerHTML = agentlink(property.agent_url);
        document.getElementById("single-property-agent-description").innerHTML=property.agent_description;
        
        var callhtml = `<button class="mdc-button mdc-button--outlined" type="button" onclick="callseller(`+property.phone_number+`,`+ property.property_id+`)">
                                            <span class="mdc-button__ripple"></span>
        <i class="material-icons primary-color">call</i>
                                            <span class="mdc-button__label"> Call seller</span> 
                                        </button>`;
        document.getElementById("single-property-agent-phone").insertAdjacentHTML('beforeend', callhtml);
        if (property.phone_number_whatsapp == 1) {
            var whatapphtml = `<button class="mdc-button mdc-button--outlined" type="button" onclick="whatsappseller(`+property.phone_number+`,`+ property.property_id+`)">
                                            <span class="mdc-button__ripple"></span>
       <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z" />
    </svg>
                                            <span class="mdc-button__label">WhatApp Seller</span> 
                                        </button>`;
            
            document.getElementById("single-property-agent-whatsApp").insertAdjacentHTML('beforeend', whatapphtml);
        }
        document.getElementById("single-property-size-acre").innerHTML = property.size_acre;
        document.getElementById("single-property-size-feet").innerHTML = property.size_feet;
        document.getElementById("single-property-soil-type").innerHTML=property.soil;
        document.getElementById("single-property-kms-to-tarmac").innerHTML=property.kms_to_tarmac;
        document.getElementById("single-property-access_rd_type").innerHTML=property.access_rd_type;
        document.getElementById("single-property-county").innerHTML=property.county_name;
        document.getElementById("single-property-nearest-town").innerHTML = property.nearest_town;
        document.getElementById("single-property-neighborhood").innerHTML = property.neighborhood;
         document.getElementById("single-property-piped-water").innerHTML = property.water;
         document.getElementById("single-property-electricity").innerHTML = property.electricity;
        var featurelist = '';
        if (property.gated_community == 1) {
            featurelist +=featurelisting("Gated Comunity");
        }
        if (property.controlled_development == 1) {
            featurelist +=featurelisting("Controlled Development");
        }
        if (property.ready_title == 1) {
            featurelist +=featurelisting("Ready TitleDeed");
        }
         if (property.inclusive_titledeed_processing == 1) {
            featurelist +=featurelisting("Price inclusive of Title Transfer");
        }
        
        if (property.installment == 1) {
            featurelist +=featurelisting("Pay in Installments:");
        }
        document.getElementById("single-property-features-list").innerHTML = featurelist;
        var installmentslist = '';
        if (property.installment == 1) {
            installmentslist +=installmentlist("Deposit amount:",property.installment_deposit_amount);
            installmentslist +=installmentlist("Months to clear balance:",property.installment_months);
            if (property.installment_price !== 'undefined') {
                installmentslist +=installmentlist("Installments full price:",property.installment_price);
            }
            document.getElementById("single-property-installment-details").display="inline-block";
            document.getElementById("single-property-installment-details").innerHTML = installmentPayments(installmentslist);
        }
        document.getElementById("single-property-id").innerHTML = property.property_id;
        document.getElementById("single-property-created").innerHTML = property.property_created;
        document.getElementById("single-property-updated").innerHTML = property.property_modified;
        document.getElementById("single-property-views").innerHTML = property.views;
        document.getElementById('single-property-map').setAttribute('latlng',  property.latlong);
        google.maps.event.addDomListener(window, 'load', singleMap);
        singleMap();
        
        
       
        
 
        
    }
    refreshSwiper();
    
    
    
}
function singleMap() {
    var latlangdata = document.getElementById('single-property-map-data').value;
    var latlngdata = latlangdata.split(",");
  const locoordinates = { lat: parseFloat(latlngdata[0]), lng: parseFloat(latlngdata[1]) };
  const singleviewmap = new google.maps.Map(document.getElementById("single-property-map"), {
    zoom: 15,
    center: locoordinates,
  });
  const marker = new google.maps.Marker({
    position: locoordinates,
    map: singleviewmap,
  });
}


function installmentlist(key,value){
    var list = `<div class="row col-xs-12 col-sm-6 item">
                                    <span>${key}</span>
                                    <span>${value}</span>
                                </div> `;
    return list;
}
function installmentPayments(list){
    var installments = `            <h2 class="uppercase text-center fw-500 mb-2">Installments</h2>  
                            <div class="row details">
                                ${list}
                            </div>`;
    return installments;
}
function featurelisting(name){
    var featurehtml = `<div class="col-xs-12 col-sm-4 row middle-xs">
                                    <i class="material-icons mat-icon-sm primary-color">check</i>
                                    <span class="mx-2">${name}</span>
                                </div>`;
    return featurehtml;
}
function agentlink(url){
//    var url = `<a href="${url}" class="mdc-button mdc-button--outlined">
//                        <span class="mdc-button__ripple"></span>
//                        <span class="mdc-button__label">Other listings</span> 
//                    </a>`;
    return '';
}
function agentwhatApp(phone,current){
    var url = `<svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z" />
    </svg> <a href="https://api.whatsapp.com/send?phone=+${phone}&text=${current}&" class="primary-color"> <span class="mx-2 text-muted fw-500">${phone}</span></a>`;
    return url;
}
function blogFeatured(data, elementID) {
    var parentDiv = document.getElementById(elementID);
    var divHeader = '<div class="widget-title bg-primary">Featured Properties</div>';
    parentDiv.innerHTML = "";
    parentDiv.insertAdjacentHTML('beforeend', divHeader);
    for (var i = 0; i < data.length; i++) {
        var property = data[i];
        var imageHtml = "";
        var commercialNegotiablehtml = "";
        var featuresHtml = '';


        //images setup html
        $.each(property.images, function (key, value) {
            imageHtml += imageshtml(property, value);
        });

        //commercial/ negotiable setup  
        if (property.negotiable == 1) {
            commercialNegotiablehtml += moneyed("gray", "Negotiable");
        }
        commercialNegotiablehtml += moneyed("gray", property.type);
        

        // Features time
        featuresHtml += featurehtml("Size", property.size_acre);
        featuresHtml += featurehtml("Kms to Tarmac", property.kms_to_tarmac);
        featuresHtml += featurehtml("Access Road", property.access_rd_type);
        featuresHtml += featurehtml("Title Deed", property.ready_title == 1 ? "Yes" : "No");
        featuresHtml += featurehtml("Pay in Installments", property.installment == 1 ? "Yes" : "No");


        var card = featurecard(property, imageHtml, commercialNegotiablehtml, featuresHtml);
        parentDiv.insertAdjacentHTML('beforeend', card);
        


    }
    refreshSwiper();


}


function featurecard(property, images, commercialNegotiable, features){
    var html = ` <div class="mdc-card property-item grid-item column-3 mb-3">
                                    <div class="thumbnail-section">
                                        <div class="row property-status">
                                          ${commercialNegotiable}
                                        </div> 
                                        <div class="property-image"> 
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper"> 
                                                     ${images}
                                                </div>  
                                                <div class="swiper-pagination white"></div>  
                                                <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                            </div>  
                                        </div> 
                                        <div class="control-icons">
                                            <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                <i class="material-icons mat-icon-sm">favorite_border</i>
                                            </button>
                                            
                                        </div>  
                                    </div>
                                    <div class="property-content-wrapper"> 
                                        <div class="property-content">
                                            <div class="content">
                                                <h4>${property.property_name}</h4>
                                                <p class="row address flex-nowrap">
                                                    <i class="material-icons text-muted">location_on</i>
                                                   <span>${property.location}</span>
                                                </p>
                                                <div class="row between-xs middle-xs">
                                                    <h3 class="price">
                                                       <span>Ksh ${property.kmb}</span> 
                                                    </h3> 
                                                    <div class="row start-xs middle-xs" title="29">      
                                                       By: ${property.agent_name}
                                                    </div>
                                                </div>
                                                <div class="features mt-3">                    
                                                    ${features}
                                                </div>   
                                            </div> 
                                            <div class="grow"></div>
                                            <div class="actions row between-xs middle-xs">
                                                <p class="row date mb-0">
                                                    <i class="material-icons text-muted">date_range</i>
                                                    <span class="mx-2">${property.property_created}</span>
                                                </p> 
                                                <a href="${property.url}" class="mdc-button mdc-button--outlined">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Details</span> 
                                                </a>  
                                            </div>
                                        </div>  
                                    </div> 
                                </div> `;
    return html;
}

function relatedcard(property, images, commercialNegotiable, features){
    var html = `<div class="swiper-slide">
                                    <div class="mdc-card property-item grid-item column-4 full-width-page">
                                        <div class="thumbnail-section">
                                            <div class="row property-status">
                                                ${commercialNegotiable}
                                            </div> 
                                            <div class="property-image"> 
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper"> 
                                                          ${images} 
                                                    </div>  
                                                    <div class="swiper-pagination white"></div>  
                                                    <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                    <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                                </div>  
                                            </div> 
                                            <div class="control-icons">
                                                <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                    <i class="material-icons mat-icon-sm">favorite_border</i>
                                                </button>
                                            </div>  
                                        </div>
                                        <div class="property-content-wrapper"> 
                                            <div class="property-content">
                                                <div class="content">
                                                    <h4>${property.property_name}</h4>
                                                    <p class="row address flex-nowrap">
                                                        <i class="material-icons text-muted">location_on</i>
                                                        <span>${property.location}</span>
                                                    </p>
                                                    <div class="row between-xs middle-xs">
                                                        <h3 class="price">
                                                            <span>Ksh ${property.kmb}</span> 
                                                        </h3> 
                                                        <div class="row start-xs middle-xs" title="29">      
                                                            By: ${property.agent_name}
                                                        </div>
                                                    </div>
                                                    <div class="features mt-3">                    
                                                        ${features}
                                                    </div>   
                                                </div> 
                                                <div class="grow"></div>
                                                <div class="actions row between-xs middle-xs">
                                                    <p class="row date mb-0">
                                                        <i class="material-icons text-muted">date_range</i>
                                                       <span class="mx-2">${property.property_created}</span>
                                                    </p> 
                                                    <a href="${property.url}" class="mdc-button mdc-button--outlined">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Details</span> 
                                                    </a>  
                                                </div>
                                            </div>  
                                        </div> 
                                    </div>  
                                </div> `;
    return html;
}
    

function blogRelated(data, elementID) {
    var parentDiv = document.getElementById(elementID);
    parentDiv.innerHTML = "";
    for (var i = 0; i < data.length; i++) {
        var property = data[i];
        var imageHtml = "";
        var commercialNegotiablehtml = "";
        var featuresHtml = '';


        //images setup html
        $.each(property.images, function (key, value) {
            imageHtml += imageshtml(property, value);
        });

        //commercial/ negotiable setup  
        if (property.negotiable == 1) {
            commercialNegotiablehtml += moneyed("gray", "Negotiable");
        }
        commercialNegotiablehtml += moneyed("gray", property.type);
        

        // Features time
        featuresHtml += featurehtml("Size", property.size_acre);
        featuresHtml += featurehtml("Kms to Tarmac", property.kms_to_tarmac);
        featuresHtml += featurehtml("Access Road", property.access_rd_type);
        featuresHtml += featurehtml("Title Deed", property.ready_title == 1 ? "Yes" : "No");
        featuresHtml += featurehtml("Pay in Installments", property.installment == 1 ? "Yes" : "No");


        var card = relatedcard(property, imageHtml, commercialNegotiablehtml, featuresHtml);
        parentDiv.insertAdjacentHTML('beforeend', card);
        


    }
    refreshSwiper();


}


function cardsdata(data, elementID) {
    var parentDiv = document.getElementById(elementID);
    parentDiv.innerHTML = "";
    for (var i = 0; i < data.length; i++) {
        var property = data[i];
        var imageHtml = "";
        var commercialNegotiablehtml = "";
        var featuresHtml = '';


        //images setup html
        $.each(property.images, function (key, value) {
            imageHtml += imageshtml(property, value);
        });

        //commercial/ negotiable setup  
        if (property.negotiable == 1) {
            commercialNegotiablehtml += moneyed("gray", "Negotiable");
        }
        commercialNegotiablehtml += moneyed("gray", property.type);
        

        // Features time
        featuresHtml += featurehtml("Size", property.size_acre);
        featuresHtml += featurehtml("Kms to Tarmac", property.kms_to_tarmac);
        featuresHtml += featurehtml("Access Road", property.access_rd_type);
        featuresHtml += featurehtml("Title Deed", property.ready_title == 1 ? "Yes" : "No");
        featuresHtml += featurehtml("Pay in Installments", property.installment == 1 ? "Yes" : "No");


        var card = cardhtml(property, imageHtml, commercialNegotiablehtml, featuresHtml);
        parentDiv.insertAdjacentHTML('beforeend', card);
        


    }
    refreshSwiper();


}
function moneyed(color, name) {
    var moneyed = `<span class="${color}">${name}</span>`;
    return moneyed;
}
function featurehtml(key, value) {
    var feature = `<p><span>${key}</span><span>${value}</span></p>`;
    return feature;
}
function imageswiperslidehtml(property, img) {
    var image = `<div class="swiper-slide">
                                            <img style="max-height: 120px;"  src="${property.img_placeholder}" alt="slide image" data-src="${img}" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> `;
 
    return image;
}
function imageswiperhtml(property, img) {
    var image = `<div class="swiper-slide">
                                            <img style="max-height: 450px;" style="object-fit: cover;" src="${property.img_placeholder}" alt="slide image" data-src="${img}" class="slide-item swiper-lazy">
                                            <div class="swiper-lazy-preloader"></div> 
                                        </div> `;
 
    return image;
}
function imageshtml(property, img) {
    var image = `<div class="swiper-slide"><img style="height: 230px;" src="${property.img_placeholder}" alt="slide image" data-src="${img}" class="slide-item swiper-lazy"><div class="swiper-lazy-preloader"></div></div>`;
    return image;
}
function cardhtml(property, images, commercialNegotiable, features) {
    var html = `                            <div class="row item col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                                <div class="mdc-card property-item list-item column-1"> 
                                    <div class="thumbnail-section">
                                        <div class="row property-status">
                                            ${commercialNegotiable}
                                        </div> 
                                        <div class="property-image"> 
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper"> 
                                                    ${images}
                                                </div>  
                                                <div class="swiper-pagination white"></div>  
                                                <button class="mdc-icon-button swiper-button-prev swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                                <button class="mdc-icon-button swiper-button-next swipe-arrow"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                            </div>  
                                        </div> 
                                        <div class="control-icons">
                                            <button class="mdc-button add-to-favorite" title="Add To Favorite">
                                                <i class="material-icons mat-icon-sm">favorite_border</i>
                                            </button>
                                        </div>  
                                    </div>
                                    <div class="property-content-wrapper"> 
                                        <div class="property-content">
                                            <div class="content">
                                                <h4>${property.property_name}</h4>
                                                <p class="row address flex-nowrap">
                                                    <i class="material-icons text-muted">location_on</i>
                                                    <span>${property.location}</span>
                                                </p>
                                                <div class="row between-xs middle-xs">
                                                    <h3 class="price">
                                                        <span>Ksh ${property.kmb}</span> 
                                                    </h3> 
                                                    <div class="row start-xs middle-xs" title="29">      
                                                     By: ${property.agent_name}
                                                    </div>
                                                </div>
                                                <div class="features mt-3">                    
                                                     ${features}
                                                </div>   
                                            </div> 
                                            <div class="grow"></div>
                                            <div class="actions row between-xs middle-xs">
                                                <p class="row date mb-0">
                                                    <i class="material-icons text-muted">date_range</i>
                                                    <span class="mx-2">${property.property_created}</span>
                                                </p>
                                                <a href="${property.url}" class="mdc-button mdc-button--outlined">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Details</span> 
                                                </a>  
                                            </div>
                                        </div>  
                                    </div> 
                                </div>  
                            </div>`;
    return html;
}

async function Getblog(data, elementID, elementType) {

    await ajax({
        method: "POST",
        url: "/blog/list",
        data: data,
        dataType: 'json',
        processData: false,
        contentType: 'application/json',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function processList(response) {
                
                if (elementType == 'blog') {
                    bloglist(response, elementID);
                }

            },
            function rejectprocessList(jqXHR, textStatus, errorThrown) {
                //somehow notify of error
                console.log(errorThrown);
            }
    ).catch(function errorHandler(error) {
        //somehow notify of error
        console.log(error);
    });
}
function bloglist(data, elementID) {
    var parentDiv = document.getElementById(elementID);
    parentDiv.innerHTML = "";
    
    for (var blogcategory in data) {
var categorylist= '';
  
  $.each(data[blogcategory], function (key, value) {
            categorylist += blogshtml(value);
        });
var category = bloglisthtml(blogcategory,categorylist);
parentDiv.insertAdjacentHTML('beforeend', category);
}


refreshSwiper();
}
function blogshtml(data){
    var html = `<div class="swiper-slide"> 
                            <div class="mdc-card o-hidden">
                                <div>
                                    <img src="/images/others/transparent-marked.jpg" height="300" width="300" alt="${data['title']}" data-src="${data['img']}" class="swiper-lazy d-block mw-100">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                                <div class="p-3">
                                    <h2 class="fw-600">${data['title']}</h2> 
                                    <p class="mt-3 text-muted fw-500">${data['content']}</p> 
                                    <div class="row pb-3">
                                        <div class="divider"></div>
                                    </div> 
                                    <div class="row between-xs middle-xs">

                                        <a href="${data['url']}" class="mdc-button">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Read More</span>
                                        </a>
                                    </div> 
                                </div>  
                            </div>  
                        </div> `;
    
    return html;
}
function bloglisthtml(blogcategory,bloglist){
    var html = `<h1 class="section-title">${blogcategory}</h1> 
            <div class="agents-carousel"> 
                <div class="swiper-container carousel-outer"> 
                    <div class="swiper-wrapper">  
                       ${bloglist}
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
            </div>`;
    return html;
}

function refreshSwiper() {
    var header_carousel,
            property_item_carousel,
            testimonials_carousel,
            properties_carousel,
            agents_carousel,
            clients_carousel,
            compare_carousel,
            single_property_main_carousel,
            single_property_small_carousel;
    if (typeof Swiper !== "undefined") {
        header_carousel = new Swiper('.header-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            keyboard: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: false,
            grabCursor: true,
            loop: true,
            preloadImages: false,
            lazy: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            speed: 500,
            effect: "slide"
        });

        setActiveSlideInfo(1);

        header_carousel.on('slideChange', function () {
            setActiveSlideInfo(header_carousel.activeIndex);
        });
        function setActiveSlideInfo(index) {
            if (header_carousel.slides) {
                var activeSlide = header_carousel.slides[index];
                var title = $(activeSlide).find("[data-slide-title]")[0].getAttribute("data-slide-title");
                var location = $(activeSlide).find("[data-slide-location]")[0].getAttribute("data-slide-location");
                var price = $(activeSlide).find("[data-slide-price]")[0].getAttribute("data-slide-price");
                $('#active-slide-info h1.slide-title').html(title);
                $('#active-slide-info .location span').html(location);
                $('#active-slide-info .mdc-button__label').html(price);
            }
        }

        property_item_carousel = new Swiper('.property-item .property-image>.swiper-container', {
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            keyboard: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            grabCursor: true,
            loop: true,
            preloadImages: false,
            lazy: true,
            speed: 500,
            effect: "slide",
            nested: true
        });

        testimonials_carousel = new Swiper('.testimonials-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            keyboard: true,
            navigation: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            grabCursor: true,
            loop: true,
            preloadImages: true,
            lazy: false,
            speed: 500,
            effect: "slide"
        });

        properties_carousel = new Swiper('.properties-carousel>.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 16,
            keyboard: true,
            navigation: {
                nextEl: '.prop-next',
                prevEl: '.prop-prev',
            },
            breakpoints: {
                600: {
                    slidesPerView: 2
                },
                960: {
                    slidesPerView: 3
                },
                1280: {
                    slidesPerView: 4
                }
            },
            allowTouchMove: true
        });

        agents_carousel = new Swiper('.agents-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 16,
            keyboard: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            grabCursor: true,
            loop: true,
            preloadImages: false,
            lazy: true,
            breakpoints: {
                600: {
                    slidesPerView: 2
                },
                960: {
                    slidesPerView: 3
                },
                1280: {
                    slidesPerView: 4
                }
            }
        });

        clients_carousel = new Swiper('.clients-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 16,
            keyboard: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            grabCursor: true,
            loop: true,
            preloadImages: false,
            lazy: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false
            },
            speed: 500,
            effect: "slide",
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 3
                },
                600: {
                    slidesPerView: 4
                },
                960: {
                    slidesPerView: 5
                },
                1280: {
                    slidesPerView: 6
                },
                1500: {
                    slidesPerView: 7
                }
            }
        });

        compare_carousel = new Swiper('.compare-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 16,
            keyboard: true,
            navigation: {
                nextEl: '.prop-next',
                prevEl: '.prop-prev',
            },
            breakpoints: {
                600: {
                    slidesPerView: 2
                },
                960: {
                    slidesPerView: 3
                },
                1280: {
                    slidesPerView: 4
                }
            },
            allowTouchMove: true
        });

        single_property_main_carousel = new Swiper('.single-property .main-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            keyboard: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: false,
            grabCursor: true,
            loop: false,
            preloadImages: false,
            lazy: true,
            speed: 500,
            effect: "slide"
        });

        single_property_small_carousel = new Swiper('.single-property .small-carousel .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 16,
            keyboard: true,
            pagination: false,
            preloadImages: false,
            grabCursor: true,
            lazy: true,
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 3
                },
                600: {
                    slidesPerView: 4
                }
            },
            allowTouchMove: true
        });

        if (single_property_main_carousel.slides && single_property_small_carousel.slides) {
            setTimeout(() => {
                single_property_main_carousel.update();
                single_property_small_carousel.update();
            }, 100);
            single_property_main_carousel.on('slideChange', function () {
                single_property_small_carousel.slideTo(single_property_main_carousel.activeIndex);
            });
            $('.single-property .small-carousel .swiper-slide').on('click', function () {
                single_property_main_carousel.slideTo($(this).index());
            });
        }
        ;

    }
    ;
}


const subscribe = document.querySelector('.newsleter-submit');
subscribe.addEventListener('click', () => {
                        //get content-ID tabtab

                        var form = document.getElementById("newsletter_email_form");
                         const data = new FormData(form);
                         
                            ajax({
        method: "POST",
        url: "/newsletter/subscribe",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    }).then(
            function fulfillHandler(response) {
                var msg = JSON.parse(response);
                document.getElementById("newsletter_email_input").value="";
               

            },
            function rejectHandler(jqXHR, textStatus, errorThrown) {
                
            }
    ).catch(function errorHandler(error) {

    });
                         
                    });