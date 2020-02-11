<?php

include "../../config/connect.php";
if ($_REQUEST['action'] == 'klassen') {
    $sql = "SELECT * FROM klas ORDER BY klas_naam";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
    $klasTabel = "
       <div class='tableHeader'>
    <button type='button' id='addKlas' class='btn btn-primary addButton'>Nieuwe klas <i class='fa fa-plus'></i></button>
    <input type='text' id='klasSearch' class='searchinput' name='klasSearch' value='' placeholder='Zoek op klasnaam'>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Klasnaam</th>
                <th>Opleiding</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while ($row = mysqli_fetch_array($res)) {
        $klasTabel .= "
            <tr class='table-info'>
                <td>" . $row['klas_naam'] . "</td>
                <td>" . $row['klas_opleiding'] . "</td>
                <td><button type='button' id='editKlas' class='btn btn-warning edit-klas' data-editid='" . $row['klas_ID'] . "'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteKlas' class='btn btn-danger delete-klas' data-deleteid='" . $row['klas_ID'] . "'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $klasTabel .= "
        </tbody>
    </table>";
    echo $klasTabel;
}
else if($_REQUEST['action']=='deleteKlas') {
    $klas_ID = $_REQUEST['deleteID'];
    $sql = "DELETE FROM klas WHERE klas_id = '".$klas_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if($res){
        echo 1;
    }else{
        echo 0;
    }

}
else if($_REQUEST['action']=='editKlas') {
    $klas_ID = $_REQUEST['editID'];
    $sql = "SELECT * from klas WHERE klas_id = '".$klas_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row=mysqli_fetch_array($res)) {
        $klasnaam = $row['klas_naam'];
        $klasopleiding = $row['klas_opleiding'];

        $klasForm= "<input type='hidden' name='klasid' id='klasid' value='{$klas_ID}'>
            Klasnaam:<input type='text' name='klasnaam' id='klasnaam' value='{$klasnaam}'><br>
            Opleiding:<input type='text' name='klasopleiding' id='klasopleiding' value='{$klasopleiding}'><br>";
    }
    echo $klasForm;
}
else if ($_REQUEST['action']=='updateKlas') {
    $klas_ID = $_REQUEST['editID'];
    $klasnaam = $_REQUEST['klasnaam'];
    $klasopleiding = $_REQUEST['klasopleiding'];

    $sql = "UPDATE klas SET klas_naam = '$klasnaam', klas_opleiding = '$klasopleiding' WHERE klas_id = '$klas_ID'";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));

    if ($res){
        echo 1;
    }
    else {
        echo 0;
    }
}
else if ($_REQUEST['action']=='addKlas') {
    $klasnaam = $_REQUEST['klasnaam'];
    $klasopleiding = $_REQUEST['klasopleiding'];

    $sql = "INSERT INTO klas (klas_naam, klas_opleiding, klas_actief) VALUES ('".$klasnaam."', '".$klasopleiding."', '1')";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if ($res) {
        echo 1;
    }
    else {
        echo 0;
    }
}
else if ($_REQUEST['action'] == 'searchklassen') {

    $klasnaam = $_REQUEST['klasSearch'];
    $sql = "SELECT * FROM klas WHERE klas_naam LIKE '%$klasnaam%' ORDER BY klas_naam";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
    $klasTabel = "
    <div class='tableHeader'>
    <button type='button' id='addKlas' class='btn btn-primary addButton'>Nieuwe klas <i class='fa fa-plus'></i></button>
    <input type='text' id='klasSearch' class='searchinput' name='klasSearch' value='$klasnaam' placeholder='Zoek op klasnaam'>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Klasnaam</th>
                <th>Opleiding</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while ($row = mysqli_fetch_array($res)) {
        $klasTabel .= "
            <tr class='table-info'>
                <td>" . $row['klas_naam'] . "</td>
                <td>" . $row['klas_opleiding'] . "</td>
                <td><button type='button' id='editKlas' class='btn btn-warning edit-klas' data-editid='" . $row['klas_ID'] . "'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteKlas' class='btn btn-danger delete-klas' data-deleteid='" . $row['klas_ID'] . "'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $klasTabel .= "
        </tbody>
    </table>";
    echo $klasTabel;
}