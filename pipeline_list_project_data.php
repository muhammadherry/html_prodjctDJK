<div class="portlet light bordered">
	<?php
		$koneksi = mysqli_connect("localhost","root","","crudlah") or die(mysqli_error());						
		function tambah($koneksi){    
			if (isset($_POST['btn_simpan'])){
			$id = time();
			$nama_lengkap = $_POST['nama_lengkap'];
			$alamat_asal = $_POST['alamat_asal'];
			$tujuan = $_POST['tujuan'];
			
			
			if(!empty($nama_lengkap) && !empty($alamat_asal) && !empty($tujuan)){
				$sql = "INSERT INTO tbl_tamu (id,nama_lengkap, alamat_asal, tujuan) VALUES(".$id.",'".$nama_lengkap."','".$alamat_asal."'
				,'".$tujuan."')";
				$simpan = mysqli_query($koneksi, $sql);
				if($simpan && isset($_GET['aksi'])){
					if($_GET['aksi'] == 'create'){
						header('location: pipeline_list_project.php');
					}
				}
			} else {
				$pesan = "Tidak dapat menyimpan, data belum lengkap!";
			}
		}
		?> 
				<form action="" method="POST">
					<fieldset>
						<legend><h2>Tambah data</h2></legend>
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="nama_lengkap" class="form-control" id="siteid" placeholder="Nama Lengkap">
								</div>
							</div>
						</div>
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Alamat Asal</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="alamat_asal" class="form-control"placeholder="Alamat Asal">
								</div>
							</div>
						</div>
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Tujuan</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="tujuan" class="form-control"placeholder="Tujuan">
								</div>
							</div>
						</div>
						
						<label>
							<input type="submit" name="btn_simpan" value="Simpan"/>
							<input type="reset" name="reset" value="Besihkan"/>
						</label>
						<br>
						<p><?php echo isset($pesan) ? $pesan : "" ?></p>
					</fieldset>
				</form>
			<?php
		}
		// --- Tutup Fngsi tambah data
		// --- Fungsi Baca Data (Read)
		function tampil_data($koneksi){
			$sql = "SELECT * FROM tbl_tamu";
			$query = mysqli_query($koneksi, $sql);
			
			echo "<fieldset>";
			
			echo "<table class=table table-hover>";
			echo "
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Status</th>
						<th>In Active Date</th>
						<th>Tindakan</th>
					 </tr>";
				
			while($data = mysqli_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['nama_lengkap']; ?></td>
						<td><?php echo $data['alamat_asal']; ?> Kg</td>
						<td><?php echo $data['tujuan']; ?> bulan</td>
						<td>
							<a href="pipeline_list_project.php?aksi=update&id=<?php echo $data['id']; 
								?>&nama=<?php echo $data['nama_lengkap']; 
								?>&alamat_asal=<?php echo $data['alamat_asal']; 
								?>&tujuan=<?php echo $data['tujuan']; 
								?>">Ubah</a> |
							<a href="pipeline_list_project.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
						</td>
					</tr>
				<?php
			}
			echo "</table>";
			echo "</fieldset>";
		}
		// --- Tutup Fungsi Baca Data (Read)
		// --- Fungsi Ubah Data (Update)
		function ubah($koneksi){
			// ubah data
			if(isset($_POST['btn_ubah'])){
				$id = $_POST['id'];
				$nama_lengkap = $_POST['nama_lengkap'];
				$alamat_asal = $_POST['alamat_asal'];
				$tujuan = $_POST['tujuan'];
				
				if(!empty($nama_lengkap) && !empty($alamat_asal) && !empty($tujuan) ){
					$perubahan = "nama_lengkap='".$nama_lengkap."',alamat_asal=".$alamat_asal.",tujuan=".$tujuan."";
					$sql_update = "UPDATE tbl_tamu SET ".$perubahan." WHERE id=$id";
					$update = mysqli_query($koneksi, $sql_update);
					if($update && isset($_GET['aksi'])){
						if($_GET['aksi'] == 'update'){
							header('location: pipeline_list_project.php');
						}
					}
				} else {
					$pesan = "Data tidak lengkap!";
				}
			}
			
			// tampilkan form ubah
			if(isset($_GET['id'])){
				?>
					<a href="pipeline_list_project.php"> &laquo; Home</a> | 
					<a href="pipeline_list_project.php?aksi=create"> (+) Tambah Data</a>
					<hr>
					
					<form action="" method="POST">
					<fieldset>
						<legend><h2>Ubah Data</h2></legend>
						<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
						
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?php echo $_GET['nama_lengkap'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Alamat Asal</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="alamat_asal" class="form-control" placeholder="Alamat Asal"value="<?php echo $_GET['alamat_asal'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">Tujuan</label>
							<div class="col-sm-2">
								<div class="form-group">
									<input type="text" name="tujuan" class="form-control" placeholder="Alamat Asal"value="<?php echo $_GET['tujuan'] ?>">
								</div>
							</div>
						</div>
																		
						
						<br>
						<label>
							<input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="pipeline_list_project.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>!
						</label>
						<br>
						<p><?php echo isset($pesan) ? $pesan : "" ?></p>
						
					</fieldset>
					</form>
				<?php
			}
			
		}
		// --- Tutup Fungsi Update
		// --- Fungsi Delete
		function hapus($koneksi){
			if(isset($_GET['id']) && isset($_GET['aksi'])){
				$id = $_GET['id'];
				$sql_hapus = "DELETE FROM tbl_tamu WHERE id=" . $id;
				$hapus = mysqli_query($koneksi, $sql_hapus);
				
				if($hapus){
					if($_GET['aksi'] == 'delete'){
						header('location: pipeline_list_project.php');
					}
				}
			}
			
		}
		// --- Tutup Fungsi Hapus
		// ===================================================================
		// --- Program Utama
		if (isset($_GET['aksi'])){
			switch($_GET['aksi']){
				case "create":
					echo '<a href="pipeline_list_project.php"> &laquo; Home</a>';
					tambah($koneksi);
					break;
				case "read":
					tampil_data($koneksi);
					break;
				case "update":
					ubah($koneksi);
					tampil_data($koneksi);
					break;
				case "delete":
					hapus($koneksi);
					break;
				default:
					echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
					tambah($koneksi);
					tampil_data($koneksi);
			}
		} else {
			tambah($koneksi);
			tampil_data($koneksi);
		}
	?>											
</div>