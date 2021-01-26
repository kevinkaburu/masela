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
        var status = "pending";
        var published = '<button class="mdc-icon-button material-icons primary-color" onclick="publishProperty(' + property.property_id + ')">backup</button>';
        if (property.property_status == '1') {
            status = "Active";
            published = '';
        }
        var tr = '<tr class="mdc-data-table__row"><td hidden class="mdc-data-table__cell">' + property.property_id + '</td><td class="mdc-data-table__cell"><img src="' + property.property_image + '" alt="pro-image" width="100" height="80" class="d-block py-3"></td><td class="mdc-data-table__cell"><a href="property.html" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">' + property.property_name + '</a></td><td class="mdc-data-table__cell">' + property.property_views + '</td><td class="mdc-data-table__cell">' + status + '</td><td class="mdc-data-table__cell"><button class="mdc-icon-button material-icons primary-color" onclick="editProperty(' + property.property_id + ')">edit</button>' + published + '<button class="mdc-icon-button material-icons warn-color" onclick="deleteProperty(' + property.property_id + ')">delete</button></td></tr>';
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

    const map = new google.maps.Map(document.getElementById("property-map"), {
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
            commercialNegotiablehtml += moneyed("green", "Negotiable");
        }
        commercialNegotiablehtml += moneyed("blue", property.type);
        console.log(commercialNegotiablehtml);

        // Features time
        featuresHtml += featurehtml("Size", property.size_acre);
        featuresHtml += featurehtml("Kms to Tarmac", property.kms_to_tarmac);
        featuresHtml += featurehtml("Access Road", property.access_rd_type);
        featuresHtml += featurehtml("Title Deed", property.ready_title == 1 ? "Yes" : "No");
        featuresHtml += featurehtml("Pay in Installments", property.installment == 1 ? "Yes" : "No");


        var card = cardhtml(property, imageHtml, commercialNegotiablehtml, featuresHtml);
        parentDiv.insertAdjacentHTML('beforeend', card);
        refreshSwiper();


    }


}
function moneyed(color, name) {
    var moneyed = `<span class="${color}">${name}</span>`;
    return moneyed;
}
function featurehtml(key, value) {
    var feature = `<p><span>${key}</span><span>${value}</span></p>`;
    return feature;
}
function imageshtml(property, img) {
    var image = `<div class="swiper-slide"><img style="height: 230px;" src="${property.img_placeholder}" alt="slide image" data-src="${img}" class="slide-item swiper-lazy"><div class="swiper-lazy-preloader"></div></div>`;
    return image;
}
function cardhtml(property, images, commercialNegotiable, features) {
    var html = `                            <div class="row item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4"> 
                                <div class="mdc-card property-item grid-item column-3">
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
                                                <h4><a href="${property.url}" >${property.property_name}</a></h4>
                                                <p class="row address flex-nowrap">
                                                    <i class="material-icons text-muted">location_on</i>
                                                    <span>${property.location}</span>
                                                </p>
                                                <div class="row between-xs middle-xs">
                                                    <h3 class="primary-color price">
                                                        <span>Ksh ${property.kmb}</span> 
                                                    </h3> 
                                                    <div class="row start-xs middle-xs ratings" title="29">      
                                                     ${property.agent_name}
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


