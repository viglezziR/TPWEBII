<?php
require_once './app/models/brand_Model.php';
require_once './app/models/product_Model.php';
require_once './app/views/product_View.php';
require_once './app/helpers/auth_Helper.php';

class ProductController {
    private $productModel;
    private $productView;
    private $brandModel;
    private $authHelper;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->productView = new ProductView();
        $this->brandModel = new BrandModel();
        $this->authHelper = new AuthHelper();

    }

    function showProducts () {
        session_start();
        $products = $this->productModel->getAllProducts();
        $brands = $this->brandModel->getAllBrands();
        $this->productView->showProducts($products, $brands);  
    }

    function showDetail($id) {
        session_start();
        $product = $this->productModel->getProduct($id);
        $this->productView->showProduct($product);
    }

    function filterBy() {
        session_start();
        $brand = $_POST['brand'];
        $products = $this->productModel->getProductsFilterBy($brand);
        $brands = $this->brandModel->getAllBrands();
        $this->productView->showProductsOfBrand($products, $brands);
    }

    function showProductForm(){
        $this->authHelper->checkLoggedIn();
        $brands = $this->brandModel->getAllBrands();
        $this->productView->showProductForm($brands);
    }

    function addProduct() {
        $this->authHelper->checkLoggedIn();
        $animal = $_POST['animal'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $productWeight = $_POST['productWeight'];
        $animalAge = $_POST['animalAge'];
        $animalSize = $_POST['animalSize'];

        if($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png"){
            $this->productModel->insertProduct($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $_FILES['image']['tmp_name']);
        }
        else {
            $this->productModel->insertProduct($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize);
        }

        header("Location: " . BASE_URL);
    }

    function loadProdForm($id) {
        $this->authHelper->checkLoggedIn();
        $product = $this->productModel->getProduct($id);
        $brands = $this->brandModel->getAllBrands();
        $this->productView->loadForm($product, $brands);
    }

    function updateProduct($id) {
        $this->authHelper->checkLoggedIn();
        $animal = $_POST['animal'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $productWeight = $_POST['productWeight'];
        $animalAge = $_POST['animalAge'];
        $animalSize = $_POST['animalSize'];

        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" ){
            $this->deleteImg($id);
            $this->productModel->updateProduct($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $_FILES['image']['tmp_name'], $id);
        }
        else{
            $this->productModel->updateProduct2($animal, $name, $brand, $price, $productWeight, $animalAge, $animalSize, $id);
        }

        header("Location: " . BASE_URL);
    }

    function deleteProduct($id) {
        $this->authHelper->checkLoggedIn();
        $this->deleteImg($id);
        $this->productModel->deleteProduct($id);
        
        header("Location: " . BASE_URL);  
    }

    function deleteImg ($id){
        $this->authHelper->checkLoggedIn();
        $product = $this->productModel->getProduct($id);
        unlink($product->image);
    }















}