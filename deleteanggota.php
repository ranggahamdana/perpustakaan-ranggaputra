<?php
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek, "DELETE FROM anggota where id = '$id' ");

    if($query_delete){
        ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
        <?php
        header('location:http://localhost/ranggaputra/admin.php?page=anggota');
    }
}
 ?>
 