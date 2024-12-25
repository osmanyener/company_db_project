<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>All Employees</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $query = "SELECT ssn,lname,fname FROM employee order by lname,fname";
        $result = mysqli_query($conn,$query);        
        mysqli_close($conn);
        ?>

        <h4>Employees of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">SSN</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Last Name</font></th>
                <th><font face="Arial, Helvetica, sans-serif">First Name</font></th>
            </tr>

            <?php            
            while ($row= mysqli_fetch_assoc($result)) {
                $essn = $row["ssn"];
                $elname = $row["lname"];
                $efname = $row["fname"];
                echo "<tr><td><a href=\"empView.php?ssn=",$essn, "\">", $essn."</a></td>";
                echo "<td>".$elname."</td>";
                echo "<td>".$efname."</td>";
                echo "</tr>";                  
            
            }
            ?>

        </table>

        <P>
            <a href="./">Return to main page</a>

    </body>
</html>
