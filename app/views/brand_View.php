<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class BrandView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function showBrands($brands) {
        $this->smarty->assign('brands', $brands);
        $this->smarty->display('brandList.tpl');
    }

    function loadForm($brand) {
        $this->smarty->assign('brand', $brand);
        
        $this->smarty->display('loadBrandForm.tpl');
    }
}