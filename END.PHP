<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 07-Dec-14
 * Time: 3:55 AM
 */

if(isset($_POST['add']))
{
    $user_id_st = $_POST['add'];
    $end_date = $_POST['End_date'];

    /*echo $user_id_st;
    echo "<br>";
    echo $end_date;*/

    $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
    $db = mysql_select_db("tuition", $connection) or die(mysql_error());

    $sql = "SELECT start_date FROM teacher_student_track WHERE User_ID_ST = $user_id_st";
    $id = mysql_query($sql);

    $row = mysql_fetch_assoc($id);
    $start_date = $row['start_date'];

    if($end_date < $start_date)
    {
        echo "END DATE cannot be sooner than START DATE!! ";
        header('Refresh: 5; URL = t_profile.php');
    }

    else
    {
        $sql1 = "UPDATE teacher_student_track SET end_date = '$end_date' WHERE User_ID_ST = $user_id_st ";
        $id1 = mysql_query($sql1)or die(mysql_error());
        header('Refresh: 5; URL = t_profile.php');
    }
}

?>