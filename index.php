<?php
$mysqli_db = new mysqli('ap-cdbr-azure-east-c.cloudapp.net', 'ba0bdd406a8601','e1ee282f' , 'acsm_cb9f0a3d1dfdee6');

$result_tb = "";
//..
if (!empty($_POST['SEARCH']) && !empty($_POST['search_value'])) {
//..
    $e = $_POST['search_value'];

   $query = 'SELECT * FROM laporkan WHERE ' .
             "nomor LIKE '%$e%' ";

   $query_result = $mysqli_db->query($query);

   $result_tb = '<br><br><h1 class="sec02">Tergolong Penipuan</h1> <br><br><table id="mytable" class="table table-bordered">';
   while ($rows = $query_result->fetch_assoc()) {
      foreach ($rows as $k => $v) {
         $result_tb .= '<tr><td>' . $k . '</td><td>' . $v . '</td></tr>';
      }
   }
   $result_tb .='</table>';
}else if (!empty($_POST['SEARCH'])){
    
    echo "data tidak ada";
   $mysqli_db->close();
}
    
?>


<html >
    <head>
        <meta charset="UTF-8">
    <title>Telusuri!    |   Know The Number of Fraud</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="css/reset.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <link href='http://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
        <header class="main_h">
            <div class="row">
                    <a class="logo" href="index.html">Telusuri!</a>
                <div class="mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                        <nav>
                            <ul>
                                <li><a href=".sec01">Introduction</a></li>
                                <li><a href=".sec02">Cari!</a></li>
                                <li><a href="#" data-target="#ModalAdd" data-toggle="modal">Laporkan</a></li>
                                <li><a href="http://feriekofattoni.azurewebsites.net/">Kontak</a></li>
                            </ul>
                        </nav>
            </div> <!-- / row -->
        </header>
            <div class="hero">

                    <h1><span>know the number of fraud</span><br><img src ="images/logo.png"</h1>

                <div class="mouse">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                        <p></p>
                        <p></p>   
                </div>
            </div>

            <div class="row content">
                    <h1 class="sec01">Introduction</h1>
                        <br>
                            <p>Indonesia adalah salah satu negara yang tidak luput dari perkembangan teknologi. Pengaruh arus globalisasi dan perdagangan bebas yang didukung oleh kemajuan teknologi telekomunikasi dan informatika telah memperluas ruang gerak arus transaksi barang yang masuk ke Indonesia, baik secara legal maupun yang ilegal. Di sisi lain dari kondisi dan fenomena yang sering terjadi dimasyarakat akibat majunya perindustrian, pembangunan dan perkembangan teknologi telekomunikasi dan informatika adalah bentuk penipuan lewat media komunikasi dalam hal ini adalah lewat media SMS (<i>Short massege service</i>) yang sering terjadi dan dialami di masyarakat belakangan ini. Untuk mempermudah dalam hal pelacakan maka dikembangkanlah web application bernama "Telusuri!". Web application ini masih dalam tahap pengembangan sehingga masih memiliki banyak kelemahan. Dalam penggunaan website ini cukup mudah anda dipersilahkan untuk memasukan nomor handphone yang mencurigakan dalam hal penipuan lalu website ini akan mencari nomor tersebut apakah memiliki kesamaan dengan yang sudah dilaporkan sebelumnya. Apabila tidak ditemukan nomor tersebut dan anda masih yakin bahwa hal tersebut penipuan segera klik menu "Laporkan" untuk kami masukan ke dalam database kami agar masyarakat mengetahui bahwa nomor tersebut adalah penipuan.</p><br><br>
                        <br><h1 class="sec02">Cari</h1>
                        <br>
                            <p> Masukan nomor telepon yang membuat anda curiga, apabila tidak ditemukan tolong Laporkan kepada kami agar dapat disebarkan ke masyarakat luas bahwa nomor tersebut sangat mencurigakan. Untuk melaporkan kepada kami cukup mudah yaitu dengan mengklik tombol menu "Laporkan" yang berada diatas. Lalu isikan data-data anda dengan lengkap. Proses selanjutnya yaitu submit. Maka data anda akan tersimpan dalam database kami.
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                           
                                                    <input type="text" name="search_value"width= 50px class="form-control" placeholder="Masukan nomor...">
                                                        <span class="input-group-btn" name="SEARCH" value="Search">
                                                    <button class="btn btn-default" type="submit" name="SEARCH" value="Search">Search!</button>
                                                        </span>
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                    </div>
                                </form>
                                <?php echo $result_tb; ?>
                                    
                            </p>
                </div>




<!-- Laporkan untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Isi form dibawah ini untuk Laporkan!</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Pelapor">Nama Pelapor</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama Pelapor" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nomor Induk Kependudukan">Nomor Induk Kependudukan</label>
                  <input type="text" name="nik"  class="form-control" placeholder="Nomor Induk Kependudukan" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nomor Telepon">Nomor Telepon</label>
                  <input type="text" name="nomor"  class="form-control" placeholder="Nomor Telepon" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="isi">Isi Pesan SMS</label>
                   <textarea name="isi"  class="form-control" placeholder="Isi Pesan SMS" required/></textarea>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Laporkan
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>
        </div>
     </div>
</div>
</div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    
    </body>
</html>
