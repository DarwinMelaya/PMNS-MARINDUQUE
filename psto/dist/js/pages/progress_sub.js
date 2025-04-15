/* global Chart:false */

$(function () {
  "use strict";

  var ticksStyle = {
    fontColor: "#FFFFFF",
    fontStyle: "bold",
  };

  var mode = "index";
  var intersect = true;

  var $salesChart = $("#sales-chart");
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: "bar",
    data: {
      labels: [
        "JAN",
        "FEB",
        "MAR",
        "APR",
        "MAY",
        "JUN",
        "JUL",
        "AUG",
        "SEP",
        "OCT",
        "NOV",
        "DEC",
      ],
      datasets: [
        {
          name: "Advance",
          backgroundColor: "#007bff",
          borderColor: "#007bff",
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000],
        },
        {
          name: "On-Time",
          backgroundColor: "#ced4da",
          borderColor: "#ced4da",
          data: [700, 1700, 2700, 2000, 1800, 1500, 4000],
        },
        {
          name: "Late",
          backgroundColor: "#ff6b6b",
          borderColor: "#ff6b6b",
          data: [700, 1700, 2700, 2000, 1802, 3214, 5993],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect,
      },
      hover: {
        mode: mode,
        intersect: intersect,
      },
      legend: {
        display: false,
      },
      scales: {
        xAxes: [
          {
            display: true,
            gridLines: {
              display: false,
            },
            ticks: ticksStyle,
          },
        ],
      },
    },
  });
});
