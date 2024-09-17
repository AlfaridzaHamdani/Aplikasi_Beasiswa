<?php

namespace Beasiswa\Controller;

use Beasiswa\Model\ScholarshipModel;

class RegistrationController
{
    private $model;

    // Inisialisasi model dengan koneksi database
    public function __construct($db)
    {
        $this->model = new ScholarshipModel($db);
    }

    // Menampilkan form pendaftaran
    function index()
    {
        require_once __DIR__ . '/../View/Page/formRegistration.php';
    }

    // Proses pendaftaran beasiswa
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $semester = $_POST['semester'];
            $gpa = $_POST['gpa'];
            $jenisBeasiswa = $_POST['jenisBeasiswa'];
            $file = $_FILES['file']['name'];

            // Proses upload file
            $targetDir = __DIR__ . "/../../uploads/";
            $targetFile = $targetDir . basename($file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);

            // Simpan data pendaftaran
            $result = $this->model->registerScholarship($name, $email, $phone, $semester, $gpa, $jenisBeasiswa, $file);

            // Berikan respons kepada user
            if ($result) {
                echo "Beasiswa berhasil didaftarkan!";
            } else {
                echo "Gagal mendaftar beasiswa.";
            }
        }

        // Redirect ke halaman utama
        header("Location: /Aplikasi-Beasiswa/public/index.php");
    }
}
