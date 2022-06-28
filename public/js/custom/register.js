//alert('This is register page');
var username,email,isUnameOK,isEmailOK,isPassOK,isCPassOK,pass,cpass;

$('input:text[name=name]').blur(function(){
	validateName();
});

$('input[name=email]').blur(function(){
	validateEmail();
});

$('input[name=password]').blur(function(){
	validatePassword();
});

$('input[name=confirm_password]').blur(function(){
	validateCPassword();
});

$('form[name=register-frm]').submit(function(e){
	e.preventDefault();
	validateName();
	validateEmail();
	validatePassword();
	validateCPassword();

	//console.log(isUnameOK+isEmailOK+isPassOK+isCPassOK);
	if(isUnameOK && isEmailOK && isPassOK && isCPassOK){
		$.ajax({
			url: window.location.origin+"/crud-mvc/users/register",
			type: 'POST',
			data: {
					name: $('input:text[name=name]').val(),
					email: $('input[name=email]').val(),
					password: $('input[name=password]').val()
			},
			cache: false,
			success: function(response) {
				if(response=='success') {
        		$('form[name=register-frm]').trigger("reset");
				window.location.href = window.location.origin+"/crud-mvc/users/login/success";
				}
			},
			error: function(err) {
				console.log(err);
			}
		});
	} else {
		Swal.fire(
			'Warning!',
			'Please Enter Valid Entries',
			'warning'
		)
	}
});

//validate name if it exist
function validateName() {
		username = $('input:text[name=name]').val();

		$.ajax({
			url: window.location.origin+"/crud-mvc/users/verify_name",
			type: 'POST',
			data: {
					name: username
			},
			cache: false,
			success: function(response) {
					if(parseInt(response)===1 || response=='empty'){
						console.log('invalid');
						clear();
						$('input:text[name=name]').addClass('is-invalid');
						$('#vName').addClass('invalid-feedback');
						$('#vName').html((response=='empty') ? 'Please enter a name' : 'Username already exist!');
						isUnameOK=false;
					} else if(parseInt(response)===0) {
						console.log('valid');
						clear();
						$('input:text[name=name]').addClass('is-valid');
						$('#vName').addClass('valid-feedback');
						$('#vName').html('Username OK!');
						isUnameOK=true;
					}
			}
		});

		function clear() {
					$('input:text[name=name]').removeClass('is-invalid');
					$('#vName').removeClass('invalid-feedback');
					$('input:text[name=name]').removeClass('is-valid');
					$('#vName').removeClass('valid-feedback');
					$('#vName').html('');
		}
}

//validate email if it exist
function validateEmail() {
		email = $('input[name=email]').val();

		if(!isEmail(email)){
			console.log('invalid');
			clear();
			$('input[name=email]').addClass('is-invalid');
			$('#vEmail').addClass('invalid-feedback');
			$('#vEmail').html((email=="") ? 'Please enter an email' : 'Invalid Email');
			isEmailOK=false;
		} else { 

			$.ajax({
			url: window.location.origin+"/crud-mvc/users/verify_email",
			type: 'POST',
			data: {
					email: email
			},
			cache: false,
			success: function(response) {
					if(parseInt(response)===1){

							console.log('invalid');
							clear();
							$('input[name=email]').addClass('is-invalid');
							$('#vEmail').addClass('invalid-feedback');
							$('#vEmail').html('Email already exist!');
							isEmailOK=false;

					} else if(parseInt(response)===0) {
				
							console.log('valid');
							clear();
							$('input[name=email]').addClass('is-valid');
							$('#vEmail').addClass('valid-feedback');
							$('#vEmail').html('Email OK!');
							isEmailOK=true;
						
					}
			}
		});

		}

		function clear() {
					$('input[name=email]').removeClass('is-invalid');
					$('#vEmail').removeClass('invalid-feedback');
					$('input[name=email]').removeClass('is-valid');
					$('#vEmail').removeClass('valid-feedback');
					$('#vEmail').html('');
		}
}

//validate email format
function isEmail(email) {
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test(email)) {
		return false;
	}else{
		return true;
	}
}


//validate password
function validatePassword() {

	pass = $('input[name=password]');

	if(pass.val()=="") {
		console.log('Empt pass');
		clear();
		pass.addClass('is-invalid');
		$('#vPass').addClass('invalid-feedback');
		$('#vPass').html('Please enter password!');
		$('input[name=confirm_password]').removeAttr('disabled') ;
		isPassOK=false;
	} else {
		console.log( ((pass.val()).length < 8) ? 'not ok' : 'ok' );
		clear();
		pass.addClass(((pass.val()).length < 8) ? 'is-invalid' : 'is-valid' );
		$('#vPass').addClass(((pass.val()).length < 8) ? 'invalid-feedback' : 'valid-feedback' );
		$('#vPass').html(((pass.val()).length < 8) ? 'Password must be mininum of 8 characters' : 'Password OK!' );
		((pass.val()).length < 8) ? isPassOK=false : isPassOK=true;

		isPassOK ? $('input[name=confirm_password]').removeAttr('disabled')  : $('input[name=confirm_password]').attr('disabled','true') ;
	}


	function clear() {
			pass.removeClass('is-invalid');
			$('#vPass').removeClass('invalid-feedback');
			pass.removeClass('is-valid');
			$('#vPass').removeClass('valid-feedback');
			$('#vPass').html('');
	}
}

//validate confirm password
function validateCPassword() {

	cpass = $('input[name=confirm_password]');
	
	if(cpass.val()=="") {
		console.log('Empt pass');
		clear();
		cpass.addClass('is-invalid');
		$('#vCPass').addClass('invalid-feedback');
		$('#vCPass').html('Please confirm the password!');
		isCPassOK=false;
	} else {
		var t;
		t = !(pass.val()===cpass.val());
		clear();
		cpass.addClass(t ? 'is-invalid' : 'is-valid' );
		$('#vCPass').addClass( t ? 'invalid-feedback' : 'valid-feedback' );
		$('#vCPass').html( t ? 'Password did not match!': 'Password Matched!' );
		t ? isCPassOK=false : isCPassOK=true;	
	}


	function clear() {
			cpass.removeClass('is-invalid');
			$('#vCPass').removeClass('invalid-feedback');
			cpass.removeClass('is-valid');
			$('#vCPass').removeClass('valid-feedback');
			$('#vCPass').html('');
	}
}
