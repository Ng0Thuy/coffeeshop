<?php
// Cấu hình session để đảm bảo tính bền vững
ini_set('session.gc_maxlifetime', 7200); // Session lưu trong 2 giờ
ini_set('session.cookie_lifetime', 7200); // Cookie session lưu trong 2 giờ
session_start();

require_once "./mvc/Bridge.php";
$myApp = new App();
