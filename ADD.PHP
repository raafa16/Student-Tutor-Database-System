<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 07-Dec-14
 * Time: 1:23 AM
 */

include('t_session.php');


?>

<!--<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>-->

<?php

if (isset($_POST['submit']) )
{
    $value = $_POST['submit'];/*student user id*/
    $name = $login_session;/*login user name*/
    //echo $value;
    //echo $name;

    $st_user_id = $value;
    $t_user_name = $name;

    if (empty($_POST['Date']) || empty($_POST['Salary']))
    {
        $error = "Date or Salary cannot be empty!!";
        echo $error;

        header('Refresh: 5; URL = add_st.php');
    }

    else
    {
        $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
        $db = mysql_select_db("tuition", $connection) or die(mysql_error());

        $date = $_POST['Date'];
        $salary = $_POST['Salary'];
        $type = $_POST['list4'];

        $sql = "SELECT Username FROM student WHERE User_ID = $st_user_id";
        $id = mysql_query($sql);
        $row = mysql_fetch_assoc($id);
        $st_user_name = $row['Username'];


        $sql1 = "SELECT User_ID FROM teacher WHERE Username = '$t_user_name'";
        $id1 = mysql_query($sql1);
        $row1 = mysql_fetch_assoc($id1);
        $t_user_id = $row1['User_ID'];

        /*echo $st_user_id;
        echo "<br>";
        echo $st_user_name;
        echo "<br>";
        echo $t_user_id;
        echo "<br>";
        echo $t_user_name;
        echo "<br>";
        echo $date;
        echo "<br>";
        echo $salary;*/

        $sql2 = "INSERT INTO teacher_student_track (User_ID_ST, User_ID_T, S_name,
                  T_name, start_date, negotiated_salary, salary_type) VALUES ($st_user_id, $t_user_id,
                  '$st_user_name', '$t_user_name', '$date', $salary, '$type')";

        mysql_query($sql2) or die(mysql_error());
        header('Refresh: 5; URL = t_profile.php');

    }

}



?>