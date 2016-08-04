<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 02-Dec-14
 * Time: 8:51 PM
 */
if (isset($_POST['submit']))
{
    if (empty($_POST['Username']) || empty($_POST['Password'])) {
        $error = "Username or Password cannot be empty";
        echo $error;
        header('Refresh: 5; URL = registration.html');
    }
    else {
        $connection = mysql_connect("localhost", "root", "") or die(mysql_error());

        $username = mysql_real_escape_string($_POST['Username']);
        $first_name = mysql_real_escape_string($_POST['First_name']);
        $last_name = mysql_real_escape_string($_POST['Last_name']);
        $gender = $_POST['list1'];
        $birth_date = $_POST['Date'];
        $age = $_POST['Age'];
        $phone_number = mysql_real_escape_string($_POST['Number']);
        $region = mysql_real_escape_string($_POST['list2']);
        $address = mysql_real_escape_string($_POST['Address']);
        $curriculum = $_POST['list3'];
        $days_week = $_POST['Dpw'];
        $salary = $_POST['Salary'];
        $salary_type = $_POST['list4'];
        $school = mysql_real_escape_string($_POST['School_name']);
        $class = $_POST['list5'];
        $pre_gender = $_POST['list6'];
        $pre_inst = $_POST['list7'];
        $about = mysql_real_escape_string($_POST['About']);

        $db = mysql_select_db("tuition", $connection) or die(mysql_error());

        $sql = "INSERT INTO student (Username, First_name, Last_name, Gender, Birthdate, Age,
            Phone_number, Region, Address, Curriculum, Days_per_week, Salary_per_subject, Salary_type,
            School_name, Class, Preferred_gender, Preferred_institution, About)
            VALUES ('$username', '$first_name', '$last_name', '$gender', '$birth_date', $age, '$phone_number',
            '$region', '$address', '$curriculum', $days_week, $salary, '$salary_type', '$school', '$class',
            '$pre_gender', '$pre_inst', '$about') ";

        mysql_query($sql) or die(mysql_error());

        $user_id = mysql_insert_id();

        $subject = $_POST['sub'];

        for ($i = 0; $i < sizeof($subject) && $subject!= null; $i++) {
            $sql1 = "INSERT INTO subjects(User_ID, Type) VALUES($user_id, '" . $subject[$i] . "')";
            mysql_query($sql1) or die(mysql_error());
        }

        $password = mysql_real_escape_string($_POST['Password']);

        $sql2 = "INSERT INTO users_student(User_ID, Title, Username, Password) VALUES($user_id, 'Student','$username', '$password')";
        mysql_query($sql2) or die(mysql_error());

        header('Refresh: 5; URL=login.html');
    }
}

    ?>