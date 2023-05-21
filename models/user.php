<?php
require_once('connection.php');
class User
{
    public $email;
    public $profile_photo;
    public $fname;
    public $lname;
    public $gender;
    public $phone;
    public $createAt;
    public $updateAt;
    public $address;
    public $birthday;
    public $password;

    public function __construct($email, $profile_photo, $fname, $lname, $gender, $phone, $createAt, $updateAt, $address, $birthday, $password)
    {
        $this->email = $email;
        $this->profile_photo = $profile_photo;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->address = $address;
        $this->birthday = $birthday;
        $this->password = $password;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT *
            FROM user;"
        );
        $users = [];
        foreach ($req as $user) {
            $users[] = new User(
                $user['email'],
                $user['profile_photo'],
                $user['fname'],
                $user['lname'],
                $user['gender'],
                $user['phone'],
                $user['createAt'],
                $user['updateAt'],
                $user['address'],
                $user['birthday'],
                '' // Do not return password
            );
        }
        return $users;
    }

    static function get($email)
    {
        $db = DB::getInstance();
        $query = "
            SELECT email, profile_photo, fname, lname, gender, phone, createAt, updateAt,address,birthday
            FROM user
            WHERE email = '$email'
            ;";
        $result = $db->querySingle($query, true);
        $user = new User(
            $result['email'],
            $result['profile_photo'],
            $result['fname'],
            $result['lname'],
            $result['gender'],
            $result['phone'],
            $result['createAt'],
            $result['updateAt'],
            $result['address'],
            $result['birthday'],
            '' // Do not return password
        );
        return $user;
    }
    static function insert($email, $profile_photo, $fname, $lname, $gender, $phone, $password)
    {
        $db = DB::getInstance();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO USER (email, profile_photo, fname, lname, gender,  phone, createAt, updateAt, password) VALUES ('$email', '$profile_photo', '$fname', '$lname', $gender, '$phone', date('now'), date('now'), '$password')";
        $res = $db->query($query);
        return $res;
    }

    static function delete($email, $createAt)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM user WHERE email = '$email' AND createAt = '$createAt';");
        return $req;
    }


    static function update($email, $profile_photo, $fname, $lname, $gender, $phone, $birthday)
    {
        $db = DB::getInstance();
        $query =    "
            UPDATE user
            SET birthday='$birthday' ,profile_photo = '$profile_photo', fname = '$fname', lname = '$lname', gender= '$gender', phone = '$phone', updateAt = datetime('now')
            WHERE email = '$email'
            ;";
        $req = $db->query($query);
        return $req;
    }

    static function updateAddress($email, $phone, $address)
    {
        $db = DB::getInstance();
        $query = "Update user set address='$address', phone='$phone' where email='$email';";
        $res = $db->query($query);
        if ($res)
            return true;
        else
            return false;
    }


    static function validation($email, $password)
    {
        $db = DB::getInstance();
        $res = $db->querySingle("SELECT * FROM user WHERE email = '$email'", true);
        $check = password_verify($password, $res['password']);
        if ($check)
            return true;
        else
            return false;
    }
}
