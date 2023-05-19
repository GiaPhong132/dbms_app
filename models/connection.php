<?php
// const PATH = "dbms_app.db";
class DB
{
    public static $instance = NULL;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new SQLite3("dbms_app.sqlite");
            if (!self::$instance) {
                echo "Cannot connect to database!";
                exit();
            }
        }

        return self::$instance;
    }
}
