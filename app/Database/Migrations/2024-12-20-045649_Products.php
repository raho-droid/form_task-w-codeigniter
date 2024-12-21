<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'product_title'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,  // nullable
            ],
            'product_extra_info_title'=> [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,  // nullable
            ],
            'product_extra_info_description' => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'meta_title'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,  // nullable
            ],
            'meta_keywords'          => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'meta_description'       => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'seo_address'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,  // nullable
            ],
            'product_description'    => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'video_embed_code'       => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'product_code'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,  // nullable
            ],
            'quantity'               => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,  // nullable
            ],
            'extra_discount'         => [
                'type'           => 'FLOAT',
                'constraint'     => '5,2',
                'null'           => true,  // nullable
            ],
            'tax_rate'               => [
                'type'           => 'FLOAT',
                'constraint'     => '5,2',
                'null'           => true,  // nullable
            ],
            'sale_price'             => [
                'type'           => 'FLOAT',
                'constraint'     => '10,2',
                'null'           => true,  // nullable
            ],
            'second_sale_price'      => [
                'type'           => 'FLOAT',
                'constraint'     => '10,2',
                'null'           => true,  // nullable
            ],
            'deduct_from_stock'      => [
                'type'           => 'ENUM',
                'constraint'     => ['yes', 'no'],
                'default'        => 'no',
                'null'           => true,  // nullable
            ],
            'status'                 => [
                'type'           => 'ENUM',
                'constraint'     => ['active', 'inactive'],
                'default'        => 'inactive',
                'null'           => true,  // nullable
            ],
            'feature_section'        => [
                'type'           => 'ENUM',
                'constraint'     => ['show', 'hide'],
                'default'        => 'show',
                'null'           => true,  // nullable
            ],
            'main_image'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,  // nullable
            ],
            'detail_images'          => [
                'type'           => 'TEXT',
                'null'           => true,  // nullable
            ],
            'customer_group'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => true,  // nullable
            ],
            'price_tl'               => [
                'type'           => 'FLOAT',
                'constraint'     => '10,2',
                'null'           => true,  // nullable
            ],
            'price_usd'              => [
                'type'           => 'FLOAT',
                'constraint'     => '10,2',
                'null'           => true,  // nullable
            ],
            'price_eur'              => [
                'type'           => 'FLOAT',
                'constraint'     => '10,2',
                'null'           => true,  // nullable
            ],
            'start_date'             => [
                'type'           => 'DATE',
                'null'           => true,  // nullable
            ],
            'end_date'               => [
                'type'           => 'DATE',
                'null'           => true,  // nullable
            ],
            'created_at'             => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'             => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}

