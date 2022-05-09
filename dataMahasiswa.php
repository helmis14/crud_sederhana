<?php
require_once "mahasiswa.php";
$mhs = new Mahasiswa();
$table = "mahasiswa";
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
</head>

<body>
    <h1>Tabel Mahasiswa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row = $mhs->tampilData($table);
            foreach ($row as $data) {
            ?>
            <tr>
                <td><?=$data['npm'];?></td>
                <td><?=$data['nama'];?></td>
                <td><?=$data['kelas'];?></td>
                <td><?=$data['jurusan'];?></td>
                <td>
                    <a href="update.php?npm=<?=$data['npm'];?>">EDIT</a>
                    <a onclick="return confirm('Anda Yakin?');" href="?action=hapus&npm=<?=$data['npm'];?>">DELETE</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>

    <form method="POST" action="">
        <fieldset style="width:15%;">
            <legend>Data Mahasiswa</legend>
            <table>
                <tr>
                    <td>NPM</td>
                    <td>:</td>
                    <td><input type="text" name="npm"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kelas">
                            <option value="IF A 15">IF A 15</option>
                            <option value="IF B 15">IF B 15</option>
                            <option value="IF C 15">IF C 15</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>
                        <select name="jurusan">
                            <option value="Informatika">Informatika</option>
                            <option value="Sipil">Sipil</option>
                            <option value="Industri">Industri</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="reset" name="reset" value="RESET">
                        <input type="submit" name="submit" value="SUBMIT">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama']; 
    $kelas = $_POST['kelas']; 
    $jurusan = $_POST['jurusan']; 
    $data = array('npm' => $npm, 'nama' => $nama, 'kelas' => $kelas, 'jurusan' => $jurusan);
    $mhs->tambahData($table, $data);
    header("location:dataMahasiswa.php");
}

if (@$_GET['action'] == "hapus") {
    $where = ['npm' => $_GET['npm']];
    $mhs->hapusData($table, $where);
}