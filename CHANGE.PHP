<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 11-Dec-14
 * Time: 11:54 PM
 */

if (isset($_POST['submit']))
{

    $userid = $_POST['submit'] ;

    $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
    $db = mysql_select_db("tuition", $connection) or die(mysql_error());


    if (!empty($_POST['First_name']))
    {
        $first_name = mysql_real_escape_string($_POST['First_name']);
        $sql1 = "UPDATE student SET First_name = '$first_name' WHERE User_ID = $userid ";
        $id1 = mysql_query($sql1)or die(mysql_error());
    }

    if (!empty($_POST['Last_name']))
    {
        $last_name = mysql_real_escape_string($_POST['Last_name']);
        $sql2 = "UPDATE student SET Last_name = '$last_name' WHERE User_ID = $userid ";
        $id2 = mysql_query($sql2)or die(mysql_error());
    }

    if (!empty($_POST['Age']))
    {
        $age = $_POST['Age'];
        $sql3 = "UPDATE student SET Age = $age WHERE User_ID = $userid ";
        $id3 = mysql_query($sql3)or die(mysql_error());
    }

    if (!empty($_POST['Number']))
    {
        $phone_number = mysql_real_escape_string($_POST['Number']);
        $sql4 = "UPDATE student SET Phone_number = '$phone_number' WHERE User_ID = $userid ";
        $id4 = mysql_query($sql4)or die(mysql_error());
    }

    if (!empty($_POST['list2']))
    {
        $region = mysql_real_escape_string($_POST['list2']);
        $sql5 = "UPDATE student SET Region = '$region' WHERE User_ID = $userid ";
        $id5 = mysql_query($sql5)or die(mysql_error());
    }

    if (!empty($_POST['Address']))
    {
        $address = mysql_real_escape_string($_POST['Address']);
        $sql6 = "UPDATE student SET Address = '$address' WHERE User_ID = $userid ";
        $id6 = mysql_query($sql6)or die(mysql_error());
    }

    if (!empty($_POST['Dpw']))
    {
        $days_week = $_POST['Dpw'];
        $sql7 = "UPDATE student SET Days_per_week = $days_week WHERE User_ID = $userid ";
        $id7 = mysql_query($sql7)or die(mysql_error());
    }

    if (!empty($_POST['Salary']))
    {
        $salary = $_POST['Salary'];
        $sql8 = "UPDATE student SET Salary_per_subject = $salary WHERE User_ID = $userid ";
        $id8 = mysql_query($sql8)or die(mysql_error());
    }

    if (!empty($_POST['list4']))
    {
        $salary_type = $_POST['list4'];
        $sql9 = "UPDATE student SET Salary_type = '$salary_type' WHERE User_ID = $userid ";
        $id9 = mysql_query($sql9)or die(mysql_error());
    }

    if (!empty($_POST['School_name']))
    {
        $school = mysql_real_escape_string($_POST['School_name']);
        $sql10 = "UPDATE student SET School_name = '$school' WHERE User_ID = $userid ";
        $id10 = mysql_query($sql10)or die(mysql_error());
    }

    if (!empty($_POST['list5']))
    {
        $class = $_POST['list5'];
        $sql11 = "UPDATE student SET Class = '$class' WHERE User_ID = $userid ";
        $id11 = mysql_query($sql11)or die(mysql_error());
    }

    if(!empty($_POST['sub1']))
    {
        $subject1 = $_POST['sub1'];

        for ($i = 0; $i < sizeof($subject1) && $subject1!= null; $i++) {
            $s = "INSERT INTO subjects(User_ID, Type) VALUES($userid, '" . $subject1[$i] . "')";
            mysql_query($s) or die(mysql_error());
        }
    }

    if(!empty($_POST['sub2']))
    {
        $subject2 = $_POST['sub2'];

        for ($i = 0; $i < sizeof($subject2) && $subject2!= null; $i++) {
            $q = "Delete FROM subjects WHERE User_ID = $userid AND Type = '" . $subject2[$i] . "' ";
            mysql_query($q) or die(mysql_error());
        }
    }

    header('Refresh: 5; URL = profile.php');

}

?>