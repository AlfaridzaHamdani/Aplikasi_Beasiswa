<?php

namespace Beasiswa\Controller;

use Beasiswa\Model\ScholarshipModel;

class ResultController
{
    private $model;

    // Inisialisasi model dengan koneksi database
    public function __construct($db)
    {
        $this->model = new ScholarshipModel($db);
    }

    // Menampilkan hasil pendaftaran dan statistik
    public function index()
    {
        // Ambil data beasiswa
        $scholarships = $this->model->getScholarship();

        // Hitung jumlah pendaftar dan statistik berdasarkan jenis beasiswa
        $totalApplicants = $this->getCount("SELECT COUNT(*) AS total_applicants FROM users");
        $academicCount = $this->getCount("SELECT COUNT(*) AS academic_count FROM users WHERE scholarship_type = 'Akademik'");
        $nonAcademicCount = $this->getCount("SELECT COUNT(*) AS non_academic_count FROM users WHERE scholarship_type = 'Non-Akademik'");
        $acceptedAcademic = $this->getCount("SELECT COUNT(*) AS accepted_academic FROM users WHERE scholarship_type = 'Akademik' AND status = '1'");
        $acceptedNonAcademic = $this->getCount("SELECT COUNT(*) AS accepted_non_academic FROM users WHERE scholarship_type = 'Non-Akademik' AND status = '1'");

        // Status beasiswa
        $scholarshipsStatus = [
            '0' => 'Belum Terverifikasi',
            '1' => 'Diterima'
        ];

        // Hitung jumlah tiap jenis beasiswa
        $scholarshipCount = [];
        foreach ($scholarships as $scholarship) {
            $type = $scholarship['scholarship_type'];
            $scholarshipCount[$type] = isset($scholarshipCount[$type]) ? $scholarshipCount[$type] + 1 : 1;
        }

        // Data untuk Chart.js
        $categoryData = [
            'Akademik' => $academicCount,
            'Non-Akademik' => $nonAcademicCount
        ];

        $participantsData = [
            'Terdafatar' => $totalApplicants,
            'Diterima' => $acceptedAcademic + $acceptedNonAcademic
        ];

        // Konversi data ke format JSON
        $categoryChartData = json_encode($categoryData);
        $participantChartData = json_encode($participantsData);

        // Tampilkan halaman hasil
        require_once __DIR__ . '/../View/Page/result.php';
    }

    // Fungsi untuk mengambil hasil query hitungan
    private function getCount($query)
    {
        $result = mysqli_query($this->model->getDb(), $query);
        $row = mysqli_fetch_assoc($result);
        return array_shift($row);
    }
}
