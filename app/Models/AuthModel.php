<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['username', 'password', 'phone', 'email'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    function findByEmail($email) {
        $query = $this->where(['email' => $email])->first();
        if ($query) {
            // Kredensial benar, pengguna ditemukan
            return $query;
        } else {
            // Kredensial salah, pengguna tidak ditemukan
            return false;
        }
    }
    public function verify_credentials($email, $password) {
        // Di sini, Anda akan memeriksa kredensial pengguna di database atau sumber data lainnya.
        // Berikut hanya contoh implementasi sederhana.
        $query = $this->where(['email' => $email, 'password' => $password])->first();

        if ($query) {
            // Kredensial benar, pengguna ditemukan
            return true;
        } else {
            // Kredensial salah, pengguna tidak ditemukan
            return false;
        }
    }
}
