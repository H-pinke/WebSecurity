<?php

$user = $_REQUEST['user'];
$password = $_REQUEST['password'];

class SQLiteDB extends SQLite3
{
    function __construct()
    {
        $this->open('phpdb.db');
    }
}
$db = new SQLiteDB();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Yes, Opened database successfully\n";
}

//$password = SQLite3::escapeString($password); //来转义对于 SQLite 来说比较特殊的输入字符
$sql ="SELECT * from USER where NAME = '$user' and PASSWORD = '$password' ";

var_dump($sql);
$ret = $db->query($sql);

if ($ret->fetchArray() == false) {
    echo "登入失败";
} else {
    echo "登入成功";
}

$db->close();