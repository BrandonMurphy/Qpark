$(document).ready(function(){
  	editTicket();
});


function editTicket() {
	var ticketId = $( "#ticketId" ).val();
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=editTicket&id=' + ticketId,
		aysnc: false,
		success: function(result){

		var ticket_elem = document.getElementById("editTicket");
			
			
			ticket_elem.innerHTML = result;
			

		}
	});
}
