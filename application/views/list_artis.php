<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center mt-3 mb-3">List Data Artis</h3>
			<a class="btn btn-primary float-left mb-3" href="<?= base_url();?>artis/tambah">
			  Tambah Data
			</a>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nama</th>
			      <th scope="col">Tempat Lahir</th>
			      <th scope="col">TTL</th>
			      <th scope="col">Foto</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Kecamatan</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
				<?php foreach ($artis as $value) : ?>
				    <tr>
				      <td><?php echo $value['nama']; ?></td>
				      <td><?php echo $value['tempat_lahir']; ?></td>
				      <td><?php echo $value['tanggal_lahir']; ?></td>
				      <td><img src="<?=base_url()?>assets/images/<?=$value['foto']?>" style="width:100px" ></td>
				      <td><?php echo $value['alamat_tinggal']; ?></td>
				      <td><?php echo $value['id_kecamatan']; ?></td>
				      <td>Aksi</td>
				    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>		
		</div>
	</div>
</div>