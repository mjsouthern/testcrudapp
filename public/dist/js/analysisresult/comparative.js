var CA1Chart;
var CA2Chart;
var datateacher = [];
var teacher_id, dept, area;
var labels = [];
var datarate = [];
var rate = [];
var href = location.href;
var analysisNo = href.match(/([^\/]*)\/*$/)[1];

$(function () { 

	if (analysisNo=='analysis1') {
		loadLineChart();
	}else if(analysisNo=='analysis2') {
		loadBarChartForA2();
	}


  	$("#teachername").keyup(function(){
		searchName($("#teachername").val());
	});

	$("#loaddata").click(function(){
		dept = $("#dept").val();
		area = $("#areas").val();
		console.log(teacher_id+" "+dept+" "+area);
		$("#loadstat").html("Analyzing data...");
		loadData();
	});

	$("#loaddata2").click(function(){
		dept = $("#dept").val();
		console.log(teacher_id+" "+dept);
		$("#loadstat").html("Analyzing data...");
		loadData2();
	});

})


function searchName(lname) {

	$('#datanameteacher').empty();
	$.ajax({
			url: urlroot + '/analysisresults/searchteacher', 
			data: {
				lname: lname
			},
			dataType: 'json',
			success: function(data){

				if (data==0) {
					console.log("No data found");
					$('#datanameteacher').empty();
					$('#searchtbl').addClass('hidden');
					//$("#loadstat").html("No data found!");
				} else {
					$('#searchtbl').removeClass('hidden');
					datateacher = data;
					console.log(data);
					var tr;
		            for (var i = 0; i < data.length; i++) {
		                tr = $('<tr>');
		                tr.append("<td>" + data[i].teacher_id + "</td>");
		                tr.append("<td>" + data[i].fullname + "</td>");
		                tr.append("<td><button type='button' class='btn btn-info btn-sm' onclick=showdata("+ i +") id="+ i +">SELECT</button></td>");
		                $('#datanameteacher').append(tr);
		            }
		            //$("#loadstat").html("");
				}

			}	
	});
}

function showdata(id) {
	$("#teachername").val(datateacher[id].fullname);
	teacher_id = datateacher[id].teacher_id;
	console.log(teacher_id);

	$('#datanameteacher').empty();
	$('#searchtbl').addClass('hidden');

	resetData();

	if (analysisNo=='analysis1') {
		loadLineChart();
	}else if(analysisNo=='analysis2') {
		loadBarChartForA2();
	}
}

function loadData() {
	resetData();

	$.ajax({
			url: urlroot + '/analysisresults/loadDataComparativeAnalysis1', 
			data: {
				id: teacher_id,
				dept: dept,
				area: area
			},
			dataType: 'json',
			success: function(data){
				console.log(data);
				if(data.length==0) {
					$("#loadstat").html("No data found!");
					loadLineChart();
				} else {
					
					for(var i in data) { 
						labels.push(data[i].identity); 
						datarate.push(parseFloat(data[i].GENAVG));
					}	
					console.log(labels);
					console.log(datarate);
					loadLineChart();
					$("#loadstat").html("");
				}	
			},
			error: function(data) {
				console.log(data.responseText);
			}
	});
}

function loadData2() {
	resetData();

	$.ajax({
			url: urlroot + '/analysisresults/loadDataComparativeAnalysis2', 
			data: {
				id: teacher_id,
				dept: dept
			},
			dataType: 'json',
			success: function(data){
				console.log(data);
				if(data.length==0) {
					$("#loadstat").html("No data found!");
					loadBarChartForA2();
				} else {

					
					for (var i = 0; i < data[0].length; i++) {
						labels.push(data[0][i].identity);
					}

					for (var i = 0; i < data.length; i++) {
						for (var j = 0; j < data[i].length; j++) {
							//console.log(data[i][j].GENAVG);
							rate.push(parseFloat(data[i][j].GENAVG));
						}
						console.log(rate);
						datarate.push(rate);
						rate = [];
					}

					console.log(labels);
					console.log(datarate);
					loadBarChartForA2();
					$("#loadstat").html("");

					if(data[0].length==0){
						$("#loadstat").html("No data found!");
					}
					
				}	
			},
			error: function(data) {
				console.log(data.responseText);
			}
	});
}

function loadLineChart() {
	var CA1ChartData = {
	labels  : labels,
	datasets: [
	  {
	    label               : $("#areas option:selected").text(),
	    fill                : false,
	    borderWidth         : 1,
	    lineTension         : 0,
	    spanGaps 			: false,
	    borderColor         : '#FE0410',
	    pointRadius         : 3,
	    pointHoverRadius    : 7,
	    pointColor          : '#FE0410',
	    pointBackgroundColor: '#FE0410',
	    backgroundColor : '#FE0410',
	    data                : datarate
	  }
	]
	}

	var CA1ChartOptions = {
		    maintainAspectRatio : false,
		    responsive : true,
		    legend: {
		      display: true,
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

	  	if (CA1Chart) {
	      CA1Chart.destroy();
	      console.log("Tesst");
	    }

	  	var CA1ChartCanvas = $('#comparativeanalysis').get(0).getContext('2d');
	  	CA1Chart = new Chart(CA1ChartCanvas, { 
	      type: 'line', 
	      data: CA1ChartData, 
	      options: CA1ChartOptions
	    }
	  )
}



function loadBarChartForA2() {
	var CA2ChartData = {
              labels  : labels,
              datasets: [
			                {
					            label: "Professional Attitude and Appearance",
					            borderColor : '#000080',
	   							backgroundColor : '#000080',
					            data: datarate[0]
					        },
					        {
					            label: "Knowledge of Subject Matter",
					            borderColor : '#008000',
	   							backgroundColor : '#008000',
					            data: datarate[1]
					        },
					        {
					            label: "Teaching Skills",
					            borderColor : '#FE0410',
	   							backgroundColor : '#FE0410',
					            data: datarate[2]
					        },
					        {
					            label: "Classroom Management",
					            borderColor : '#FFFF00',
	   							backgroundColor : '#FFFF00',
					            data: datarate[3]
					        },
					        {
					            label: "General Observation",
					            borderColor : '#C0C0C0',
	   							backgroundColor : '#C0C0C0',
					            data: datarate[4]
					        }
              ]
            }

            var CA2ChartOptions = {
              	maintainAspectRatio : false,
			    responsive : true,
			    legend: {
			      display: true,
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
            var CA2ChartCanvas = $('#comparativeanalysis2').get(0).getContext('2d');
            CA2Chart = new Chart(CA2ChartCanvas, { 
              type: 'bar', 
              data: CA2ChartData, 
              options: CA2ChartOptions
            })
}


function resetData() {
	labels = [];
	datarate = [];
	rate = [];
}
