<?php

use MongoDB\Driver\Query;

require_once('connection.php');
class Product
{
    public $id;
    public $name;
    public $oldPrice;
    public $newPrice;
    public $sold;
    public $origin;
    public $saleOff;
    public $rating;
    public $reviews;
    public $inStock;
    public $type;
    public $shop_id;
    public $dateAdd;

    // name,oldPrice,newPrice,sold,origin,saleOff

    public function __construct($id, $name, $oldPrice, $newPrice, $sold, $origin, $saleOff, $rating, $reviews, $inStock, $type, $shop_id, $dateAdd)
    {
        $this->id = $id;
        $this->name = $name;
        $this->oldPrice = $oldPrice;
        $this->newPrice = $newPrice;
        $this->sold = $sold;
        $this->origin = $origin;
        $this->saleOff = $saleOff;
        $this->rating = $rating;
        $this->reviews = $reviews;
        $this->inStock = $inStock;
        $this->type = $type;
        $this->shop_id = $shop_id;
        $this->dateAdd = $dateAdd;
    }


    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                @$product['id'],
                @$product['name'],
                @$product['oldPrice'],
                @$product['newPrice'],
                @$product['sold'],
                @$product['origin'],
                @$product['saleOff'],
                @$product['rating'],
                @$product['reviews'],
                @$product['inStock'],
                @$product['type'],
                @$product['shop_id'],
                @$product['dateAdd']


            );
        }
        return $products;
    }

    static function getLimit($limit, $offset)
    {
        $db = DB::getInstance();
        $query = "SELECT * FROM product limit $limit offset $offset";
        $result = $db->query($query);
        $products = [];
        while ($product = $result->fetchArray()) {
            $products[] = new Product(
                @$product['id'],
                @$product['name'],
                @$product['oldPrice'],
                @$product['newPrice'],
                @$product['sold'],
                @$product['origin'],
                @$product['saleOff'],
                @$product['rating'],
                @$product['reviews'],
                @$product['inStock'],
                @$product['type'],
                @$product['shop_id'],
                @$product['dateAdd']


            );
        }
        return $products;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $result = $db->querySingle("SELECT * FROM product WHERE id = $id", true);
        $product = new Product(
            $result['id'],
            $result['name'],
            $result['oldPrice'],
            $result['newPrice'],
            $result['sold'],
            $result['origin'],
            $result['saleOff'],
            $result['rating'],
            $result['reviews'],
            $result['inStock'],
            $result['type'],
            $result['shop_id'],
            $result['dateAdd']


        );
        return $product;
    }

    static function insert($name, $price, $description, $content, $img)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO product (name, price, description, content, img)
            VALUES ('$name', $price, '$description', '$content', '$img');"
        );
        return $req;
    }

    static function deleteFromCart($email, $id)
    {
        $db = DB::getInstance();
        $query = "Delete from cart where email='$email' and product_id = $id";
        $res = $db->query($query);
        return $res;
    }

    static function update($id, $name, $newPrice, $oldPrice, $reviews)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "  UPDATE product
                SET name = '$name', price = $newPrice, description = '$oldPrice', content = '$reviews'
                WHERE id = $id;"
        );
    }
    static function getRowNumAll()
    {
        $db = DB::getInstance();
        $res = $db->querySingle("SELECT COUNT(*) from product");
        return $res;
    }

    static function getLatest($orderBy, $limit)
    {
        $db = DB::getInstance();
        $query = "SELECT * FROM product order by $orderBy limit $limit";
        $res = $db->query($query);
        $products = [];
        while ($product = $res->fetchArray()) {
            $products[] = new Product(
                @$product['id'],
                @$product['name'],
                @$product['oldPrice'],
                @$product['newPrice'],
                @$product['sold'],
                @$product['origin'],
                @$product['saleOff'],
                @$product['rating'],
                @$product['reviews'],
                @$product['inStock'],
                @$product['type'],
                @$product['shop_id'],
                @$product['dateAdd']


            );
        }
        return $products;
    }

    static function isHave($email, $key)
    {
        $db = DB::getInstance();
        $query = "SELECT COUNT(*) FROM cart where email ='$email' and product_id = $key ";
        $num_rows = $db->querySingle($query);
        if ($num_rows) return true;
        else return false;
    }

    static function insertCart($email, $key, $amount)
    {
        $db = DB::getInstance();
        $query = "INSERT INTO cart values('$email', $key, $amount)";
    }

    static function updateCart($email, $key)
    {
        $db = DB::getInstance();
        $query = "UPDATE  cart set amount= amount + 1 where email ='$email' and product_id = $key ";
        $res = $db->querySingle($query);
        if ($res) return true;
        return false;
    }

    static function getProduct($email)
    {
        $db = DB::getInstance();
        $query = "select * from cart c join product p on c.product_id = p.id and email = '$email'";
        $result = $db->query($query);
        $products = [];
        while ($product = $result->fetchArray()) {
            array_unshift($products, $product);
        }
        return $products;
    }

    static function getProductPay($email)
    {
        $db = DB::getInstance();
        $totalPrice = 0;
        $productCheck = "select * from cart join product p on p.id = cart.product_id and email ='$email' and (id=";
        foreach (explode('&', file_get_contents('php://input')) as $keyValuePair) {
            list($key, $value) = explode('=', $keyValuePair);
            $productCheck .= $value . ' or id=';
            $query = "select * from cart join product p on p.id = cart.product_id and email ='$email' and id=$value";
            $result = $db->querySingle($query, true);
            $totalPrice += $result['amount'] * $result['newPrice'];
        }
        $productCheck = substr($productCheck, 0, strlen($productCheck) - 7);
        $productCheck .= ');';
        $result = $db->query($productCheck);

        return array("totalPrice" => $totalPrice, "result" => $result);
    }

    static function getPay($email)
    {
        $db = DB::getInstance();
        if (!isset($_SESSION['buyNow']))
            foreach (explode('&', file_get_contents('php://input')) as $keyValuePair) {
                list($key, $value) = explode('=', $keyValuePair);
                $query = "select amount from cart join product p on p.id = cart.product_id and email ='$email' and id=$value";
                $result = $db->query($query);
                $amount = $result['amount'];
                $currentDate  = date('Y-m-d h:i:s');
                $query = "insert into corder (email, product_id, amount, state, time) values ('$email', $value, $amount, 'Đang vận chuyển', '$currentDate');";
                $db->query($query);
                $query = "delete from cart where email='$email' and product_id=$value;";
                $db->query($query);
            }
        else {
            $_SESSION['buyNow'] = NULL;
            $currentDate  = date('Y-m-d h:i:s');
            $pid = $_SESSION['idBuyNow'];
            $query = "insert into corder (email, product_id, amount, state, time) values ('$email', $pid, 1, 'Đang vận chuyển', '$currentDate');";
            $db->query($query);
        }

        header('Location: index.php?page=main&controller=product&action=index&msg=successful');
    }

    static function search($key, $offset, $limit)
    {
        $db = DB::getInstance();
        $query = "SELECT * FROM product where name LIKE '%$key%'  limit $limit offset $offset;";
        $result = $db->query($query);
        $products = [];
        while ($product = $result->fetchArray()) {
            $products[] = new Product(
                @$product['id'],
                @$product['name'],
                @$product['oldPrice'],
                @$product['newPrice'],
                @$product['sold'],
                @$product['origin'],
                @$product['saleOff'],
                @$product['rating'],
                @$product['reviews'],
                @$product['inStock'],
                @$product['type'],
                @$product['shop_id'],
                @$product['dateAdd']


            );
        }
        return $products;
    }
}
