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
    $nama=$_POST["nama"]; /* This is where you start record the user input */
    $nrp=$_POST["nrp"];
    $alamat=$_POST["alamat"];
    $jurusan=$_POST["jurusan"];
    $fotomahasiswa=$_FILES["foto"];
    $namafoto=$_FILES['foto']['name'];
    $jenisfoto=$_FILES['foto']['type'];
    $tempfoto=$_FILES['foto']['tmp_name'];
    $target_dir="./Database"; /* This is the directory where you want to save photo from user input */
    if (is_uploaded_file($tempfoto)) {
        move_uploaded_file($tempfoto, $target_dir . $namafoto);
    }
    $conn=mysqli_connect ("localhost","root","") or die ("koneksi gagal"); /* Start to connect your PHP with your database */
    mysqli_select_db($conn, "percobaan6"); /* percobaan6 is the name of the database i use, this is where you connect your PHP with your database */
    echo "Nama Mahasiswa : $nama <br>";
    echo "NRP : $nrp <br>";
    $kodejurusan = 0;
    if ($jurusan == 'Telekomunikasi') {
        $kodejurusan = 111;
    }
    elseif ($jurusan == 'Elektronika') {
        $kodejurusan = 222;
    }
    elseif ($jurusan == 'Elektro Industri') {
        $kodejurusan = 333;
    }
    elseif ($jurusan == 'Informatika') {
        $kodejurusan = 444;
    }
    $inputdata = "insert into mahasiswa (NRP, Nama, Alamat, ID_Jur) values ('$nrp', '$nama', '$alamat', '$jurusan')"; /* MySQL syntax where you save your input into your database */
    $hasil=mysqli_query($conn, $inputdata); /* This command i used to sending data from user input into your database */
    if ($hasil) {
        echo "Your data has been saved";
    }
    else {
        mysqli_error($conn);
        echo "Error : " . $inputdata;
    }
    echo "Nama mahasiswa berhasil disimpan ! ! !"
    ?>
</body>
</html>