<?php
require 'inc/isDev.php';
if(!isDev()){
    die('erro 403');
}
$filename="../posts/".@$_GET['title'];
unlink($filename);
header('Location: /?time='.time());
