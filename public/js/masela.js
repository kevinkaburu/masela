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
                console.log(msg.error);
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