$(document).ready(function(){
  viewAllAccounts();
});

function viewAllAccounts() {
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=viewAllAccounts',
		aysnc: false,
		success: function(result){
			console.log(result);
			var account_elem = document.getElementById("accounts");
			
			
			account_elem.innerHTML = result;

		}
	});
}
