<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Project View</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $pnum = $_GET['pnum'];
        $query = "SELECT pname,plocation,dnum,dname FROM project,department where pnumber=$pnum and dnum=dnumber";
        $result = mysqli_query($conn,$query);
        
        $row= mysqli_fetch_assoc($result);
        $pname = $row["pname"];
        $ploc = $row["plocation"];
        $pdnum = $row["dnum"];
        $pdname = $row["dname"];

        echo "<b>Project: </b>", $pname, "<br>";
        echo "Project Location: ", $ploc, "<br>";
        echo "Controlling Department: <a href=\"deptView.php?dno=", $pdnum, "\">", $pdname, "</a>";

        echo "<h4>Employees working in project:</h4>";
        $query = "SELECT ssn,lname,fname,hours FROM employee,works_on where pno=$pnum and essn=ssn";
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            ?>
            <table border="2" cellspacing="2" cellpadding="2">
                <tr>
                    <th><font face="Arial, Helvetica, sans-serif">Employee SSN</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Employee Last Name</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Employee First Name</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Hours</font></th>
                </tr>
                <?php          
                while ($row= mysqli_fetch_assoc($result)) {
                    $essn = $row["ssn"];
                    $elname = $row["lname"];
                    $efname = $row["fname"];
                    $hours = $row["hours"];
                     echo "<tr><td><a href=\"empView.php?ssn=", $essn, "\">", $essn, "</a></td>";
                     echo "<td>".$elname."</td>";
                     echo "<td>".$efname."</td>";
                     echo "<td>".$hours."</td></tr>";
                }
            } else
                echo "Project has no employees<br>";
            echo "</table>";

            mysqli_close($conn);
            ?>

            <P>
                <a href="./">Return to main page</a>
                
            


                </body>
                </html>
