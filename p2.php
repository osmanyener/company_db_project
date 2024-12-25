<!DOCTYPE html>
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        $dno = 4;
        $query = "SELECT lname,salary FROM employee where dno=$dno";
        $result = mysql_query($query);
        $num = mysql_numrows($result);
        mysql_close();
        ?>
        <table border="2" cellspacing="2" cellpadding="2">
            <tr>
                <th><font face="Arial,Helvetica,sans-serif">Last Name</font></th>
                <th><font face="Arial,Helvetica,sans-serif">Salary</font></th>
            </tr>
            <?php
            echo "<h4>Employees in Department $dno</h4>";
            $i = 0;
            while ($i < $num) {
                $lname = mysql_result($result, $i, "lname");
                $salary = mysql_result($result, $i, "salary");
                ?>
                <tr>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <?php echo $lname; ?>
                        </font></td>
                    <td><font face="Arial, Helvetica, sans-serif">
                        <?php echo $salary; ?>
                        </font></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </body>
</html>