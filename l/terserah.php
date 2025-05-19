<?php
include "k.php";
$query = $kon->query(
    
    "SELECT
 siswa.nisn AS
 NISN,
 siswa.nama_siswa AS 
Nama,
 COUNT(absensi.id_absen) AS jumlah,
 tipe_absen.nama_absen AS STATUS
 FROM absensi
 JOIN siswa ON 
 absensi.nisn = siswa.nisn
 JOIN tipe_absen ON
 absensi.id_absen = tipe_absen .id_absen
 WHERE siswa.nisn = '2302060031' 
 AND absensi.tanggal_absensi BETWEEN '2025-02-13' AND '2025-04-17' AND
 tipe_absen.id_absen = 2 GROUP BY siswa.nisn, tipe_absen.nama_absen;"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=" 1">
    <thead>
        <tr>
            <td>Nisn</td>
            <td>Nama</td>
            <td>jumlah</td>
            <td>status</td>
        </tr> 

    </thead>
    <tbody>
        <?php while($r=$query->fetch_assoc()){ ?>
            <tr style="text-align: center;">
                <td><?php echo $r['NISN']; ?></td>
                <td> <?php echo $r['Nama']; ?></td>
                <td> <?php echo $r['jumlah']; ?></td>
                <td> <?php echo $r['STATUS']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
    </table>
</body>
</html>