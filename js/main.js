// Gumby is ready to go
Gumby.ready(function() {
	Gumby.log('Gumby is ready to go...', Gumby.dump());

	// placeholder polyfil
	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
		$('input, textarea').placeholder();
	}

	// skip link and toggle on one element
	// when the skip link completes, trigger the switch
	$('#skip-switch').on('gumby.onComplete', function() {
		$(this).trigger('gumby.trigger');
	});

// Oldie document loaded
}).oldie(function() {
	Gumby.warn("This is an oldie browser...");

// Touch devices loaded
}).touch(function() {
	Gumby.log("This is a touch enabled device...");
});

// Enable Carousel Slider
$(document).ready(function(){
  $('.bxslider').bxSlider();
});

  // This is a functions that scrolls to #{blah}link
function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("."+id).offset().top},
        'slow');
}

$("#description").click(function(e) { 
    // Prevent a page reload when a link is pressed
    e.preventDefault(); 
    // Call the scroll function
    goToByScroll("description");        
});

$("#reviews").click(function(e) {
    // Prevent a page reload when a link is pressed
    e.preventDefault(); 
    // Call the scroll function
    goToByScroll("reviews");        
});


function login(page) {
	var email = $( "#email" ).val();
	var user_pass = $( "#user_pass" ).val();
	var user = email.substring(0, email.indexOf("@"));
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=login&email=' + email + '&password=' + user_pass,
		aysnc: false,
		success: function(result){
			
			var user_permission = JSON.parse(result);
			console.log(user_permission);
			if(result == 'success') {
				console.log("login was successful");
				if(page == 1){
					window.location.href = "Views/home.php?user="+user;
				} else if (page == 2) {
					window.location.href = "home.php?user="+user;
				}
			}
		}
	});
}

function register() {
	var fname = $( "#fname" ).val();
	var lname = $( "#lname" ).val();
	var reg_email = $( "#reg_email" ).val();
	var reg_pass = $( "#reg_pass" ).val();
	var reg_make = $( "#reg_make" ).val();
	var reg_model = $( "#reg_model" ).val();
	var reg_year = $( "#reg_year" ).val();
	var reg_plate = $( "#reg_plate" ).val();
	var reg_color = $( "#reg_color" ).val();
	var reg_state = $( "#reg_state" ).val();

	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=register&email=' + reg_email + '&password=' + reg_pass + '&fname=' + fname + '&lname=' + lname + '&pawprint=temp&make=' + reg_make + '&model=' + reg_model + '&year=' + reg_year + '&plate=' + reg_plate + '&color=' + reg_color + '&state=' + reg_state,
		aysnc: false,
		success: function(result){
			console.log(result);
			if(result == 'success') {
				var user = reg_email.substring(0, reg_email.indexOf("@"));
				$.ajax({
					type: "POST",
					url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/email.php?action=registerEmail&email=' + reg_email + '&user=' + user,
					aysnc: false,
					success: function(result){
						console.log(result);
						$('.registerContent').html('<h4 style="margin-left: -40px !important;">Please check your email to confirm your email address and login.</h4>');
					}
				});
			}
		}
	});
}

function loadPaymentPage() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/payment.php?action=loadHtmlTemplate',
		aysnc: false,
		success: function(result){
			$('.mainContent').html(result);
		}
	});
}

function updateAccountInfo() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=update&fname=this&lname=coolGuy&password=&email=thatCoolGuy6@email.com',
		aysnc: false,
		success: function(result){
			console.log(result);
		}
	});
}

function displayGarage(garage) {
	console.log(garage.value);
	
	if(garage.value === '1') {
		console.log("hit 1");
		$(".garageImage").attr("src", "../img/cag.png");
	} else if(garage.value === '2') {
		console.log("hit 2");
		$(".garageImage").attr("src", "../img/hsg.png");
	} else if(garage.value === '3') {
		console.log("hit 3");
		$(".garageImage").attr("src", "../img/taps.png");
	} else if(garage.value === '4') {
		console.log("hit 4");
		$(".garageImage").attr("src", "../img/tag.png");
	} else if(garage.value === '5') {
		console.log("hit 5");
		$(".garageImage").attr("src", "../img/uag.png");
	} else if(garage.value === '6') {
		console.log("hit 6");
		$(".garageImage").attr("src", "../img/vag.png");
	} else if(garage.value === '7') {
		console.log("hit 7");
		$(".garageImage").attr("src", "../img/ps7.png");
	}
	$('.garageImage').css( "display", "block");
}
