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

$("#descriptionRegPage").click(function(e) { 
	window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/index.html';
   	$('#description').click();    
});

$("#reviewsRegPage").click(function(e) { 
	window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/index.html';
   	$('#description').click();    
});

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
		dataType: 'json',
		success: function(result){
			console.log("test");
			var user_object = result;
			console.log(user);
			if(user_object.login_success == true) {
				console.log("login was successful");
				if(page == 1){
					window.location.href = "Views/home.php?user="+user_object.user;
				} else if (page == 2) {
					window.location.href = "home.php?user="+user_object.user;
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


	if(fname === '' || lname === '' || reg_email === '' || reg_pass === '' || reg_make === '' || reg_model === '' || reg_year === '' || reg_plate === '' || reg_color === '' || reg_state === '') {
		$('.needAllFields').css( "display", "block");
	}
	else {
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=register&email=' + reg_email + '&password=' + reg_pass + '&fname=' + fname + '&lname=' + lname + '&pawprint=temp&make=' + reg_make + '&model=' + reg_model + '&year=' + reg_year + '&plate=' + reg_plate + '&color=' + reg_color + '&state=' + reg_state,
			aysnc: false,
			success: function(result){
				console.log(result);
				if(result == 'success') {
					// var user = reg_email.substring(0, reg_email.indexOf("@"));
					$.ajax({
						type: "POST",
						url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/email.php?action=registerEmail&email=' + reg_email + '&user=' + reg_email,
						aysnc: false,
						success: function(result){
							console.log(result);
							$('.RegisterContent').html('<h4 style="margin-left: 210px !important;">Please check your email to confirm your email address and login.</h4>');
						}
					});
				}
			}
		});
	}
}

function loadPage(page) {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/payment.php?action=loadHtmlTemplate&page='+page,
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
	var totalPrice = 0.00;

	if(garage.value === '1') {
		console.log("hit 1");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/cag.png");
		$(".garage").html('<h6 class="garage">Conley Avenue Garage</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '2') {
		console.log("hit 2");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/hsg.png");
		$(".garage").html('<h6 class="garage">Hitt Street Garage</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '3') {
		console.log("hit 3");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/taps.png");
		$(".garage").html('<h6 class="garage">Tiger Avenue Parking Structure</h3>');
		$(".totalDurationRow").css( "margin-top", "0px");
		$(".totalDurationText").css( "margin-top", "-2px");
		$(".payForParking").css( "margin-top", "0px");
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '4') {
		console.log("hit 4");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/tag.png");
		$(".garage").html('<h6 class="garage">Turner Avenue Garage</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '5') {
		console.log("hit 5");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/uag.png");
		$(".garage").html('<h6 class="garage">University Avenue Garage</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '6') {
		console.log("hit 6");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/vag.png");
		$(".garage").html('<h6 class="garage">Virginia Avenue Garage</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(garage.value === '7') {
		console.log("hit 7");
		totalPrice = (0.50 * 0.60);
		$(".garageImage").attr("src", "../img/ps7.png");
		$(".garage").html('<h6 class="garage">Parking Structure #7</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	}
	$('.garageImage').css( "display", "block");
}

function displayTime(time) {
	console.log(time.value);
	var totalPrice = 0.00;

	if(time.value === '00:30:00') {
		totalPrice = (0.50 * 0.60);
		$(".time").html('<h3 class="mins">30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '01:00:00') {
		totalPrice = (1.00 * 0.60);
		$(".time").html('<h3 class="hours">1 Hour</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">1 Hour</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '01:30:00') {
		totalPrice = (1.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">1 Hour </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">1 Hour 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '02:00:00') {
		totalPrice = (2.00 * 0.60);
		$(".time").html('<h3 class="hours">2 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">2 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '02:30:00') {
		totalPrice = (2.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">2 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">2 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '03:00:00') {
		totalPrice = (3.00 * 0.60);
		$(".time").html('<h3 class="hours">3 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">3 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '03:30:00') {
		totalPrice = (3.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">3 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">3 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '04:00:00') {
		totalPrice = (4.00 * 0.60);
		$(".time").html('<h3 class="hours">4 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">4 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '04:30:00') {
		totalPrice = (4.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">4 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">4 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '05:00:00') {
		totalPrice = (5.00 * 0.60);
		$(".time").html('<h3 class="hours">5 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">5 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '05:30:00') {
		totalPrice = (5.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">5 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">5 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '06:00:00') {
		totalPrice = (6.00 * 0.60);
		$(".time").html('<h3 class="hours">6 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">6 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '06:30:00') {
		totalPrice = (6.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">6 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">6 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '07:00:00') {
		totalPrice = (7.00 * 0.60);
		$(".time").html('<h3 class="hours">7 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">7 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '07:30:00') {
		totalPrice = (7.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">7 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">7 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '08:00:00') {
		totalPrice = (8.00 * 0.60);
		$(".time").html('<h3 class="hours">8 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">8 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '08:30:00') {
		totalPrice = (8.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">8 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">8 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '09:00:00') {
		totalPrice = (9.00 * 0.60);
		$(".time").html('<h3 class="hours">9 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">9 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '09:30:00') {
		totalPrice = (9.50 * 0.60);
		$(".time").html('<h3 class="hoursAndMinutes">9 Hours </br>30 Minutes</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">9 Hours 30 Minutes</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	} else if(time.value === '10:00:00') {
		totalPrice = (10.00 * 0.60);
		$(".time").html('<h3 class="hours">10 Hours</h3>');
		$(".totalDuration").html('<h6 class="totalDuration">10 Hours</h3>');
		$(".totalPrice").html('<h6 class="totalPrice">$'+totalPrice.toFixed(2)+'</h3>');
	}
}