<!DOCTYPE html>
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <?php 
        include './dbconnect.php';        
        $query="SELECT ssn FROM employee";
        $result=mysql_query($query);
        $num=mysql_numrows($result);
        mysql_close();
        ?>
        <h4>Employee Details for:</h4>
        <form method="post" action="displayemp.php">
            <select name="ssn">
                <?php
                $index=0;
                while ($index < $num) {
                    $ssn2=mysql_result($result,$index,"ssn");
                    echo "<option>",$ssn2,"\n";
                    $index++;
                }
                ?>
            </select>
            <input type="submit" value="Get Employee Details">
        </form>
    </body>
</html>

