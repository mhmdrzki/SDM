
<div class="container">
    <div class="row">
        <div class="card col-md-6 offset-3 mt-3">
            <div class="card-header">
                <h4 class="mt-3">Tambah Data Artis</h4>
            </div>
            <div class="card-body">
                    <?php echo form_open_multipart('artis/tambah');?>

                        <div class="form-group">
                            <label for="sel1">Nama:</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group ">
                            <label for="sel1">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                        </div>
                        <div class="form-group ">
                            <label for="sel1">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                        </div>
                       <!--  <div class="form-group ">
                            <label for="sel1">Umur:</label>
                            <input type="number" name="umur" class="form-control" placeholder="Umur">
                        </div> -->
                        <div class="form-group ">
                            <label for="sel1">Foto:</label>
                            <input type="file" name="userfile" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="sel1">Alamat:</label>
                            <textarea name="alamat" class="form-control"></textarea>
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
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Kecamatan:</label>
                            <select class="form-control" name="kecamatan" id="kecamatan">
                            </select>
                        </div>

                        <div  class="form-group" >
                            <p class="animate6 bounceIn"><button type="submit" value="upload" class="btn btn-success btn-block">Tambah Data</button></p>
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
        </div>
    </div>
</div>
