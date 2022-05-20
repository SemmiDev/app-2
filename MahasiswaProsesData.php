<?php

namespace App\MahasiswaProses;

use Modules\Mahasiswa\Entity\MahasiswaEntity;

require_once './App.php';
require_once './scripts/generate.php';

$act = $_GET['act'];

function generateNIM($angkatan, $jurusanId, $jalurMasuk) {
    global $jurusanService;
    global $mahasiswaService;

    $angkatan = substr($angkatan, -2);
    $dataJurusan = $jurusanService->findById($jurusanId);
    $jurusan = $dataJurusan->kode < 10 ? '0' . $dataJurusan->kode : $dataJurusan->kode;
    switch ($jalurMasuk) {
        case "SBMPTN" :
            $jalurMasuk = "01";
            break;
        case "SNMPTN" :
            $jalurMasuk = "02";
            break;
        case "Mandiri" :
            $jalurMasuk = "03";
            break;
        case "PBUD" :
            $jalurMasuk = "04";
            break;
        default:
            $jalurMasuk = "01";
            break;
    }
    
    $allMhs = $mahasiswaService->findAll();
    $noMhs = $allMhs[count($allMhs) - 1]->id + 1;
    $noMhs = $noMhs < 1000 ? str_repeat('0', 4 - strlen($noMhs)) . $noMhs : $noMhs;

    return $angkatan . $jurusan . $jalurMasuk . $noMhs;
}

if ($act == 'csv') {
    $handle = fopen($_FILES['datamahasiswacsv']['tmp_name'], "r");
    $headers = fgetcsv($handle, 1000, ",");
    $result = [];
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $m = new MahasiswaEntity();
        $m->namaDepan = $data[0];
        $m->namaBelakang = $data[1];
        $m->jalurMasuk = $data[2];
        $m->angkatan = $data[3];
        $m->jenisKelamin = $data[4];
        $m->agama = $data[5];
        $m->jenjang = $data[6];
        $m->tanggalLahir = $data[7];
        $m->noHP = $data[8];
        $m->alamat = $data[9];
        $m->status = $data[10];
        $m->totalSKS = $data[11];
        $m->semester = $data[12];
        $m->idJurusan = $data[13];
        $m->idProdi = null;
        
        if ($data[14] == "" or is_null($data[14])) {
            $m->idDosenPA = null;
        }else {
            $m->idDosenPA = $data[14];
        }
        
        $m->nim = generateNIM($m->angkatan, $m->idJurusan, $m->jalurMasuk);
        $m->email = generateEmail($m->namaDepan, $m->namaBelakang, $m->nim, 'student');
        
        try {
            $mahasiswaService->create($m);
            $msg = "Mahasiswa berhasil ditambahkan";
            setcookie('success', $msg, time() + 5);
            header('Location: Mahasiswa.php');
        } catch (\Exception $exception) {
            if (strpos($exception->getMessage(), 'There is no active transaction') !== false) {
                setcookie('success', $msg, time() + 5);
                header('Location: Mahasiswa.php');
            } else {
                $msg = "Mahasiswa gagal ditambahkan $exception";
                setcookie('error', $msg, time() + 5);
                header('Location: Mahasiswa.php');
            }
        }
    }

    fclose($handle);
}

