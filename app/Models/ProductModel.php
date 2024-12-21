<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_title',
        'product_extra_info_title',
        'product_extra_info_description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'seo_address',
        'product_description',
        'video_embed_code',
        'product_code',
        'quantity',
        'extra_discount',
        'tax_rate',
        'sale_price',
        'second_sale_price',
        'deduct_from_stock',
        'status',
        'feature_section',
        'main_image',
        'detail_images',
        'customer_group',
        'price_tl',
        'price_usd',
        'price_eur',
        'start_date',
        'end_date'
    ];
    protected $useTimestamps = true;
}
