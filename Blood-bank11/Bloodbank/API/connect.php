<?php

define("CON",mysqli_connect("localhost","root","","blood_bank"));

function executeQuery($query)
{
    return mysqli_query(CON,$query);
}
function getLastId(){
    return mysqli_insert_id(CON);
}
function fetchQuery($resourse){
    return mysqli_fetch_array($resourse);
}



?>