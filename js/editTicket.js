function editTicket(ticketId) {
	
	var date = $( "#date" ).val();
	var time = $( "#time" ).val();

	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=editTicket&ticketId=' + ticketId + '&date=' + date + '&time=' + time,
		aysnc: false,
		success: function(result){		

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
				console.log(result);		}
		});
	}else {

	}
}


