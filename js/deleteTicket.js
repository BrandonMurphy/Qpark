$(document).ready(function(){
  deleteTicket();
});

function viewAllTickets() {
	var ticketId = $( "#ticketId" ).val();
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=deleteTicket&id=' + ticketId,
		aysnc: false,
		success: function(result){

		var ticket_elem = document.getElementById("deleteTicket");
			
			
			ticket_elem.innerHTML = result;
			

		}
	});
}
