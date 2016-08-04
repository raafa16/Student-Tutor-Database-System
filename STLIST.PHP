<!DOCTYPE html>

<style>

    h4
    {
        font-size: 20px;
        text-shadow: 1px 1px #888888;
        font-family: sans-serif;
        text-decoration: underline;
        color: #CC0000;
        font-weight: bold;
        margin:20px ;
    }

    h5
    {
        font-size: 18px;
        font-family: sans-serif;
        text-decoration: none;
        color: black;
        margin:20px ;
    }

    li
    {
        font-family: sans-serif;
        text-decoration: none;
        color: #CC0000;
        margin:20px ;

    }

    table
    {
        margin:20px;
        border: 3px solid red;
        box-shadow: 2px 2px #888888;

    }

    th
    {
        padding:10px 25px 10px 25px;
        border-bottom: black solid;
        font-size: 20px;
    }

    td
    {
        padding:10px 25px 10px 25px;
        border-bottom: double;
    }

    tr td:first-child /*(puts the elements of the first column slightly to the left)*/
    {
        padding-left:0px;
    }

</style>

<html>
<head>
    <title>List</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: blanchedalmond">

<?php

include('t_session.php');

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888; font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Prospective Students list:
</h2>

<?php

echo "<table>";
echo "<tr>";
echo "<th colspan='3'>";
echo "Full Name: ";
echo "</th><th colspan='2'>";
echo "General Information: ";
echo "</th><th colspan='2'>";
echo "Needed for: ";
echo "</th>";
echo "</th><th colspan='2'>";
echo "About: ";
echo "</th>";
echo "</tr>";

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("tuition", $connection) or die(mysql_error());

$i = 0;

/*$sql = "select student.* , subjects.* , users_student.*\n"
    . "from student \n"
    . "join subjects \n"
    . "on student.User_ID = subjects.User_ID\n"
    . "join users_student\n"
    . "on student.User_ID = users_student.User_ID\n"
    . "where subjects.Type = \'biology\'";*/

$sql1 = "SELECT DISTINCT student.*
FROM student
JOIN subjects
ON student.User_ID = subjects.User_ID
WHERE TRUE";

if (isset($_POST['search']) && $_POST['search'] == "Search")
{

    if($_POST['Username'] != null)
    {
        $name = strtolower($_POST['Username']);

        $sql1 .= " AND LOWER(student.Username) LIKE '%$name%' " ;
    }

    if($_POST['list7'] != null)
    {
        $pre_inst = $_POST['list7'];
        $sql1 .= " AND student.Preferred_institution = '$pre_inst' " ;
    }

    if($_POST['list6'] != null)
    {
        $pre_gender = $_POST['list6'];
        $sql1 .= " AND student.Preferred_gender = '$pre_gender' " ;
    }

    if($_POST['list1'] != null)
    {
        $s_type = $_POST['list1'];
        $sql1 .= " AND student.Salary_type = '$s_type' " ;
    }

    if(!empty($_POST['Salary1']) && !empty($_POST['Salary2']))
    {
        $salary1 = $_POST['Salary1'];
        $salary2 = $_POST['Salary2'];

        $sql1 .= " AND student.Salary_per_subject BETWEEN $salary2 AND $salary1" ;
    }

    if(!empty($_POST['Age1']) && !empty($_POST['Age2']))
    {
        $age1 = $_POST['Age1'];
        $age2 = $_POST['Age2'];

        $sql1 .= " AND student.Age BETWEEN $age2 AND $age1" ;
    }


        //echo $sql1;

}



/*$sql1 = "SELECT * FROM student";*/
$id1 = mysql_query($sql1)or die(mysql_error());

if(mysql_num_rows($id1) == 0)
{
    echo "<th colspan='10'>";
    echo "NO DATA FOUND!!";
    echo "</th>";
}

