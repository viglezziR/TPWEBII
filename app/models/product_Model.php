<?php

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getAllProducts () {
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $products;
    }
    
    function getProduct($id) {
        $query = $this->db->prepare("SELECT * FROM `products` WHERE `id_products` = ?");
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ); 
        
        return $product;
    }

    function getProductsFilterBy($brand) {
        $query = $this->db->prepare("SELECT * FROM `products` WHERE `brand` = ?");
        $query->execute([$brand]);

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function insertProduct($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $image = null) {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        
        $query = $this->db->prepare ("INSERT INTO products (animal, name, brand, price, productWeight, animalAge, animalSize, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $pathImg]);

        return $this->db->lastInsertId();
    }

    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    public function deleteProduct($id) {
        $query = $this->db->prepare('DELETE FROM products WHERE id_products = ?');
        $query->execute([$id]);
    }

    public function updateProduct($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $image = null, $id) {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        
            $query = $this->db->prepare ("UPDATE products SET animal =?, name=?, brand =?, price =? ,productWeight =?, animalAge =?, animalSize =?, image=? WHERE id_products = ?");
        $query->execute([$animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $pathImg, $id]);
    }

    public function updateProduct2($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $id) {
        $query = $this->db->prepare ("UPDATE products SET animal =?, name=?, brand =?, price =? ,productWeight =?, animalAge =?, animalSize =? WHERE id_products = ?");
        $query->execute([$animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $id]);
    }
}