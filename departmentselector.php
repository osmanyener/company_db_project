<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        include './dbconnect.php';        
        $query="SELECT * FROM department";
        $result=mysql_query($query);
        $num=mysql_numrows($result);
        mysql_close();
        ?>
        <h4>Get Department Details for:</h4>
        <form method="post" action="departmentDetails.php">
            <select name="Department Name">
                <?php
                $index=0;
                while ($index < $num) {
                    $dnumber=mysql_result($result,$index,"dnumber");
                    $dname = mysql_result($result,$index,"dname");
                    echo  "<option> $dnumber $dname \n";
                    $index++;
                }
                ?>
            </select>
            <input type="submit" value="Get Department Details">
        </form>
    </body>
</html>
