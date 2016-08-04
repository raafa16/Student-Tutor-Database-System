<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 12-Dec-14
 * Time: 1:13 AM
 */

if (isset($_POST['submit']))
{
    $userid = $_POST['submit'] ;

    $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
    $db = mysql_select_db("tuition", $connection) or die(mysql_error());

    if (!empty($_POST['First_name']))
    {
        $first_name = mysql_real_escape_string($_POST['First_name']);
        $sql1 = "UPDATE teacher SET First_name = '$first_name' WHERE User_ID = $userid ";
        $id1 = mysql_query($sql1)or die(mysql_error());
    }

    if (!empty($_POST['Last_name']))
    {
        $last_name = mysql_real_escape_string($_POST['Last_name']);
        $sql2 = "UPDATE teacher SET Last_name = '$last_name' WHERE User_ID = $userid ";
        $id2 = mysql_query($sql2)or die(mysql_error());
    }

    if (!empty($_POST['Age']))
    {
        $age = $_POST['Age'];
        $sql3 = "UPDATE teacher SET Age = $age WHERE User_ID = $userid ";
        $id3 = mysql_query($sql3)or die(mysql_error());
    }

    if (!empty($_POST['Number']))
    {
        $phone_number = mysql_real_escape_string($_POST['Number']);
        $sql4 = "UPDATE teacher SET Phone_number = '$phone_number' WHERE User_ID = $userid ";
        $id4 = mysql_query($sql4)or die(mysql_error());
    }

    if (!empty($_POST['Address']))
    {
        $address = mysql_real_escape_string($_POST['Address']);
        $sql6 = "UPDATE teacher SET Address = '$address' WHERE User_ID = $userid ";
        $id6 = mysql_query($sql6)or die(mysql_error());
    }

    if (!empty($_POST['Dpw']))
    {
        $days_week = $_POST['Dpw'];
        $sql7 = "UPDATE teacher SET Days_per_week = $days_week WHERE User_ID = $userid ";
        $id7 = mysql_query($sql7)or die(mysql_error());
    }

    if (!empty($_POST['Salary']))
    {
        $salary = $_POST['Salary'];
        $sql8 = "UPDATE teacher SET Salary_per_subject = $salary WHERE User_ID = $userid ";
        $id8 = mysql_query($sql8)or die(mysql_error());
    }

    if (!empty($_POST['list4']))
    {
        $salary_type = $_POST['list4'];
        $sql9 = "UPDATE teacher SET Salary_type = '$salary_type' WHERE User_ID = $userid ";
        $id9 = mysql_query($sql9)or die(mysql_error());
    }

    if(!empty($_POST['sub1']))
    {
        $subject1 = $_POST['sub1'];

        for ($i = 0; $i < sizeof($subject1) && $subject1!= null; $i++) {
            $s = "INSERT INTO t_subjects(User_ID, Type) VALUES($userid, '" . $subject1[$i] . "')";
            mysql_query($s) or die(mysql_error());
        }
    }

    if(!empty($_POST['sub2']))
    {
        $subject2 = $_POST['sub2'];

        for ($i = 0; $i < sizeof($subject2) && $subject2!= null; $i++) {
            $q = "Delete FROM t_subjects WHERE User_ID = $userid AND Type = '" . $subject2[$i] . "' ";
            mysql_query($q) or die(mysql_error());
        }
    }

    if(!empty($_POST['reg1']))
    {
        $region1 = $_POST['reg1'];

        for ($i = 0; $i < sizeof($region1) && $region1 != null; $i++) {
            $a = "INSERT INTO region_covered_teacher(User_ID, Regions) VALUES($userid, '" . $region1[$i] . "')";
            mysql_query($a) or die(LINE . ' ' . mysql_error() . ' ' . $a);
        }
    }

    if(!empty($_POST['reg2']))
    {
        $region2 = $_POST['reg2'];

        for ($i = 0; $i < sizeof($region2) && $region2 != null; $i++) {
            $b = "Delete FROM region_covered_teacher WHERE User_ID = $userid AND Regions = '" . $region2[$i] . "' ";
            mysql_query($b) or die(LINE . ' ' . mysql_error() . ' ' . $b);
        }
    }

    if (!empty($_POST['deg']) && !empty($_POST['inst']) && !empty($_POST['year']))
    {
        $deg = mysql_real_escape_string($_POST['deg']);
        $year = $_POST['year'];
        $inst = mysql_real_escape_string($_POST['inst']);

        $l = "INSERT INTO degree (User_ID, Degree_name, Pass_year, Institution)
        VALUES ($userid, '$deg', $year, '$inst')";
        mysql_query($l) or die(LINE . ' ' . mysql_error() . ' ' . $l);
    }



    header('Refresh: 5; URL = t_profile.php');



}

?>