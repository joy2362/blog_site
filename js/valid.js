function validation()
{
	let uname = document.reg.username;
	let pass = document.reg.password;
	let repass = document.reg.repeatpass;

	if (uname.value.trim() == "" && pass.value.trim() == "" && repass.value.trim() == "" ){
		swal("Sorry!", "Fill the form first!", "error");
		uname.focus();
		return false;
	}else if (uname.value.trim()==""){
		swal("Sorry!", "Write username first!!!!", "error");
		uname.focus();
		return false;
	}else if (pass.value.trim()==""){
		swal("Sorry!", "Write password name first!!!!", "error");
		pass.focus();
		return false;
	}else if (repass.value.trim()==""){
		swal("Sorry!", "Write repeat password first!!!!", "error");
		repass.focus();
		return false;
	}else if (repass.value.trim()==pass.value.trim()==){
		swal("Sorry!", "Password not match with Repeat password!!!!", "error");
		repass.focus();
		return false;
	}else{
		return true;
	}
}

