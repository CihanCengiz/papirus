<?php
// Initialize Papirus System
require_once dirname(__FILE__) . "/library/bootstrap.php";


/* ======= Content Module Test ======= */
require_once dirname(__FILE__) . "/module/Content/class.content.php";

// Render Content Test Module
$module_content = new Module_Content($papirus);
print $module_content -> render();


/* ======= Database Layer Test ======= */
$papirus -> db -> pdo -> connect();
var_dump($papirus -> db -> pdo -> fetchAll("SELECT * FROM test"));
var_dump($papirus -> db -> pdo -> execute("INSERT INTO test(test_value) VALUES(". rand(100, 999) .")"));
