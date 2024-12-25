<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Employee View</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $essn = $_GET['ssn'];
        
        $query = "SELECT lname,fname,bdate,address,salary,dno,dname FROM employee,department where ssn=$essn and dno=dnumber";
        $result = mysqli_query($conn,$query);
        $row= mysqli_fetch_assoc($result);
        $elname = $row["lname"];
        $efname = $row["fname"];
        $ebdate = $row["bdate"];
        $eaddress = $row["address"];
        $esalary = $row["salary"];
        $edno = $row["dno"];
        $edname = $row["dname"];

        echo "<b>Employee: </b>", $elname, ", ", $efname, "<br>";
        echo "Birth Date: ", $ebdate, "<br>";
        echo "Address: ", $eaddress, "<br>";
        echo "Salary: ", $esalary, "<br>";
        echo "Department: <a href=\"deptView.php?dno=", $edno, "\">", $edname, "</a>";

        echo "<h4>Projects Involved In:</h4>";
        $query = "SELECT pnumber,pname,hours FROM project,works_on where pno=pnumber and essn=$essn";
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            ?>
            <table border="2" cellspacing="2" cellpadding="2">
                <tr>
                    <th><font face="Arial, Helvetica, sans-serif">Project Number</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
                    <th><font face="Arial, Helvetica, sans-serif">Hours</font></th>
                </tr>
                <?php
                 while ($row= mysqli_fetch_assoc($result)) {
                    $pno = $row["pnumber"];
                    $pname = $row["pname"];
                    $hours = $row["hours"];
                    
                    echo "<tr><td><a href=\"projView.php?pnum=", $pno, "\">", $pno, "</a></td>";
                    echo "<td>".$pname."</td>";
                    echo "<td>".$hours."</td></tr>";                    
                }
            } else
                echo "Employee works for no project<br>";
            echo "</table>";

            echo "<h4>Dependents:</h4>";
            $query = "SELECT dependent_name,sex,bdate,relationship FROM dependent where essn=$essn";
            $result = mysqli_query($conn,$query);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                ?>
                <table border="2" cellspacing="2" cellpadding="2">
                    <tr>
                        <th><font face="Arial, Helvetica, sans-serif">Dependent Name</font></th>
                        <th><font face="Arial, Helvetica, sans-serif">Sex</font></th>
                        <th><font face="Arial, Helvetica, sans-serif">Birth Date</font></th>
                        <th><font face="Arial, Helvetica, sans-serif">Relationship</font></th>
                    </tr>
                    <?php                    
                     while ($row= mysqli_fetch_assoc($result)) {
                        $depname = $row["dependent_name"];
                        $depsex = $row["sex"];
                        $depbdate = $row["bdate"];
                        $deprelationship = $row["relationship"];
                        ?>  
                        <tr>
                            <td><font face="Arial, Helvetica, sans-serif"><?php echo $depname; ?></font></td>
                            <td><font face="Arial, Helvetica, sans-serif"><?php echo $depsex; ?></font></td>
                            <td><font face="Arial, Helvetica, sans-serif"><?php echo $depbdate; ?></font></td>
                            <td><font face="Arial, Helvetica, sans-serif"><?php echo $deprelationship; ?></font></td>
                        </tr>
                        <?php                        
                    }
                } else
                    echo "Employee has no dependents<br>";
                echo "</table>";
                mysqli_close($conn);
                ?>

                <P>
                    <a href="./">Return to main page</a>

                    </body>
                    </html>

