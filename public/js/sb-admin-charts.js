// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// -- Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: AREA_LABEL,
    datasets: [{
      label: '₹',
      lineTension: 0.1,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 13,
      pointBorderWidth: 1,
      data: AREA_DATA,
    }],
  },
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          display: false,
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: AREA_MAX,
          maxTicksLimit: 7,
          callback: function(value, index, values) {
              return '₹' + value;
          }
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        },
        scaleLabel: {
          display: true,
          labelString: 'Revenue in Rs.'
        },
      }],
    },
    legend: {
      display: false
    }
  }
});
// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: MONTHWISE_LABEL,
    datasets: MONTHWISE_DATA,
  },
  options: {
    legend: {
      position: 'top',
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        scaleLabel: {
          display: true,
          labelString: 'Month'
        },
        stacked: true,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: MONTHWISE_MAX,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        },
        scaleLabel: {
          display: true,
          labelString: 'No. of Subscriptions'
        },
        stacked: true,
      }],
    }
  }
});
// -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: PIE_LABEL,
    datasets: [{
      data: PIE_DATA,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});