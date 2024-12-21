<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Kaydı</title>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <style>
        body {
        
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .tabs {
            display: flex;
            padding: 10px 0;
        }

        .tabs button {
            color: black;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tabs button:hover, .tabs button.active {
            background-color: #666;
        }

        .tab-content {
            display: none;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            align-items:center;
            margin-bottom: 15px;
            display:flex;
        }

        .form-group label {
            width:15rem;
            display: block;
            font-size:14px;
            font-weight: bold;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button.submit {
            margin-top: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button.submit:hover {
            background-color: #555;
        }
    </style>
 
   
</head>
<body>

<div class="tabs">
    <button class="active" onclick="openTab(0)">Genel</button>
    <button onclick="openTab(1)">Detaylar</button>
    <button onclick="openTab(2)">Resimler</button>
    <button onclick="openTab(3)">İndirim</button>
</div>
<form action="/product/save" method="post" enctype="multipart/form-data">
<div class="tab-content active">


    <div class="form-group">
        <label for="productTitle">Türkçe Ürün Başlık:</label>
        <input type="text" id="productTitle" name="productTitle">
    </div>

    <div class="form-group">
        <label for="productExtraInfoTitle">Türkçe Ürün Ek Bilgi Başlığı:</label>
        <input type="text" id="productExtraInfoTitle" name="productExtraInfoTitle">
    </div>

    <div class="form-group">
        <label for="productExtraInfoDescription">Türkçe Ürün Ek Bilgi Açıklaması:</label>
        <textarea id="productExtraInfoDescription" name="productExtraInfoDescription" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="metaTitle">Türkçe Meta Title:</label>
        <input type="text" id="metaTitle" name="metaTitle">
    </div>

    <div class="form-group">
        <label for="metaKeywords">Türkçe Meta Keywords:</label>
        <input type="text" id="metaKeywords" name="metaKeywords">
    </div>

    <div class="form-group">
        <label for="metaDescription">Türkçe Meta Description:</label>
        <textarea id="metaDescription" name="metaDescription" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="seoAddress">Türkçe SEO Adresi:</label>
        <input type="text" id="seoAddress" name="seoAddress">
    </div>

    <div class="form-group">
    <label for="productDescription">Türkçe Ürün Açıklama:</label>
    <textarea id="productDescription" name="productDescription" rows="5"></textarea>
    </div>

    <div class="form-group">
        <label for="videoEmbedCode">Türkçe Video Embed Kodu:</label>
        <textarea id="videoEmbedCode" name="videoEmbedCode" rows="3"></textarea>
    </div>
</div>


<div class="tab-content">

    <div class="form-group">
        <label for="productCode">Ürün Kodu:</label>
        <input type="text" id="productCode" name="productCode">
    </div>

    <div class="form-group">
        <label for="quantity">Miktar ve Birim (adet vb.):</label>
        <input type="text" id="quantity" name="quantity" placeholder="Örn: 10 adet">
    </div>

    <div class="form-group">
        <label for="extraDiscount">Sepet Ekstra İndirim (%):</label>
        <input type="number" id="extraDiscount" name="extraDiscount" step="0.01">
    </div>

    <div class="form-group">
        <label for="taxRate">Vergi Oranı (%):</label>
        <input type="number" id="taxRate" name="taxRate" step="0.01">
    </div>

    <div class="form-group">
        <label for="salePrice">Satış Fiyatı:</label>
        <input type="number" id="salePrice" name="salePrice" step="0.01">
    </div>

    <div class="form-group">
        <label for="secondSalePrice">2. Satış Fiyatı:</label>
        <input type="number" id="secondSalePrice" name="secondSalePrice" step="0.01">
    </div>

    <div class="form-group">
        <label for="deductFromStock">Stoktan Düş:</label>
        <select id="deductFromStock" name="deductFromStock">
            <option value="yes">Evet</option>
            <option value="no">Hayır</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Durum:</label>
        <select id="status" name="status">
            <option value="active">Aktif</option>
            <option value="inactive">Pasif</option>
        </select>
    </div>

    <div class="form-group">
        <label for="featureSection">Özellik Bölümü:</label>
        <select id="featureSection" name="featureSection">
            <option value="show">Göster</option>
            <option value="hide">Gösterme</option>
        </select>
    </div>
</div>


<div class="tab-content">
    <div class="form-group">
        <label for="mainImage">Ürün Ana Resmi:</label>
        <input type="file" id="mainImage" name="mainImage" accept="image/*">
        <div id="mainImagePreview" style="margin-top: 10px;"></div>
    </div>

    <div class="form-group">
        <label for="detailImages">Ürün Detay Resimleri:</label>
        <input type="file" id="detailImages" name="detailImages[]" accept="image/*" multiple>
     
        <div id="detailImagesPreview" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;"></div>
    </div>
</div>

<div class="tab-content">
 

    <div class="form-group">
    <table style="width: 100%; border-collapse: collapse; text-align: left; table-layout: fixed;">
    <thead>
        <tr>
            <th style="width: 25%; padding: 10px;">Müşteri Grubu</th>
            <th style="width: 25%; padding: 10px;">Fiyat (TL, USD, EUR)</th>
            <th style="width: 25%; padding: 10px;">Başlangıç Tarihi</th>
            <th style="width: 25%; padding: 10px;">Bitiş Tarihi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 10px;">
                <select name="customerGroup[]" style="width: 100%;">
                    <option value="a">A Müşterisi</option>
                    <option value="b">B Müşterisi</option>
                    <option value="c">C Müşterisi</option>
                </select>
            </td>
            <td style="padding: 10px;">
                <input type="number" name="priceTL[]" placeholder="TL" style="margin-bottom:5px; margin-right: 5px;">
                <input type="number" name="priceUSD[]" placeholder="USD" style="margin-bottom:5px; margin-right: 5px;">
                <input type="number" name="priceEUR[]" placeholder="EUR" >
            </td>
            <td style="padding: 15px;">
                <input type="text" name="startDate[]" placeholder="Başlangıç Tarihi" style="width: 100%;">
            </td>
            <td style="padding: 15px;">
                <input type="text" name="endDate[]" placeholder="Bitiş Tarihi" style="width: 100%;">
            </td>
        </tr>
    </tbody>
    </table>

    </div>
</div>


<div style="display:flex;justify-content:end; padding:2rem;"><button class="submit">Kaydet</button></div>
</form>
<script>
        function openTab(tabIndex) {
            const tabs = document.querySelectorAll('.tab-content');
            const tabButtons = document.querySelectorAll('.tabs button');

            tabs.forEach((tab, index) => {
                tab.classList.toggle('active', index === tabIndex);
                tabButtons[index].classList.toggle('active', index === tabIndex);
            });
        }
    </script>
<script>
    CKEDITOR.replace('productDescription', {
        language: 'tr',
        height: 250,  
        width:1000, 
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Link', 'Unlink'] },
            { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ]
    });
</script>
<script>
    document.getElementById('mainImage').addEventListener('change', function (event) {
        const preview = document.getElementById('mainImagePreview');
        preview.innerHTML = ''; 
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Ana Resim Önizleme" style="width: 200px; border: 1px solid #ccc; padding: 5px;">`;
            };
            reader.readAsDataURL(file);
        }
    });
    document.getElementById('detailImages').addEventListener('change', function (event) {
        const preview = document.getElementById('detailImagesPreview');
   
        const files = event.target.files;
        Array.from(files).forEach(file => {
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Detay Resim Önizleme';
                    img.style.width = '100px';
                    img.style.border = '1px solid #ccc';
                    img.style.padding = '5px';
                    img.style.marginBottom = '10px';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
</body>
</html>
