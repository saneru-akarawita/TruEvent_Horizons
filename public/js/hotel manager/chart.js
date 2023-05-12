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


  