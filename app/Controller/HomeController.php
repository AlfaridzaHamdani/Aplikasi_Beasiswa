<?php

namespace Beasiswa\Controller;

// Controller untuk halaman utama
class HomeController
{
    // Menampilkan halaman utama
    function index()
    {
        // Memuat view home.php
        require_once __DIR__ . '/../View/Page/home.php';
    }
}
