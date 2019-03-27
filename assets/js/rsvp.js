// settings Maxsubscribers
var max_subscribers = 150;

// submit form
document.getElementById("submit").addEventListener("click", function (event) {
    checkform(this);
});


// check the form
function checkform() {
    document.getElementById("submit").classList.add('spinner');
    document.getElementById("submit").innerHTML = "";
    var fields = ["name", "email"];
    var i, l = fields.length;
    var fieldname;
    var errors = 0;

    //loop through input fields
    for (i = 0; i < l; i++) {
        fieldname = fields[i];
        //check if fields are empty and if is required field
        if (document.getElementById(fieldname).value === "" && document.getElementById(fieldname).hasAttribute('required')) {
            var error = document.getElementById(fieldname).getAttribute('data-error-message');
            document.querySelector("." + fieldname + "-error").innerHTML = error;
            errors++;
        } else {
            //check if email is valid
            if (fieldname == "email") {
                if (!ValidateEmail(fieldname)) {
                    document.querySelector("." + fieldname + "-error").innerHTML = "You have entered an invalid email address!";
                    errors++;
                } else {
                    document.querySelector("." + fieldname + "-error").innerHTML = "";
                }
            } else {
                document.querySelector("." + fieldname + "-error").innerHTML = "";
            }
        }
    }
    //if errors are 0 run function
    if (errors == 0) {
        document.querySelector("." + fieldname + "-error").innerHTML = "";
        saveRSVP();
    } else {
        document.getElementById("submit").classList.remove('spinner');
        document.getElementById("submit").innerHTML = "RESERVE A SPOT";
    }
    return true;
}

// email validator
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value)) {
        return (true)
    } else {
        return (false)
    }
}

function saveRSVP() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    $.ajax({
        type: "POST",
        url: '../../functions/mailchimp.php',
        data: ({name: name, email: email}),
        success: function (data) {
            document.querySelector("form").classList.add('succes-box');
            document.querySelector(".fields").classList.add('hide');
            document.querySelector(".succes-message").classList.remove('hide');
            document.querySelector(".icon").classList.remove('not-visible');
            document.querySelector(".succes-message p").innerHTML = data;
            // console.log(data);
        },
        error: function (data) {
            // check if email exists
            document.querySelector(".email-error").innerHTML = data.responseText;
            document.getElementById("email").classList.add('error');
            document.getElementById("submit").classList.remove('spinner');
            document.getElementById("submit").innerHTML = "Reserve a spot";
        }
    });
}



subscribers(max_subscribers);
function subscribers(max_subscribers) {
    $.ajax({
        type: "GET",
        url: '../../functions/mailchimp.php',
        success: function (data) {
            // console.log(data);
            if (data >= max_subscribers) {
                document.getElementById("submit").setAttribute("disabled", "false");
                document.getElementById("submit").classList.add('disabled');
                document.getElementById("submit").innerHTML = "RSVP is closed!";
            }
        }
    });
}

// background move
$(document).ready(function () {
    var movementStrength = 25;
    var height = movementStrength / $(window).height();
    var width = movementStrength / $(window).width();
    $(document).mousemove(function (e) {
        var pageX = e.pageX - ($(window).width() / 2);
        var pageY = e.pageY - ($(window).height() / 2);
        var newvalueX = width * pageX * -1 - 25;
        var newvalueY = height * pageY * -1 - 50;
        $('.background').css("background-position", newvalueX + "px     " + newvalueY + "px");
    });
});


// background noise
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

resize();
window.onresize = resize;

function noise(ctx) {

    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        idata = ctx.createImageData(w, h),
        buffer32 = new Uint32Array(idata.data.buffer),
        len = buffer32.length,
        i = 0;

    for (; i < len;)
        buffer32[i++] = ((255 * Math.random()) | 0) << 24;

    ctx.putImageData(idata, 0, 0);
}

var toggle = true;

// added toggle to get 30 FPS instead of 60 FPS
function loop() {
    toggle = !toggle;
    if (toggle) {
        requestAnimationFrame(loop);
        return;
    }
    noise(ctx);
    requestAnimationFrame(loop);
};

loop();


