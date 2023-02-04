let menu = document.querySelector('#menu-btn');
let nav = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};


window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

let slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");

    console.log(slides);

    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "flex";
}

setInterval(() => {
  plusSlides(1);
}, 3000);



// ---------- CHARTS ----------

// BAR CHART

var dataContainer3 = document.getElementById("dataContainer3");
var hot = parseInt(dataContainer3.dataset.value.slice(1, -1));
var dataContainer4 = document.getElementById("dataContainer4");
var dec = parseInt(dataContainer4.dataset.value.slice(1, -1));
var dataContainer5 = document.getElementById("dataContainer5");
var bad = parseInt(dataContainer5.dataset.value.slice(1, -1));
var dataContainer6 = document.getElementById("dataContainer6");
var pho = parseInt(dataContainer6.dataset.value.slice(1, -1));

var barChartOptions = {
    series: [{
      data: [hot, dec, bad, pho]
    }],
    chart: {
      type: 'bar',
      height: 350,
      toolbar: {
        show: false
      },
    },
    colors: [
      "#246dec",
      "#cc3c43",
      "#367952",
      "#f5b74f"
    ],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        horizontal: false,
        columnWidth: '40%',
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    xaxis: {
      categories: ["Hotels", "Decoration", "Bands", "Photography"],
    },
    yaxis: {
      title: {
        text: "Count"
      }
    }
  };
  
  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();
  
  
  // AREA CHART
  var areaChartOptions = {
    series: [{
      name: 'Services',
      data: [31, 40, 28, 51, 42, 109, 100]
    }, {
      name: 'Packages',
      data: [11, 32, 45, 32, 34, 52, 41]
    }],
    chart: {
      height: 350,
      type: 'area',
      toolbar: {
        show: false,
      },
    },
    colors: ["#4f35a1", "#246dec"],
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
          text: 'Services',
        },
      },
      {
        opposite: true,
        title: {
          text: 'Packages',
        },
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
  var dataContainer2 = document.getElementById("dataContainer2");
  var data2 = parseInt(dataContainer2.dataset.value.slice(1, -1));

var xValues = ["Customers", "Service Providers"];
var yValues = [data1,data2];
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