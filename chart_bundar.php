<!DOCTYPE html>
    <html>
    <head>
      <title>Membuat Grafik Di PHP dan MySQL menggunakan Chartjs</title>
      <style>
        .container {
          width: 100%;
          margin: 15px 10px;
        }

        .chart {
          width: 50%;
          float: left;
          text-align: center;
        }
      </style>
      <script type="text/javascript" src="Chart.bundle.min.js"></script>
    </head>
    <body>
      <div class="container">
        <div class="chart">
          <h2>Bar Chart</h2>
          <canvas id="bar-chart"></canvas>
        </div>
        <div class="chart">
          <h2>Line Chart</h2>
          <canvas id="line-chart"></canvas>
        </div>
      </div>

      <script>
        var barchart = document.getElementById('bar-chart');
        var chart = new Chart(barchart, {
          type: 'pie',
          data: {
            labels: ["Program Strategis Pemerintah", "Non Program Strategis Pemerintah"],
            datasets: [{
              label: 'Total Proyek DJK',
              data: [6,4],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)'
              ],
              borderWidth: 2
            }]
          }
        });

        var linechart = document.getElementById('line-chart');
        var chart = new Chart(linechart, {
          type: 'pie',
          data: {
            labels: ["Program Strategis Pemerintah", "Non Program Strategis Pemerintah"],
            datasets: [{
              label: 'Data Penjualan',
              data: [7,3],
               borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)'
              ],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                
              ],
              borderWidth: 2
            }]
          }
        });
      </script>
    </body>
    </html>