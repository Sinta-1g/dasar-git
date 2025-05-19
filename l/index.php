<?php
include 'k.php';
$psg = isset($_GET['search']) ? $_GET['search'] : '';
$sql = $kon-> query("SELECT * FROM siswa WHERE nama_siswa LIKE '%$psg%'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('R.jpg');
    margin: 0;
    padding: 20px;
}
h2 {
    color: rgb(255, 255, 255);
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
        <h2>Absensi Siswa</h2>
       
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Cari Nama Siswa">
        <button type="submit">Cari</button>
    </form>
<br>
    <table border="1">
        <thead>
            <th>NISN</th>
            <th>NAMA</th>
            <th>AKSI</th>
        </thead>
        <tbody>
            <?php while ($siswa = $sql->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $siswa['nisn']; ?></td>
                    <td><?php echo $siswa['nama_siswa']; ?></td>
                    <td class="a"><a href="process_siswa.php?nisn=<?php echo $siswa['nisn']; ?>">proses</a></td>
                </tr>
                    <?php } ?>

        </tbody>
    </table>
</body>
</html>
