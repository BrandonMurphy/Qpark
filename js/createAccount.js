function createAccount() {
	var email = $( "#email" ).val();
	var email_conf = $( "#email_conf" ).val();
	var pass = $( "#pass" ).val();
	var pass_conf = $( "#pass_conf" ).val();
	var fname = $( "#fname" ).val();
	var lname = $( "#lname" ).val();
	var permission = $( "#permission" ).val();
	var pawprint = $( "#pawprint" ).val();
	var ready = 1;

	if (!email.length || email !== email_conf) {
		document.getElementById('email_error').style.display = 'block';
		document.getElementById('email_error').innerHTML="Please enter and confirm the correct Email address.";
		ready = 0;
	}
	else {
		document.getElementById('email_error').style.display = 'none';
	}
	if (!pass.length || pass !== pass_conf) {
		document.getElementById('pass_error').style.display = 'block';
		document.getElementById('pass_error').innerHTML="Please enter and confirm the correct password.";
		ready = 0;
	}
	else {
		document.getElementById('pass_error').style.display = 'none';
	}
	if (!fname.length || !lname.length) {
		document.getElementById('name_error').style.display = 'block';
		document.getElementById('name_error').innerHTML="Please enter both first and last name.";
		ready = 0;
	}
	else {
		document.getElementById('name_error').style.display = 'none';
	}

	if (ready === 1){
		$.ajax({
			type: "POST",
			url: 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/api/controller/admin.php?action=createAccount&email=' + email + '&fname=' + fname + '&lname=' + lname + '&password=' + pass + '&permission=' + permission + '&pawprint=' + pawprint,
			aysnc: false,
			success: function(result){
				window.location.href = 'http://babbage.cs.missouri.edu/~cs4970s14grp1/Qpark/Views/viewAccounts.php';
				alert("Successfully added " + email + " with permission " + permission + "!");
			}
		});
	}else {

	}

}