<!DOCTYPE html>
<html lang="en">
<head>
    <title>ErkRegister - CRUD</title>
    <meta charset="UTF-8">
</head>
<body>

<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <p>Welke categorie wilt u veranderen?</p>
    <input type="radio" name="category" value="deelnemers" onclick="this.form.submit();"> Deelnemers<br>
    <input type="radio" name="category" value="opleidingen" onclick="this.form.submit();"> Opleidingen<br>
    <input type="radio" name="category" value="klassen" onclick="this.form.submit();"> Klassen<br><br>
    <!-- Form will be submitted as soon as the user selects a radio option -->
</form>
</body>
</html>

<?php
require_once("connect.php");

if(isset($_GET['category'])) {
    $category = $_GET['category'];
    if($category === "deelnemers") {
        echo "<form method='get' action=".htmlspecialchars($_SERVER['PHP_SELF'])."?category=deelnemers>";
        echo "<input type='radio' name='crudoption1' value='create' onclick='this.form.submit();'> Create<br>";
        echo "<input type='radio' name='crudoption1' value='read' onclick='this.form.submit();'> Read<br>";
        echo "<input type='radio' name='crudoption1' value='update' onclick='this.form.submit();'> Update<br>";
        echo "<input type='radio' name='crudoption1' value='delete' onclick='this.form.submit();'> Delete<br><br>";
        echo "</form>";
    }
    else if ($category === "opleidingen") {
        echo "<form method='get' action=".htmlspecialchars($_SERVER['PHP_SELF'])."?category=opleidingen>";
        echo "<input type='radio' name='crudoption2' value='create' onclick='this.form.submit();'> Create<br>";
        echo "<input type='radio' name='crudoption2' value='read' onclick='this.form.submit();'> Read<br>";
        echo "<input type='radio' name='crudoption2' value='update' onclick='this.form.submit();'> Update<br>";
        echo "<input type='radio' name='crudoption2' value='delete' onclick='this.form.submit();'> Delete<br><br>";
        echo "</form>";
    }
    else {
        echo "<form method='get' action=".htmlspecialchars($_SERVER['PHP_SELF'])."?category=klassen>";
        echo "<input type='radio' name='crudoption3' value='create' onclick='this.form.submit();'> Create<br>";
        echo "<input type='radio' name='crudoption3' value='read' onclick='this.form.submit();'> Read<br>";
        echo "<input type='radio' name='crudoption3' value='update' onclick='this.form.submit();'> Update<br>";
        echo "<input type='radio' name='crudoption3' value='delete' onclick='this.form.submit();'> Delete<br><br>";
        echo "</form>";
    }
}
        if (isset($_GET['crudoption1'])) {
            $crudoption1 = $_GET['crudoption1'];

            if ($crudoption1 === "create") {
                echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=deelnemers&crudoption1=create>";
                echo "<p>Nieuwe deelnemer toevoegen</p>";
                echo "Voornaam: <input type='text' name='voornaam' placeholder='voornaam' required><br>";
                echo "Tussenvoegsel (bijv. van der): <input type='text' name='tussenvoegsel'><br>";
                echo "Achternaam: <input type='text' name='achternaam' placeholder='achternaam' required><br>";
                echo "Adres: <input type='text' name='adres' placeholder='adres' required><br>";
                echo "Postcode: <input type='text' name='postcode' placeholder='postcode' required><br>";
                echo "Geboortedatum (YYYY-MM-DD): <input type='text' name='geboortedatum' placeholder='geboortedatum' required><br>";
                echo "Telefoon nr.: <input type='text' name='telefoon' placeholder='telefoon' required><br>";
                echo "Mobiel nr.: <input type='text' name='mobiel' placeholder='mobiel' required><br>";
                echo "<input type='radio' name='rol' value='docent' required> Docent<br>";
                echo "<input type='radio' name='rol' value='student' required> Student<br>";
                echo "<input type=submit>";
                echo "</form>";
                if (isset($_POST["voornaam"])) {
                    $voornaam = $_POST["voornaam"];
                    $tussenvoegsel = $_POST["tussenvoegsel"];
                    $achternaam = $_POST["achternaam"];
                    $adres = $_POST["adres"];
                    $postcode = $_POST["postcode"];
                    $geboortedatum = $_POST["geboortedatum"];
                    $telefoon = $_POST["telefoon"];
                    $mobiel = $_POST["mobiel"];
                    $actief = 1;
                    $rol = $_POST["rol"];


                    $sql = "INSERT INTO deelnemer (deelnemer_voornaam,deelnemer_tussenvoegsel,
                            deelnemer_achternaam,deelnemer_adres,deelnemer_postcode,deelnemer_geboortedatum,
                            deelnemer_telefoon,deelnemer_mobiel,deelnemer_actief,deelnemer_rol) 
                            VALUES 
                            ('" . $voornaam . "', '" . $tussenvoegsel . "', '" . $achternaam . "', '" . $adres . "', '" . $postcode . "',
                             '" . $geboortedatum . "', '" . $telefoon . "', '" . $mobiel . "',  '" . $actief . "', '" . $rol . "')";
                    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                }


            } else if ($crudoption1 === "read") {
                $sql = "SELECT * FROM deelnemer";
                $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>DeelnemerID</th>";
                echo "<th>Voornaam</th>";
                echo "<th>Tussenvoegsel</th>";
                echo "<th>Achternaam</th>";
                echo "<th>Adres</th>";
                echo "<th>Postcode</th>";
                echo "<th>Geboortedatum</th>";
                echo "<th>Telefoon nr.</th>";
                echo "<th>Mobiel nr.</th>";
                echo "<th>Actief</th>";
                echo "<th>Rol</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($res as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['deelnemer_ID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_voornaam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_tussenvoegsel'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_achternaam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_adres'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_postcode'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_geboortedatum'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_telefoon'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_mobiel'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_actief'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deelnemer_rol'];
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";


            } else if ($crudoption1 === "update") {
                echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=deelnemers&crudoption1=update>";
                echo "<p>Deelnemer bijwerken.</p>";
                echo "Voer ID in: <input type='text' name='deelnemerID' placeholder='ID' required><br>";
                echo "<input type='submit' name='deelnemerupdsubmit'><br><br>";
                echo "</form>";
                if (isset($_POST["deelnemerupdsubmit"])) {
                    $deelnemerID = $_POST["deelnemerID"];
                    $sql = "SELECT * FROM deelnemer WHERE deelnemer_ID = '" . $deelnemerID . "'";
                    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                    foreach ($res as $row) {
                        echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . ">";
                        echo "<p>Verander de velden en druk op 'Bijwerken'</p>";
                        echo "<input type='hidden' name='deelnemerID' value='{$row['deelnemer_ID']}'>";
                        echo "Voornaam: <input type='text' name='voornaam' value='{$row['deelnemer_voornaam']}' required><br>";
                        echo "Tussenvoegsel (bijv. van der): <input type='text' name='tussenvoegsel' value='{$row['deelnemer_tussenvoegsel']}'><br>";
                        echo "Achternaam: <input type='text' name='achternaam' value='{$row['deelnemer_achternaam']}' required><br>";
                        echo "Adres: <input type='text' name='adres' value='{$row['deelnemer_adres']}' required><br>";
                        echo "Postcode: <input type='text' name='postcode' value='{$row['deelnemer_postcode']}' required><br>";
                        echo "Geboortedatum (YYYY-MM-DD): <input type='text' name='geboortedatum' value='{$row['deelnemer_geboortedatum']}' required><br>";
                        echo "Telefoon nr.: <input type='text' name='telefoon' value='{$row['deelnemer_telefoon']}' required><br>";
                        echo "Mobiel nr.: <input type='text' name='mobiel' value='{$row['deelnemer_mobiel']}' required><br>";
                        echo "Rol: <input type='text' name='rol' value='{$row['deelnemer_rol']}' required> (docent/student)<br>";
                    }
                    echo "<input type='submit' name='update_deelnemer' value='Bijwerken'>";
                    echo "</form>";
                }
            }
            if (isset($_POST["voornaam"])) {
                $deelnemerID = $_POST["deelnemerID"];
                $voornaam = $_POST["voornaam"];
                $tussenvoegsel = $_POST["tussenvoegsel"];
                $achternaam = $_POST["achternaam"];
                $adres = $_POST["adres"];
                $postcode = $_POST["postcode"];
                $geboortedatum = $_POST["geboortedatum"];
                $telefoon = $_POST["telefoon"];
                $mobiel = $_POST["mobiel"];
                $rol = $_POST["rol"];

                $sql = "UPDATE deelnemer SET deelnemer_voornaam='" . $voornaam . "', deelnemer_tussenvoegsel='" . $tussenvoegsel . "', 
                                deelnemer_achternaam='" . $achternaam . "', deelnemer_adres='" . $adres . "', deelnemer_postcode='" . $postcode . "',
                                deelnemer_geboortedatum='" . $geboortedatum . "', deelnemer_telefoon='" . $telefoon . "', deelnemer_mobiel='" . $mobiel . "',
                                deelnemer_rol='" . $rol . "' WHERE deelnemer_ID = '" . $deelnemerID . "'";
                $res = mysqli_query($con, $sql) or die (mysqli_error($con));

            }

            if ($crudoption1 === "delete") {
                echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=deelnemers&crudoption1=delete>";
                echo "<p>Deelnemer verwijderen.</p>";
                echo "Voer ID in: <input type='text' name='deelnemerID' placeholder='ID' required><br>";
                echo "<input type='submit' name='deletedeelnemer' value='Verwijder deelnemer'><br><br>";
                echo "</form>";
            }
                if (isset($_POST["deletedeelnemer"])) {
                    $deelnemerID = $_POST["deelnemerID"];
                    $sql = "SELECT deelnemer_ID, deelnemer_voornaam, deelnemer_tussenvoegsel, deelnemer_achternaam, deelnemer_rol from deelnemer WHERE deelnemer_ID = '" . $deelnemerID . "'";
                    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                    foreach ($res as $row) {
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Voornaam</th>";
                        echo "<th>Tussen</th>";
                        echo "<th>Achternaam</th>";
                        echo "<th>Rol</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>";
                        echo $row["deelnemer_ID"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["deelnemer_voornaam"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["deelnemer_tussenvoegsel"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["deelnemer_achternaam"];
                        echo "</td>";
                        echo "<td>";
                        echo $row["deelnemer_rol"];
                        echo "</td>";
                    }


                    echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=deelnemers&crudoption1=delete>";
                    echo "<p>Weet u zeker dat u deze deelnemer wil verwijderen?</p>";
                    echo "<input type='submit' name='deelnemerdelsubmit' value='Verwijderen'><br><br>";
                    echo "<input type='hidden' name='deelnemerID' value='$deelnemerID'>";
                    echo "</form>";
                }

                    if (isset($_POST["deelnemerdelsubmit"])) {
                        $deelnemerID = $_POST["deelnemerID"];
                        $sql = "DELETE FROM deelnemer WHERE deelnemer_ID = '" . $deelnemerID . "'";
                        $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                    }



        }
        else if (isset($_GET["crudoption2"])) {
            $crudoption2 = $_GET["crudoption2"];

            if ($crudoption2 === "create") {
                echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=opleidingen&crudoption2=create>";
                echo "<p>Nieuwe opleiding toevoegen</p>";
                echo "Naam opleiding: <input type='text' name='opleidingnaam' placeholder='Naam opleiding' required><br>";
                echo "Startdatum: <input type='text' name='opleidingstart' placeholder='YYYY-MM-DD'><br>";
                echo "Einddatum: <input type='text' name='opleidingeind' placeholder='YYYY-MM-DD' required><br>";
                echo "<input type='submit' name='opleidingcrsubmit' value='Toevoegen'>";
                echo "</form>";
                if (isset($_POST["opleidingcrsubmit"])) {
                    $opleidingNaam = $_POST["opleidingnaam"];
                    $opleidingStart = $_POST["opleidingstart"];
                    $opleidingEind = $_POST["opleidingeind"];


                    $sql = "INSERT INTO opleiding (opleiding_naam,opleiding_start,
                            opleiding_eind) 
                            VALUES 
                            ('" . $opleidingNaam . "', '" . $opleidingStart . "',  '" . $opleidingEind . "')";
                    $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                }

            } else if ($crudoption2 === "read") {
                $sql = "SELECT * FROM opleiding";
                $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>OpleidingID</th>";
                echo "<th>Naam</th>";
                echo "<th>Startdatum</th>";
                echo "<th>Einddatum</th>";
                echo "<tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($res as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['opleiding_ID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['opleiding_naam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['opleiding_start'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['opleiding_eind'];
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else if ($crudoption2 === "update") {
                echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . "?category=opleidingen&crudoption2=update>";
                echo "<p>Opleiding bijwerken.</p>";
                echo "Voer ID in: <input type='text' name='opleidingID' placeholder='ID' required><br>";
                echo "<input type='submit' name='opleidingupdsubmit'><br><br>";
                echo "</form>";

            }

            if (isset($_POST["opleidingupdsubmit"])) {
                $opleidingID = $_POST["opleidingID"];
                $sql = "SELECT * FROM opleiding WHERE opleiding_ID = '" . $opleidingID . "'";
                $res = mysqli_query($con, $sql) or die (mysqli_error($con));
                foreach ($res as $row) {
                    echo "<form method='post' action=" . htmlspecialchars($_SERVER['PHP_SELF']) . ">";
                    echo "<p>Verander de velden en druk op 'Bijwerken'</p>";
                    echo "<input type='hidden' name='opleidingID' value='{$row['opleiding_ID']}'>";
                    echo "Naam opleiding: <input type='text' name='opleidingnaam' value='{$row['opleiding_naam']}' required><br>";
                    echo "Startdatum: <input type='text' name='opleidingstart' value='{$row['opleiding_start']}'><br>";
                    echo "Einddatum: <input type='text' name='opleidingeind' value='{$row['opleiding_eind']}'><br>";
                }
                echo "<input type='submit' name='update_opleiding' value='Bijwerken'>";
                echo "</form>";


            if (isset($_POST["update_opleiding"])) {
                echo $_POST["opleidingstart"];
                $opleidingID = $_POST["opleidingID"];
                $opleidingNaam = $_POST["opleidingnaam"];
                $opleidingStart = $_POST["opleidingstart"];
                $opleidingEind = $_POST["opleidingeind"];

                $sql = "UPDATE opleiding SET 
                    opleiding_naam='" . $opleidingNaam . "', 
                    opleiding_start='2019-12-31',
                    opleiding_eind='" . $opleidingEind . "' 
                    WHERE opleiding_ID = '" . $opleidingID . "'";
                $res = mysqli_query($con, $sql) or die (mysqli_error($con));
            }
            }
        }








