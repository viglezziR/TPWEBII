<?php

class BrandModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getAllBrands () {
        $query = $this->db->prepare("SELECT * FROM brands");
        $query->execute();

        $brands = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $brands;
    }

    function getBrand($brand) {
        $query = $this->db->prepare("SELECT * FROM `brands` WHERE `brand` = ?");
        $query->execute([$brand]);

        $brand = $query->fetch(PDO::FETCH_OBJ); 
        
        return $brand;
    }

    public function insertBrand($brand, $contact, $origin) {
        $query = $this->db->prepare ("INSERT INTO brands (brand, contact, origin) VALUES (?, ?, ?)");
        $query->execute([$brand, $contact, $origin]);

        return $this->db->lastInsertId();
    }

    public function updateBrand($brand, $contact, $origin, $brand_id) {
        $query = $this->db->prepare ("UPDATE brands SET brand =?, contact=?, origin=? WHERE brand_id = ?");
        $query->execute([$brand, $contact, $origin, $brand_id]);
    }

    public function deleteBrand($brand_id) {
        $query = $this->db->prepare('DELETE FROM brands WHERE brand_id = ?');
        $query->execute([$brand_id]);
    }

}