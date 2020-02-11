<?php

include "../../config/connect.php";
if ($_REQUEST['action'] == 'opleidingen') {
    $sql = "SELECT * FROM opleiding ORDER BY opleiding_naam";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
    $opleidingTabel = "
    <div class='tableHeader'>
    <button type='button' id='addOpleiding' class='btn btn-primary addButton'>Nieuwe opleiding <i class='fa fa-plus'></i></button>
    <input type='text' id='opleidingSearch' class='searchinput' name='opleidingSearch' value='' placeholder='Zoek op opleidingnaam'>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Naam opleiding</th>
                <th>Startdatum</th>
                <th>Einddatum</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while ($row = mysqli_fetch_array($res)) {
        $opleidingTabel .= "
            <tr class='table-info'>
                <td>" . $row['opleiding_naam'] . "</td>
                <td>" . $row['opleiding_start'] . "</td>
                <td>" . $row['opleiding_eind'] . "</td>
                <td><button type='button' id='editOpleiding' class='btn btn-warning edit-opleiding' data-editid='" . $row['opleiding_ID'] . "'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteOpleiding' class='btn btn-danger delete-opleiding' data-deleteid='" . $row['opleiding_ID'] . "'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $opleidingTabel .= "
        </tbody>
    </table>";
    echo $opleidingTabel;
}
else if($_REQUEST['action']=='deleteOpleiding') {
    $opleiding_ID = $_REQUEST['deleteID'];
    $sql = "DELETE FROM opleiding WHERE opleiding_id = '".$opleiding_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if($res){
        echo 1;
    }else{
        echo 0;
    }

}
else if($_REQUEST['action']=='editOpleiding') {
    $opleiding_ID = $_REQUEST['editID'];
    $sql = "SELECT * from opleiding WHERE opleiding_id = '".$opleiding_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row=mysqli_fetch_array($res)) {
        $opleidingnaam = $row['opleiding_naam'];
        $opleidingstart = $row['opleiding_start'];
        $opleidingeind = $row['opleiding_eind'];

        $opleidingForm= "<input type='hidden' name='opleidingid' id='opleidingid' value='{$opleiding_ID}'>
            Opleiding naam:<input type='text' name='opleidingnaam' id='opleidingnaam' value='{$opleidingnaam}'><br>
            Startdatum:<input type='text' name='opleidingstart' id='opleidingstart' value='{$opleidingstart}'><br>
            Einddatum:<input type='text' name='opleidingeind' id='opleidingeind' value='{$opleidingeind}'><br>";
    }
    echo $opleidingForm;
}
else if ($_REQUEST['action']=='updateOpleiding') {
    $opleiding_ID = $_REQUEST['editID'];
    $opleidingnaam = $_REQUEST['opleidingnaam'];
    $opleidingstart = $_REQUEST['opleidingstart'];
    $opleidingeind = $_REQUEST['opleidingeind'];

    $sql = "UPDATE opleiding SET opleiding_naam = '$opleidingnaam', opleiding_start = '$opleidingstart',
            opleiding_eind = '$opleidingeind' WHERE opleiding_id = '$opleiding_ID'";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));

    if ($res){
        echo 1;
    }
    else {
        echo 0;
    }
}
else if ($_REQUEST['action']=='addOpleiding') {
    $opleidingnaam = $_REQUEST['opleidingnaam'];
    $opleidingstart = $_REQUEST['opleidingstart'];
    $opleidingeind = $_REQUEST['opleidingeind'];

    $sql = "INSERT INTO opleiding (opleiding_naam, opleiding_start, opleiding_eind) VALUES ('".$opleidingnaam."', 
    '".$opleidingstart."', '".$opleidingeind."')";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if ($res) {
        echo 1;
    }
    else {
        echo 0;
    }
}
else if ($_REQUEST['action']=='searchopleidingen') {

    $opleidingnaam = $_REQUEST['opleidingSearch'];
    $sql = "SELECT * FROM opleiding WHERE opleiding_naam LIKE '%$opleidingnaam%' ORDER BY opleiding_naam";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
    $opleidingTabel = "
    <div class='tableHeader'>
    <button type='button' id='addOpleiding' class='btn btn-primary addButton'>Nieuwe opleiding <i class='fa fa-plus'></i></button>
    <input type='text' id='opleidingSearch' class='searchinput' name='opleidingSearch' value='$opleidingnaam' placeholder='Zoek op opleidingnaam'>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Naam opleiding</th>
                <th>Startdatum</th>
                <th>Einddatum</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while ($row = mysqli_fetch_array($res)) {
        $opleidingTabel .= "
            <tr class='table-info'>
                <td>" . $row['opleiding_naam'] . "</td>
                <td>" . $row['opleiding_start'] . "</td>
                <td>" . $row['opleiding_eind'] . "</td>
                <td><button type='button' id='editOpleiding' class='btn btn-warning edit-opleiding' data-editid='" . $row['opleiding_ID'] . "'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteOpleiding' class='btn btn-danger delete-opleiding' data-deleteid='" . $row['opleiding_ID'] . "'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $opleidingTabel .= "
        </tbody>
    </table>";
    echo $opleidingTabel;
}