if ($act == 'create') {
    $namaDepan = $_POST['namaDepan'];
    $jalurMasuk = $_POST['jalur_masuk'];
    $angkatan = $_POST['angkatan'];
    $namaBelakang = $_POST['namaBelakang'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $agama = $_POST['agama'];
    $jenjang = $_POST['jenjang'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $noHP = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $totalSks = $_POST['totalSks'];
    $semester = $_POST['semester'];
    $jurusanId = $_POST['jurusan'];
    $dosenId = $_POST['dosen'];

    $req = new MahasiswaEntity();
    $req->nim = generateNIM($angkatan, $jurusanId, $jalurMasuk);
    $req->namaDepan = $namaDepan;
    $req->namaBelakang = $namaBelakang;
    $req->email = generateEmail($namaDepan, $namaBelakang, $req->nim, 'student');
    $req->jenisKelamin = $jenisKelamin;
    $req->agama = $agama;
    $req->jenjang = $jenjang;
    $req->tanggalLahir = $tanggalLahir;
    $req->noHP = $noHP;
    $req->alamat = $alamat;
    $req->status = $status;
    $req->totalSKS = $totalSks;
    $req->semester = $semester;
    $req->idJurusan = $jurusanId;
    $req->angkatan = $angkatan;
    $req->jalurMasuk = $jalurMasuk;
    $req->idProdi = null;
    
    if ($dosenId == "") {
        $req->idDosenPA = null;
    }else {
        $req->idDosenPA = $dosenId;
    }

    try {
        $mahasiswaService->create($req);
        $msg = "Mahasiswa berhasil ditambahkan";
        setcookie('success', $msg, time() + 5);
        header('Location: Mahasiswa.php');
    } catch (\Exception $exception) {
        if (strpos($exception->getMessage(), 'There is no active transaction') !== false) {
            setcookie('success', $msg, time() + 5);
            header('Location: Mahasiswa.php');
        } else {
            $msg = "Mahasiswa gagal ditambahkan $exception";
            setcookie('error', $msg, time() + 5);
            header('Location: Mahasiswa.php');
        }
    }
}

if ($act == 'delete') {
    $id = $_GET['id'];

    try {
        $mahasiswaService->delete($id);
        $msg = "Mahasiswa berhasil dihapus";
        setcookie('success', $msg, time() + 5);
        header('Location: Mahasiswa.php');
    } catch (\Exception $exception) {
        $msg = "Gagal menghapus data $exception";
        setcookie('error', $msg, time() + 5);
        header('Location: Mahasiswa.php');
    }
}

if ($act == 'update-prodi') {
    $id = $_POST['id'];
    $prodi = $_POST['prodi'];

    $mahasiswaService->updateProdi($id, $prodi);
    $msg = "Prodi berhasil diubah";
    setcookie('success', $msg, time() + 5);
    header('Location: Mahasiswa.php');
}

if ($act == 'update') {
    $id = $_POST['id'];
    $angkatan = $_POST['angkatan'];
    $jalur_masuk = $_POST['jalur_masuk'];
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $agama = $_POST['agama'];
    $jenjang = $_POST['jenjang'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $noHP = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $totalSks = $_POST['totalSks'];
    $semester = $_POST['semester'];
    $jurusanId = $_POST['jurusan'];
    $dosenId = $_POST['dosen'];

    try {
        $req = new MahasiswaEntity();
        $req->nim = generateNIM($angkatan, $jurusanId, $jalur_masuk);
        $req->email = generateEmail($namaDepan, $namaBelakang, $req->nim, 'student');

        $req->id = $id;
        $req->namaDepan = $namaDepan;
        $req->namaBelakang = $namaBelakang;
        $req->jenisKelamin = $jenisKelamin;
        $req->agama = $agama;
        $req->jenjang = $jenjang;
        $req->tanggalLahir = $tanggalLahir;
        $req->noHP = $noHP;
        $req->alamat = $alamat;
        $req->status = $status;
        $req->totalSKS = $totalSks;
        $req->semester = $semester;
        $req->idJurusan = $jurusanId;
        $req->idDosenPA = $dosenId;
        $req->angkatan = $angkatan;
        $req->jalurMasuk = $jalur_masuk;
        $req->idProdi = null;

        $mahasiswaService->update($req);
        $msg = "Mahasiswa berhasil di update";
        setcookie('success', $msg, time() + 5);
        header('Location: Mahasiswa.php');
    } catch (\Exception $exception) {
        $msg = "Gagal update data $exception";
        setcookie('error', $msg, time() + 5);
        header('Location: Mahasiswa.php');
    }
}

