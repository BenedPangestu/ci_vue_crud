<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel artikel
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'UNIQUE'         => 'true'
			],
            'slug-judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'penulis'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'konten' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
            'tgl_publikasi' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel artikel
		$this->forge->createTable('artikel', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
		$this->forge->dropTable('artikel');
    }
}