$(document).ready(function(){
  viewAllTickets();
});

function viewAllTickets() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=viewAllTickets',
		aysnc: false,
		success: function(result){
			var ticket_elem = document.getElementById("tickets");
			
			
			ticket_elem.innerHTML = result;

		}
	});
}
