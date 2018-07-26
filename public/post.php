<?php
$title=@$_GET['title'];
$filename='../posts/'.$title;
if(file_exists($filename)){
    $content=file_get_contents($filename);
}else{
    $title='Erro 404';
    $content='Página não encontrada';
}
$ucTitle=ucfirst($title);
$content=text2link($content);
$content=explode(PHP_EOL,$content);
$data='<small>'.trim($content[0]).'</small><br><br>';
unset($content[0]);
$content=implode(PHP_EOL,$content);
//$content=preg_replace("/[\r\n]+/", "\n", $content);
$content=trim($content);
?>
<!DOCTYPE html>
<head lang="pt-br">
<title><?php print $ucTitle;?></title>
<?php require 'inc/header.php';?>
</head>
<body>
<div class="c">
<div class="r">
<div class="g2"><?php require 'inc/left.php';?></div>
<div class="g8">
<h1><?php print $ucTitle;?></h1>
<?php print $data;?>
<?php print nl2br($content);?>
<br><br><p>
<a href="index.php?time=<?php print time();?>">Posts</a>
<?php
require 'inc/isDev.php';
if($title<>'Erro 404' && isDev()){
?>
| <a href="create.php?title=<?php print urlencode($title);?>">Editar post</a>
| <a href="delete.php?title=<?php print urlencode($title);?>">Apagar post</a>
<?php
}
function text2link($str) {    
    return preg_replace('/(https?):\/\/([A-Za-z0-9\._\-\/\?=&;%,]+)/i', '<a href="$1://$2" target="_blank">$1://$2</a>', $str);
}
?>
</p>
</div><!--g8-->
</div><!--r-->
</div><!--c-->
