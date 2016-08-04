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

include('session.php');

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888; font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    Prospective Teachers list:
</h2>

<?php

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("tuition", $connection) or die(mysql_error());

echo "<table>";
echo "<tr>";
echo "<th colspan='2'>";
echo "Full Name: ";
echo "</th><th colspan='3'>";
echo "General Information: ";
echo "</th><th colspan='2'>";
echo "Can Teach: ";
echo "</th><th colspan='2'>";
echo "Regions Covered: ";
echo "</th><th colspan='2'>";
echo "Have Degrees in: ";
echo "</th><th colspan='2'>";
echo "About: ";
echo "</th><th colspan='2'>";
echo "Rating: ";
echo "</th>";
echo "</tr>";

$i = 0;

$sql1 = "SELECT DISTINCT teacher.*
FROM teacher
JOIN degree
ON teacher.User_ID = degree.User_ID
JOIN region_covered_teacher
ON teacher.User_ID = region_covered_teacher.User_ID
JOIN t_subjects
ON teacher.User_ID = t_subjects.User_ID
WHERE TRUE";

if (isset($_POST['search']) && $_POST['search'] == "Search")
{
    if($_POST['Username'] != null)
    {
        $name = strtolower($_POST['Username']);

        $sql1 .= " AND LOWER(teacher.Username) LIKE '%$name%' " ;
    }


    if($_POST['list7'] != null)
    {
        $pre_inst = $_POST['list7'];
        $sql1 .= " AND degree.Institution = '$pre_inst' " ;
    }

    if($_POST['list6'] != null)
    {
        $pre_gender = $_POST['list6'];
        $sql1 .= " AND teacher.gender = '$pre_gender' " ;
    }

    if($_POST['list1'] != null)
    {
        $s_type = $_POST['list1'];
        $sql1 .= " AND teacher.Salary_type = '$s_type' " ;
    }

    if(!empty($_POST['Salary1']) && !empty($_POST['Salary2']))
    {
        $salary1 = $_POST['Salary1'];
        $salary2 = $_POST['Salary2'];

        $sql1 .= " AND teacher.Salary_per_subject BETWEEN $salary2 AND $salary1" ;
    }

    if(!empty($_POST['Age1']) && !empty($_POST['Age2']))
    {
        $age1 = $_POST['Age1'];
        $age2 = $_POST['Age2'];

        $sql1 .= " AND teacher.Age BETWEEN $age2 AND $age1" ;
    }


    if($_POST['list8'] != null)
    {
        $order = $_POST['list8'];

        if($order == "Highest")
        {
            $sql1 .= " ORDER BY teacher.Rating DESC";
        }

        else if($order == "Lowest")
        {
            $sql1 .= " ORDER BY teacher.Rating ASC";
        }

    }


    //echo $sql1;

}

$id1 = mysql_query($sql1)or die(mysql_error());

if(mysql_num_rows($id1) == 0)
{
    echo "<th colspan='18'>";
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
    $address = $row1['Address'];
    $curriculum = $row1['Curriculum'];
    $days_week = $row1['Days_per_week'];
    $salary = $row1['Salary_per_subject'];
    $salary_type = $row1['Salary_type'];
    $about = $row1['About'];
    $rating = $row1['Rating'];

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
    echo "<b>Salary Type: </b>";
    echo $salary_type;
    echo "<br>";
    echo "<b>Salary: TK. </b>";
    echo $salary;
    echo "</td>";

    echo "<td colspan='2'>";
    echo "<b>Able to teach Subject(s): </b>";
    echo "<br/>";
    echo "<ol>";
    $sql2 = "SELECT * FROM t_subjects";
    $id2 = mysql_query($sql2)or die(mysql_error());
    while($row2 = mysql_fetch_array( $id2 ))
    {
        if($row2['User_ID'] == $user_id)
        {
            echo $row2['Type'];
            echo "<br>";
            echo "<br>";
        }

    }
    echo "</ol>";
    echo "</td>";

    echo "<td colspan='2'>";
    echo "<b>Can go to: </b>";
    echo "<ol>";
    $sql3 = "SELECT * FROM region_covered_teacher";
    $id3 = mysql_query($sql3)or die(mysql_error());
    while($row3 = mysql_fetch_array( $id3 ))
    {
        if($row3['User_ID'] == $user_id)
        {
            echo $row3['Regions'];
            echo "<br>";
            echo "<br>";
        }

    }
    echo "</ol>";
    echo "</td>";

    echo "<td colspan='2'>";
    echo "<b>Degree(s): </b>";
    echo "<ol>";
    $sql4 = "SELECT * FROM degree";
    $id4 = mysql_query($sql4)or die(mysql_error());
    while($row4 = mysql_fetch_array( $id4 ))
    {
        if($row4['User_ID'] == $user_id)
        {
            echo "<b>";
            echo $row4['Degree_name'];
            echo "</b>";
            echo " from ";
            echo "<b>";
            echo $row4['Institution'];
            echo "</b>";
            echo "<br>";
            echo "<br>";
        }

    }
    echo "</ol>";
    echo "</td>";

    echo "<td colspan='3'>";
    echo $about;
    echo "</td>";

    echo "<td colspan='2'>";
    echo $rating;
    echo "</td>";

    echo "<form action='ts_profile.php' method='post'>";
    echo "<td colspan='2'>";
    echo "<button name ='submit' type='submit' value = $user_id>Profile</button>";

    echo "</td>";
    echo "</tr>";

    echo "</form>";

}


?>

<form method = "POST" action="tslist.php">

    <label style = "text-decoration: underline;font-weight: bold">Search using Username :</label>
    <br>
    <input id="name" name="Username" placeholder="username (e-mail)" type="text" style = "width: 30%">
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Teacher Institution :</label>
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

    <label style = "text-decoration: underline;font-weight: bold">Teacher Gender :</label>
    <br>
    <select name="list6">
        <option value="">---------</option>
        <option value="M">M</option>
        <option value="F">F</option>
    </select>
    <br>
    <br>

    <label style = "text-decoration: underline;font-weight: bold">Rating :</label>
    <br>
    <select name="list8">
        <option value="">---------</option>
        <option value="Highest">Highest First</option>
        <option value="Lowest">Lowest First</option>
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
</html>
