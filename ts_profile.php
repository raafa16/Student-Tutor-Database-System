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
        border-bottom: black solid;
        font-size: 20px;
    }

    td
    {
        padding:10px 25px 10px 25px;
    }

    tr td:first-child /*(puts the elements of the first column slightly to the left)*/
    {
        padding-left:0px;
    }

</style>

<html>
<head>
    <title>Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="mystyle1.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: blanchedalmond">

<h2 style = " background-color:transparent ; margin:0px 0px; text-shadow: 2px 2px #888888;
font-size: 30px; font-weight: Bold; font-family: sans-serif; text-decoration: underline; color: #CC0000">
    USER PROFILE:
</h2>

<?php

include('session.php');

?>

<div class="topcorner" id="profile">
    <b id="welcome" style = "font-size: 15px; font-weight: bold;">Welcome : <i><?php echo $login_session; ?></i></b>
    <br>
    <br>
    <b id="logout" style = "font-size: 15px"><a href="logout.php">Log Out</a></b>
</div>

<?php

$username_st = $login_session;

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("tuition", $connection) or die(mysql_error());

if (isset($_POST['submit']) )
    $value = $_POST['submit'];
//echo $value;


$sql1 = "SELECT * FROM teacher WHERE User_ID = $value ";
$id1 = mysql_query($sql1)or die(mysql_error());

