<?php
require_once('connection.php');
class Admin
{
    public $username;
    public $password;
    public $createAt;
    public $updateAt;

    public function __construct($username, $password, $createAt, $updateAt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
    }

    // static function insert($username, $password)
    // {
    //     // $password = password_hash($password, PASSWORD_DEFAULT);
    //     $password = password_hash($password, PASSWORD_DEFAULT);

    //     $db = DB::getInstance();
    //     $req = $db->query("INSERT INTO admin (username, password, createAt, updateAt) VALUES ('$username', '$password', NOW(), NOW());");
    //     return $req;
    // }

    // static function delete($username)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("DELETE FROM admin WHERE username = '$username';");
    //     return $req;
    // }

    // static function validation($username, $password)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM admin WHERE username = '$username'");
    //     if (@password_verify($password, $req->fetch_assoc()['password']))
    //         return true;
    //     else
    //         return false;
    // }

    // static function getAll()
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM user");
    //     $admins = [];
    //     foreach ($req->fetch_all(MYSQLI_ASSOC) as $admin) {
    //         $admins[] = new Admin(
    //             $admin['username'],
    //             $admin['password'],
    //             $admin['createAt'],
    //             $admin['updateAt']
    //         );
    //     }
    //     return $admins;
    // }
}
