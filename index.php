<?php
$data = file_get_contents("data.json");

header('Content-Type: application/json; charset=utf-8');


if (isset($_GET['nama']) || isset($_GET['nim'])) {
  if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
  } else if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
  }

  $data = json_decode($data);

  $res = null;
  for ($i = 0; $i < count($data); $i++) {
    if (isset($_GET['nama'])) {
      if (strtolower($data[$i]->nama) == strtolower($nama)) {
        $res = $i;
        break;
      }
    } else if (isset($_GET['nim'])) {

      if ($data[$i]->NIM == $nim) {
        $res = $i;
        break;
      }
    }
  }

  if ($res != null) {
    $data[$res]->status = "200 OK";
    print_r(json_encode($data[$res]));
  } else {
    $data = json_encode(array('status' => '404 Error', 'detail' => 'Data Tidak Ditemukan!'));

    print_r($data);
  }
} else {
  print_r($data);
}
