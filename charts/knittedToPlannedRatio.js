$(document).ready(function() {

    var lineChartData = [];

    
    $.ajax({
      type: 'POST',
      url: 'generate_piece_out_ratio_chart.php',
      success: function (data) {
      //lineChartData = data;//alert(JSON.stringify(data));
      
      console.log("Data :"+data);
      var data=JSON.parse(data);
      
      var machineNumbers = [];
      var knittedQUantities = [];
      var reworkQuantities = [];
      var rejectQuantities = [];

      for(var i in data) {
        machineNumbers.push( data[i]["machineNumber"]);
        knittedQUantities.push(data[i]["knittedQuantity"]);
        reworkQuantities.push(data[i]["reworkQuantity"]);
        rejectQuantities.push(data[i]["rejectQuantity"]);
      }

      console.log(machineNumbers);
      console.log(knittedQUantities);

      var chartdata = {
        labels: machineNumbers,
        datasets : [
          {
            label: 'Knitted percentage',
            backgroundColor: '#66ff33',
            borderColor: '#66ff33',
            hoverBackgroundColor: '#66ff33',
            hoverBorderColor: '#66ff33',
            data: knittedQUantities
          },
          {
            label: 'Rework percentage',
            backgroundColor: '#ffcc00',
            borderColor: '#ffcc00',
            hoverBackgroundColor: '#ffcc00',
            hoverBorderColor: '#ffcc00',
            data: reworkQuantities
          },
          {
            label: 'Reject percentage',
            backgroundColor: '#cc0000',
            borderColor: '#cc0000',
            hoverBackgroundColor: '#cc0000',
            hoverBorderColor: '#cc0000',
            data: rejectQuantities
          }
        ]
      };

      var ctx = $("#myChart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
            title: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                },scaleLabel: {
                     display: true,
                     labelString: "Percentage"
                 }
              }]
            }
          }
      
      });

      },

     

      error: function(data) {
      console.log(data);
    }

    });
});