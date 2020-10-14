<!DOCTYPE html>
<html>
<head>
    <title>CRUD Petani Kode</title>
    <link rel="icon" href="http://www.petanikode.com/favicon.ico" />
</head>
<body>

<?php
// --- koneksi ke database
$koneksi = mysqli_connect("localhost","root","","crudlah") or die(mysqli_error());
// --- Fngsi tambah data (Create)
function tambah($koneksi){
    
    if (isset($_POST['btn_simpan'])){
        $id = time();
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat_asal = $_POST['alamat_asal'];
        $tujuan = $_POST['tujuan'];
        $no_ktp = $_POST['no_ktp'];
        
        if(!empty($nama_lengkap) && !empty($alamat_asal) && !empty($tujuan) && !empty($no_ktp)){
            $sql = "INSERT INTO tbl_tamu (id,nama_tanaman, alamat_asal, tujuan, tanggal_panen) VALUES(".$id.",'".$nama_lengkap."','".$alamat_asal."'
			,'".$tujuan."','".$no_ktp."')";
            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: coba.php');
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
                <label>Nama Lengkap <input type="text" name="nama_lengkap" /></label> <br>
                <label>Alamat Asal <input type="number" name="alamat_asal" /> kg</label><br>
                <label>Tujuan<input type="number" name="tujuan" /> bulan</label> <br>
                <label>No KTP<input type="date" name="tgl_panen" /></label> <br>
                <br>
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
    echo "<legend><h2>Data Panen</h2></legend>";
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Alamat Asal</th>
            <th>Tujuan</th>
            <th>No KTP</th>
            <th>Tindakan</th>
          </tr>";
    
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['alamat_asal']; ?> Kg</td>
                <td><?php echo $data['tujuan']; ?> bulan</td>
                <td><?php echo $data['no_ktp']; ?></td>
                <td>
                    <a href="coba.php?aksi=update&id=<?php echo $data['id']; 
						?>&nama=<?php echo $data['nama_lengkap']; 
						?>&hasil=<?php echo $data['alamat_asal']; 
						?>&lama=<?php echo $data['tujuan']; 
						?>&tanggal=<?php echo $data['no_ktp']; 
						?>">Ubah</a> |
                    <a href="coba.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
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
        $no_ktp = $_POST['no_ktp'];
        
        if(!empty($nama_lengkap) && !empty($alamat_asal) && !empty($tujuan) && !empty($no_ktp)){
            $perubahan = "nama_lengkap='".$nama_lengkap."',alamat_asal=".$alamat_asal.",tujuan=".$tujuan.",no_ktp='".$no_ktp."'";
            $sql_update = "UPDATE tbl_tamu SET ".$perubahan." WHERE id=$id";
            $update = mysqli_query($koneksi, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: coba.php');
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){
        ?>
            <a href="coba.php"> &laquo; Home</a> | 
            <a href="coba.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            
            <form action="" method="POST">
            <fieldset>
                <legend><h2>Ubah data</h2></legend>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                <label>Nama Lengkap<input type="text" name="nama_lengkap" value="<?php echo $_GET['nama_lengkap'] ?>"/></label> <br>
                <label>Alamat Asal<input type="number" name="alamat_asal" value="<?php echo $_GET['alamat_asal'] ?>"/> kg</label><br>
                <label>Tujuan<input type="number" name="tujuan" value="<?php echo $_GET['tujuan'] ?>"/> bulan</label> <br>
                <label>No KTP<input type="date" name="no_ktp" value="<?php echo $_GET['no_ktp'] ?>"/></label> <br>
                <br>
                <label>
                    <input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="coba.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>!
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
                header('location: coba.php');
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
            echo '<a href="coba.php"> &laquo; Home</a>';
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
</body>
</html>