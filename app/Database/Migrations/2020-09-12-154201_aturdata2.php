<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aturdata2 extends Migration
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
			'nik' => [
				'type'           => 'INT',
				'constraint'     => 9,
				'null'			 => FALSE,
			],
			'bidangkeahlian' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '255',
				'null' 			 => FALSE,
			],
			'jk' => [
				'type'			 => 'ENUM("laki-laki","perempuan")',
				'default'		 => 'laki-laki',
				'null'			 => FALSE,
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
		$this->forge->createTable('dosen');
	}

	public function down()
	{
		$this->forge->dropTable('dosen');
	}
}
