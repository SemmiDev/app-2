<?php

namespace App\FakultasProses;

use Modules\Fakultas\Entity\FakultasEntity;

require_once './App.php';

$act = $_GET['act'];

if ($act == 'delete') {
    $id = $_GET['id'];
    try {
        $fakultasService->delete($id);
        $msg = "Fakultas berhasil dihapus";
        setcookie('success', $msg, time() + 5);
        header('Location: Fakultas.php');
    } catch (\Exception $exception) {
        $msg = "Gagal menghapus data $exception";
        setcookie('error', $msg, time() + 5);
        header('Location: Fakultas.php');
    }
}

if ($act == 'create') {
    $nama = $_POST['fakultas'];
    $dekan = $_POST['dekan'];
    $wakil1 = $_POST['wakil_dekan_1'];
    $wakil2 = $_POST['wakil_dekan_2'];
    $wakil3 = $_POST['wakil_dekan_3'];

    try {
        $req = new FakultasEntity();
        $req->nama = $nama;
        $req->idDekan = $dekan;
        $req->idWakilDekan1 = $wakil1;
        $req->idWakilDekan2 = $wakil2;
        $req->idWakilDekan3 = $wakil3;

        $fakultasService->create($req);
        $msg = "Fakultas berhasil ditambahkan";
        setcookie('success', $msg, time() + 5);
        header('Location: Fakultas.php');
    } catch (\Exception $exception) {
        $msg = "Gagal menambahkan data $exception";
        setcookie('error', $msg, time() + 5);
        header('Location: Fakultas.php');
    }
}

if ($act == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['fakultas'];
    $dekan = $_POST['dekan'];
    $wakil1 = $_POST['wakil_dekan_1'];
    $wakil2 = $_POST['wakil_dekan_2'];
    $wakil3 = $_POST['wakil_dekan_3'];

    try {
        $req = new FakultasEntity();
        $req->id = $id;
        $req->nama = $nama;
        $req->idDekan = $dekan;
        $req->idWakilDekan1 = $wakil1;
        $req->idWakilDekan2 = $wakil2;
        $req->idWakilDekan3 = $wakil3;

        $fakultasService->update($req);
        $msg = "Fakultas berhasil di update";
        setcookie('success', $msg, time() + 5);
        header('Location: Fakultas.php');
    } catch (\Exception $exception) {
        $msg = "Gagal update data $exception";
        setcookie('error', $msg, time() + 5);
        header('Location: Fakultas.php');
    }
}
