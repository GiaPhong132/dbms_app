<?php
require_once('/xampp/htdocs/dbms_app/controllers/main/base_controller.php');
require_once('/xampp/htdocs/dbms_app/models/product.php');

class CartController  extends BaseController
{
    function __construct()
    {
        $this->folder = 'cart';
    }

    public function index()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $email = $_SESSION['guest'];
        if (isset($_GET['msg']))
            $message = "Bạn phải chọn ít nhất 1 sản phẩm";
        $result = Product::getProduct($email);
        $data = array('result' => $result, 'message' => @$message);
        $this->render('index', $data);
    }

    public function delete()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $email = $_SESSION['guest'];
        $id = $_GET['idDel'];
        Product::deleteFromCart($email, $id);

        header('Location: index.php?page=main&controller=cart&action=index');
    }
}
