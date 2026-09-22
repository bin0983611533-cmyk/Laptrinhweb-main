<?php
// download_images.php

$images = [
    61 => ['name' => 'HP Pavilion 15', 'url' => 'https://cdn.tgdd.vn/Products/Images/44/279262/hp-pavilion-15-eg2056tu-i5-6k786pa-thumb-600x600.jpg', 'filename' => 'hp-pavilion-15.jpg'],
    62 => ['name' => 'MacBook Air M1', 'url' => 'https://cdn.topzone.vn/Products/Images/44/231244/s16/mac-air-m1-13-bac-new-650x650.png', 'filename' => 'macbook-air-m1.png'],
    63 => ['name' => 'Dell XPS 13', 'url' => 'https://cdn.tgdd.vn/Products/Images/44/282827/dell-xps-13-9320-i7-5g1t9-thumb-600x600.jpg', 'filename' => 'dell-xps-13.jpg'],
    64 => ['name' => 'Logitech MX Master 3S', 'url' => 'https://cdn.tgdd.vn/Products/Images/86/289658/chuot-khong-day-logitech-mx-master-3s-thumb-600x600.jpeg', 'filename' => 'logitech-mx-master-3s.jpeg'],
    65 => ['name' => 'Keychron K2 V2', 'url' => 'https://product.hstatic.net/200000722513/product/k2_v2_6_b8b21c43719f4a088cdb65b6e4e0d8fa_1024x1024.png', 'filename' => 'keychron-k2-v2.png'],
    66 => ['name' => 'Anker USB-C Hub 7-in-1', 'url' => 'https://cdn.tgdd.vn/Products/Images/7542/303498/hub-chuyen-doi-type-c-7-in-1-anker-a8346-thumb-600x600.jpg', 'filename' => 'anker-hub.jpg'],
    67 => ['name' => 'Sony Alpha a7 IV', 'url' => 'https://cdn.vjshop.vn/may-anh/mirrorless/sony/sony-alpha-a7-iv/sony-alpha-a7-iv-body-2-500x500.jpg', 'filename' => 'sony-a7-iv.jpg'],
    68 => ['name' => 'Canon EOS R6', 'url' => 'https://cdn.vjshop.vn/may-anh/mirrorless/canon/canon-eos-r6/canon-eos-r6-500x500.jpg', 'filename' => 'canon-eos-r6.jpg'],
    69 => ['name' => 'GoPro HERO 11 Black', 'url' => 'https://cdn.vjshop.vn/action-camera/gopro/gopro-hero-11-black/gopro-hero-11-black-1-500x500.jpg', 'filename' => 'gopro-hero-11.jpg']
];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_shop', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($images as $id => $data) {
        $imgData = @file_get_contents($data['url']);
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
