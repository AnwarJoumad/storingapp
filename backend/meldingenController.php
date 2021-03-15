<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$attractie = $_POST['attractie'];
if(empty($attractie))
{
 $errors[] = "Vul de attractie-naam in.";
}
$group = $_POST['group'];
if(empty($group))
{
 $errors[] = "Vul de attractie-type in.";
}
$capaciteit = $_POST['capaciteit'];
$capaciteit = $_POST['capaciteit'];
if(!is_numeric($capaciteit))
{
 $errors[] = "Vul voor capaciteit een geldig getal in.";
}



if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}
$overig = $_POST['overig'];
$melder = $_POST['melder'];
if(empty($attractie))
{
 $errors[] = "Vul de melder in.";
}


if(isset($errors))
{
 var_dump($errors);
 die();
}



//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, overige_info, melder)
VALUES(:attractie, :type, :capaciteit, :prioriteit, :overige_info, :melder)";

$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":type" => $group,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overig,
    ":melder" => $melder,
]);

header("Location: ../meldingen/index.php?msg=Melding opgeslagen");