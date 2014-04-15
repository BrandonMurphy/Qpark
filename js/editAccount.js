function editAccount(userId) {
	
	var fname = $( "#fname" ).val();
	var lname = $( "#lname" ).val();
	var permission = $( "#permission" ).val();
	var pawprint = $( "#pawprint" ).val();

																
	$.ajax({
		type: "POST",
		url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=editAccount&userId=' + userId + '&fname=' + fname + '&lname=' + lname + '&permission=' + permission + '&pawprint=' + pawprint,
		aysnc: false,
		success: function(result){		
			window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewAccounts.php';
		}
	});
}

function deactivateAccount(userId) {

	var r = confirm("Are you sure you want to deactivate User #" + userId + "?");
	
	if (r === true){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=deactivateAccount&userId=' + userId,
			aysnc: false,
			success: function(result){
								window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewAccounts.php';


						}
		});
	}else {

	}
}
function reactivateAccount(userId) {

	var r = confirm("Are you sure you want to reactivate User #" + userId + "?");
	
	if (r === true){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=reactivateAccount&userId=' + userId,
			aysnc: false,
			success: function(result){
								window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewAccounts.php';


						}
		});
	}else {

	}
}