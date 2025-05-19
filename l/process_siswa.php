<?php
// process_siswa.php
include 'k.php';
$nisn = $_GET['nisn'];
$resul=$kon->query("SELECT * FROM siswa WHERE nisn='$nisn'");
$student = $resul->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Absensi Siswa</title>
</head>
<body>
    <h2 style="text-align: center;"> Absensi untuk <?php echo $student['nama_siswa']; 
    ?></h2> <form method="post" action="submit.php">
        <label for="absen">Pilih Absensi:</label>
        <select id="absen" name="absen">
            <option value="1">Sakit</option>
            <option value="2">Izin</option>
            <option value="3">Alpha</option>
        </select> <br><br>
        Pilih Tanggal Absensi: <input type="date" name="Tanggal" id="">
        <br><br>
        <button type="submit">SELESAI!</button>
        <input type="hidden" name="nisn" value="<?php echo $student['nisn'] ?>">
        </form>
</body>
</html> 