while($row1 = mysql_fetch_array( $id1 )) {
    $username = $row1['Username'];
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

    echo "<h4>User Name:</h4>";
    echo "<h5>";
    echo $username;
    echo "</h5>";

    echo "<h4>Name</h4>";
    echo "<h5>";
    echo $first_name;
    echo "  ";
    echo $last_name;
    echo "</h5>";

    if ($gender == 'M')
        $gender = 'Male';
    else
        $gender = 'Female';

    echo "<h4>Gender:</h4>";
    echo "<h5>";
    echo $gender;
    echo "</h5>";

    echo "<h4>Birthday Date:</h4>";
    echo "<h5>";
    echo $birth_date;
    echo "</h5>";


    echo "<h4>Age:</h4>";
    echo "<h5>";
    echo $age;
    echo "</h5>";


    echo "<h4>Contact Number:</h4>";
    echo "<h5>";
    echo $phone_number;
    echo "</h5>";

    echo "<h4>Address:</h4>";
    echo "<h5>";
    echo $address;
    echo "</h5>";


    echo "<h4>Able to teach Curriculum:</h4>";
    echo "<h5>";
    echo $curriculum;
    echo "</h5>";


    echo "<h4>Days to be tutored:</h4>";
    echo "<h5>";
    echo $days_week;
    echo "</h5>";

    echo "<h4>Salary:</h4>";
    echo "<h5>";
    echo "TK ";
    echo $salary;
    echo "  ";
    echo $salary_type;
    echo "</h5>";

    $sql2 = "SELECT * FROM t_subjects WHERE User_ID = $value ";
    $id2 = mysql_query($sql2) or die(mysql_error());

    echo "<h4>
    Assistance offered in the following subject(s):
    </h4>";

    while ($row2 = mysql_fetch_array($id2)) {
        echo "<ul>";
        echo "<li>";
        echo $row2['Type'];
        echo "</li>";
        echo "</ul>";
    }

    $sql3 = "SELECT * FROM degree WHERE User_ID = $value ";
    $id3 = mysql_query($sql3) or die(mysql_error());

    echo "<h4>
    Degree detail(s):
    </h4>";

    echo "<table>";
    echo "<tr>";
    echo "<th colspan='2'>";
    echo "Degree Name";
    echo "</th><th colspan='2'>";
    echo "Pass Year";
    echo "</th><th colspan='2'>";
    echo "Institution";
    echo "</th>";
    echo "</tr>";

    $i = 0;

    while ($row3 = mysql_fetch_array($id3)) {
        echo "<tr>";
        echo "<td>";
        echo ++$i;
        echo ")";
        echo "</td>";
        echo "<td>";
        echo $row3['Degree_name'];
        echo "</td>";
        echo "<td colspan='2'>";
        echo $row3['Pass_year'];
        echo "</td>";
        echo "<td colspan='2'>";
        echo $row3['Institution'];
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $sql4 = "SELECT * FROM region_covered_teacher WHERE User_ID = $value ";
    $id4 = mysql_query($sql4) or die(mysql_error());

    echo "<h4>
    Can Teach in regions(s):
    </h4>";

    while ($row4 = mysql_fetch_array($id4)) {
        echo "<ul>";
        echo "<li>";
        echo $row4['Regions'];
        echo "</li>";
        echo "</ul>";
    }

    echo "<h4>";
    echo "About";
    echo " $first_name";
    echo ":";
    echo "</h4>";
    echo "<h5>";
    echo $about;
    echo "</h5>";

    echo "<h4>Overall Rating so far:</h4>";
    echo "<h5>";
    echo $rating;
    echo "</h5>";

    $sql5 = "SELECT S_name, User_ID_ST, start_date, end_date, negotiated_salary,
    salary_type FROM teacher_student_track WHERE User_ID_T = $value ";
    $id5 = mysql_query($sql5) or die(mysql_error());

    echo "<h4>
    Currently Teaching:
    </h4>";

    echo "<table>";
    echo "<tr>";
    echo "<th colspan='2'>";
    echo "Student Name";
    echo "</th><th colspan='2'>";
    echo "Negotiated Salary";
    echo "</th><th colspan='2'>";
    echo "Start Date";
    echo "</th><th colspan='2'>";
    echo "End Date";
    echo "</th>";
    echo "</tr>";

    $i = 0;

    /*$int = mysql_num_rows($id5);
    echo $int;*/

    if (mysql_num_rows($id5) == 0) {
        echo "<th colspan='8'>";
        echo "NOT TEACHING ANYBODY AT THE MOMENT.";
        echo "</th>";
    }

    while ($row5 = mysql_fetch_array($id5)) {
        echo "<tr>";
        echo "<td>";
        echo ++$i;
        echo ")";
        echo "</td>";
        echo "<td>";
        echo $row5['S_name'];
        echo "</td>";
        echo "<td colspan='2'>";
        echo "TK. ";
        echo $row5['negotiated_salary'];
        echo " ";
        echo $row5['salary_type'];
        echo "</td>";
        echo "<td colspan='2'>";
        echo $row5['start_date'];
        echo "</td>";
        echo "<td colspan='2'>";
        if ($row5['end_date'] == '0000-00-00') {
            echo "not set yet";
        } else
            echo $row5['end_date'];
        echo "</td>";
        /*$value = $row5['User_ID_ST'];

        if($row5['end_date'] == '0000-00-00')
        {
            echo "<td colspan='2'>";
            echo "<form action='end_date.php' method='post'>";
            echo "<button name ='submit' type='submit' value = $value >Add End Date</button>";
            echo "</form>";
            echo "</td>";
        }*/

        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";

    $sql6 = "SELECT DISTINCT User_ID FROM student WHERE Username = '$username_st' ";
    $id6 = mysql_query($sql6) or die(mysql_error());

    while ($row6 = mysql_fetch_array($id6))
    {
        $st_user_id = $row6['User_ID'];
    }

    $sql7 = "SELECT User_ID_ST FROM survey WHERE User_ID_ST = $st_user_id AND User_ID_T = $value";
    $id7 = mysql_query($sql7) or die(mysql_error());

    if(mysql_num_rows($id7) == 0)
    {
        echo "<h4>";
        echo "<form action='survey.php' method='post'>";
        echo "<td colspan='2'>";
        echo "<button name ='survey' type='submit' value = $value style = 'width: 35%'>
        Take a survey on $first_name</button>";
        echo "</h4>";
    }

    else if(mysql_num_rows($id7) != 0)
    {
        echo "<h4>
        You have already taken a survey on this teacher. Thanks!
        </h4>";
    }
}

?>

<div class="middlecorner" id="profile">

    <?php

    $sql8 = "SELECT COUNT(User_ID_ST) FROM survey WHERE User_ID_T = $value";
    $id8 = mysql_query($sql8);

    while($row8 = mysql_fetch_array( $id8 ))
    {
        $student_no = $row8['COUNT(User_ID_ST)'];
    }

    $check = 0;

    if($student_no == 0)
    {
        $student_no = 1;
        echo "<table>";
        echo "<th colspan='8'>";
        echo "Nobody has taken a survey on this teacher yet. Be the first one!";
        echo "</th>";
        echo "</table>";
        $check = 1;
    }

    //echo $student_no;

    $sql9 = "SELECT COUNT(q1_yes_no) FROM survey WHERE User_ID_T = $value AND q1_yes_no = 'Yes' ";
    $id9= mysql_query($sql9);

    while($row9 = mysql_fetch_array( $id9 ))
    {
        $friendly = $row9['COUNT(q1_yes_no)'];
    }

    //echo ($friendly/$student_no) * 100 ;
    $friendly = ($friendly/$student_no) * 100;

    $sql10 = "SELECT COUNT(q2_yes_no) FROM survey WHERE User_ID_T = $value AND q2_yes_no = 'Yes' ";
    $id10= mysql_query($sql10);

    while($row10 = mysql_fetch_array( $id10 ))
    {
        $recommend = $row10['COUNT(q2_yes_no)'];
    }

    //echo ($recommend/$student_no) * 100;
    $recommend = ($recommend/$student_no) * 100;

    $sql11 = "SELECT COUNT(q3_yes_no) FROM survey WHERE User_ID_T = $value AND q3_yes_no = 'Yes' ";
    $id11= mysql_query($sql11);

    while($row11 = mysql_fetch_array( $id11 ))
    {
        $punctual = $row11['COUNT(q3_yes_no)'];
    }

    //echo ($punctual/$student_no) * 100;
    $punctual = ($punctual/$student_no) * 100;

    $sql12 = "SELECT COUNT(q4_yes_no) FROM survey WHERE User_ID_T = $value AND q4_yes_no = 'Yes' ";
    $id12= mysql_query($sql12);

    while($row12 = mysql_fetch_array( $id12 ))
    {
        $efficient = $row12['COUNT(q4_yes_no)'];
    }

    //echo ($efficient/$student_no) * 100;
    $efficient = ($efficient/$student_no) * 100;

    include('F:\Raafa\CSE331L Project Database\PhpstormProjects\libchart\libchart\classes\libchart.php');

    $chart = new PieChart(500, 250);

    $dataSet = new XYDataSet();
    $dataSet->addPoint(new Point("Friendliness", $friendly));
    $dataSet->addPoint(new Point("Worth Recommending", $recommend));
    $dataSet->addPoint(new Point("Punctuality", $punctual));
    $dataSet->addPoint(new Point("Efficiency", $efficient));
    $chart->setDataSet($dataSet);

    $chart->setTitle("Teacher Survey Results");
    $chart->render("teacherpie.png");

    if($check != 1)
    {
        echo "<img alt='Pie chart'  src='teacherpie.png' style='border: 1px solid gray;'/>";
    }

    ?>

</div>

</body>
</html>