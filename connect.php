<?php
try 
{
    $dbh = new PDO("mysql:host=localhost;dbname=iteh2lb1var4", "root", "");
} catch (PDOException $ex) { echo $ex->GetMessage(); }