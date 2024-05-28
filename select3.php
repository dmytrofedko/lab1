<?php
include("connect.php");
$shift = $_GET["shift"];

$SELECT = 
    "SELECT nurse.id_nurse, nurse.name, nurse.date, nurse.department FROM nurse
    WHERE nurse.shift = :shift";

try 
{
    $statement = $dbh->prepare($SELECT);
    $statement->execute([':shift' => $shift]);
    $res = $statement->fetchAll();
} catch (PDOException $ex) { echo $ex->GetMessage(); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo($shift)?></title>
</head>
<body>
    <h2>nurses that work <?php echo($shift)?> shift</h2>

    <?php
    if (count($res) == 0) 
    {
        echo("<p>$shift does not have any nurses in it</p>");
    } 
    else 
    {
    ?>
        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>date</th>
                <th>department</th>
            </thead>
            <tbody>
                <?php 
                foreach ($res as $row) 
                {
                    echo("<tr><td>$row[0]</td>");
                    echo("<td>$row[1]</td>");
                    echo("<td>$row[2]</td>");
                    echo("<td>$row[3]</td>");
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    $dbh = null;
    ?>
</body>
</html>