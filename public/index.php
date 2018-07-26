<?php
//die(var_dump($_SERVER["REQUEST_URI"]));
?>
<!DOCTYPE html>
<head lang="pt-br">
<title>Posts</title>
<?php require 'inc/header.php';?>
</head>
<body>
<div class="c">
<div class="r">
<div class="g2"><?php require 'inc/left.php';?></div>
<div class="g8">
<h1>Posts</h1>
<?php
require 'inc/isDev.php';
if(isDev()){
    print '<p><a href="create.php">Criar post</a></p>';
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$posts=scandir('../posts');
foreach($posts as $postKey=>$postName){
    if($postName=='.' OR $postName=='..'){
        unset($posts[$postKey]);
    }
}
asort($posts);
if(count($posts)>=1){
    print '<script>';
    print 'document.write(\'<p><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar post"></p>\');';
    print '</script>';
    print '<ul class="lista" id="myUL">';
    foreach($posts as $postKey => $postValue){
        print '<li>';
        print '<a href="post.php?title='.urlencode($postValue).'">';
        print ucfirst($postValue);
        print '</a>';
        print '</li>';
    }
    print '</ul>';
}else{
    print '<p>Nenhum post encontrado</p>';
}
?>
<script>
function myFunction() {
    //https://www.w3schools.com/howto/howto_js_filter_lists.asp
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
</div><!--g8-->
</div><!--r-->
</div><!--c-->
