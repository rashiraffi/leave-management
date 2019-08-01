function showform()
{
	document.getElementById('form').style.display='block';
}
function hideform()
{
	document.getElementById('form').style.display='none';
}
function logout()
{
	location.href='../PHP/logout.php';
}
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}