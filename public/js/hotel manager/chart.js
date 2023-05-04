// AREA CHART
  var areaChartOptions = {
        series: [{
          name: 'Income',
          data: [31, 40, 28, 51, 42, 109, 100]
        },],
        chart: {
          height: 350,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        colors: ["#4f35a1"],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth'
        },
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        markers: {
          size: 0
        },
        yaxis: [
          {
            title: {
              text: 'Income',
            },
          },
          {
            opposite: true,
          },
        ],
        tooltip: {
          shared: true,
          intersect: false,
        }
      };
      
      var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
      areaChart.render();
    
      var dataContainer1 = document.getElementById("dataContainer1");
      var data1 = parseInt(dataContainer1.dataset.value.slice(1, -1));
      
    
    var xValues = ["Income"];
    var yValues = [data1];
    var barColors = [
      "#ec24d8",
      "#000000"
    ];
    
    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      }
    });




  //   function chart4() {
  //     $.ajax({
  //       // url: "http://localhost:80/beauty-craft/Services/overallAnalyticsChart4",
  //       method: "GET",
  //       success: function (data) {
        
  //         var month = [];
  //         var totalReservations = [];
  //         var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  
  //         for (var i in data) {
  //           month.push(data[i].Month);
  //           totalReservations.push(data[i].TotalReservations);
  //         }
  
  //         for (let i = 0; i < 12; i++) {
  //           if (mL[i] != month[i]) {
  //             month.splice(i, 0, mL[i]);
  //             totalReservations.splice(i, 0, 0);
  //           }
  //         }
  
  //         var chartdata = {
  //           labels: month,
  //           datasets: [
  //             {
  //               label: 'No of Reservations',
  //               borderColor: "#3cba9f",
  //               backgroundColor: "#71d1bd",
  //               borderWidth: 2,
  //               data: totalReservations
  //             }
  //           ]
  
  //         };
  
  //         var barGraph = new Chart(noOfResChart, {
  //           type: 'bar',
  //           data: chartdata,
  //           options: {
  //             scales: {
  //               xAxes: [{
  //                 stacked: true
  //               }],
  //               yAxes: [{
  //                 ticks: {
  //                   stepSize: 1
  //                 },
  //                 stacked: true
  //               }],
  //             }
  //           },
  //         });
  //       },
  //       error: function (data) {
  
  //       }
  //     });
  //   }
  
  // });
  