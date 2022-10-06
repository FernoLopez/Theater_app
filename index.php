<!DOCTYPE html>
<html> 
    <head> 
        <title>Unidad 4 - Ejemplo 1 - Cambia Color</title>
        <meta http-equiv="Content-Type" 
              content="text/html; charset=ISO-8859-1" />
    <!--Jesús Ferney López Avendaño-->
    <!-- Desarrollo web con PHP-->
    <!-- Taller uso de formularios para transferencia-->
    <!-- Lo primero que haremos es crear los archivos de biblioteca a importar,
    correspondientes a la orden del usuario y al escenario como tal. Luego,
    se evalua si la variable del sistema $_REQUEST ya contiene datos, si es 
    asi se construye la etiqueta de apertura del objeto body de la página web 
    con la información de los datos que hayan llegado por el formulario en el 
    que se pondrá como valor el atributo method = $_POST que almacena la 
    información respecto de las filas, los asientos, las ordenes del usuario y
    el escenario. Para acceder a la información que queda en los arreglos ya 
    nombrados se utiliza el índice del ciclo for. Para construirlo de forma 
    dinámica se crean cinco valores numéricos diferentes que se transmiten en la 
    variable. Creamos una variable count vacía e iteramos dos veces el arreglo 
    para definir las filas y las columnas de la sala y luego pusheamos a count, 
    el resultado de multiplicar los cinco valores por cada iteración, y 
    luego tendremos un substring del arreglo del escenario junto con el count y
    el índice. Luego, devolvemos el Array con la información modificada por la 
    orden del usuario en el ListStage y ejecutamos la función del escenario
    modificado. Hacemos un else if para cuando el usario borre la informacion 
    del formulario se refresque la página colocando los array de cada lugar.
    Procedemos entonces a crear el formulario con el método POST con los inputs 
    que van a capturar la información y las órdenes introducida por el usuario, 
    y creamos los componentes de cada característica con Tr y Td. Utilizamos 
    select con option para mostrar la lista con las opciones posibles para las 
    filas y los puestos. Para reservar, comprar y liberar, utilizamos tipo
    radio para seleccionar e inputs tipo submit para las acciones de enviar y
    borrar. Creamos la función stage para crear las tablas con la información 
    del Escenario, filas y puestos disponibles, reservados o comprados. Creamos
    las tablas y los encabezados, y recorremos el Array mediante con un foreach 
    que imprime cada fila y columna de la tabla. Creamos la función action que 
    procesa las ordenes del usuario, al liberar, reservar o comprar un puesto 
    ubicado en determinada fila. Se evalua la opción del usuario dependiendo del
    contenido en el Array. Si el puesto elegido por el usuario está libre, se 
    modifica el Array con la acción elegida. Si el puesto elegido por el usuario 
    está vendido se muestra una alerta con notificando en cada caso lo sucedido.
    Si el puesto elegido por el usuario está reservado y la acción es reservar 
    se muestra una alerta indicando que ya esta reservado. Si el puesto está 
    reservado y la acción es diferente a reservar se modifica el array con la 
    acción elegida por el usuario. Y por último retornamos el array modificado.
    -->
    </head>
    <?php

require("action.php");
require("stage.php");

if(isset($_REQUEST["Send"])){
             
                $row = $_POST['row'];
                $seat= $_POST['seat'];
                $action= $_POST['action'];
                $StringStage=$_POST['ListStage'];
             
                $count=0;
                for($i=0;$i<5;$i++){
                    for($j=0;$j<5;$j++){
                        $count=5*$i+$j;
                        
                        $ListStage[$i][$j]=substr($StringStage,$count,1);
                    }
                    $count=0;
                }
        
        $ListStage=Action($row,$seat,$action,$ListStage);
        
        Stage($ListStage);
}

else if(isset($_REQUEST["Reset"]) || !isset($_REQUEST["Send"])){
    $ListStage=array(array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"),array("L","L","L","L","L"));
    Stage($ListStage);
}
?>
    
    <body>
    <table style="margin:auto;">
        <form method="post">
            <input type="text" name="ListStage" value="<?php foreach ($ListStage as $row) {foreach ($row as $seat){echo $seat;}}?>" style="display:none" />
            <tr>
                <td>Fila: </td>
                <td>
                    <select name="row">
                        <option size="4">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Puesto: </td>
                <td>
                    <select name="seat">
                        <option size="4">1</option>
                        <option size="4">2</option>
                        <option size="4">3</option>
                        <option size="4">4</option>
                        <option size="4">5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Reservar: </td>
                <td>
                    <input type="radio" name="action" value="R" />
                </td>
            </tr>
            <tr>
                <td>Comprar: </td>
                <td>
                    <input type="radio" name="action" value="V" />
                </td>
            </tr>
            <tr>
                <td>Liberar: </td>
                <td>
                    <input type="radio" name="action" value="L" checked="checked" />
                </td>
            </tr>
            <tr>               
                <td>
                    <input type="submit" value="Enviar" name="Send" />
                </td>
                <td>
                    <input type="submit" value="Borrar" name="Reset" />
                </td>
            </tr>
        </form>
    </table>
</body>
</html>