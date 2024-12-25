<!DOCTYPE html>
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <h4>Employee Information</h4>
       <?php
// Connect to MySQL
$conn = mysqli_connect('localhost', 'username', 'password', 'employees');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
        $ssn = $_POST['ssn'];        
        $query = "SELECT * FROM employee where ssn=$ssn";
        $result = mysql_query($query);
        $num = mysql_numrows($result);
        mysql_close();
        $i=0;
        echo "<br>First name\t Middle Name\t Last Name<br>";
        while($i<$num){      
            $fname = mysql_result($result, $i,"fname");
            $minit = mysql_result($result, $i,"minit");
            $lname = mysql_result($result, $i,"lname");                                   
            echo "<b>",$fname,"\t",$minit,"\t", $lname,"</b>";            
            $i++;
        }
        ?>
    </body>
</html>

