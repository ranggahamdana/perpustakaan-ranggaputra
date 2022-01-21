<?php
include('koneksi.php');
if (isset($_GET['save-edit'])) {
    $id             = $_GET['id'];
    $nis           = $_GET['nis'];
    $nama           = $_GET['nama'];
    $kelas          = $_GET['kelas'];
    $jurusan        = $_GET['jurusan'];
    $tgl_lahir      = $_GET['tgl_lahir'];
    $tlp            = $_GET['tlp'];
    $alamat         = $_GET['alamat'];
    $jk         = $_GET['gender'];

    $query_update = mysqli_query($konek,"UPDATE anggota 
    SET nis             = '$nis',
        nama            = '$nama',     
        kelas           = '$kelas',    
        jurusan         = '$jurusan',  
        tgl_lahir       = '$tgl_lahir',       
        tlp             = '$tlp',     
        alamat          = '$alamat',
        gender          = '$jk'
    WHERE id = '$id'");

    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diupdate')
            window.location.href='http://localhost/ranggaputra/admin.php?page=anggota';
        </script>
        <?php
    }
}



if (isset($_GET['edit'])) 
{
    $id = $_GET['id'];
    $query= mysqli_query($konek,"SELECT * FROM anggota WHERE id = '$id'");

    foreach ($query as $row) 
    {
        ?>
        <div class="container">
            <center><h3>Edit Data Anggota</h3></center>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form action="anggota-edit.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <div class="form-group">
                            <input class="form-control" type="text" name="nis" value="<?php echo $row['nis'];?>" placeholder="Nomor Induk Siswa" required>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" name="nama" value="<?php echo $row['nama'];?>" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="kelas" required>
                                <option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="jurusan" required>
                                <option value="<?php echo $row['jurusan'];?>"><?php echo $row['jurusan'];?></option>
                                <option value="RPL">Rekayasa Perangkat Lunak</option>
                                <option value="TAV">Teknik Audio Video</option>
                                <option value="TKR">Teknik Kendaraan Ringan</option>
                                <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir'];?>">
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="gender">
                                <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" name="tlp" value="<?php echo $row['tlp'];?>" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group mt-2">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap">
                            <?php echo $row['alamat'];?>
                            </textarea>
                        </div>
                        <div class="form-group mt-2">
                            <center>
                                <button name="save-edit" class="btn btn-primary mb-3" type="submit">
                                    Save Edit
                                </button>
                            </center>
                        </div>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <?php
    }
}
?>