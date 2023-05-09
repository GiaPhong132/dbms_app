<?php
require_once('/xampp/htdocs/dbms_app/controllers/main/base_controller.php');

class AboutController extends BaseController
{
    function __construct()
    {
        $this->folder = 'about';
    }

    public function index()
    {
        $this->render('index');
    }
}
