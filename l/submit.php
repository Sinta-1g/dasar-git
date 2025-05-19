<?php
//submit_absensi.php
$host='127.0.0.1';
$db='g';
$user='root';
$pass='';
$kon= new mysqli($host,$user,$pass,$db);       
if ($kon->connect_error) {
    die("Koneksi Gagal : " . $kon->connect_error);
}

$nisn=$_POST['nisn'];
$absen=$_POST['absen'];
$date=$_POST['Tanggal'];//tanggal saat ini

if($kon->query("INSERT INTO absensi(nisn, id_absen, tanggal_absensi)VALUES('$nisn',$absen,'$date');")){
    echo "Absensi Berhasil Disimpan";
}else{
    echo "Absensi Gagal Disimpan";
}
 $kon->close();
 ?>

