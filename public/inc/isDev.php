<?php
function isDev(){
    $end=@end(explode('.',$_SERVER['SERVER_NAME']));
    if($end==='local'){
        return true;
    }else{
        error_reporting(0);
        return false;
    }
}
