<?php
//创建准备用的数据库 插入一些数据
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
// 先删除后创建表
$sql = "DROP table user";
$ret = $db->exec($sql);

$sql =<<<EOF
      CREATE TABLE user
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      PASSWORD       CHAR(50)     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lastErrorMsg();
} else {
    echo "Yes, Table created successfully<br/>\n";
}



$sql =<<<EOF
      INSERT INTO user (ID,NAME,PASSWORD,ADDRESS,SALARY)
      VALUES (1, 'Maxsu', '123456', 'Haikou', 20000.00 );

      INSERT INTO user (ID,NAME,PASSWORD,ADDRESS,SALARY)
      VALUES (2, 'Allen', '123', 'Guangzhou', 15000.00 );

      INSERT INTO user (ID,NAME,PASSWORD,ADDRESS,SALARY)
      VALUES (3, 'Tenny', '456', 'Shanghai', 20000.00 );

      INSERT INTO user (ID,NAME,PASSWORD,ADDRESS,SALARY)
      VALUES (4, 'Weiwang', '567', 'Beijing ', 65000.00 );
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lastErrorMsg();
} else {
    echo "Yes, Some Records has Inserted successfully<br/>\n";
}



$db->close();