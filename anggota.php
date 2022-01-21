<?php
   
    //Insert Data
    if (isset($_POST['save'])){
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tlp = $_POST['tlp'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['gender'];

        //query untuk menginputkan data ke database berdasarkan variable diatas
        $query_insert = mysqli_query($konek, "INSERT INTO anggota
        VALUES('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$tlp','$alamat','$jk')");

        if ($query_insert) {
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            DATA ANGGOTA BARU BERHASIL DISIMPAN !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }else {
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            DATA GAGAL DISIMPAN !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
    }
    //AKHIR INSERT DATA
?>


<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahanggota">
   Tambah Data
</button>
<br><br>
<table style="font-size:12px" class="table table-dark table-striped">
    <tr align="center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tanggal Lahir</th>
        <th>No Telp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr align ="center">
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle">
        <?php 
                if ($row['jurusan'] == "RPL") {
                    echo "Rekayasa Perangkat Lunak";
                }
                elseif  ($row['jurusan'] == "TAV") {
                    echo "Teknik Audio Video";
                }
                elseif  ($row['jurusan'] == "TITL") {
                    echo "Teknik Instalasi Tenaga Listrik";
                }
                else {
                    echo "Teknik Kendaraan Ringan";
                }
                $row['jurusan']; 
            ?>
        </td>
        <td valign="middle"><?php echo $row['tgl_lahir']; ?></td>
        <td valign="middle"><?php echo $row['tlp']; ?></td>
        <td valign="middle">
        <?php
          if (strlen($row['alamat'])>=50)
           {
               echo substr($row['alamat'],0,50)."...";
           }
           else{
              echo $row['alamat'];
           }
           
        ?>
        </td>
        <td align="center" valign="middle"><?php echo $row['gender']; ?></td>
        <td valign="middle">
            <a href="?page=deleteanggota&delete=&id=<?php echo $row['id']; ?>">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <a href="?page=anggota-edit&edit=&id=<?php echo $row['id']; ?>">
                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
            </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="tambahanggota" tabindex="-1" aria-labelledby="tambahanggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahanggotaLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa">
                </div><br>
                <div class="form-group">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap">
                </div><br>
                <div class="form-group">
                Kelas: <br><select name="kelas" id="kelas">
                    <option value="">--Pilih Kelas--</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                </div><br>
                <div class="form-group">
                Jurusan: <br><select name="jurusan">
                    <option value="">--Pilih Jurusan--</option>
                    <option value="TKR">Teknik Kendaraan Ringan</option>
                    <option value="TAV">Teknnik Audio Video</option>
                    <option value="TITL">Teknik Tenaga Listrik</option>
                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                </select>
                </div><br>
                <div class="form-group">
                Tanggal Lahir: <br><input type="date" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div><br>
                <div class="form-group">
                    <input class="form-control" type="text" name="tlp" placeholder="No Telpon">
                </div><br>
                <div class="form-group">
                   <textarea name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
                </div><br>
                <div class="form-group">
                Jenis Kelamin: <br><select name="gender">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-laki</option>
                    <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" name="save" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>