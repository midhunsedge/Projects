<?php

function login($userName, $password) {
    $sql = "select * from tbl_login where username ='".$userName."' and password='".$password."' and role='2'";
    $result = executeQuery($sql);
    $out = "";
    if ($data = fetchQuery($result)){
        $userLogId = $data[0];
        
        $userSql = "select * from tbl_user_register where user_id='".$userLogId."'";
        $userResult = executeQuery($userSql);
        if ($userData = fetchQuery($userResult)){
            $out = "ok:".$data[0].":user:".$userData[2]." ".$userData[3].":".$userData[5];
        } else {
            $out = "Invalided username or password";
        }
        

    } else {
        $out="Invalided username or password";
    }
    return [["result"=>$out]];
}
function userRegistration($firstName,$lastName,$address,$bloodGroup,$age,$mobile,$email,$gender,$district,$userName,$password){
    $loginSql="insert into tbl_login values('','$userName','$password','2')";
    $out = "";
    if(executeQuery($loginSql)){
        $logId=getLastId();
        $userSql = "insert into tbl_user_register values ('','$logId','$firstName','$lastName','$address','$bloodGroup','$age','$mobile','$email','$gender','user','$district',0)";
        
        if(executeQuery($userSql)){
            $out = "ok:Successfully Registed";
        } else {
            $loginDeleteSql = "delete from tbl_login where id = '$logId' "; 
            executeQuery($loginDeleteSql);
            $out = "Sorry Failed to register";
        }
    
    } else {
        $out = "Sorry Failed to register";
    }
    return [["result"=>$out]];
}

function userProfile($logId){
    $userSql="select * from tbl_user_register where user_id = '$logId'";
    $userdata=executeQuery($userSql);
    return [fetchQuery($userdata)];
}

function editProfile($firstName,$lastName,$address,$age,$mobile,$email,$gender,$logId){
    $userSql = "update tbl_user_register set f_name = '$firstName' , l_name = '$lastName' , address = '$address' , age = '$age' , ph = '$mobile' , email = '$email', gender = '$gender' where user_id = $logId ";
    if(executeQuery($userSql)){
        $out = "ok:Successfully updated";
    } else {
        $out = "Sorry Failed to update";
    }
    return [["result"=>$out]];
}

function privacy($logId,$oldPassword,$newPassword){
    $privcySql = "select * from tbl_login where id = $logId and password = '$oldPassword' ";
    $logData = executeQuery($privcySql);
    if($data = fetchQuery($logData)){
        $updateSql = "Update tbl_login set password = '$newPassword' where id = $logId ";
        if(executeQuery($updateSql))
        {
            $out = "ok:Successfully updated";
        }else{
            $out = "Sorry failed to update";
        }
    } else {
        $out = "Sorry failed to update";
    }
    return [["result"=>$out]];
}

function complaints($subject,$message,$userId){

    $complaintSql = "insert into tbl_complaints values('','$userId','$subject','$message','Not Yet Seen')";
    $out="";
    if(executeQuery($complaintSql)){
        $out = "ok :  Succcessfully send";
    }else { 
        $out = "Sorry Failed to Update";
    }
    return [["result"=>$out]];
}

function complaintsList($userId){
    $complaintSql= "select * from tbl_complaints where logid= $userId order by comp_id desc";
    $userData=executeQuery($complaintSql);
    $returnData= array();
    while($row = fetchQuery($userData)){
        $returnData[]=$row;
    }
    return $returnData;
}

function bloodRequest($userId,$bloodType,$bloodSection,$unit,$requestDate,$hospital,$patient,$bank){
    $bloodSql = "insert into tbl_blood_request values('','$bloodType','$requestDate','$bloodSection','$unit','$userId','$hospital','$patient','1','$bank')";
    $out="";
    if(executeQuery($bloodSql)){
        $out = "ok :  Succcessfully updated";
    }else { 
        $out = "Sorry Failed to Update";
    }
    return [["result"=>$out]];
}

function bloodRequestList($userId) {
    $bloodSql = "select * from tbl_blood_request where logid = $userId";
    $bloodData=executeQuery($bloodSql);
    $returnData= array();
    while($row = fetchQuery($bloodData)){
        $returnData[]=$row;
    }
    return $returnData;
}

function bloodRequestDelete($userId){
    $bloodSql = "Delete from tbl_blood_request where logid = $userId";
    $out="";
    if(executeQuery($bloodSql)){
        $out = "ok :  Succcessfully Delete";
    }else { 
        $out = "Sorry Failed to Delete";
    }
    return [["result"=>$out]];
}

function bloodRequestCancel($userId){
    $bloodSql = "update tbl_blood_request set status = '4' where logid = $userId";
    $out="";
    if(executeQuery($bloodSql)){
        $out = "ok :  Succcessfully canceled";
    }else { 
        $out = "Sorry Failed to cancel";
    }
    return [["result"=>$out]];
}

function bloodBankList() {
    $bloodSql = "select * from blood_bank";
    $bloodData=executeQuery($bloodSql);
    $returnData= array();
    while($row = fetchQuery($bloodData)){
        $returnData[]=$row;
    }
    return $returnData;
}

function bloodDonerRequestList() {
    $bloodSql = "select * from request_donation where status = 0";
    $bloodData=executeQuery($bloodSql);
    $returnData= array();
    while($row = fetchQuery($bloodData)){
        $returnData[]=$row;
    }
    return $returnData;
}

function bloodDonerRequestAccept($userId,$requestId){
    $acceptSql="insert into donar_accept values('','$requestId','$userId',2,'')";
    $out="";
    if(executeQuery($acceptSql)){
        $out = "ok :  Succcessfully Accepted";
    }else { 
        $out = "Sorry Failed to Accept";
    }
    return [["result"=>$out]];
}
function donerRequestHistory($userId){
    $bloodSql = "select * from donar_accept where logid = $userId";
    $bloodData=executeQuery($bloodSql);
    $returnData= array();
    while($row = fetchQuery($bloodData)){
        $returnData[]=$row;
    }
    return $returnData;
}
function bloodDonerRequestCancel($acceptId){
    $acceptSql = "Delete from donar_accept where d_request_id = $acceptId";
    $out="";
    if(executeQuery($acceptSql)){
        $out = "ok :  Succcessfully Delete";
    }else { 
        $out = "Sorry Failed to Delete";
    }
    return [["result"=>$out]];
}

?>