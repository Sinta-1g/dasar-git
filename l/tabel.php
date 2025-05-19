<?php
include "k.php";
$query = $kon->query(
    "SELECT absensi.nisn, absensi.id_absen, siswa.nama_siswa, tipe_absen.nama_absen
FROM absensi JOIN siswa ON absensi.nisn = siswa.nisn JOIN tipe_absen ON absensi.id_absen = tipe_absen.id_absen
WHERE tanggal_absensi=curdate();"
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
            <td>Nama siswa</td>
            <td>Keterangan</td>
        </tr> 

    </thead>
    <tbody>
        <?php while($r=$query->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $r['nisn']; ?></td>
                <td> <?php echo $r['nama_siswa']; ?></td>
                <td> <?php echo $r['nama_absen']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
    </table>
</body>
</html>