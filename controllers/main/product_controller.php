<?php
require_once('/xampp/htdocs/dbms_app/controllers/main/base_controller.php');
require_once('/xampp/htdocs/dbms_app/models/product.php');
require_once('/xampp/htdocs/dbms_app/models/shop.php');

class ProductController  extends BaseController
{
    function __construct()
    {
        $this->folder = 'services';
    }

    public function index()
    {
        $signal = "noFilter";
        session_start();
        if (!isset($_SESSION['num_rows'])) {
            $num_rows = Product::getRowNumAll();
            $_SESSION['num_rows'] = $num_rows;
            $currPage  = 1;
        }
        if (!isset($_GET['currPage'])) $currPage = 1;
        else $currPage = (int) ($_GET['currPage']);
        $offset = $currPage > 1 ? (($currPage - 1) * 20 - 1) : 0;
        $limit = 20;
        $products = Product::getLimit($limit, $offset);
        if (isset($_GET['msg']))
            $message = "Đặt hàng thành công";
        $data = array('result' => $products, 'currPage' => $currPage, 'signal' => $signal, 'message' => @$message);
        $this->render('index', $data);
    }

    public function search()
    {
        if (!isset($_GET['currPage'])) $currPage = 1;
        else $currPage = (int) ($_GET['currPage']);

        $offset = $currPage > 1 ? (($currPage - 1) * 20 - 1) : 0;
        $limit = 20;
        $key = $_POST['searchKey'];
        $result = Product::search($key, $offset, $limit);
        $data = array('result' => $result, 'currPage' => $currPage);
        $this->render('index', $data);
    }

    public function getDetail()
    {
        $key = $_GET['productKey'];
        $product = Product::get($key);
        $shop  = Shop::get($product->shop_id);

        $data = array('product' => $product, 'shop' => $shop);
        $this->render('detail', $data);
    }

    public function addToCart()
    {
        $key = $_GET['productKey'];

        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        if (!isset($_SESSION['guest'])) {
            // session_start();
            $_SESSION['oldHeader'] = "index.php?page=main&controller=product&action=getDetail&productKey=$key";
            header('Location: index.php?page=main&controller=login&action=index');
        }

        $email = $_SESSION['guest'];
        $key = $_GET['productKey'];

        $result = Product::isHave($email, $key);
        if ($result)
            Product::updateCart($email, $key);
        else
            Product::insertCart($email, $key, 1);

        $product = Product::get($key);
        $message = "Sản phẩm đã được thêm vào Giỏ hàng";
        $key = $_GET['productKey'];
        $product = Product::get($key);
        $shop  = Shop::get($product->shop_id);
        $data = array('product' => $product, 'message' => $message, 'shop' => $shop);
        $this->render('detail', $data);
    }

    public function getPay()
    {
        if (!isset($_POST['key']))
            header('Location: index.php?page=main&controller=cart&action=index&msg=check');

        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $email = $_SESSION['guest'];
        $temp = Product::getProductPay($email);
        $result = $temp["result"];
        $totalPrice = $temp["totalPrice"];
        $data = array('productCheck' => $result, 'totalPrice' => $totalPrice);
        $this->render('payment', $data);
    }

    public function buyNow()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $product_id = $_GET['productKey'];
        $result = Product::get($product_id);
        $totalPrice =  $result->newPrice;
        $signal = "buyNow";
        $data = array('productCheck' => $result, 'totalPrice' => $totalPrice, 'signal' => $signal);
        $this->render('payment', $data);
    }

    public function pay()
    {

        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        $email = $_SESSION['guest'];
        Product::getPay($email);
    }

    public function getFilter()
    {
        $currPage = 1;
        $limit = 20;
        if (isset($_POST['getLatest'])) {
            $orderBy = "dateAdd";
            $result = Product::getLatest($orderBy, $limit);
            $signal = "getLatest";
            $data = array('result' => $result, 'currPage' => $currPage, 'signal' => $signal);
            $this->render('index', $data);
        } elseif (isset($_POST['getPopular'])) {
            $orderBy = "reviews";
            $result = Product::getLatest($orderBy, $limit);
            $signal = "getPopular";
            $data = array('result' => $result, 'currPage' => $currPage, 'signal' => $signal);
            $this->render('index', $data);
        } elseif (isset($_POST['getMost'])) {
            $orderBy = "sold, reviews";
            $result = Product::getLatest($orderBy, $limit);
            $signal = "getMost";
            $data = array('result' => $result, 'currPage' => $currPage, 'signal' => $signal);
            $this->render('index', $data);
        } elseif (isset($_POST['descending'])) {
            $orderBy = "newPrice desc";
            $result = Product::getLatest($orderBy, $limit);
            $signal = "descending";
            $data = array('result' => $result, 'currPage' => $currPage, 'signal' => $signal);
            $this->render('index', $data);
        } elseif (isset($_POST['ascending'])) {
            $orderBy = "newPrice asc";
            $result = Product::getLatest($orderBy, $limit);
            $signal = "ascending";
            $data = array('result' => $result, 'currPage' => $currPage, 'signal' => $signal);
            $this->render('index', $data);
        }
    }
}
