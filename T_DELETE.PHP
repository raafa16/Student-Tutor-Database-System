<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 07-Dec-14
 * Time: 4:57 AM
 */

//echo $_POST['submit'];

if(isset($_POST['submit']))
{
    $userid = $_POST['submit'] ;

    $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
    $db = mysql_select_db("tuition", $connection) or die(mysql_error());

    $sql = "DELETE FROM degree WHERE User_ID = $userid";
    $sql1 = "DELETE FROM region_covered_teacher WHERE User_ID = $userid";
    $sql2 = "DELETE FROM t_subjects WHERE User_ID = $userid";
    $sql3 = "DELETE FROM survey WHERE User_ID_T = $userid";
    $sql4 = "DELETE FROM teacher_student_track WHERE User_ID_T = $userid";
    $sql5 = "DELETE FROM users_teacher WHERE User_ID = $userid";
    $sql6 = "Delete FROM teacher WHERE User_ID = $userid";

    mysql_query($sql)or die(LINE . ' ' . mysql_error() . ' ' . $sql);
    mysql_query($sql1)or die(LINE . ' ' . mysql_error() . ' ' . $sql1);
    mysql_query($sql2)or die(LINE . ' ' . mysql_error() . ' ' . $sql2);
    mysql_query($sql3)or die(LINE . ' ' . mysql_error() . ' ' . $sql3);
    mysql_query($sql4)or die(LINE . ' ' . mysql_error() . ' ' . $sql4);
    mysql_query($sql5)or die(LINE . ' ' . mysql_error() . ' ' . $sql5);
    mysql_query($sql6)or die(LINE . ' ' . mysql_error() . ' ' . $sql6);


    header('Refresh: 5; URL = home_page.html');
}

?>