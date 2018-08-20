<?php
function truyVanDl($query,$sql)
{
    
    $result=mysqli_query($query,$sql);
    return $result;
}