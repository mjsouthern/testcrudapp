$(function () {
  
  var sdate, edate;
  var t = new Date(); 

  sdate = t.getFullYear()+'-'+(t.getMonth()+1)+'-'+t.getDate();
  edate = t.getFullYear()+'-'+(t.getMonth()+1)+'-'+t.getDate();
  loadChart(urlroot,sdate,edate);

  $('#reservation').daterangepicker(
      { 
      format: 'YYYY-MM-DD'
    },
    function(start, end) {
      sdate = start.format('YYYY-MM-DD');
      edate = end.format('YYYY-MM-DD');
      $("#loadstat").html("Loading data...");
      loadChart(urlroot,sdate,edate);
    }
  );

});

var monitoringChart;

function loadChart(ur,sd,ed){
  var value1 = [0,0,0];
      $.ajax({                                      
          url: ur + '/dashboards/monitoring',                 
          data: { startDate: sd, 
                  endDate : ed
                },                                                  
          dataType: 'json',                
          success: function(data)          
          {
            console.log(data);
            $("#cnt_elem").html(0);
            $("#cnt_hs").html(0);
            $("#cnt_college").html(0);

            for(var i in data) {
                switch(data[i].dept_name) {
                  case "ELEMENTARY DEPARTMENT":   
                    value1[0] = parseInt(data[i].cnt);
                    $("#cnt_elem").html(value1[0]);
                    break;
                  case "HIGHSCHOOL DEPARTMENT":
                    value1[1] = parseInt(data[i].cnt);
                    $("#cnt_hs").html(value1[1]);
                    break;
                  case "COLLEGE DEPARTMENT":
                    value1[2] = parseInt(data[i].cnt);
                    $("#cnt_college").html(value1[2]);
                    break;
                }
            }

            console.log(value1); 


            $("#castedEval").html(formatNumber(value1.reduce((a, b) => a + b, 0)));

            var monitoringChartData = {
              labels  : ['Elementary', 'Highschool', 'College'],
              datasets: [
                {
                  label               : 'Department',
                  backgroundColor     : [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                  borderColor         : [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                  borderWidth: 1,
                  data                : value1
                }
              ]
            }

            var monitoringChartOptions = {
              maintainAspectRatio : false,
              responsive : true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines : {
                    display : true,
                  }
                }],
                yAxes: [{
                  gridLines : {
                    display : true,
                  }
                }]
              }
            }

            if (monitoringChart) {
              monitoringChart.destroy();
              console.log("Tesst");
            }

            // This will get the first returned node in the jQuery collection.
            var monitoringChartCanvas = $('#monitoring').get(0).getContext('2d');
            monitoringChart = new Chart(monitoringChartCanvas, { 
              type: 'bar', 
              data: monitoringChartData, 
              options: monitoringChartOptions
            })
            
            $("#loadstat").html("");
          } 

      });

}

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
