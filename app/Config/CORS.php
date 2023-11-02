<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class CORS extends BaseConfig
{
    // Domain yang diizinkan untuk mengakses sumber daya
    public $allowed_origins = ['http://localhost:8081'];

    // Metode HTTP yang diizinkan
    public $allowed_methods = ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'];

    // Header yang diizinkan
    public $allowed_headers = ['Content-Type'];

    // Header yang diekspos
    public $expose_headers = [];

    // Maksimum umur (nilai dalam detik)
    public $max_age = 0;

    // Dukungan untuk credential (true atau false)
    public $supports_credentials = false;
}