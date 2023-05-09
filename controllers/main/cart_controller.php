<?php
require_once('/xampp/htdocs/dbms_app/controllers/main/base_controller.php');
// require_once('/xampp/htdocs/dbms_app/models/paginate.php');

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
        $conn = mysqli_connect('localhost', 'root', '123');

        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        } else {
            mysqli_select_db($conn, 'dbms_app');
        }
        $email = $_SESSION['guest'];

        if (isset($_GET['msg']))
            $message = "Bạn phải chọn ít nhất 1 sản phẩm";
        $getQuery = "select * from cart join product p on cart.product_id = p.id and email = '$email'";
        $result = mysqli_query($conn, $getQuery);

        $data = array('result' => $result, 'message' => @$message);
        $this->render('index', $data);
    }

    public function delete()
    {
        $idDel = $_GET['idDel'];
        $conn = mysqli_connect('localhost', 'root', '123');
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        } else {
            mysqli_select_db($conn, 'dbms_app');
        }
        $query = "Delete from cart where product_id = $idDel";
        mysqli_query($conn, $query);
        header('Location: index.php?page=main&controller=cart&action=index');
    }
}
