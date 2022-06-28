var dept, sem, sy, area;
var table =  $("#evaltbl").DataTable();
var lname;
var datateacher = [];
var datadate = [];
var isSummary;
var data_analyze_res = [];
var CA2Chart;
var dataresult = [];
var labelval;

$(function() {

	$("#analyze_res").click(function() {

		 
	});

	$("#loaddata").click(function() {
		isSummary = true;
		$("#loadstat").html("Loading data...");
		assignvalues();
	});

	$("#loaddatadetailed").click(function() {
		isSummary = false;
		lname = $("#teachername").val();
	 	$("#loadstat").html("Loading data...");
		assignvalues();
		//loadBarChartForA2();
	});
});


function loadevaluationresults(){
	console.log(dept);
	console.log(datadate);

	$.ajax({
		url: urlroot + '/evaluationresults/loadsummarizedresults', 
		data: {
			startdate: datadate.startdate,
			enddate: datadate.enddate,
			dept: dept
		},
		dataType: 'json',
		success: function(data){
			console.log(data);

			if (data.length==0) {
				console.log("No data found");
				$("#loadstat").html("No data found!");
				table.clear().draw();
			} else {
				 console.log("Data found");

				 table.destroy();

				 table = $('#evaltbl').DataTable({
						    data: data,
						    columns: [
						        { data: 'teacher_id' },
						        { data: 'fullname' },
						        { data: 'GENAVGPAA' },
						        { data: 'GENAVGKSM' },
						        { data: 'GENAVGTS' },
						        { data: 'GENAVGCM' },
						        { data: 'GENAVGGO' },
						        { data: 'OVERALLAVG' }
						    ]
						});
				 $("#loadstat").html("");
			}
		}
	});
}

function loadevaluationresultsdetailed(){
	console.log(datadate.startdate+" "+datadate.enddate+" "+dept+" "+lname);

	$('#datanameteacher').empty();
	$("#resultcard").addClass("hidden");
	$.ajax({
		url: urlroot + '/evaluationresults/loaddetailedresults', 
		data: {
			startdate: datadate.startdate,
			enddate: datadate.enddate,
			dept: dept,
			lname: lname
		},
		dataType: 'json',
		success: function(data){

			if (data.length==0) {
				console.log("No data found");
				$("#loadstat").html("No data found!");
			} else {
				datateacher = data;
				console.log(data);
				var tr;
	            for (var i = 0; i < data.length; i++) {
	                tr = $('<tr>');
	                tr.append("<td>" + data[i].teacher_id + "</td>");
	                tr.append("<td>" + data[i].fullname + "</td>");
	                tr.append("<td><button type='button' class='btn btn-info btn-sm' onclick=showdata("+ i +")>Show Results</button></td>");
	                $('#datanameteacher').append(tr);
	            }
	            $("#loadstat").html("");
			}

		}	
	});
}

function assignvalues(){
	

	dept = $("#dept").val();
	sem = $("#sem").val();
	sy = $("#sy").val();
	area = $("#areas").val();

	console.log(dept);
	console.log(sy);
	console.log(sem);
	console.log(lname);
	console.log(area);

	setdates();

	switch(area) {
	  case 'PAA':
	    dataresult = [3.45, 4.30, 4.12];
	    labelval = "Result for Professional Attitude and Appearance";
	    break;
	  case 'KSM':
	    dataresult = [4.85, 3.76, 3.77];
	    labelval = "Result for Knowledge of Subject Matter";
	    break;
	  case 'TS':
	    dataresult = [3.15, 4.26, 3.97];
	    labelval = "Result for Teaching Skills";
	    break;
	  case 'CM':
	    dataresult = [3.99, 4.16, 4.87];
	    labelval = "Result for Classroom Management";
	    break;
	}

	console.log(dataresult);
	
}

function showdata(index){
	loadBarChartForA2();
}


function setdates(){
	$.ajax({ 
		url: localStorage.getItem("urlroot") + '/others/fetchschoolyeardate', 
		data: {
				sy: sy,
				sm: sem
		},                                                
      	dataType: 'json',                
      	success: function(data)          
      	{ 
      		datadate = data;
     
      		if(isSummary) {
      			console.log(datadate);
	  			loadevaluationresults();
      		} else {
      			loadevaluationresultsdetailed();	
      		}
      	}
	});
}


