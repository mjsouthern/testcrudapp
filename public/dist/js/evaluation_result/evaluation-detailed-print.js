var datateacher = [];

$(function() {
	datateacher = JSON.parse(localStorage.getItem("datateacher") || "[]");
	console.log(datateacher);
	getprintdata(localStorage.getItem("index"));
});



function getprintdata(index) {

	$("#schoolyear").html(localStorage.getItem("schoolyear"));
	$("#semester").html(localStorage.getItem("semester"));
	$("#tname").html(datateacher[index].fullname);
	$("#departmentteacher").html(localStorage.getItem("dept").toUpperCase()+ " DEPARTMENT");

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
	$("#L").html(datateacher[index].L);
	$("#M").html(datateacher[index].M);
	$("#N").html(datateacher[index].N);
	$("#O").html(datateacher[index].O);
	$("#P").html(datateacher[index].P);
	$("#Q").html(datateacher[index].Q);
	$("#R").html(datateacher[index].R);
	$("#S").html(datateacher[index].S);
	$("#T").html(datateacher[index].T);
	$("#U").html(datateacher[index].U);
	$("#V").html(datateacher[index].V);
	$("#W").html(datateacher[index].W);
	$("#X").html(datateacher[index].X);
	$("#Y").html(datateacher[index].Y);
	$("#Z").html(datateacher[index].Z);
	$("#AA").html(datateacher[index].AA);
	$("#BB").html(datateacher[index].BB);
	$("#CC").html(datateacher[index].CC);
	$("#DD").html(datateacher[index].DD);
	$("#EE").html(datateacher[index].EE);
	$("#FF").html(datateacher[index].FF);
	$("#GG").html(datateacher[index].GG);
	$("#HH").html(datateacher[index].HH);
	$("#II").html(datateacher[index].II);
	$("#JJ").html(datateacher[index].JJ);


	$("#PAATOTAL").html(datateacher[index].GENAVGPAA);
	$("#KSMTOTAL").html(datateacher[index].GENAVGKSM);
	$("#TSTOTAL").html(datateacher[index].GENAVGTS);
	$("#CMTOTAL").html(datateacher[index].GENAVGCM);
	$("#GOTOTAL").html(datateacher[index].GENAVGGO);

	$("#overallavg").html(datateacher[index].OVERALLAVG);

	$("#countstudeval").html(datateacher[index].countstudents);
}