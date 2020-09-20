<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aturdata extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'nim' => [
				'type'           => 'INT',
				'constraint'     => 9,
				'null'			 => FALSE,
			],
			'ipk' => [
				'type'			 => 'DOUBLE',
				'null' 			 => FALSE,
			],
			'jk' => [
				'type'			 => 'ENUM("laki-laki","perempuan")',
				'default'		 => 'laki-laki',
				'null'			 => FALSE,
			],
			'komentar' => [
				'type'			 => 'VARCHAR',
				'constraint'     => '255',
				'null'			 => TRUE,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', true); // primary key
		$this->forge->createTable('mahasiswa');
	}

	public function down()
	{
		$this->forge->dropTable('mahasiswa');
	}
}
