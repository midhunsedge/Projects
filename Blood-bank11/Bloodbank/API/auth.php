<?php 
ob_start();
include "connect.php";
include "action.php";
header('Content-Type: application/json; charset=utf-8');
$SERVER_RESPONSE =   "" ;
if(isset($_REQUEST["action"]))
{
    switch($_REQUEST["action"]){
        case "login":
            $SERVER_RESPONSE = login($_REQUEST["t1"],$_REQUEST["t2"]);
            break;
        case "registration":
            $SERVER_RESPONSE = userRegistration($_REQUEST["t1"],$_REQUEST["t11"],$_REQUEST["t3"],$_REQUEST["t6"],$_REQUEST["t7"],$_REQUEST["t2"],$_REQUEST["t9"],$_REQUEST["t8"],$_REQUEST["t10"],$_REQUEST["t4"],$_REQUEST["t5"]);
            break;
        case "profile":
            $SERVER_RESPONSE = userProfile($_REQUEST["t1"]);
            break;
        case "editProfile":
            $SERVER_RESPONSE = editProfile($_REQUEST["t1"],$_REQUEST["t2"],$_REQUEST["t3"],$_REQUEST["t4"],$_REQUEST["t5"],$_REQUEST["t6"],$_REQUEST["t7"],$_REQUEST["t8"]);
            break;
        case "privacy":
            $SERVER_RESPONSE = privacy($_REQUEST["t1"],$_REQUEST["t2"],$_REQUEST["t3"]);
            break;
        case "bloodRequest":
            $SERVER_RESPONSE = bloodRequest($_REQUEST["t1"],$_REQUEST["t2"],$_REQUEST["t3"],$_REQUEST["t4"],$_REQUEST["t5"],$_REQUEST["t6"],$_REQUEST["t7"],$_REQUEST["t8"]);
            break;
        case "bloodRequestHistory":
            $SERVER_RESPONSE = bloodRequestList($_REQUEST["t1"]);
            break;
        case "bloodRequestDelete":
            $SERVER_RESPONSE = bloodRequestDelete($_REQUEST["t1"]);
            break;
        case "bloodRequestCancel":
            $SERVER_RESPONSE = bloodRequestCancel($_REQUEST["t1"]);
            break;
        case "bloodBankList":
            $SERVER_RESPONSE = bloodBankList();
            break;
        case "donerRequestList":
            $SERVER_RESPONSE = bloodDonerRequestList();
            break;
        case "donerRequestAccept":
            $SERVER_RESPONSE = bloodDonerRequestAccept($_REQUEST["t1"],$_REQUEST["t2"]);
            break;
        case "donerRequestCancel":
            $SERVER_RESPONSE = bloodDonerRequestCancel($_REQUEST["t1"]);
            break;
        case "donerRequestHistory":
            $SERVER_RESPONSE = donerRequestHistory($_REQUEST["t1"]);
            break;
        case "complaint":
            $SERVER_RESPONSE = complaints($_REQUEST["t1"],$_REQUEST["t2"],$_REQUEST["t3"]); 
            break;
        case "complaintList":
            $SERVER_RESPONSE = complaintsList($_REQUEST["t1"]);
            break;
        default :
        $SERVER_RESPONSE = [["result"=>"Action Not recognised"]];
    }
}else{
    $SERVER_RESPONSE = [["result"=>"Action Not recognised"]];
}

echo json_encode($SERVER_RESPONSE);


?>