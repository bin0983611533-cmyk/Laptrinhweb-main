<?php require 'admin/include/auth.php'; $a = new auth(); $stmt = $a->conn->query('SELECT * FROM sub_category LIMIT 2'); print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
