<?php

$db = new SQLite3('dbms_app.db');
$result = $db->query("SELECT * FROM users");
$rows = count($result);
echo "Number of rows: $rows";
