<?php
function Action($row,$seat,$action,$ListStage){
       
        if($ListStage[$row-1][$seat-1]=="L"){
            $ListStage[$row-1][$seat-1]=$action;
        }
        
        else if($ListStage[$row-1][$seat-1]=="V"){
            echo "<script>alert('El puesto ya esta vendido";
            if($action=="L"){echo " no se puede liberar";}
            else if($action=="R"){echo " no se puede reservar";}
            else if($action=="V"){echo " no se puede volver a vender";}
            echo "')";
            echo "</script>'";
        }
        
        else if($ListStage[$row-1][$seat-1]=="R" && $action=="R"){
            echo "<script>
            alert('El puesto ya esta Reservado');
            </script>'";
        }
        
        else if($ListStage[$row-1][$seat-1]=="R" && $action!="R"){
            $ListStage[$row-1][$seat-1]=$action;
        }
        
        return $ListStage;
}

