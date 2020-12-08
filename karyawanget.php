<?php
include "koneksi.php";

$id_divisi = $_GET["id_divisi"];
$nama_divisi = "";
$sql = "SELECT * FROM karyawan where id_divisi = {$id_divisi} ";

$query = mysqli_query($koneksi, $sql);
while ($db = mysqli_fetch_array($query)) {
    $nama_divisi = $db["divisi"];
    $item[] = array(
        "id_karyawan" => $db["id_karyawan"],
        "id_divisi" => $db["id_divisi"],
        "id_jabatan" => $db["id_jabatan"],
        "nama_lengkap" => $db["nama_lengkap"],
        "divisi" => $db["divisi"],
        "jabatan" => $db["jabatan"],
        "alamat" => $db["alamat"],
        "status" => $db["status"],
        "jenis_kelamin" => $db["jenis_kelamin"],
        "no_rek" => $db["no_rek"],
        "noHP" => $db["noHP"]

    );
}

$json = array(
    'Divisi' => $nama_divisi,
    'Data' => $item,

);

echo json_encode($json);
