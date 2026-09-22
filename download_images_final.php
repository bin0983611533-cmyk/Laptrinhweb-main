<?php
// download_images_final.php

$images = [
    61 => ['name' => 'HP Pavilion 15', 'url' => 'https://phucanhcdn.com/media/product/55379_laptop_hp_pavilion_15_eg3092tu_16gb_thumb.jpg', 'filename' => 'hp-pavilion-15.jpg'],
    63 => ['name' => 'Dell XPS 13', 'url' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80', 'filename' => 'dell-xps-13.jpg'],
    65 => ['name' => 'Keychron K2 V2', 'url' => 'https://c8.alamy.com/comp/2J8RG9T/london-april-20-2022-keychron-mechanical-computer-keyboard-in-dark-grey-top-view-background-2J8RG9T.jpg', 'filename' => 'keychron-k2-v2.jpg'],
    66 => ['name' => 'Anker USB-C Hub 7-in-1', 'url' => 'https://i5.walmartimages.com/seo/Anker-USB-C-Hub-7-in-1-Multi-Port-USB-Adapter-Laptops-4K-60Hz-USB-C-HDMI-Splitter-85W-Max-Power-Delivery-3xUSBA-C-3-0-Data-Ports-SD-TF-Card-Type-C-De_f3cecedb-b67e-4823-81e0-59ccb0f8bb3d.9015a5c74386bf0c11a2a988b8d92062.jpeg', 'filename' => 'anker-hub.jpg'],
    67 => ['name' => 'Sony Alpha a7 IV', 'url' => 'https://a4.pbase.com/g12/87/331787/3/171026036.dwPjobOm.jpg', 'filename' => 'sony-a7-iv.jpg'],
    68 => ['name' => 'Canon EOS R6', 'url' => 'https://a4.pbase.com/g12/87/331787/3/171026036.dwPjobOm.jpg', 'filename' => 'canon-eos-r6.jpg'], // Using same for Canon for now if couldn't find, wait Canon was: https://a4.pbase.com/g12/87/331787/3/171026036.dwPjobOm.jpg? Oh wait, that was for Canon. Sony I found: https://www.sony.co.jp/en/Products/di_photo-gallery/images/extralarge/2200.JPG
    69 => ['name' => 'GoPro HERO 11 Black', 'url' => 'https://tokyocamera.vn/wp-content/uploads/2022/03/Gopro-Hero-11-Black.jpg', 'filename' => 'gopro-hero-11.jpg']
];
// fix Sony
$images[67]['url'] = 'https://www.sony.co.jp/en/Products/di_photo-gallery/images/extralarge/2200.JPG';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_shop', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($images as $id => $data) {
        $ch = curl_init($data['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $imgData = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($imgData !== false && $httpCode == 200) {
            $filepath = __DIR__ . '/uploads/' . $data['filename'];
            file_put_contents($filepath, $imgData);
            
            $stmt = $pdo->prepare("UPDATE products SET images = ? WHERE id = ?");
            $stmt->execute([$data['filename'], $id]);
            echo "Successfully updated ID {$id} with {$data['filename']}\n";
        } else {
            echo "Failed to download image for ID {$id}. HTTP Code: {$httpCode}\n";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
