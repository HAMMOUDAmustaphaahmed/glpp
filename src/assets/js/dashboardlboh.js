$(function () {
        // JavaScript code for your donut chart
        var proportions = <?php echo $proportionsJSON; ?>;
        var counts = <?php echo $countsJSON; ?>;
  var breakupp = {
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],
    labels: counts,
    series: proportions,
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector("#breakupp"), breakupp);
  chart.render();
});
