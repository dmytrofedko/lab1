<?php
include("connect.php");
$nurse = $_GET["nurse"];

$SELECT = 
    "SELECT ward.id_ward, ward.name FROM ward
    INNER JOIN nurse_ward ON ward.id_ward= nurse_ward.fid_ward
    WHERE nurse_ward.fid_nurse = 
    (SELECT nurse.id_nurse FROM nurse WHERE nurse.name= :nurse)";

try {
    $stmt = $dbh->prepare($SELECT);
    $stmt->bindValue(":nurse", $nurse);
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
    <h2>wards of the <?php echo($nurse)?> nurse</h2>

    <?php
    if (count($res) == 0) {
        echo("<p>$nurse does not have any shifts in any wards</p>");
    } else {
    ?>
        <table>
            <thead>
                <th>id</th>
                <th>name</th>
            </thead>
            <tbody>
                <?php 
                foreach ($res as $row) {
                    echo("<tr><td>$row[0]</td>");
                    echo("<td>$row[1]</td>");
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