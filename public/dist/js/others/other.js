var urlroot = localStorage.getItem("urlroot"); //URL PUBLIC VARIABLE
var paaData = [];
var ksmData = [];
var tsData = [];
var cmData = [];
var goData = [];

$(function() {

var sd,ed;

	$('#sydatespicker').daterangepicker(
	      { 
	      format: 'YYYY-MM-DD'
	    },
	    function(start, end) {
	      sd = start.format('YYYY-MM-DD');
	      ed = end.format('YYYY-MM-DD');
	      console.log(sd+" "+ed);
	    }
  	);

  	fetchSY('syopt');
  	fetchSY('sy');
	
	$("#addsydesclink").click(function(){
		showElements();
	});

	
	$("#hidesydesclink").click(function(){
		hideElements();
	});

	$("#account_setting").click(function(){
		$('#username').val(localStorage.getItem("uname"));
		$('#account_seting_mdl').modal('show');
	});

	$("#acc_setting").submit(function(e){
		e.preventDefault();

		if($('#current_pass').val()==localStorage.getItem("p")){
			if($('#new_pass').val()==$('#verify_pass').val()){
				if($('#new_pass').val().length >= 6) {

					$.ajax({ 
			 			url: localStorage.getItem("urlroot") + '/users/update',  
			 			type: "POST",
			 			data: {
			 				uid: localStorage.getItem("user_id"),
			 				uname: $('#username').val(),
			 				pass: $('#new_pass').val()
			 			},                                             
			          	cache: false,                
			          	success: function(data)          
			          	{ 
			          		if(data){
			          			alert("Account Successfully Updated!");
			          			localStorage.setItem("uname", $('#username').val());
							    localStorage.setItem("p", $('#new_pass').val());
							    window.location.href = localStorage.getItem("urlroot");
			          		}
			          	}
	 				});
	 		
				} else {
					alert("Password must at atleast be 6 characters!");
				}
			} else {
				alert("Password did not match!");
				$('#new_pass').val("");
				$('#verify_pass').val("");
			}
		} else {
			alert("Incorrect Current Password!");
			$('#current_pass').val("");
		}
	});

	

	$("#addsybtn").click(function(){
		$.ajax({ 
	 			url: localStorage.getItem("urlroot") + '/others/insertSY',  
	 			type: "POST",
	 			data: {
	 				descr: $("#descrSY").val()
	 			},                                             
	          	cache: false,                
	          	success: function(data)          
	          	{ 
	          		if(data==1) {
	          			$("#descrSY").val("");
	          			fetchSY('syopt');
	          			hideElements();
	          		}
	          	}
	 	});
	});


	$("#setsydateBTN").click(function(){
		$.ajax({ 
	 			url: localStorage.getItem("urlroot") + '/others/insertSYDates',  
	 			type: "POST",
	 			data: {
	 				sy: $("#syopt").val(),
	 				sem: $("#semopt").val(),
	 				startDate: sd, 
	 				endDate: ed
	 			},                                             
	          	cache: false,                
	          	success: function(data)          
	          	{ 
	          		if(data==1) {
	          			alert("School Year Date Set Successfuly!");
	          		}
	          	}
	 	});
	})

	
});


function hideElements() {
	$("#descrSY").addClass('hidden');
	$("#addsybtn").addClass('hidden');
	$("#hidesydesclink").addClass('hidden');
}

function showElements() {
	$("#descrSY").removeClass('hidden');
	$("#addsybtn").removeClass('hidden');
	$("#hidesydesclink").removeClass('hidden');

}

function fetchSY(id) {
	$('#'+ id +'').empty();
 	$.ajax({ 
		url: localStorage.getItem("urlroot") + '/others/fetchschoolyear',                                                 
      	dataType: 'json',                
      	success: function(data)          
      	{ 
      		console.log(data);
      		var opt;
      		for (var i = 0; i < data.length; i++) {

            opt = "<option value=" + data[i].id + ">"+ data[i].description +"</option>";
            $('#'+ id +'').append(opt);

        	}
      	}
	});
}


