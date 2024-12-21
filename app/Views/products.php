<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Listesi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-delete:hover {
            background-color: #e53935;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<h1>Ürünler</h1>

<table>
    <thead>
        <tr>
            <th>Ürün Başlık</th>
            <th>Ürün Kodu</th>
            <th>Fiyat (TL)</th>
            <th>Başlangıç Tarihi</th>
            <th>Bitiş Tarihi</th>
            <th>İşlemler</th> 
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($productsAll)): ?>
            <?php foreach ($productsAll as $product): ?>
                <tr>
                    <td><?= esc($product['product_title']) ?></td>
                    <td><?= esc($product['product_code']) ?></td>
                    <td><?= esc($product['price_tl']) ?> TL</td>
                    <td><?= esc($product['start_date']) ?></td>
                    <td><?= esc($product['end_date']) ?></td>
                    <td class="btn-container">
                        <a href="/products/edit/<?= $product['id'] ?>"><button class="btn btn-edit">Edit</button></a>
                        <a href="/products/delete/<?= $product['id'] ?>" onclick="return confirm('Emin misiniz?')"><button class="btn btn-delete">Delete</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Hiç ürün bulunamadı.</td> 
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
