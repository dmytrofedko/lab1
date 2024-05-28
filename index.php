<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>lab1</title>
</head>
<body>
    <!--перелік палат, у яких чергує обрана медсестра-->
    <form action="select1.php" method="get">
      <div class="form-info">
        <h2>you choose nurse, i show ward</h2>
        <label for="nurse">what nurse</label> 
        <select name="nurse" id="nurse"> 
            <?php
            include("connect.php");

            $SELECT = "SELECT name FROM nurse";
            try {
                $stmt = $dbh->prepare($SELECT);
                $stmt->execute();
                $res = $stmt->fetchAll();
                foreach ($res as $row) {
                    echo("<option value='$row[0]'>$row[0]</option>");
                }
            } catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
            ?>
        </select>
      </div>
        <input type="submit" value="Submit">
    </form>

    <!--медсестри обраного відділення-->
    <form action="select2.php" method="get">
      <div class="form-info">
        <h2>you choose ward, i show nurse</h2>
        <label for="ward">what ward</label> 
        <select name="ward" id="ward"> 
            <?php
            include("connect.php");

            $SELECT = "SELECT name FROM ward";
            try {
                $stmt = $dbh->prepare($SELECT);
                $stmt->execute();
                $res = $stmt->fetchAll();
                foreach ($res as $row) {
                    echo("<option value='$row[0]'>$row[0]</option>");
                }
            } catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
            ?>
        </select>
      </div>
        <input type="submit" value="Submit">
    </form>

    <!--чергування (у будь-яких палатах) у зазначену зміну-->
    <form action="select3.php" method="get">
      <div class="form-info">
        <h2>you choose shift, i show nurses</h2>
        <label for="shift">what shift</label> 
        <select name="shift" id="shift"> 
            <option value="First">First</option>
            <option value="Second">Second</option>
            <option value="Third">Third</option>
        </select>
      </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>