<?php
require_once './app/controllers/auth_Controller.php';
require_once './app/controllers/brand_Controller.php';
require_once './app/controllers/product_Controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'productList';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    //cases auth.
    case 'login':
        $AuthController = new AuthController();
        $AuthController->showFormLogin();
        break;
    
    case 'validate':
        $AuthController = new AuthController();
        $AuthController->validateUser();
        break;
    
    case 'logout':
        $AuthController = new AuthController();
        $AuthController->logout();
    
    //cases product.
    case 'productList':
        $ProductController = new ProductController();
        $ProductController->showProducts();
        break;

    case 'detail':
        $ProductController = new ProductController();
        $id = $params[1];
        $ProductController->showDetail($id);
        break;

    case 'filterBy':
        $ProductController = new ProductController();
        $ProductController->filterBy();
        break;
    
    case 'productForm':
        $ProductController = new ProductController();
        $ProductController->showProductForm();
        break;
        
    case 'addProduct':
        $ProductController = new ProductController();
        $ProductController->addProduct();
        break;

    case 'deleteProduct':
        $ProductController = new ProductController();
        $id = $params[1];
        $ProductController->deleteProduct($id);
        break;

    case 'loadForm':
        $ProductController = new ProductController();
        $id = $params[1];
        $ProductController->loadProdForm($id);
        break;

    case 'updateProduct':
        $ProductController = new ProductController();
        $id = $params[1];
        $ProductController->updateProduct($id);
        break;
    
    //cases brands.
    case 'brandList':
        $BrandController = new BrandController();
        $BrandController->showBrands();
        break;

    case 'addBrand':
        $BrandController = new BrandController();
        $BrandController->addBrand();
        break; 
    
    case'loadBrandForm':
        $BrandController = new BrandController();
        $brand = $params[1];
        $BrandController->loadBrandForm($brand);
        break;

    case 'updateBrand':
        $BrandController = new BrandController();
        $brand_id = $params[1];
        $BrandController->updateBrand($brand_id);
        break;
    
    case'deleteBrand':
        $BrandController = new BrandController();
        $brand_id = $params[1];
        $BrandController->deleteBrand($brand_id);
        break;
    
    default:
        echo('404 Page not found');
        break;

}
