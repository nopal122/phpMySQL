<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn=mysqli_connect ("localhost","root","") or die ("koneksi gagal"); /* Start to connect your PHP with your database */
    mysqli_select_db($conn, "percobaan6");
    $nrpmahasiswa = $_GET["nrp"]; /* Input will be saved in $nrpmahasiswa */
    $penghapusan = mysqli_query($conn, "DELETE FROM mahasiswa WHERE NRP='$nrpmahasiswa'"); /* Syntax for deleting data in database */
    echo "Data berhasil dihapus ! ! !";
    ?>
</body>
</html>