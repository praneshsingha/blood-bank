function querySuccess()
{
	document.getElementById("query_success").style.display='block';
}
function refresh()
{
	window.location.href="add_blood.php";
}
// editing add add_blood
function editData()
{
	document.getElementById("edit_blood").style.display='block';
	document.getElementById("add_blood").style.display='none';
}
//delete blood message
function deleteblood()
{
	document.getElementById("blood_del_success").style.display='block';
	setTimeout("location.href = '../blood_bank/add_blood.php'",2000); // milliseconds, so 10 seconds = 10000ms
}