<!DOCTYPE html>
<html>
<head>
    <title>Online Pre-Test Intership - Web Developer</title>
    <!-- Load file CSS Bootstrap melalui CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Load file library jQuery melalui CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
     <h4>Online Pre-Test Intership - Web Developer</h4>
     <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url();?>home/daftar_kirim">

            <div class="form-group">
                <label for="sel1">Nama:</label>
                <input type="text" name="nama" class="form-control" required="required" placeholder="Nama Lengkap">
            </div>
            <div class="form-group ">
                <label for="sel1">Tempat Lahir:</label>
                <input type="text" name="tmpt_lahir" class="form-control" required="required" placeholder="Tempat Lahir">
            </div>
            <div class="form-group ">
                <label for="sel1">Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir" class="form-control" required="required" placeholder="Tanggal Lahir">
            </div>
            <div class="form-group ">
                <label for="sel1">Umur:</label>
                <input type="number" name="umur" class="form-control" required="required" placeholder="Umur">
            </div>
            <div class="form-group ">
                <label for="sel1">Foto:</label>
                <input type="file" name="foto" class="form-control" required="required">
            </div>
            <div class="form-group ">
                <label for="sel1">Alamat:</label>
                <textarea name="alamat" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
                <label for="sel1">Provinsi:</label>
                <select class="form-control" name="provinsi" id="provinsi">
                	<option value=''selected>Pilih Provinsi</option>
                    <?php
                    foreach ($hasil as $value) {
                        echo "<option value='$value->id_provinsi'>$value->nama_provinsi</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Kabupaten:</label>
                <select class="form-control" name="kabkota" id="kabkota">
                    <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                </select>
            </div>
            <div class="form-group">
                <label for="sel1">Kecamatan:</label>
                <select class="form-control" name="kecamatan" id="kecamatan">
                    <!-- Tipe motor akan diload menggunakan ajax, dan ditampilkan disini -->
                </select>
            </div>

            <div  class="form-group" >
                <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">Tambah Data</button></p>
            </div>  
        </form>

    <script>

        $("#provinsi").change(function(){

            // variabel dari nilai combo box provinsi
            var id_provinsi = $("#provinsi").val();
            
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?php echo base_url();?>/artis/get_kabkota",
                method : "POST",
                data : {id_provinsi:id_provinsi},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = "<option value=''>Pilih Kabupaten</option>";
                    var i;
					
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kabkota+'>'+data[i].nama_kabkota+'</option>';
                    }
                    $('#kabkota').html(html);

                }
            });
        });

        $("#kabkota").change(function(){

            // variabel dari nilai combo box provinsi
            var id_kabkota = $("#kabkota").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                url : "<?php echo base_url();?>/artis/get_kecamatan",
                method : "POST",
                data : {id_kabkota:id_kabkota},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = "<option value=''>Pilih Kecamatan</option>";
                    var i;

                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_kecamatan+'>'+data[i].nama_kecamatan+'</option>';
                    }
                    $('#kecamatan').html(html);

                }
            });
        });
    </script>

</div>
</body>
</html>