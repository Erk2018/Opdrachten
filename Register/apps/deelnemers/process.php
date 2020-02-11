<?php
include "../../config/connect.php";
if($_REQUEST['action']=='deelnemers'){
    $sql ="SELECT * FROM deelnemer ORDER BY deelnemer_voornaam";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    $deelnemerTabel="
    <div class='tableHeader'>
    <button type='button' id='addDeelnemer' class='btn btn-primary addButton'>Nieuwe deelnemer <i class='fa fa-plus'></i></button>
    <input type='text' id='deelnemerSearch' class='searchinput' name='deelnemerSearch' value='' placeholder='Zoek op voornaam'>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Geboortedatum</th>
                <th>Telefoon nr.</th>
                <th>Mobiel nr.</th>
                <th>Functie</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while($row=mysqli_fetch_array($res)){
        $deelnemerTabel.="
            <tr class='table-info'>
                <td>".$row['deelnemer_voornaam']."</td>
                <td>".$row['deelnemer_tussenvoegsel']."</td>
                <td>".$row['deelnemer_achternaam']."</td>
                <td>".$row['deelnemer_adres']."</td>
                <td>".$row['deelnemer_postcode']."</td>
                <td>".$row['deelnemer_geboortedatum']."</td>
                <td>".$row['deelnemer_telefoon']."</td>
                <td>".$row['deelnemer_mobiel']."</td>
                <td>".$row['deelnemer_rol']."</td>
                <td><button type='button' id='editDeelnemer' class='btn btn-warning edit-deelnemer' data-editid='".$row['deelnemer_ID']."'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteDeelnemer' class='btn btn-danger delete-deelnemer' data-deleteid='".$row['deelnemer_ID']."'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $deelnemerTabel.="
        </tbody>
    </table>";
    echo $deelnemerTabel;
}
else if($_REQUEST['action']=='deleteDeelnemer') {
    $deelnemer_ID = $_REQUEST['deleteID'];
    $sql = "DELETE FROM deelnemer WHERE deelnemer_id = '".$deelnemer_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if($res){
        echo 1;
    }else{
        echo 0;
    }

}
else if($_REQUEST['action']=='editDeelnemer') {
    $deelnemer_ID = $_REQUEST['editID'];
    $sql = "SELECT * from deelnemer WHERE deelnemer_id = '".$deelnemer_ID."'";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row=mysqli_fetch_array($res)) {
        $voornaam = $row['deelnemer_voornaam'];
        $tussenvoegsel = $row['deelnemer_tussenvoegsel'];
        $achternaam = $row['deelnemer_achternaam'];
        $adres = $row['deelnemer_adres'];
        $postcode = $row['deelnemer_postcode'];
        $geboortedatum = $row['deelnemer_geboortedatum'];
        $telefoon = $row['deelnemer_telefoon'];
        $mobiel = $row['deelnemer_mobiel'];
        $actief = $row['deelnemer_actief'];
        $rol = $row['deelnemer_rol'];

        $deelnemerForm= "<input type='hidden' name='deelnemerid' id='deelnemerID' value='{$deelnemer_ID}'>
            Voornaam:<input type='text' name='Voornaam' id='voornaam' value='{$voornaam}'><br>
            Tussenvoegsel:<input type='text' name='tussenvoegsel' id='tussenvoegsel' value='{$tussenvoegsel}'><br>
            Achternaam:<input type='text' name='achternaam' id='achternaam' value='{$achternaam}'><br>
            Adres:<input type='text' name='adres' id='adres' value='{$adres}'><br>
            Postcode:<input type='text' name='postcode' id='postcode' value='{$postcode}'><br>
            Geboortedatum:<input type='text' name='geboortedatum' id='geboortedatum' value='{$geboortedatum}'><br>
            Telefoon:<input type='text' name='telefoon' id='telefoon' value='{$telefoon}'><br>
            Mobiel:<input type='text' name='mobiel' id='mobiel' value='{$mobiel}'><br>
            Rol:<input type='text' name='rol' id='rol' value='{$rol}'><br>
                    <input type='hidden' name='actief' class='actief' value='0'>
            Actief:<input type='checkbox' name='actief' class='actief' value='{$actief}'>";
        }
        echo $deelnemerForm;
}
else if ($_REQUEST['action']=='updateDeelnemer') {
    $deelnemer_ID = $_REQUEST['editID'];
    $voornaam = $_REQUEST['voornaam'];
    $tussenvoegsel = $_REQUEST['tussenvoegsel'];
    $achternaam = $_REQUEST['achternaam'];
    $adres = $_REQUEST['adres'];
    $postcode = $_REQUEST['postcode'];
    $geboortedatum = $_REQUEST['geboortedatum'];
    $telefoon = $_REQUEST['telefoon'];
    $mobiel = $_REQUEST['mobiel'];
    $rol = $_REQUEST['rol'];
    $actief = $_REQUEST['actief'];

    $sql = "UPDATE deelnemer SET deelnemer_voornaam = '$voornaam', deelnemer_tussenvoegsel = '$tussenvoegsel',
            deelnemer_achternaam = '$achternaam', deelnemer_adres = '$adres', deelnemer_postcode = '$postcode',
            deelnemer_geboortedatum = '$geboortedatum', deelnemer_telefoon = '$telefoon', deelnemer_mobiel = '$mobiel',
            deelnemer_rol = '$rol' WHERE deelnemer_id = '$deelnemer_ID'";
    $res = mysqli_query($con, $sql) or die (mysqli_error($con));

    if ($res){
        echo 1;
    }
    else {
        echo 0;
    }
}
else if ($_REQUEST['action']=='addDeelnemer') {
    $voornaam = $_REQUEST['voornaam'];
    $tussenvoegsel = $_REQUEST['tussenvoegsel'];
    $achternaam = $_REQUEST['achternaam'];
    $adres = $_REQUEST['adres'];
    $postcode = $_REQUEST['postcode'];
    $geboortedatum = $_REQUEST['geboortedatum'];
    $telefoon = $_REQUEST['telefoon'];
    $mobiel = $_REQUEST['mobiel'];
    $rol = $_REQUEST['rol'];
    $actief = $_REQUEST['actief'];

    $sql = "INSERT INTO deelnemer (deelnemer_voornaam, deelnemer_tussenvoegsel, deelnemer_achternaam,
            deelnemer_adres, deelnemer_postcode, deelnemer_geboortedatum, deelnemer_telefoon, deelnemer_mobiel,
            deelnemer_rol, deelnemer_actief) VALUES ('".$voornaam."', '".$tussenvoegsel."', '".$achternaam."',
            '".$adres."', '".$postcode."', '".$geboortedatum."', '".$telefoon."', '".$mobiel."', '".$rol."', 
            '".$actief."')";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    if ($res) {
        echo 1;
    }
    else {
        echo 0;
    }
}
else if($_REQUEST['action']=='searchdeelnemers'){

    $deelnemernaam = $_REQUEST['deelnemerSearch'];
    $sql ="SELECT * FROM deelnemer WHERE deelnemer_voornaam LIKE '%$deelnemernaam%' ORDER BY deelnemer_voornaam";
    $res = mysqli_query($con,$sql) or die (mysqli_error($con));
    $deelnemerTabel="
    <div class='tableHeader'>
    <button type='button' id='addDeelnemer' class='btn btn-primary addButton'>Nieuwe deelnemer <i class='fa fa-plus'></i></button>
    <input type='text' id='deelnemerSearch' class='searchinput' name='deelnemerSearch' value='$deelnemernaam' placeholder='Zoek op voornaam'>
    </div>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Geboortedatum</th>
                <th>Telefoon nr.</th>
                <th>Mobiel nr.</th>
                <th>Functie</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    ";
    while($row=mysqli_fetch_array($res)){
        $deelnemerTabel.="
            <tr class='table-info'>
                <td>".$row['deelnemer_voornaam']."</td>
                <td>".$row['deelnemer_tussenvoegsel']."</td>
                <td>".$row['deelnemer_achternaam']."</td>
                <td>".$row['deelnemer_adres']."</td>
                <td>".$row['deelnemer_postcode']."</td>
                <td>".$row['deelnemer_geboortedatum']."</td>
                <td>".$row['deelnemer_telefoon']."</td>
                <td>".$row['deelnemer_mobiel']."</td>
                <td>".$row['deelnemer_rol']."</td>
                <td><button type='button' id='editDeelnemer' class='btn btn-warning edit-deelnemer' data-editid='".$row['deelnemer_ID']."'><i class='fa fa-pencil'></i></button></td>
                <td><button type='button' id='deleteDeelnemer' class='btn btn-danger delete-deelnemer' data-deleteid='".$row['deelnemer_ID']."'><i class='fa fa-trash'></i></button></td>
            </tr>";
    }
    $deelnemerTabel.="
        </tbody>
    </table>";
    echo $deelnemerTabel;
}