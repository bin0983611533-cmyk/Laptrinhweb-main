<?php
// download_images_curl.php

$images = [
    61 => ['name' => 'HP Pavilion 15', 'url' => 'https://m.media-amazon.com/images/I/71X8k7fO-IL._AC_SX679_.jpg', 'filename' => 'hp-pavilion-15.jpg'],
    63 => ['name' => 'Dell XPS 13', 'url' => 'https://m.media-amazon.com/images/I/718b9w1aE2L._AC_SX679_.jpg', 'filename' => 'dell-xps-13.jpg'],
    64 => ['name' => 'Logitech MX Master 3S', 'url' => 'https://m.media-amazon.com/images/I/61ni3t1ryQL._AC_SX679_.jpg', 'filename' => 'logitech-mx-master-3s.jpg'],
    65 => ['name' => 'Keychron K2 V2', 'url' => 'https://m.media-amazon.com/images/I/61Nl-Hh2y4L._AC_SX679_.jpg', 'filename' => 'keychron-k2-v2.jpg'],
    66 => ['name' => 'Anker USB-C Hub 7-in-1', 'url' => 'https://m.media-amazon.com/images/I/51wXhW73Q+L._AC_SX679_.jpg', 'filename' => 'anker-hub.jpg'],
    67 => ['name' => 'Sony Alpha a7 IV', 'url' => 'https://m.media-amazon.com/images/I/71uV4I+dD4L._AC_SX679_.jpg', 'filename' => 'sony-a7-iv.jpg'],
    68 => ['name' => 'Canon EOS R6', 'url' => 'https://m.media-amazon.com/images/I/81y6s57vQEL._AC_SX679_.jpg', 'filename' => 'canon-eos-r6.jpg'],
    69 => ['name' => 'GoPro HERO 11 Black', 'url' => 'https://m.media-amazon.com/images/I/61r5A9LIt4L._AC_SX679_.jpg', 'filename' => 'gopro-hero-11.jpg']
];

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
