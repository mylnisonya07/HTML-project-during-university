<?php 
function buatChart($id, $label, $data, $type, $bgCol='#AAAAAA', $brCol='', $brWid=0 ){
    echo"
      <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.js'></script>
    ";
    echo <<<TEXT
      <script>
        const ct = document.getElementById('$id').getContext('2d');
        const chartMonth = new Chart(ct, {
          type: '$type',
          data:  {
            labels: [$label],
            datasets: [{
              label: 'Nama Produk',
              data: [$data],
              backgroundColor:'$bgCol',
              borderColor:'$brCol',
              borderWidth: $brWid
              
            }]
          },
          options: {
            plugins: {
              legend: {
                display: true
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    TEXT;
  }
?>