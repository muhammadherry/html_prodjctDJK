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
          <h5>Pendapatan DJK September 2020</h5>
          <canvas id="bar-chart"></canvas>
        </div>
        <div class="chart">
          <h5>Realisasi Kinerja DJK Periode Jan-Sept 2020</h5>
          <canvas id="line-chart"></canvas>
        </div>
      </div>

      <script>
        var barchart = document.getElementById('bar-chart');
        var chart = new Chart(barchart, {
          type: 'bar',
          data: {
            labels: ["Realisasi September", "Target Pendapatan"],
            datasets: [{
              label: 'Data Penjualan',
              data: [10, 5,3,4,20],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                
              ],
              borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                
              ],
              borderWidth: 2
            }]
          }
        });

        var linechart = document.getElementById('line-chart');
        var chart = new Chart(linechart, {
          type: 'line',
          data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun","Jul","Aug","Sep"],
            datasets: [{
              label: 'Data Penjualan',
              data: [12, 19, 3, 5, 2, 3,4,9,19],
              borderColor: 'rgba(255,99,132,1)',
              backgroundColor: 'transparent',
              borderWidth: 2
            }]
          }
        });
      </script>
    </body>
    </html>