var dept, sem, sy;;
var table =  $("#evaltbl").DataTable();
var lname;
var datateacher = [];
var datadate = [];
var isSummary;
var data_analyze_res = [];


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
	                tr.append("<td><button type='button' class='btn btn-info btn-sm' onclick=showdata("+ i +")>Show Data</button></td>");
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

	console.log(dept);
	console.log(sy);
	console.log(sem);

	setdates();
	
}

function showdata(index){
	//alert(index);
	$("#resultcard").removeClass("hidden");
	$("#schoolyear").html($("#sy option:selected").text());
	$("#semester").html($("#sem option:selected").text());
	$("#tname").html(datateacher[index].fullname);
	$("#departmentteacher").html($("#dept option:selected").text().toUpperCase()+ " DEPARTMENT");
	
	//PAA
	$("#A").html(datateacher[index].A);
	$("#B").html(datateacher[index].B);
	$("#C").html(datateacher[index].C);
	$("#D").html(datateacher[index].D);
	$("#E").html(datateacher[index].E);
	$("#F").html(datateacher[index].F);
	$("#G").html(datateacher[index].G);
	$("#H").html(datateacher[index].H);
	$("#I").html(datateacher[index].I);
	$("#J").html(datateacher[index].J);
	$("#K").html(datateacher[index].K);
	paaData = [ 
					[
						"Shows marked extraordinary enthuasiasm about his/her teaching",
						parseFloat(datateacher[index].A)
					],
					[
						"Punctual in the submission of required forms/plans",
						parseFloat(datateacher[index].B)
					],
					[
						"Endeavors to implement the school's objective",
						parseFloat(datateacher[index].C)
					],
					[
						"Intellectually humble and tolerant",
						parseFloat(datateacher[index].D)
					],
					[
						"Always clean and orderly in person, dress and habits",
						parseFloat(datateacher[index].E)
					],
					[
						"Well modulated voice",
						parseFloat(datateacher[index].F)
					],
					[
						"Capable of adjusting to changing conditions and situations",
						parseFloat(datateacher[index].G)
					],
					[
						"Consistently alert and emotionally mature",
						parseFloat(datateacher[index].H)
					],
					[
						"Punctual in class attendance/meetings and other school activities",
						parseFloat(datateacher[index].I)
					],
					[
						"Follows school rules and regulations",
						parseFloat(datateacher[index].J),
						
					],
					[
						"Performs other duties assigned outside of classroom work",
						parseFloat(datateacher[index].K)
					]
				];

	console.log(paaData);

	//KSM
	$("#L").html(datateacher[index].L);
	$("#M").html(datateacher[index].M);
	$("#N").html(datateacher[index].N);
	$("#O").html(datateacher[index].O);
	$("#P").html(datateacher[index].P);
	$("#Q").html(datateacher[index].Q);
	$("#R").html(datateacher[index].R);
	ksmData = [ 
					[
						"Prepares lesson well (lesson plans/devices/syllabi)",
						parseFloat(datateacher[index].L)
					],
					[
						"Has ample understanding/grasp of subject",
						parseFloat(datateacher[index].M)
					],
					[
						"Shows interest in subject matter",
						parseFloat(datateacher[index].N)
					],
					[
						"Welcomes questions/request/clarification",
						parseFloat(datateacher[index].O)
					],
					[
						"Organizes subject matter well",
						parseFloat(datateacher[index].P)
					],
					[
						"Select relevant material effectively",
						parseFloat(datateacher[index].Q)
					],
					[
						"Ability to relate subject matter to other fields",
						parseFloat(datateacher[index].R)
					]
				];

	console.log(ksmData);

	//TS
	$("#S").html(datateacher[index].S);
	$("#T").html(datateacher[index].T);
	$("#U").html(datateacher[index].U);
	$("#V").html(datateacher[index].V);
	$("#W").html(datateacher[index].W);
	$("#X").html(datateacher[index].X);
	$("#Y").html(datateacher[index].Y);
	$("#Z").html(datateacher[index].Z);
	$("#AA").html(datateacher[index].AA);
	tsData = [ 
					[
						"Speaks clearly and distincly",
						parseFloat(datateacher[index].S)
					],
					[
						"Speaks English-Flipino correctly",
						parseFloat(datateacher[index].T)
					],
					[
						"Makes lesson interesting",
						parseFloat(datateacher[index].U)
					],
					[
						"Explains subject matter clearly",
						parseFloat(datateacher[index].V)
					],
					[
						"Makes subject matter relevant to the course objectives",
						parseFloat(datateacher[index].W)
					],
					[
						"Makes subject matter relevant/practical to current needs",
						parseFloat(datateacher[index].X)
					],
					[
						"Uses techniques for student's participation",
						parseFloat(datateacher[index].Y)
					],
					[
						"Encourages critical thinking",
						parseFloat(datateacher[index].Z)
					],
					[
						"Provides appropriate drills/seatwork/assignments",
						parseFloat(datateacher[index].AA)
					]
				];

	console.log(tsData);

	//CM
	$("#BB").html(datateacher[index].BB);
	$("#CC").html(datateacher[index].CC);
	$("#DD").html(datateacher[index].DD);
	$("#EE").html(datateacher[index].EE);
	$("#FF").html(datateacher[index].FF);
	cmData = [ 
					[
						"Commands student's respect",
						parseFloat(datateacher[index].BB)
					],
					[
						"Handles individual/group discipline tactfully",
						parseFloat(datateacher[index].CC)
					],
					[
						"Fair in dealing with students",
						parseFloat(datateacher[index].DD)
					],
					[
						"Gives attention to the physical arrangement and cleanliness of the classroom",
						parseFloat(datateacher[index].EE)
					],
					[
						"Adopts a system in routine work",
						parseFloat(datateacher[index].FF)
					]
				];

	console.log(cmData);

	//GO
	$("#GG").html(datateacher[index].GG);
	$("#HH").html(datateacher[index].HH);
	$("#II").html(datateacher[index].II);
	$("#JJ").html(datateacher[index].JJ);
	goData = [ 
					[
						"Rapport between teachers and students",
						parseFloat(datateacher[index].GG)
					],
					[
						"Class Participation",
						parseFloat(datateacher[index].HH)
					],
					[
						"Overall Teacher Impact",
						parseFloat(datateacher[index].II)
					],
					[
						"General Classroom Condition",
						parseFloat(datateacher[index].JJ)
					]
				];

	console.log(goData);


	$("#PAATOTAL").html(datateacher[index].GENAVGPAA);
	$("#KSMTOTAL").html(datateacher[index].GENAVGKSM);
	$("#TSTOTAL").html(datateacher[index].GENAVGTS);
	$("#CMTOTAL").html(datateacher[index].GENAVGCM);
	$("#GOTOTAL").html(datateacher[index].GENAVGGO);
	$("#overallavg").html(datateacher[index].OVERALLAVG);

	$("#countstudeval").html(datateacher[index].countstudents);


	localStorage.setItem("datateacher", JSON.stringify(datateacher));
	localStorage.setItem("schoolyear",$("#sy option:selected").text());
	localStorage.setItem("semester",$("#sem option:selected").text());
	localStorage.setItem("dept",$("#dept option:selected").text());
	localStorage.setItem("index",index);

}

function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
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





