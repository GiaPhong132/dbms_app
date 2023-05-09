<?php
require_once('connection.php');
class Shop
{
    public $code;
    public $name;
    public $response_rating;
    public $followers;
    public $found;
    public $reviews;


    // name,oldPrice,newPrice,sold,origin,saleOff

    public function __construct($code, $name, $response_rating, $followers, $found, $reviews)
    {
        $this->code = $code;
        $this->name = $name;
        $this->response_rating = $response_rating;
        $this->followers = $followers;
        $this->found = $found;
        $this->reviews = $reviews;
    }

    static function get($code)
    {
        $db = DB::getInstance();
        $result = $db->querySingle("SELECT * FROM shop WHERE code = $code", true);
        $shop = new Shop(
            $result['code'],
            $result['name'],
            $result['response_rating'],
            $result['followers'],
            $result['found'],
            $result['reviews']


        );
        return $shop;
    }
}
