<?php
session_start();
//koneksi ke database
include '../../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Grafik Produk</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <!-- icon -->
    <link rel="icon" href="../../image_buyme/logo buyme.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/kategoridanproduk.css">

 <style>
 canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
 }
 </style>
</head>

<body>
   
<div class="all">
  		<div class="header">
  				<h2><b>Produk Terjual</b></h2>
  		</div>
  		<div class="image">
  			<img src="../../image_buyme/logo buyme.png" alt="" class="logo" style="width: 160px; height: 150px; position: absolute; left: 15px;">
  		</div>
  		<br>
  		<br>
    <div class="container container2">
      <div class="container-fluid" align="center" >
        <form method="post" enctype="multipart/form-data" >
          <table class="table" style="border-color: black;" >
          <h2 align="center">Grafik jumlah produk terjual</h2>
	<div style="width: 1000px;height: 500px; " >
		<canvas id="myChart" style="background-color: white;" ></canvas>
	</div>
    <?php
    //  <!-- function untuk warna bar -->
     function random_color()
     {return sprintf('#%06X', mt_rand(0, 0xAAAAAA));}
     $kon = mysqli_connect("localhost","root","","buyme");
     $nama_produk= "";
     $jumlah=null;

    $sql = "SELECT nama, SUM(jumlah) 'jml_stok_terjual' FROM pembelian_produk GROUP BY nama;";
    $hasil=mysqli_query($kon,$sql);
    while ($data = mysqli_fetch_array($hasil)) {
        //Mengambil nilai jurusan dari database
        $produk=$data['nama'];
        $nama_produk .= "' $produk'". ", ";
        //Mengambil nilai total dari database
        $jum=$data['jml_stok_terjual'];
        $jumlah .= "$jum". ", ";
    }

    
    ?>
    <table border="1" class="table table-hover " style="border: 5px solid #253D93; ">
		<thead>
			<tr align="center">
				<th>Nomor</th>
                <th>ID Produk</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
        <?php
        $kon = mysqli_connect("localhost","root","","buyme");
        $nama_produk= "";
        $jumlah=null;
        $nomor=1;
        $sql = "SELECT id_pembelian_produk, nama, SUM(jumlah) 'jml_stok_terjual' FROM pembelian_produk GROUP BY nama;";
        $hasil=mysqli_query($kon,$sql);
        while ($data = mysqli_fetch_array($hasil)) {
            //Mengambil nilai jurusan dari database
            $id=$data['id_pembelian_produk'];
            $ed= "' $id'". ", ";
            //Mengambil nilai jurusan dari database
            $produk=$data['nama'];
            $nama_produk .= "' $produk'". ", ";
            //Mengambil nilai total dari database
            $jum=$data['jml_stok_terjual'];
            $jumlah .= "$jum". ", ";
    ?>
    <tr align="center">
					<td><?php echo $nomor++; ?></td>
                    <td><?php echo $id; ?></td>
					<td><?php echo  $produk; ?></td>
					<td><?php echo $jum; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
	<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var color = Chart.helpers.color;
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo  $nama_produk; ?>],
            datasets: [ <?php $color = random_color(); ?>{
                label:'Nama Produk Terjual',
                data: [<?php echo $jumlah; ?>],
                backgroundColor: color('<?php echo $color;?>').alpha(0.5).rgbString(),
                borderColor: '<?php echo $color;?>',
                borderWidth: 2,
                hoverBorderWidth: 50
                // backgroundColor: 'rgba(103, 255, 255, 0.5)',
				// 	borderColor: 'rgba(0 , 0, 0, 0.35)',
				// 	borderWidth: 3,
                // backgroundColor: [
                //     'rgba(0, 99, 132, 0.6)',
                //     'rgba(30, 99, 132, 0.6)',
                //     'rgba(60, 99, 132, 0.6)',
                //     'rgba(90, 99, 132, 0.6)',
                //     'rgba(120, 99, 132, 0.6)',
                //     'rgba(150, 99, 132, 0.6)',
                //     'rgba(180, 99, 132, 0.6)',
                //     'rgba(210, 99, 132, 0.6)',
                //     'rgba(240, 99, 132, 0.6)'
                // ],
                // borderColor: [
                //     'rgba(0, 99, 132, 1)',
                //     'rgba(30, 99, 132, 1)',
                //     'rgba(60, 99, 132, 1)',
                //     'rgba(90, 99, 132, 1)',
                //     'rgba(120, 99, 132, 1)',
                //     'rgba(150, 99, 132, 1)',
                //     'rgba(180, 99, 132, 1)',
                //     'rgba(210, 99, 132, 1)',
                //     'rgba(240, 99, 132, 1)'
                // ],
                // borderWidth: 2,
                // hoverBorderWidth: 50
               
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
          </table>
       
        <br></br>
        <a href="produk.php" class="btn btn-primary" style="color: black; background-color: #F9D701; border: 4px solid #F9D701; border-radius: 0.6em;" ><b>Kembali</b></a>

      </div>
      <br>
      <br>
    </div>
  </div>
</body>
</html>