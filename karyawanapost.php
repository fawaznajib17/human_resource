<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Human Resource</title>
</head>

<body>
    <h1>ambil dipostman</h1>
    <div>
    </div>
</body>

</html>
<?php
$arr = json_decode(file_get_contents("php://input"));

if (empty($arr)) {
    exit("Data empty.");
} else {
    $con = mysqli_connect('db4free.net', 'fawaznajib', 'fawaznajib17', 'human_resource');
    $id_divisi = "";
    $id_jabatan = "";
    $nama_lengkap = "";
    $divisi = "";
    $jabatan = "";
    $alamat = "";
    $status = "";
    $jenis_kelamin = "";
    $no_rek = "";
    $noHP = "";
    $response = array();
    // if ($arr->kode_order != "" ) {
    //     $kode_order = $arr->kode_order;
    // }
    if ($con) {
        $sql = "SELECT * FROM divisi WHERE id_divisi  = {$arr->id_divisi} ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id_divisi = $row['id_divisi'];
                $id_namaDiv = $row['namaDiv'];
            }
            $s = "SELECT * FROM jabatan WHERE id_jabatan = {$arr->id_jabatan}";
            $rsl = mysqli_query($con, $s);
            if ($rsl) {
                while ($r = mysqli_fetch_assoc($rsl)) {
                    $id_jabatan = $r['id_jabatan'];
                    $jabatan = $r['namajabatan'];
                }
                $strquery = "INSERT INTO `karyawan` (`id_karyawan`, `id_divisi`,`id_jabatan`, `nama_lengkap`, 
                `divisi`,`jabatan`, `alamat`, `status`,`jenis_kelamin`,`no_rek`,`noHP`) 
                VALUES (NULL ,'{$arr->id_divisi}','{$id_jabatan}', '{$arr->nama_lengkap}', 
                '{$id_namaDiv}', '{$jabatan}', '{$arr->alamat}', '{$arr->status}', '{$arr->jenis_kelamin}', 
                '{$arr->no_rek}', '{$arr->noHP}')";

                $exc = mysqli_query($con, $strquery);
                if ($exc) {
                    $response = array('status' => 'Insert Berhasil');
                } else {
                    $response = array('status' => 'Insert Gagal');
                }
            }
        }
    } else {
        echo "Connection failed";
    }

    header("Content-Type: JSON");
    echo json_encode($response, JSON_PRETTY_PRINT);
}
