<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProductView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    //LISTA DE PRODUCTOS
    function showProducts($products, $brands) {
        $this->smarty->assign('products', $products);
        $this->smarty->assign('brands', $brands);

        $this->smarty->display('productList.tpl');
    }

    //PRODUCTO EN DETALLE
    function showProduct($product) {
        $this->smarty->assign('product', $product);
        $this->smarty->display('productDetail.tpl');
    }

    //FILTRO POR MARCA
    function showProductsOfBrand($products, $brands) { 
        $this->smarty->assign('products', $products);
        $this->smarty->assign('brands', $brands);

        $this->smarty->display('productList.tpl');
    }
    
    function showProductForm($brands) {
        $this->smarty->assign('brands', $brands);

        $this->smarty->display('productForm.tpl');
    }

    //VISTA ADMIN FORMULARIO PARA EDICION DE PRODUCTO
    function loadForm($product, $brands) {
        $this->smarty->assign('product', $product);
        $this->smarty->assign('brands', $brands);
        
        $this->smarty->display('loadForm.tpl');
    }
}