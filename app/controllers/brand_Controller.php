<?php
require_once './app/models/brand_Model.php';
require_once './app/views/brand_View.php';
require_once './app/models/product_Model.php';
require_once './app/helpers/auth_Helper.php';

class BrandController {
    private $brandModel;
    private $brandView;
    private $productModel;
    private $authHelper;

    public function __construct () {
        $this->brandModel = new BrandModel();
        $this->brandView = new BrandView();
        $this->productModel = new ProductModel();
        $this->authHelper = new AuthHelper();

    }

    function showBrands() {
        session_start();
        $brands = $this->brandModel->getAllBrands();
        $this->brandView->showBrands($brands);
    }

    function addBrand () {
        $this->authHelper->checkLoggedIn();
        $brand = $_POST['brand'];
        $contact = $_POST['contact'];
        $origin = $_POST['origin'];
        
        $id = $this->brandModel->insertBrand($brand, $contact, $origin);

        header("Location: " . 'brandList');
    }

    function loadBrandForm($brand) {
        $this->authHelper->checkLoggedIn();
        $brand = $this->brandModel->getBrand($brand);
        $this->brandView->loadForm($brand);
    }

    function updateBrand($brand_id) {
        $this->authHelper->checkLoggedIn();
        $brand = $_POST['brand'];
        $contact = $_POST['contact'];
        $origin = $_POST['origin'];
        
        $this->brandModel->updateBrand($brand, $contact, $origin, $brand_id);

        header("Location: " . BASE_URL .'brandList');
    }

    function deleteBrand($brand_id) {
        $this->authHelper->checkLoggedIn();
        $this->brandModel->deleteBrand($brand_id);
        
        header("Location: " . BASE_URL .'brandList'); 
    }

    
}