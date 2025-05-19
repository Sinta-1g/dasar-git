<?php
include 'k.php';
$psg = isset($_GET['search']) ? $_GET['search'] : '';
$sql = $kon-> query("SELECT
    siswa.nisn AS NISN,
    siswa.nama_siswa AS Nama,
    SUM(CASE WHEN absensi.id_absen = 1 THEN 1 ELSE 0 END) AS Sakit,
    SUM(CASE WHEN absensi.id_absen = 2 THEN 1 ELSE 0 END) AS Izin,
    SUM(CASE WHEN absensi.id_absen = 3 THEN 1 ELSE 0 END) AS Alpha,
    SUM(CASE WHEN absensi.id_absen IN (1, 2, 3) THEN 1 ELSE 0 END) AS Jumlah  -- Total jumlah
FROM
  absensi
JOIN
    siswa ON absensi.nisn = siswa.nisn
WHERE 
    siswa.nisn  
    AND absensi.tanggal_absensi BETWEEN '2025-02-13' AND '2025-04-17'
GROUP BY 
    siswa.nisn, siswa.nama_siswa;
");
?>
<!DOCTYPE html>
<html lang=
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>o</title>

</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('R.jpg');
    margin: 0;
    padding: 20px;
}
h2 {
    color: rgb(22, 22, 15);
    text-align: center;
}
td{
    color: rgb(17, 16, 16);
    background-color: white;
    height: 20px;
}

td:hover{
    background-color:rgb(93, 129, 146);
    color: blue;
}
table{
width: 100%;
    border-color: rgb(22, 43, 75);
    border-collapse: collapse;
}
th{
    background-color: rgb(82, 103, 143);
    height: 30px;
}
.a{
    text-align: center;
}
a{
color: black;
}
a:hover{
    color: blue;
}
</style>
<body>
        <h2>Rekap Absensi Siswa</h2>
       
    <form method="GET" action="isg.php">
        <input type="text" name="search" placeholder="Cari Nama Siswa">
        <button type="submit">Cari</button>
    </form>
<br>
    <table border="1">
        <thead>
            <th>NISN</th>
            <th>NAMA</th>
            <th>SAKIT</th>
            <th>IZIN</th>
            <th>ALPHA</th>
            <th>JUMLAH</th>
        </thead>
        <tbody>
            <?php while ($siswa = $sql->fetch_assoc()) { ?>
                <tr style="text-align: center;">
                    <td><?php echo $siswa['NISN']; ?></td>
                    <td><?php echo $siswa['Nama']; ?></td>
                    <td><?php echo $siswa['Sakit']; ?></td>
                    <td><?php echo $siswa['Izin']; ?></td>
                    <td><?php echo $siswa['Alpha']; ?></td>
                    <td><?php echo $siswa['Jumlah']; ?></td>
                </tr>
                    <?php } ?>

        </tbody>
    </table>
</body>
</html>
