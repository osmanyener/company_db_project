<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>All Projects</title>
    </head>
    <body>

        <?php
        include './dbconnect.php';
        $query = "SELECT pnumber,pname FROM project order by pnumber";
        $result = mysqli_query($conn,$query);       
        mysqli_close($conn);
        ?>

        <h4>Projects of Company</h4>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial, Helvetica, sans-serif">Project Number</font></th>
                <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
            </tr>

            <?php            
             while ($row = mysqli_fetch_assoc($result)) {
                $pnum = $row["pnumber"];
                $pname = $row["pname"];               

                echo "<tr><td><a href=\"projView.php?pnum=",$pnum, "\">", $pnum."</a></td>";
                echo "<td>".$pname."</td></tr>";                
                            
            }
            ?>

        </table>

        <P>
            <a href="./">Return to main page</a>

    </body>
</html>

