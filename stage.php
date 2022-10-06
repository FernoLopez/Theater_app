<?php
function Stage($ListStage){
    
echo "<table class='tg' border='1' style='margin:auto;'>";
            echo "<tr>";
            echo "<th colspan='6'>Stage</th>";
            echo "<tr>";
                
                echo "<th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th> 
                <th>5</th>
            </tr>";
    
$i=1;
foreach ($ListStage as $row) {
    echo "<tr>";
       echo "<th>";
       echo $i;
       echo "</th>";
    foreach ($row as $chair) {
        echo "<td>";
        echo $chair;
        echo "</td>";
    }
    echo "</tr>";
    $i++;
    }
echo "</table>";
}
