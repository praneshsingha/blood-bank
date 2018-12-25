
//section-2 
$(document).ready(function(){
	$("#register-icon").hover(function(){   
		$("#register-text").show();
	}),$("#register-icon").mouseleave(function(){
		$("#register-text").hide();
	})
})
$(document).ready(function(){
	$("#sign-in-icon").hover(function(){   
		$("#sign-in-text").show();
	}),$("#sign-in-icon").mouseleave(function(){
		$("#sign-in-text").hide();
	})
})
$(document).ready(function(){
	$("#apply-icon").hover(function(){   
		$("#apply-text").show();
	}),$("#apply-icon").mouseleave(function(){
		$("#apply-text").hide();
	})
})
$(document).ready(function(){
	$("#blood-icon").hover(function(){   
		$("#blood-text").show();
	}),$("#blood-icon").mouseleave(function(){
		$("#blood-text").hide();
	});
});	
// show unauthorized
function unauthorized()
{
	document.getElementById("unauthorized").style.display='block';
}
// show login
function login()
{
	document.getElementById("login").style.display='block';
}
// blood request success 
function request()
{
	document.getElementById("request").style.display='block';
}
function refresh()
{
	window.location.href='blood_sample.php';
}
// invalid user blood group
function wrongblood()
{
	document.getElementById("wrongblood").style.display='block';
}