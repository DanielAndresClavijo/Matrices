<?php

session_start();
    $ejesYX = unserialize($_SESSION["matriz"]);
    $cantR1 = $_SESSION["cantR1"];
    $contFun = 0;
    $contFunAux = 0;
    $contSob = 0;
    $contSobAux = 0;
    $contIn = 0;
    $contInAux = 0;
    $switchSobre=false;
    $switchIn=false;
//Funcion
for($i=1;$i<=$cantR1;$i++){
    $contFun=0;
    $contSob=0;
    $contIn=0;
    for($j=1;$j<=$cantR1;$j++){
        if($ejesYX[$i][$j] == 1){//Funcion
            $contFun++;
        }
        if($ejesYX[$j][$i]>= 1){//Sobreyectiva
            $contSob++;
        }
        if($ejesYX[$j][$i]== 1){//Inyectiva
            $contIn++;
        }
    }
    if($contFun==1){
        $contFunAux++;	
    }	
    if($contSob>=1){
        $contSobAux++;
    }
    if($contIn<=1){
        $contInAux++;
    }
}

if($contFunAux==$cantR1){
    echo '<h3 style=" text-align: center;">******LA MATRIZ ES UNA FUNCI&Oacute;N******</h3>';	
}else{
    echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES UNA FUNCI&Oacute;N******</h3>';
}
if($contSobAux==$cantR1){
    $switchSobre=TRUE;
    echo '<h3 style=" text-align: center;">******LA MATRIZ ES UNA FUNCI&Oacute;N SOBREYECTIVA******</h3>';	
}else{
    $switchSobre=FALSE;
    echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES UNA FUNCI&Oacute;N SOBREYECTIVA******</h3>';
}
if($contInAux==$cantR1){
    $switchIn=TRUE;
    echo '<h3 style=" text-align: center;">******LA MATRIZ ES UNA FUNCI&Oacute;N INYECTIVA******</h3>';	
}else{
    $switchIn=FALSE;
    echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES UNA FUNCI&Oacute;N INYECTIVA******</h3>';
}
if($switchIn==TRUE && $switchSobre==TRUE){
    echo '<h3 style=" text-align: center;">******LA MATRIZ ES UNA FUNCI&Oacute;N BIYECTIVA******</h3>';	
}else{
    echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES UNA FUNCI&Oacute;N BIYECTIVA******</h3>';
}



