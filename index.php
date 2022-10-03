<?php
// ambil data json
$data = file_get_contents("data.json");

// Ubah tipe konten ke json
header('Content-Type: application/json; charset=utf-8');

// Cek jika ada parameter GET dari nama atau nim
if (isset($_GET['nama']) || isset($_GET['nim'])) {
  // Cek jika ada parameter nama, jika tidak cek parameter nim
  if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
  } else if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
  }

  // Ubah data json menjadi array
  $data = json_decode($data);

  // Melakukan perulangan untuk mendapat index dari data yang dicari
  $res = null;
  for ($i = 0; $i < count($data); $i++) {
    if (isset($_GET['nama'])) {
      if (strtolower($data[$i]->nama) == strtolower($nama)) {
        $res = $i;
        break;
      }
    } else if (isset($_GET['nim'])) {
      // Jika data ditemukan, keluar dari looping
      if ($data[$i]->nim == $nim) {
        $res = $i;
        break;
      }
    }
  }

  // jika res tidak null atau data ditemukan
  // tampilkan data dari objek dengan bentuk json ke layar
  if ($res != null) {
    $data[$res]->status = "200 OK";
    print_r(json_encode($data[$res]));
  } else {
    // jika data yang dicari tidak ada tampilkan error
    $data = json_encode(array('status' => '404 Error', 'detail' => 'Data Tidak Ditemukan!'));

    print_r($data);
  }
} else {
  // jika tidak ada parameter, tampilkan semua data
  print_r($data);
}
