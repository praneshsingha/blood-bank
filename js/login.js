function showUser()
{
	document.getElementById("user").style.display='block';
	document.getElementById("hospital").style.display='none';
	// changing user_login buton properties
	document.getElementById("hos_login").style.backgroundColor='#ee302d';
	document.getElementById("hos_login").style.color='white';
	// changing hospital login button properties
	document.getElementById("user_login").style.border='1px solid #ee302d';
	document.getElementById("user_login").style.backgroundColor='white';
	document.getElementById("user_login").style.color='#ee302d';
	document.getElementById("userresets").style.display='none';
	document.getElementById("hosreset").style.display='none';
}
function showHospital()
{
	// show hospital login
	document.getElementById("user").style.display='none';
	document.getElementById("hospital").style.display='block';
	// changing user_login buton properties
	document.getElementById("user_login").style.backgroundColor='#ee302d';
	document.getElementById("user_login").style.color='white';
	// changing hospital login button properties
	document.getElementById("hos_login").style.border='1px solid #ee302d';
	document.getElementById("hos_login").style.backgroundColor='white';
	document.getElementById("hos_login").style.color='#ee302d';
	document.getElementById("userresets").style.display='none';
	document.getElementById("hosreset").style.display='none';
}
//password incorrect alert
function refresh()
{
	window.location.href="login.php";
}
function call_error()
{
	document.getElementById("password_error").style.display='block';
}
// calling login success function
function call_success()
{
	document.getElementById("success").style.display='block';
	setTimeout("location.href = '../blood_bank/index.php'",5000); // milliseconds, so 10 seconds = 10000ms
}
//reset close
function closeme()
{
	document.getElementById("userreset").style.position='relative';
	document.getElementById("hospitlreset").style.position='relative';
}
function usershowreset()
{
	document.getElementById("userreset").style.position='fixed';	
}
function hosptlshowreset()
{
	document.getElementById("hospitlreset").style.position='fixed';	
}

function showMobuserReset()
{
	document.getElementById("userresets").style.display='block';
	document.getElementById("user").style.display='none';
	document.getElementById("hospital").style.display='none';
}
function showMobhosReset()
{
	document.getElementById("hosreset").style.display='block';
	document.getElementById("user").style.display='none';
	document.getElementById("hospital").style.display='none';
}

// reset password password_error
function passworderror()
{
	document.getElementById("password_error").style.display='block';
}
function checkpass()
{
	var pass = document.getElementById("password").value;
	var repass = document.getElementById("repassword").value;
	if (pass==repass)
	{
		document.getElementById("repassword").style.border='2px solid green';
		document.getElementById("password").style.border='2px solid green';
	}
	else
	{
		document.getElementById("repassword").style.border='2px solid red';
		document.getElementById("password").style.border='2px solid red';
	}
}
// reset macting password_error
function mactingerror()
{
	document.getElementById("mactingerror").style.display='block';
}