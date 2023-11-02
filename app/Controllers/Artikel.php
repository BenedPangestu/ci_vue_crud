<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class Artikel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    // public function __construct() {
    //     // header();
    //     // header('Access-Control-Allow-Origin: *');
    //     // header('Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS, DELETE');
    //     // header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
    //     // if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
    //     //     die();
    //     // }
    // }
    public function index()
    {
        $model = new ArtikelModel();
        $data = $model->findAll();
        if(!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data);
    }
 
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->find(['id' => $id]);
        if(!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data[0]);
    }
 
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $json = $this->request->getJSON();

        $validation = Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'konten' => 'required',
            'penulis' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if($isDataValid){
            // Membuat slug dari judul
            $title = trim(strtolower($json->judul));
            $out = explode(" ",$title);
            $slug = implode("-",$out);
            
            // insert data ke model
            $model = new ArtikelModel();
            $product = $model->insert([
                'judul' => $json->judul,
                'konten' => $json->konten,
                'slug-judul' => $slug,
                'penulis' => $json->penulis,
            ]);
            return $this->respondCreated($product, "Berhasil");
        }
        return $this->fail('Gagal tersimpan', 400);
    }
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json = $this->request->getJSON();

        $validation = Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'konten' => 'required',
            'penulis' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if($isDataValid){
            // Membuat slug dari judul
            $title = trim(strtolower($json->judul));
            $out = explode(" ",$title);
            $slug = implode("-",$out);
            
            $model = new ArtikelModel();
            $cekId = $model->find(['id' => $id]);
            if(!$cekId) return $this->fail('Data Tidak ditemukan', 404);
            $product = $model->update($id, [
                    'judul' => $json->judul,
                    'konten' => $json->konten,
                    'slug-judul' => $slug,
                    'penulis' => $json->penulis,
                ]);
            return $this->respondCreated($product, "Berhasil");
        }
        return $this->fail('Gagal terupdate', 400);
    }
 
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new ArtikelModel();
        $cekId = $model->find(['id' => $id]);

        if(!$cekId) return $this->fail('Data Tidak ditemukan', 404);
        
        $product = $model->delete($id);
        
        if(!$product) return $this->fail('Gagal terhapus', 400);
        
        // return $this->respondDeleted('Data Berhasil Terhapus');
        return $this->respond($product);
    }
}
