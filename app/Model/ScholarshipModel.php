<?php

namespace Beasiswa\Model;

class ScholarshipModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function registerScholarship($name, $email, $phone, $semester, $gpa, $jenisBeasiswa, $file)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, phone, semester, gpa, scholarship_type, file) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssidss", $name, $email, $phone, $semester, $gpa, $jenisBeasiswa, $file);
        return $stmt->execute();
    }

    public function getScholarship()
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getCount($query)
    {
        $result = mysqli_query($this->db, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return array_shift($row); // Ambil nilai pertama dari array
        }
        return 0; // Return 0 jika query gagal
    }

    // Tambahkan metode ini jika perlu untuk mendapatkan koneksi database
    public function getDb()
    {
        return $this->db;
    }
}
