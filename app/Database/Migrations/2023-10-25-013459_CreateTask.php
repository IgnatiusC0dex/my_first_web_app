<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTask extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
	            'constraint'     => 5,
	            'unsigned'       => true,
	            'auto_increment' => true
			],
			'description' => [
				'type'           => 'VARCHAR',
				'constraint'     => '128',
			]
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('task');

		$this->forge->addColumn('task', [
            'created_at' => [
                'type'     => 'DATETIME',
                'null'     => true,
                'default'  => null
            ],
            'updated_at' => [
                'type'     => 'DATETIME',
                'null'     => true,
                'default'  => null
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('task');
		
		$this->forge->dropColumn('task', 'updated_at');
        $this->forge->dropColumn('task', 'created_at');
    }
}