function analyze_res(area) {
	console.log(area);

	$('#excellent_datatbl').empty();
	$('#vs_datatbl').empty();
	$('#s_datatbl').empty();
	$('#f_datatbl').empty();
	$('#p_datatbl').empty();

	switch(area) {
	  	case 'paa':
	  		$('#area_header').html("PROFESSIONAL ATTITUDE AND APPEARANCE");
	    	data_analyze_res = paaData;
	    	assignDataToTable();
	    	break;
	  	case 'ksm':
	  		$('#area_header').html("KNOWLEDGE OF SUBJECT MATTER");
	    	data_analyze_res = ksmData;
	    	assignDataToTable();
	    	break;
		case 'ts':
			$('#area_header').html("TEACHING SKILLS");
	    	data_analyze_res = tsData;
	    	assignDataToTable();
	    	break;
	    case 'cm':
	    	$('#area_header').html("CLASSROOM MANAGEMENT");
	    	data_analyze_res = cmData;
	    	assignDataToTable();
	    	break;
	    case 'go':
	    	$('#area_header').html("GENERAL OBSERVATION");
	    	data_analyze_res = goData;
	    	assignDataToTable();
	    	break;
	}

	$('#detailed_result_analysis').modal('show');
}

function assignDataToTable() {
	var tr;
	for (var i = 0; i < data_analyze_res.length; i++) {
		 	if(data_analyze_res[i][1] >= 4.5 && data_analyze_res[i][1] <= 5 ) {
		 		tr = $('<tr>');
                tr.append("<td>&ensp;" + data_analyze_res[i][0] + "</td>");
                tr.append("<td>" + data_analyze_res[i][1]+ "</td>");
                $('#excellent_datatbl').append(tr);
		 	}

		 	if(data_analyze_res[i][1] >= 3.5 && data_analyze_res[i][1] <= 4.4 ) {
		 		tr = $('<tr>');
                tr.append("<td>&ensp;" + data_analyze_res[i][0] + "</td>");
                tr.append("<td>" + data_analyze_res[i][1]+ "</td>");
                $('#vs_datatbl').append(tr);
		 	}

		 	if(data_analyze_res[i][1] >= 2.5 && data_analyze_res[i][1] <= 3.4 ) {
		 		tr = $('<tr>');
                tr.append("<td>&ensp;" + data_analyze_res[i][0] + "</td>");
                tr.append("<td>" + data_analyze_res[i][1]+ "</td>");
                $('#s_datatbl').append(tr);
		 	}

		 	if(data_analyze_res[i][1] >= 1.5 && data_analyze_res[i][1] <= 2.4 ) {
		 		tr = $('<tr>');
                tr.append("<td>&ensp;" + data_analyze_res[i][0] + "</td>");
                tr.append("<td>" + data_analyze_res[i][1]+ "</td>");
                $('#f_datatbl').append(tr);
		 	}

		 	if(data_analyze_res[i][1] >= 0 && data_analyze_res[i][1] <= 1.4 ) {
		 		tr = $('<tr>');
                tr.append("<td>&ensp;" + data_analyze_res[i][0] + "</td>");
                tr.append("<td>" + data_analyze_res[i][1]+ "</td>");
                $('#p_datatbl').append(tr);
		 	}
	}
}

function loadBarChartForA2() {
	var CA2ChartData = {
              labels  : ['Students', 'Faculty', 'Immediate Head'],
              datasets: [
			                {
					            label: labelval,
					            backgroundColor     : [
                                            '#000080',
                                            '#008000',
                                            '#FE0410'
                                        ],
                  				borderColor         : [
                                            '#000080',
                                            '#008000',
                                            '#FE0410'
                                        ],
					            data: dataresult
					        }
              			]
            }

            var CA2ChartOptions = {
              	maintainAspectRatio : false,
			    responsive : true,
			    legend: {
			      display: false,
			    },
			    scales: {
			      xAxes: [{
			        ticks : {
			          fontColor: '#000000',
			        },
			        gridLines : {
			          display : false,
			          color: '#CECDCD',
			          drawBorder: false,
			        }
			      }],
			      yAxes: [{
			        ticks : {
			        	max: 5,
	                	min: 1,
	                	stepSize: 0.5,
			          	fontColor: '#000000',
			          	beginAtZero: false
			        },
			        gridLines : {
			          display : true,
			          color: '#CECDCD',
			          drawBorder: true,
			        }
			      }]
			    }

            }

            if (CA2Chart) {
              CA2Chart.destroy();
              console.log("Tesst");
            }


            // This will get the first returned node in the jQuery collection.
            var CA2ChartCanvas = $('#overallresults').get(0).getContext('2d');
            CA2Chart = new Chart(CA2ChartCanvas, { 
              type: 'bar', 
              data: CA2ChartData, 
              options: CA2ChartOptions
            })
}