while($row1 = mysql_fetch_array( $id1 ))
{
    $username = $row1['Username'];
    $user_id = $row1['User_ID'];
    $first_name = $row1['First_name'];
    $last_name = $row1['Last_name'];
    $gender = $row1['Gender'];
    $birth_date = $row1['Birthdate'];
    $age = $row1['Age'];
    $phone_number = $row1['Phone_number'];
    $region = $row1['Region'];
    $address = $row1['Address'];
    $curriculum = $row1['Curriculum'];
    $days_week = $row1['Days_per_week'];
    $salary = $row1['Salary_per_subject'];
    $salary_type = $row1['Salary_type'];
    $school = $row1['School_name'];
    $class = $row1['Class'];
    $pre_gender = $row1['Preferred_gender'];
    $pre_inst = $row1['Preferred_institution'];
    $about = $row1['About'];

    echo "<form action='st_profile.php' method='post'>";
        echo "<tr>";
        echo "<td colspan='3'>";
        echo ++$i;
        echo ")     ";
        echo $first_name;
        echo " ";
        echo $last_name;
        echo "</td>";
        echo "<td colspan='2'>";
        echo "<b>Username: </b>";
        echo $username;
        echo "<br>";
        echo "<b>Gender: </b>";
        echo $gender;
        echo "<br>";
        echo "<b>Age: </b>";
        echo $age;
        echo "<br>";
        echo "<b>Region: </b>";
        echo $region;
        echo "<br>";
        echo "<b>Class: </b>";
        echo $class;
        echo "<br>";
        echo "<b>Preferred Teacher Gender: </b>";
        echo $pre_gender;
        echo "<br>";
        echo "<b>Preferred Teacher Institution: </b>";
        echo $pre_inst;
        echo "<br>";
        echo "<b>Required for Curriculum(s): </b>";
        echo $curriculum;
        echo "<br>";
        echo "<b>Salary Type: </b>";
        echo $salary_type;
        echo "<br>";
        echo "<b>Salary: TK. </b>";
        echo $salary;
        echo "</td>";
        echo "<br>";
        echo "<td>";
        echo "<b>Need help in Subjects(s): </b>";
        echo "<br/>";
        echo "<ol>";
        $sql2 = "SELECT * FROM subjects";
        $id2 = mysql_query($sql2)or die(mysql_error());
        while($row2 = mysql_fetch_array( $id2 ))
        {
            if($row2['User_ID'] == $user_id)
            {
                echo $row2['Type'];
                echo "<br/>";
            }

        }
        echo "</ol>";
        echo "</td>";
        echo "<td colspan='3'>";
        echo $about;
        echo "</td>";
        echo "<td colspan='2'>";
        echo "<button name ='submit' type='submit' value = $user_id>Profile</button>";
        echo "</td>";
        echo "</tr>";
    echo "</form>";

}

?>

<form method = "POST" action="stlist.php">

    <label style = "text-decoration: underline;font-weight: bold">Search using Username :</label>
    <br>
    <input id="name" name="Username" placeholder="username (e-mail)" type="text" style = "width: 30%">
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Preferred Teacher Institution :</label>
    <br>
    <select name="list7">
        <option value="">---------</option>
        <option value="NSU">NSU</option>
        <option value="IBA">IBA</option>
        <option value="DU">DU</option>
        <option value="IUB">IUB</option>
        <option value="AIUB">AIUB</option>
        <option value="BUET">BUET</option>
        <option value="English Medium">English Medium</option>
        <option value="National Curriculum">National Curriculum</option>
    </select>
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Preferred Teacher Gender :</label>
    <br>
    <select name="list6">
        <option value="">---------</option>
        <option value="M">M</option>
        <option value="F">F</option>
    </select>
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Salary Type :</label>
    <br>
    <select name="list1">
        <option value="">---------</option>
        <option value="Daily">Daily</option>
        <option value="Monthly">Monthly</option>
    </select>
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Salary Range:</label>
    <br>
    <input id="salary1" name="Salary1" placeholder="Highest" type="number" style = "width: 10%">
    <p> ------ </p>
    <input id="salary2" name="Salary2" placeholder="Lowest" type="number" style = "width: 10%">

    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Age Range:</label>
    <br>
    <input id="age1" name="Age1" placeholder="Highest" type="number" style = "width: 10%">
    <p> ------ </p>
    <input id="age2" name="Age2" placeholder="Lowest" type="number" style = "width: 10%">

    <br>
    <br>

    <input type = "submit" name = "search" value = "Search" style="width:10%">

</form>

</body>
</html>  