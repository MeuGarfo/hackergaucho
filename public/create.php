<?php
require 'inc/isDev.php';
if(!isDev()){
    die('erro 403');
}
?>
<!DOCTYPE html>
<head lang="pt-br">
<title>Criar post</title>
<?php require 'inc/header.php';?>
</head>
<body>
<div class="c">
<div class="r">
<div class="g2"><?php require 'inc/left.php';?></div>
<div class="g8">
<h1>Criar post</h1>
<p><a href="/?time=<?php print time()?>">Posts</a></p>
<?php
$title=@$_GET['title'];
$filename='../posts/'.$title;
if(file_exists($filename)){
    //ler
    $content=file_get_contents($filename);
}
if(isset($_GET['update'])){
    //atualizar ou criar
    $content=@$_GET['content'];
    file_put_contents($filename,$content);
}
?>
<form action="create.php" method="get" lang="pt-br">
<label>Titulo</label>
<input type="text" name="title" value="<?php print @$title;?>">
<label>Conteúdo</label>
<textarea name="content" rows="20" lang="pt-br"><?php print @$content;?></textarea>
<?php
if(strlen($title)>=1){
    file_put_contents($filename,$content);
    print '<button name="update" value="true" type="submit">Atualizar post</button>';
}else{
    print '<button name="update" value="true" type="submit">Criar post</button>';
}
?>
</form>
