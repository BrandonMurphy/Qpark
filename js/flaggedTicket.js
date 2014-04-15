$(document).ready(function(){
  viewFlaggedTickets();
});

function viewFlaggedTickets() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=viewFlaggedTickets',
		aysnc: false,
		success: function(result){
			var ticket_elem = document.getElementById("flaggedTickets");
			
			
			ticket_elem.innerHTML = result;

		}
	});
}
