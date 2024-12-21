<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
      
        return view('product_add');
    }
    public function productsPage()
    {
        $model = new ProductModel();
        $productsAll = $model->findAll();

        return view('products', ['productsAll' => $productsAll]);
    }
    public function save()
    {
        $request = \Config\Services::request();
    
        $mainImage = $request->getFile('mainImage');
        $mainImagePath = '';
    
        if ($mainImage && $mainImage->isValid()) {
            $mainImageName = $mainImage->getRandomName();
            $mainImage->move('public/uploads', $mainImageName);
            $mainImagePath = 'uploads/' . $mainImageName;
        }
    
        $detailImages = $request->getFileMultiple('detailImages'); 
        $detailImagePaths = [];
    
        if ($detailImages) {
            foreach ($detailImages as $image) {
                if ($image->isValid()) {
                    $randomName = $image->getRandomName();
                    $image->move('public/uploads', $randomName);
                    $detailImagePaths[] = 'uploads/' . $randomName;
                }
            }
        }
    
        $productData = [
            'product_title'               => $request->getPost('productTitle'),
            'product_extra_info_title'    => $request->getPost('productExtraInfoTitle'),
            'product_extra_info_description' => $request->getPost('productExtraInfoDescription'),
            'meta_title'                  => $request->getPost('metaTitle'),
            'meta_keywords'               => $request->getPost('metaKeywords'),
            'meta_description'            => $request->getPost('metaDescription'),
            'seo_address'                 => $request->getPost('seoAddress'),
            'product_description'         => $request->getPost('productDescription'),
            'video_embed_code'            => $request->getPost('videoEmbedCode'),
            'product_code'                => $request->getPost('productCode'),
            'quantity'                    => $request->getPost('quantity'),
            'extra_discount'              => $request->getPost('extraDiscount'),
            'tax_rate'                    => $request->getPost('taxRate'),
            'sale_price'                  => $request->getPost('salePrice'),
            'second_sale_price'           => $request->getPost('secondSalePrice'),
            'deduct_from_stock'           => $request->getPost('deductFromStock'),
            'status'                      => $request->getPost('status'),
            'feature_section'             => $request->getPost('featureSection'),
            'main_image'                  => $mainImagePath,  
            'detail_images'               => !empty($detailImagePaths) ? json_encode($detailImagePaths) : null, 
            'customer_group'              => $request->getPost('customerGroup'),
            'price_tl'                    => $request->getPost('priceTL'),
            'price_usd'                   => $request->getPost('priceUSD'),
            'price_eur'                   => $request->getPost('priceEUR'),
            'start_date'                  => $request->getPost('startDate'),
            'end_date'                    => $request->getPost('endDate')
        ];
    
        $model = new ProductModel();
    
        if ($model->save($productData)) {
            return redirect()->to('/products')->with('success', 'Ürün başarıyla kaydedildi!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Ürün kaydedilirken bir hata oluştu.');
        }
    }
    
    
    
    public function editPage($id)
{
    $model = new ProductModel();
    $product = $model->find($id); 

    if (!$product) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Ürün bulunamadı!');
    }
    return view('product_edit', ['product' => $product]);
}

public function delete($id)
{
    $model = new ProductModel();
    $product = $model->find($id);

    if ($product) {
        $model->delete($id);
    }

    return redirect()->to('/products');
}

public function updateProduct($id)
{
    $request = service('request');
    $productModel = new \App\Models\ProductModel();
    $updateData = [
        'product_title'               => $request->getPost('productTitle') ?: null,
        'product_extra_info_title'    => $request->getPost('productExtraInfoTitle') ?: null,
        'product_extra_info_description' => $request->getPost('productExtraInfoDescription') ?: null,
        'meta_title'                  => $request->getPost('metaTitle') ?: null,
        'meta_keywords'               => $request->getPost('metaKeywords') ?: null,
        'meta_description'            => $request->getPost('metaDescription') ?: null,
        'seo_address'                 => $request->getPost('seoAddress') ?: null,
        'product_description'         => $request->getPost('productDescription') ?: null,
        'video_embed_code'            => $request->getPost('videoEmbedCode') ?: null,
        'product_code'                => $request->getPost('productCode') ?: null,
        'quantity'                    => $request->getPost('quantity') ?: null,
        'extra_discount'              => $request->getPost('extraDiscount') ?: null,
        'tax_rate'                    => $request->getPost('taxRate') ?: null,
        'sale_price'                  => $request->getPost('salePrice') ?: null,
        'second_sale_price'           => $request->getPost('secondSalePrice') ?: null,
        'deduct_from_stock'           => $request->getPost('deductFromStock') ?: null,
        'status'                      => $request->getPost('status') ?: null,
        'feature_section'             => $request->getPost('featureSection') ?: null,
        'customer_group'              => json_encode($request->getPost('customerGroup')) ?: null,
        'price_tl'                    => $request->getPost('priceTL') ?: null,
        'price_usd'                   => $request->getPost('priceUSD') ?: null,
        'price_eur'                   => $request->getPost('priceEUR') ?: null,
        'start_date'                  => $request->getPost('startDate') ?: null,
        'end_date'                    => $request->getPost('endDate') ?: null,
    ];

    $mainImageFile = $request->getFile('mainImage');
    if ($mainImageFile && $mainImageFile->isValid() && !$mainImageFile->hasMoved()) {
        $mainImagePath = $mainImageFile->store('uploads');
        $updateData['main_image'] = $mainImagePath;
    }

    $detailImageFiles = $request->getFiles('detailImages');
    if ($detailImageFiles && !empty($detailImageFiles)) {
        $detailImagePaths = [];
        foreach ($detailImageFiles['detailImages'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $detailImagePaths[] = $file->store('uploads');
            }
        }
        $updateData['detail_images'] = !empty($detailImagePaths) ? json_encode($detailImagePaths) : null;
    }
    $updated = $productModel->update($id, $updateData);

    if ($updated) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ürün başarıyla güncellendi.',
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Ürün güncellenemedi. Hata: ' . json_encode($productModel->errors()),
        ]);
    }
}

}
