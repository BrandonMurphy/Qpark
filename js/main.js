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
	$.ajax({
		type: "GET",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/loginTest.php?action=login&email=thatCoolGuy6@email.com&password=myNewPass',
		aysnc: false,
		success: function(result){
			console.log(result);
		}
	});
}

function register() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/loginTest.php?action=register&email=thatCoolGuy6@email.com&password=mypass&fname=that&lname=guy&pawprint=tthtguy&make=ford&model=mustang&year=1999&plate=SL1G1Y&color=white&state=MO',
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
