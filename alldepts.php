<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>All Departments</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $query = "SELECT dnumber,dname FROM department order by dnumber";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        ?>
        <h4>Departments of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2" >
            <tr>
                <th>Department Number</th><th>Department Name</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {                
                $dno = $row["dnumber"];
                $dname = $row["dname"];
                 echo "<tr><td><a href=\"deptView.php?dno=", $dno, "\">", $dno, "</a></td>";
                 echo "<td>".$dname."</td></tr>";                
            }
            ?>

        </table>
        <P>
        <a href="./">Return to main page</a>
    </body>
</html>
