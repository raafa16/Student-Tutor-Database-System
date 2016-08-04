<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 02-Dec-14
 * Time: 8:51 PM
 */
if (isset($_POST['submit']))
{
    if (empty($_POST['Username']) || empty($_POST['Password']))
    {
        $error = "Username or Password cannot be empty!!";
        echo $error;

        header('Refresh: 5; URL = t_registration.html');
    }

    if((empty($_POST['deg1']) && empty($_POST['year1']) && empty($_POST['inst1']) ) &&
        (empty($_POST['deg2']) && empty($_POST['year2']) && empty($_POST['inst2'])) &&
        (empty($_POST['deg3']) && empty($_POST['year3']) && empty($_POST['inst3'])))
    {
        $error2 = "A Degree must have name, institution name and a pass year!!";
        echo $error2;

        header('Refresh: 5; URL = t_registration.html');
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
        $address = mysql_real_escape_string($_POST['Address']);
        $curriculum = $_POST['list3'];
        $days_week = $_POST['Dpw'];
        $salary = $_POST['Salary'];
        $salary_type = $_POST['list4'];
        $about = mysql_real_escape_string($_POST['About']);
        $rating = 0;

        $db = mysql_select_db("tuition", $connection) or die(LINE . ' ' . mysql_error() . ' ' );

        $sql = "INSERT INTO teacher (Username, First_name, Last_name, Gender, Birthdate, Age,
            Phone_number, Address, Curriculum, Days_per_week, Salary_per_subject, Salary_type, About, Rating)
            VALUES ('$username', '$first_name', '$last_name', '$gender', '$birth_date', $age, '$phone_number',
            '$address', '$curriculum', $days_week, $salary, '$salary_type', '$about', $rating) ";

        mysql_query($sql) or die(LINE . ' ' . mysql_error() . ' ' . $sql);

        $user_id = mysql_insert_id();

        $subject = $_POST['sub'];

        for ($i = 0; $i < sizeof($subject) && $subject != null; $i++) {
            $sql1 = "INSERT INTO t_subjects(User_ID, Type) VALUES($user_id, '" . $subject[$i] . "')";
            mysql_query($sql1) or die(LINE . ' ' . mysql_error() . ' ' . $sql1);
        }

        $password = mysql_real_escape_string($_POST['Password']);

        $sql2 = "INSERT INTO users_teacher(User_ID, Title, Username, Password)
                VALUES($user_id, 'Teacher','$username', '$password')";
        mysql_query($sql2) or die(LINE . ' ' . mysql_error() . ' ' . $sql2);

        $region = $_POST['reg'];
        for ($i = 0; $i < sizeof($region) && $region != null; $i++) {
            $sql3 = "INSERT INTO region_covered_teacher(User_ID, Regions) VALUES($user_id, '" . $region[$i] . "')";
            mysql_query($sql3) or die(LINE . ' ' . mysql_error() . ' ' . $sql3);
        }

        if(!empty($_POST['deg1']) && !empty($_POST['inst1']) && !empty($_POST['year1']))
        {
            $deg1 = mysql_real_escape_string($_POST['deg1']);
            $year1 = $_POST['year1'];
            $inst1 = mysql_real_escape_string($_POST['inst1']);

            $sql4 = "INSERT INTO degree (User_ID, Degree_name, Pass_year, Institution)
            VALUES ($user_id, '$deg1', $year1, '$inst1')";
            mysql_query($sql4) or die(LINE . ' ' . mysql_error() . ' ' . $sql4);
        }

        if(!empty($_POST['deg2']) && !empty($_POST['inst2']) && !empty($_POST['year2']))
        {
            $deg2 = mysql_real_escape_string($_POST['deg2']);
            $year2 = $_POST['year2'];
            $inst2 = mysql_real_escape_string($_POST['inst2']);

            $sql5 = "INSERT INTO degree (User_ID, Degree_name, Pass_year, Institution)
            VALUES ($user_id, '$deg2', $year2, '$inst2')";
            mysql_query($sql5) or die(LINE . ' ' . mysql_error() . ' ' . $sql5);
        }

        if(!empty($_POST['deg3']) && !empty($_POST['inst3']) && !empty($_POST['year3']))
        {
            $deg3 = mysql_real_escape_string($_POST['deg3']);
            $year3 = $_POST['year3'];
            $inst3 = mysql_real_escape_string($_POST['inst3']);

            $sql6 = "INSERT INTO degree (User_ID, Degree_name, Pass_year, Institution)
            VALUES ($user_id, '$deg3', $year3, '$inst3')";
            mysql_query($sql6) or die(LINE . ' ' . mysql_error() . ' ' . $sql6);
        }

        header('Refresh: 5; URL = t_login.html');
    }
}

?>