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


function login() {
	var email = $( "#email" ).val();
	var user_pass = $( "#user_pass" ).val();
	console.log(email);
	console.log(user_pass);
	$.ajax({
		type: "GET",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/loginTest.php?action=login&email=' + email + '&password=' + user_pass,
		aysnc: false,
		success: function(result){
			console.log(result);
		}
	});
}

function register() {
	var fname = $( "#fname" ).val();
	var lname = $( "#lname" ).val();
	var reg_email = $( "#reg_email" ).val();
	var reg_pass = $( "#reg_pass" ).val();

	console.log(fname);
	console.log(lname);
	console.log(reg_email);
	console.log(reg_pass);

	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/loginTest.php?action=register&email=' + reg_email + '&password=' + reg_pass + '&fname=' + fname + '&lname=' + lname + '&pawprint=tthtguy&make=ford&model=cobraMustang&year=1999&plate=SL1G1Y&color=white&state=MO',
		aysnc: false,
		success: function(result){
			console.log(result);
		}
	});
}

function updateAccountInfo() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/loginTest.php?action=update&fname=this&lname=coolGuy&password=&email=thatCoolGuy6@email.com',
		aysnc: false,
		success: function(result){
			console.log(result);
		}
	});
}
