<?php
// download_images_retry.php

$images = [
    61 => ['name' => 'HP Pavilion 15', 'url' => 'https://cdn.tgdd.vn/Products/Images/44/279262/hp-pavilion-15-eg2056tu-i5-6k786pa-thumb-600x600.jpg', 'filename' => 'hp-pavilion-15.jpg'],
    63 => ['name' => 'Dell XPS 13', 'url' => 'https://cdn.tgdd.vn/Products/Images/44/282827/dell-xps-13-9320-i7-5g1t9-thumb-600x600.jpg', 'filename' => 'dell-xps-13.jpg'],
    64 => ['name' => 'Logitech MX Master 3S', 'url' => 'https://cdn.tgdd.vn/Products/Images/86/289658/chuot-khong-day-logitech-mx-master-3s-thumb-600x600.jpeg', 'filename' => 'logitech-mx-master-3s.jpeg'],
    65 => ['name' => 'Keychron K2 V2', 'url' => 'https://product.hstatic.net/200000722513/product/k2_v2_6_b8b21c43719f4a088cdb65b6e4e0d8fa_1024x1024.png', 'filename' => 'keychron-k2-v2.png'],
    66 => ['name' => 'Anker USB-C Hub 7-in-1', 'url' => 'https://cdn.tgdd.vn/Products/Images/7542/303498/hub-chuyen-doi-type-c-7-in-1-anker-a8346-thumb-600x600.jpg', 'filename' => 'anker-hub.jpg'],
    67 => ['name' => 'Sony Alpha a7 IV', 'url' => 'https://m.media-amazon.com/images/I/71uV4I+dD4L._AC_SX679_.jpg', 'filename' => 'sony-a7-iv.jpg'],
    68 => ['name' => 'Canon EOS R6', 'url' => 'https://m.media-amazon.com/images/I/81y6s57vQEL._AC_SX679_.jpg', 'filename' => 'canon-eos-r6.jpg'],
    69 => ['name' => 'GoPro HERO 11 Black', 'url' => 'https://m.media-amazon.com/images/I/61r5A9LIt4L._AC_SX679_.jpg', 'filename' => 'gopro-hero-11.jpg']
];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_shop', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]
    ];
    $context = stream_context_create($options);

    foreach ($images as $id => $data) {
        $imgData = @file_get_contents($data['url'], false, $context);
        if ($imgData !== false) {
            $filepath = __DIR__ . '/uploads/' . $data['filename'];
            file_put_contents($filepath, $imgData);
            
            $stmt = $pdo->prepare("UPDATE products SET images = ? WHERE id = ?");
            $stmt->execute([$data['filename'], $id]);
            echo "Successfully updated ID {$id} with {$data['filename']}\n";
        } else {
            echo "Failed to download image for ID {$id}\n";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
