function showpassword() {
	var x=document.getElementById("password");
	if (x.type==="password"){
		x.type= "text";
	}
	else {
		x.type="password";
	}
}
function loginbuttonin() {
	var x=document.getElementById("loginbutton");
	x.style.color = "white";
	x.style.background= "linear-gradient(#7579ff, #b224ef,#e880ed)";
}
function loginbuttonout() {
	var x=document.getElementById("loginbutton");
	x.style.color = "black";
	x.style.background= "white";
}