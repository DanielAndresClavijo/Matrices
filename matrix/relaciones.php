<?php
session_start();
    $ejesYX = unserialize($_SESSION["matriz"]);
    $cantR1 = $_SESSION["cantR1"];
    $contAnt = 0;
    $contSim = 0;
    $contRef = 0;
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
                $R1[$i][$j]=$ejesYX[$j][$i];	
        }
    }
    //El siguiente for es para contar las diagonales de la matriz que sean iguales
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
            if($i!=$j){
                if($ejesYX[$i][$j]==1 && $ejesYX[$j][$i]==1){//Antisimetrica
                    $contAnt=1;                    
                }
                if($ejesYX[$i][$j]==0 && $ejesYX[$j][$i]==1){//Simetrica
                    $contSim=1;
                }else{
                    if($ejesYX[$i][$j]==1 && $ejesYX[$j][$i]==0){//Simetrica
                        $contSim=1;
                    }
                }
            }
            if($i==$j){
                if($ejesYX[$i][$j]==1){//Reflexiva
                    $contRef++;
                }
            }
            for($y=1;$y<=$cantR1;$y++){
                if($ejesYX[$i][$y]==1 && $ejesYX[$i][$y]==$R1[$j][$y]){//Transitiva
                    $R2[$i][$j]=1;
                    $y = $cantR1;
                }else{
                    $R2[$i][$j]=0;
                }
            }
        }
    }
    $contTran=0;
    for($i=1;$i<=$cantR1;$i++){//Recorrer las filas
        for($j=1;$j<=$cantR1;$j++){//Recorrer las columnas
            if($ejesYX[$i][$j]== $R2[$i][$j]){//Reflexiva
                $contTran++;
            }
        }
    }
    echo '<br>';
    if($contRef!=$cantR1){
        echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES REFLEXIVA******</h3>';
    }else{
        echo '<h3 style=" text-align: center;">******LA MATRIZ ES REFLEXIVA******</h3>';
    }
    if($contSim==1){
        echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES SIMETRICA******</h3>';
    }else{
        echo '<h3 style=" text-align: center;">******LA MATRIZ ES SIMETRICA******</h3>';
    }
    if($contAnt==1){
        echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES ANTISIMETRICA******</h3>';
    }else{
        echo '<h3 style=" text-align: center;">******LA MATRIZ ES ANTISIMETRICA******</h3>';
    }
    if($contTran==$cantR1*$cantR1){
        echo '<h3 style=" text-align: center;">******LA MATRIZ ES TRANSITIVA******</h3>';
    }else{
        echo '<h3 style=" text-align: center;">******LA MATRIZ NO ES TRANSITIVA******</h3>';
    }
