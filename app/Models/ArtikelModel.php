<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['judul', 'slug-judul', 'penulis', 'konten', 'tgl_publikasi'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        // [
		// 	'field' => 'judul',
		// 	'label' => 'judul',
		// 	'rules' => 'required'
		// ],
		// [
		// 	'field' => 'konten',
		// 	'label' => 'konten',
		// 	'rules' => 'required'
		// ],
		// [
		// 	'field' => 'penulis',
		// 	'label' => 'penulis',
		// 	'rules' => 'required' // <-- rules dikosongkan
        // ],
        // [
		// 	'field' => 'slug-judul',
		// 	'label' => 'slug-judul',
		// 	'rules' => 'required' // <-- rules dikosongkan
		// ],
        // [
		// 	'field' => 'tgl_publikasi',
		// 	'label' => 'tgl_publikasi',
		// 	'rules' => '' // <-- rules dikosongkan
		// ]
    ];
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
}
