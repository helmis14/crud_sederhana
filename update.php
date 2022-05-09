<?php
require_once "Mahasiswa.php";
$mhs = new Mahasiswa();
$table = "mahasiswa";
$npm = $_GET['npm'];
$where = ['npm' => $npm];
$row = $mhs->tampilData($table, $where);
?>
<!DOCTYPE html>
<html>
<head>
    <title>UPDATE MAHASISWA</title>
</head>
<body>
    <h1> Update Data Mahasiswa </h1>
    <form method="POST" action="">
        <table>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><input type="text" name="npm" value="<?=$row[0]['npm'];?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?=$row[0]['nama'];?>"></td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td>
                <select name="kelas">
                <option value="<?=$row[0]['kelas'];?>"><?=$row[0]['kelas'];?></option>
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
                        <option value="<?=$row[0]['jurusan'];?>"><?=$row[0]['jurusan'];?></option>
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
                    <input type="submit" name="back" value="BACK">
                    <input type="submit" name="submit" value="SUBMIT">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if (isset($_POST['back'])) {
        header("location:dataMahasiswa.php");
    }
    if (isset($_POST['submit'])) {
        $data = array('npm' => $_POST['npm'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'], 'jurusan' => $_POST['jurusan']);
        $mhs->editData($table, $data, $where);
    }