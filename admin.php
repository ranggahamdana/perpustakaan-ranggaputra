<?php   
    session_start();
    if  ($_SESSION['jabatan']=="user");
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <style>
        table{
            max-width: 100%;
            font-size : 14px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1 align="center">Selamat Datang Di Perpustakaan SMK Taruna Bangsa</h1>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/ranggaputra/admin.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=anggota">Anggota</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=buku">Petugas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form> 
                        <form action="">
                        <a href="?page=logout"><button class="btn btn-danger">Logout</button></a>
                        </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <?php
                if(isset($_GET['page'])){
                    if ($_GET['page']=="anggota") {
                        include('anggota.php');
                    }elseif($_GET['page']=="buku"){
                        include('buku.php');
                    }elseif($_GET['page']=="tambahanggota"){
                        include('tambahanggota.php');
                    }elseif($_GET['page']=="deleteanggota"){
                        include('deleteanggota.php');
                    }elseif($_GET['page']=="anggota-edit"){
                        include('anggota-edit.php');
                    }elseif($_GET['page']=="logout"){
                        include('logout.php');
                }else{
                    echo "Selamat Datang Administrator";
                }
                ?>
            </div>
            
        </div>
    </div>
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
}
else
{
    ?>
    <script>
        windows.location.href="login.php";
    </script>
    <?php
}
?>