<?php
include("connect.php");
$ward = $_GET["ward"];

$SELECT = 
    "SELECT nurse.id_nurse, nurse.name, nurse.date, nurse.department, nurse.shift FROM nurse
    INNER JOIN nurse_ward ON nurse.id_nurse= nurse_ward.fid_nurse
    WHERE nurse_ward.fid_ward = 
    (SELECT ward.id_ward FROM ward WHERE ward.name= :ward)";

try {
    $stmt = $dbh->prepare($SELECT);
    $stmt->bindValue(":ward", $ward);
    $stmt->execute();

    $res = $stmt->fetchAll();
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo($nurse)?></title>
</head>
<body>
    <h2>nurses of the <?php echo($nurse)?> ward</h2>

    <?php
    if (count($res) == 0) {
        echo("<p>$ward does not have any nurses in it</p>");
    } else {
    ?>
        <table>
            <thead>
                <th>id</th>
                <th>name</th>
                <th>date</th>
                <th>department</th>
                <th>shift</th>
            </thead>
            <tbody>
                <?php 
                foreach ($res as $row) {
                    echo("<tr><td>$row[0]</td>");
                    echo("<td>$row[1]</td>");
                    echo("<td>$row[2]</td>");
                    echo("<td>$row[3]</td>");
                    echo("<td>$row[4]</td>");
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