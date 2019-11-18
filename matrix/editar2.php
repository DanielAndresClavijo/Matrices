<?php
session_start();
        $ejesYX = unserialize($_SESSION["matriz"]);
        $cantR1 = $_SESSION["cantR1"];//Cantidad de elementos del vector matriz
        $i = $_POST['i'];
        $j = $_POST['j'];
        $valor = $_POST['valor'];
        if($valor==1){
            $ejesYX[$i][$j] = 0;
        }else{
            $ejesYX[$i][$j] = 1;
        }
        
        /*session is started if you don't write this line can't use $_Session  global variable*/
        $_SESSION["matriz"]=serialize($ejesYX);

