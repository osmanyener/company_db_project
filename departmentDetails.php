<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Simple Database Access</title>
    </head>
    <body>
        <h4>Department Details</h4>
        <?php
        include './dbconnect.php';
        $dnumber = $_POST['dnumber'];  
        $dname = $_POST['dname'];  
        echo $dnumber;
//        $mgrquery = "SELECT mgrssn FROM department where dnumber=$dnumber";
//        $mgrofdept = mysql_query($mgrquery);        
//        
//        $empquery = "select * from employee where dno =$dnumber and ssn!=$mgrofdept";
//        $empsofdept = mysql_query($empquery);
//        $num = mysql_numrows($empsofdept);
        mysql_close();
        
        $i=0;
        echo "<br>Manager of $dname Department: <br>";
        $fname = mysql_result($mgrofdept, 0,"fname");
        $minit = mysql_result($mgrofdept, 0,"minit");
        $lname = mysql_result($mgrofdept, 0,"lname");                                   
        echo $fname,"\t",$minit,"\t", $lname,"<br>"; 
        
//        while($i<$num){      
//            $fname = mysql_result($result, $i,"fname");
//            $minit = mysql_result($result, $i,"minit");
//            $lname = mysql_result($result, $i,"lname");                                   
//            echo "<b>",$fname,"\t",$minit,"\t", $lname,"</b>";            
//            $i++;
//        }
        ?>
    </body>
</html>