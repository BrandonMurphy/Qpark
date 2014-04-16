function loadMyAccountPage(email) {
	//console.log(email);
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/myAccount.php?action=loadHtmlTemplate',
		aysnc: false,
		success: function(result){
			$('.mainContent').html(result);
			getAccountInfo(email);
			getVehicleInfo(email)
			getTickets(email);
		}
	});
}

function getAccountInfo(email) {
	//console.log(email);
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=readaccountinfo&email=' + email,
		aysnc: false,
		success: function(result){
			var profile = JSON.parse(result);
			var email_elem = document.getElementById("email");
			var name_elem = document.getElementById("name");
			var notify_elem = document.getElementById("notificationTime");

			if(profile.user_notification_time === '0000-00-00 00:00:00') {
				profile.user_notification_time = "N/A";
			}

			email_elem.innerHTML = 'Email: ' + profile.user_email;
			name_elem.innerHTML = 'Name: ' + profile.user_firstname + " " + profile.user_lastname;
			notify_elem.innerHTML = 'Notification Time: ' + profile.user_notification_time;
			$("#qrcode").attr("href", profile.user_qrcode);
		}
	});
}

function getVehicleInfo(email) {
	//console.log(email);
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=readvehicleinformation&email=' + email,
		aysnc: false,
		success: function(result){
			var vehicle = JSON.parse(result);
			var color_elem = document.getElementById("color");
			var year_elem = document.getElementById("year");
			var make_elem = document.getElementById("make");
			var model_elem = document.getElementById("model");
			var plate_elem = document.getElementById("plate");
			var state_elem = document.getElementById("state");

			color_elem.innerHTML = 'Color: ' + vehicle.vehicle_color;
			year_elem.innerHTML = 'Year: ' + vehicle.vehicle_year;
			make_elem.innerHTML = 'Make: ' + vehicle.vehicle_make;
			model_elem.innerHTML = 'Model: ' + vehicle.vehicle_model;
			plate_elem.innerHTML = 'License Plate: ' + vehicle.vehicle_plate;
			state_elem.innerHTML = 'State: ' + vehicle.vehicle_state;
		}
	});
}

function getTickets(email) {
	var allTickets = [];
	var i = 0;
	console.log("getTickets called");
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/loginTest.php?action=viewticket&email=' + email,
		aysnc: false,
		dataType: 'json',
		success: function(result){
			console.log("Result is: ");
			console.log(result);

				$('#ticket').html('<ul class="tickets"></ul>')

				while (i < result.length) {
					var d = new Date(result[i].ticket_date);
					if(result[i].ticket_violation === '1') {
						var violation = 'Parking Meter Expired';
					} else if(result[i].ticket_violation === '2') {
						var violation = 'Invalid Parking Garage';
					}

					$('.tickets').append('<li class="singleTicket">Date: ' + d.toDateString() + '</br>' + 'Price: ' + result[i].ticket_price + '<i class="ticketDetails icon-newspaper"></i></br>' + 'Violation: ' + violation +'</li>');

					i++;
				}
		}
	});
}