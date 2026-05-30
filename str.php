<?php

$students=[
    [
        'name'=>'danish',
        "marks"=>[90, 95, 92],
        'Roll no'=>'51'
    ],
    [
        'name'=>'Ahmar',
        "marks"=>[85, 80, 90],
        'Roll no'=>'52'
    ],
    [
        'name'=>'Ali',
        "marks"=>[70, 75, 80],
        'Roll no'=>'53'
    ]

];
function gettotal ($marks){
    return array_sum($marks);
}
// echo gettotal($students[0]['marks'])."<br>";
// echo gettotal($students[1]['marks'])."<br>";
// echo gettotal($students[2]['marks'])."<br>";

function getpercentage($marks){
    $total=gettotal($marks);
    return ($total/300)*100;
}
// echo getpercentage($students[0]['marks'])."<br>";
// echo getpercentage($students[1]['marks'])."<br>";
// echo getpercentage($students[2]['marks'])."<br>";
// echo ucfirst($students[0]['name'])."<br>";


function getgrade($percentage){
    switch(true){
    case ($percentage>=90);
        return 'A';
        break;
    case ($percentage>=80);
       return 'B';
        break;
    case ($percentage>=70);
        return'C';
        break;
    default:
        echo 'F';
    }
    }

// echo getgrade(getpercentage($students[0]['marks']))."<br>";
// echo getgrade(getpercentage($students[1]['marks']))."<br>";
// echo getgrade(getpercentage($students[2]['marks']))."<br>";
// /////////////////////////
function searchStudent(){
    $searchRoll=$_GET['searchRoll'];
    global $students;
    foreach($students as $student){
        if($student['Roll no']==$searchRoll){
            echo "Name: ".ucfirst($student['name'])."<br>";
            echo "Roll No: ".$student['Roll no']."<br>";
            echo "Total Marks: ".gettotal($student['marks'])."<br>";
            echo "Percentage: ".getpercentage($student['marks'])."%<br>";
            echo "Grade: ".getgrade(getpercentage($student['marks']))."<br>"; 
            return;
        }
    }
    echo "Student with Roll No $searchRoll not found.";
}
?>


<form method="GET">
    <input type="text" name="searchRoll" placeholder="Search by Roll No">
    <button type="submit">Search</button>
</form>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Roll No</th>
        <th>Total Marks</th>
        <th>Percentage</th>
        <th>Grade</th>
    </tr>

    <?php
    foreach ($students as $student) {
        echo "<tr>";

        echo "<td>" . ucfirst($student['name']) . "</td>";
        echo "<td>" . $student['Roll no'] . "</td>";
        echo "<td>" . gettotal($student['marks']) . "</td>";
        echo "<td>" . getpercentage($student['marks']) . "%</td>";
        echo "<td>" . getgrade(getpercentage($student['marks'])) . "</td>";

        echo "</tr>";
    }
    ?>
</table>
<?php
if (isset($_GET['searchRoll'])) {
    searchStudent();
} 
?>