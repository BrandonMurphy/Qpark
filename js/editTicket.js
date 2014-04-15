function editTicket(ticketId) {
	
	var date = $( "#date" ).val();
	var time = $( "#time" ).val();
	var price = $( "#price" ).val();
	var violation = $( "#violation" ).val();
	var employee = $( "#employee" ).val();
	var isActive = $( "#isActive" ).val();
	var notes = $( "#notes" ).val();



																				
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=editTicket&ticketId=' + ticketId + '&date=' + date + '&time=' + time + '&price=' + price + '&violation=' + violation + '&employee=' + employee + '&isActive=' + isActive + '&notes=' + notes,
		aysnc: false,
		success: function(result){		
			window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewTickets.php';
		}
	});
}

function deleteTicket(ticketId) {

	var r = confirm("Are you sure you want to delete ticket #" + ticketId + "?");

	console.log(ticketId);
	
	if (r === true){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=deleteTicket&ticketId=' + ticketId,
			aysnc: false,
			success: function(result){
				var newTicketId = '#ticketRow'+ticketId;
				window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewTickets.php';

						}
		});
	}else {

	}
}

function editFlaggedTicket(ticketId) {
	
	var date = $( "#date" ).val();
	var time = $( "#time" ).val();
	var price = $( "#price" ).val();
	var violation = $( "#violation" ).val();
	var employee = $( "#employee" ).val();
	var isActive = $( "#isActive" ).val();
	var notes = $( "#notes" ).val();



																				
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=editTicket&ticketId=' + ticketId + '&date=' + date + '&time=' + time + '&price=' + price + '&violation=' + violation + '&employee=' + employee + '&isActive=' + isActive + '&notes=' + notes,
		aysnc: false,
		success: function(result){		
			window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/admin.php';
		}
	});
}


function deleteFlaggedTicket(ticketId) {

	var r = confirm("Are you sure you want to delete ticket #" + ticketId + "?");

	console.log(ticketId);
	
	if (r === true){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=deleteTicket&ticketId=' + ticketId,
			aysnc: false,
			success: function(result){
				var newTicketId = '#ticketRow'+ticketId;
				window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/admin.php';

						}
		});
	}else {

	}
}

function unflagTicket(ticketId) {

	var r = confirm("Are you sure you want to unflag ticket #" + ticketId + "?");

	console.log(ticketId);
	
	if (r === true){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=unflagTicket&ticketId=' + ticketId,
			aysnc: false,
			success: function(result){
				var newTicketId = '#ticketRow'+ticketId;
				window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/admin.php';

						}
		});
	}else {

	}
}


