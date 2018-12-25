//password incorrect alert
function refresh()
{
	window.location.href="registration.php";
}
// when password is wrong
function password_error()
{
	document.getElementById("password_error").style.display='block';
}
// when registration is success
function registerSuccess()
{
	document.getElementById("register-success").style.display='block';
	setTimeout("location.href = '../blood_bank/index.php'",5000); // milliseconds, so 10 seconds = 10000ms
}
//checking password of user registration form using js
function checkpass()
{
	var pass = document.getElementById("password").value;
	var repass = document.getElementById("re-password").value;
	if (pass==repass)
	{
		document.getElementById("re-password").style.border='2px solid green';
		document.getElementById("password").style.border='2px solid green';
	}
	else
	{
		document.getElementById("re-password").style.border='2px solid red';
		document.getElementById("password").style.border='2px solid red';
	}
}

// checking password for hospital
//checking password of user registration form using js
function hcheckpass()
{
	var pass = document.getElementById("hpassword").value;
	var repass = document.getElementById("hre-password").value;
	if (pass==repass)
	{
		document.getElementById("hre-password").style.border='2px solid green';
		document.getElementById("hpassword").style.border='2px solid green';
	}
	else
	{
		document.getElementById("hre-password").style.border='2px solid red';
		document.getElementById("hpassword").style.border='2px solid red';
	}
}
// user registration properties on click
function changeuser()
{
	document.getElementById("hospital").style.display='none';
	document.getElementById("user").style.display='block';
	document.getElementById("user-btn").style.backgroundColor='black';
	document.getElementById("user-btn").style.border='1px solid red';
	document.getElementById("hos-btn").style.backgroundColor='red';
	document.getElementById("hos-btn").style.color='white';
}
$(document).ready(function(){
	$("#hos-btn").click(function(){   
		$("#user").hide();
		$("#hospital").show();
		$("#user-btn").css("background-color","red");
		$("#hos-btn").css("background-color","black");
		$("#hos-btn").css("border","1px solid red");
	})
})
function changehos()
{
	document.getElementById("user").style.display='none';
	document.getElementById("hospital").style.display='block';
	document.getElementById("user-btn").style.backgroundColor='red';
	document.getElementById("hos-btn").style.border='1px solid red';
	document.getElementById("hos-btn").style.backgroundColor='black';
	document.getElementById("hos-btn").style.color='white';
}
// only number
function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }  