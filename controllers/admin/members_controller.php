<?php
require_once('/xampp/htdocs/dbms_app/controllers/admin/base_controller.php');
require_once('/xampp/htdocs/dbms_app/models/user.php');

class MembersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'members';
    }

    public function index()
    {
        $x = User::getAll();
        $data = array('members' => $x);
        $this->render('index', $data);
    }

    public function addUser()
    {
        $page_number = $_GET['pg'];

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        User::insert($email, 'public/images/user/defau.png', $fname, $lname, $gender, $age, $phone, $password);

        $tmp = "Location: index.php?page=admin&controller=paginateuser&action=index&pg=$page_number";
        header($tmp);
        // header('Location: index.php?page=admin&controller=members&action=index');
    }
    public function getAll()
    {
        $data = User::getAll();
        return $data;
    }

    public function edit()
    {
        session_start();
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        $page_number = $_GET['pg'];


        $data = User::get($email);

        User::update($email, $data->profile_photo, $fname, $lname, $gender, $age, $phone);
        $tmp = "Location: index.php?page=admin&controller=paginateuser&action=index&pg=$page_number";
        header($tmp);
    }
}
