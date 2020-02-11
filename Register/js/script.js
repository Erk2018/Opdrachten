var varValue = "";

$(document).ready(function(){
    $(document).on('click', '#deelnemerButton', function(){
        varValue = 'deelnemers';
        dispDeelnemers();
    });

    $(document).on('click', '#opleidingButton', function(){
        varValue = 'opleidingen';
        dispOpleidingen();
    });

    $(document).on('click', '#klasButton', function(){
        varValue = 'klassen';
        dispKlassen();
    });

    $(document).on('keyup', '#deelnemerSearch', function() {
        varValue = 'deelnemers';
        dispDeelnemerSearch();
    });

    $(document).on('keyup', "#opleidingSearch", function() {
        varValue = 'opleidingen';
        dispOpleidingSearch();
    });

    $(document).on('keyup', "#klasSearch", function(){
        varValue = 'klassen';
        dispKlasSearch();
    });
});

function dispDeelnemers() {
    varValue = "deelnemers";
        $.ajax({
            url: "apps/deelnemers/process.php",
            type: "POST",
            data: {action: varValue},
            dataType: "html",
            cache: false,
            success: function (data) {
                $("#displaycrud").html(data);
            }
        });
}

function dispDeelnemerSearch() {
    var deelnemerSearch = $('#deelnemerSearch').val();
    $.ajax({
        url: "apps/deelnemers/process.php",
        type: "POST",
        data: {action: 'searchdeelnemers', deelnemerSearch : deelnemerSearch},
        dataType: "html",
        cache: false,
        success: function (data) {
            $("#displaycrud").html(data);
        }
    });
}

function dispOpleidingen() {
    varValue = "opleidingen";
        $.ajax({
            url: "apps/opleidingen/process.php",
            type: "POST",
            data: {action: varValue},
            dataType: "html",
            cache: false,
            success: function (data) {
                $("#displaycrud").html(data);
            }
        });
}

function dispOpleidingSearch() {
    var opleidingSearch = $('#opleidingSearch').val();
    $.ajax({
        url: "apps/opleidingen/process.php",
        type: "POST",
        data: {action: 'searchopleidingen', opleidingSearch : opleidingSearch},
        dataType: "html",
        cache: false,
        success: function (data) {
            $("#displaycrud").html(data);
        }
    });
}

function dispKlassen() {
    varValue = "klassen";
        $.ajax({
            url: "apps/klassen/process.php",
            type: "POST",
            data: {action: varValue},
            dataType: "html",
            cache: false,
            success: function (data) {
                $("#displaycrud").html(data);
            }
        });
}

function dispKlasSearch() {
    var klasSearch = $('#klasSearch').val();
    $.ajax({
        url: "apps/klassen/process.php",
        type: "POST",
        data: {action: 'searchklassen', klasSearch : klasSearch},
        dataType: "html",
        cache: false,
        success: function (data) {
            $("#displaycrud").html(data);
        }
    });
}

        $(document).on('click', '#addDeelnemer', function() {
            var addform = $('#myModalValues');
            var modalconfirm = $('.modal-footer').find('#modalconfirm');
            $('#myModalHeader').find('.modal-title').text("Nieuwe deelnemer toevoegen");
            addform.html("<label>Voornaam:</label><input type='text' name='Voornaam' id='voornaam' pattern='[a-zA-z]{1-20}'><br>" +
                "            <label>Tussenvoegsel:</label><input type='text' name='tussenvoegsel' id='tussenvoegsel' pattern='[a-zA-z]{0-8}'><br>" +
                "            <label>Achternaam:</label><input type='text' name='achternaam' id='achternaam' pattern='[a-zA-z]{1-20}'><br>" +
                "            <label>Adres:</label><input type='text' name='adres' id='adres' pattern='[a-zA-z](?=.*\\d){1-30}'><br>" +
                "            <label>Postcode:</label><input type='text' name='postcode' id='postcode' pattern='[1-9][0-9]{3}\\s?[a-zA-Z]{2}' title='Voer een geldige postcode in.'><br>" +
                "            <label>Geboortedatum:</label><input type='text' name='geboortedatum' id='geboortedatum' placeholder='JJJJ-MM-DD' pattern='[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])' title='Voer een geldige datum in. (JJJJ-MM-DD)'><br>" +
                "            <label>Telefoon:</label><input type='text' name='telefoon' id='telefoon' pattern='[0-9]{10}' title='Voer een geldig nummer in.'><br>" +
                "            <label>Mobiel:</label><input type='text' name='mobiel' id='mobiel' pattern='[0-9]{10}' title='Voer een geldig nummer in.'><br>" +
                "            <label>Rol:</label><input type='text' name='rol' id='rol' placeholder='docent/student'><br>" +
                "            <label>Actief:</label><input type='checkbox' name='actief' id='actief' value='1'>");
            modalconfirm.removeClass('editsave editsavedeelnemer editsaveopleiding editsaveklas');
            modalconfirm.addClass('addsavedeelnemer');
            $('#myModal').modal();
        });

        $(document).on('click', '.addsavedeelnemer', function() {
            var addform = $('#myModalValues');
            var voornaam = addform.find('#voornaam').val();
            var tussenvoegsel = addform.find('#tussenvoegsel').val();
            var achternaam = addform.find('#achternaam').val();
            var adres = addform.find('#adres').val();
            var postcode = addform.find('#postcode').val();
            var geboortedatum = addform.find('#geboortedatum').val();
            var telefoon = addform.find('#telefoon').val();
            var mobiel = addform.find('#mobiel').val();
            var rol = addform.find('#rol').val();
            var actief = addform.find('#actief').val();

            $.ajax({
                url: "apps/deelnemers/process.php",
                type: "POST",
                data: {action: 'addDeelnemer', voornaam : voornaam, tussenvoegsel : tussenvoegsel,
                    achternaam : achternaam, adres : adres, postcode : postcode, geboortedatum : geboortedatum,
                    telefoon : telefoon, mobiel : mobiel, rol : rol, actief : actief
                    },
                dataType: "html",
                cache: false,
                success: function (data) {
                    $('#myModal').modal('hide');
                    dispDeelnemers();
                    if (data == 1) {
                        alert("Deelnemer is toegevoegd!");
                    } else {
                        alert("Er is een fout opgetreden. De deelnemer is niet toegevoegd. Controleer of je de gegevens juist hebt ingevoerd.");
                    }
                }
            })
        });

        $(document).on('click', '.edit-deelnemer', function () {
            var editID = $(this).attr('data-editid');
            $.ajax({
                url: "apps/deelnemers/process.php",
                type: "POST",
                data: {action: 'editDeelnemer', editID: editID},
                dataType: "html",
                cache: false,
                success: function (data) {

                    var editform = $('#myModalValues');
                    $('#myModalHeader').find('.modal-title').text("Bewerk deelnemer");
                    editform.html(data);
                    $('.modal-footer').find('#modalconfirm').removeClass('addsavedeelnemer addsaveopleiding addsaveklas addsave editsaveopleiding editsaveklas editsave').addClass('editsavedeelnemer');
                    $('#myModal').modal();
                }

            });
        });

        $(document).on('click', '.editsavedeelnemer', function () {
            var editform = $('#myModalValues');
            var editID = editform.find('#deelnemerID').val();
            var voornaam = editform.find('#voornaam').val();
            var tussenvoegsel = editform.find('#tussenvoegsel').val();
            var achternaam = editform.find('#achternaam').val();
            var adres = editform.find('#adres').val();
            var postcode = editform.find('#postcode').val();
            var geboortedatum = editform.find('#geboortedatum').val();
            var telefoon = editform.find('#telefoon').val();
            var mobiel = editform.find('#mobiel').val();
            var rol = editform.find('#rol').val();
            var actief = editform.find('.actief').val();

            $.ajax({
                url: "apps/deelnemers/process.php",
                type: "POST",
                data: {
                    action: 'updateDeelnemer', editID: editID, voornaam: voornaam,
                    tussenvoegsel: tussenvoegsel, achternaam: achternaam, adres: adres, postcode: postcode,
                    geboortedatum: geboortedatum, telefoon: telefoon, mobiel: mobiel, rol: rol, actief: actief
                },
                dataType: "html",
                cache: false,
                success: function (data) {
                    $('#myModal').modal('hide');
                    dispDeelnemers();
                    if (data == 1) {
                        alert("Deelnemer is succesvol bijgewerkt!");
                    } else {
                        alert("Er is een fout opgetreden. De deelnemer is niet bijgewerkt.");
                    }
                }
            })

        });

        $(document).on('click', '.delete-deelnemer', function () {
            var deleteID = $(this).attr('data-deleteid');
            var msg;
            $.ajax({
                url: "apps/deelnemers/process.php",
                type: "POST",
                data: {action: 'deleteDeelnemer', deleteID: deleteID},
                dataType: "html",
                cache: false,
                success: function (data) {
                    if (data == 1) {
                        msg = "De deelnemer is verwijderd!";
                        alert(msg);
                    } else {
                        msg = "Er is een fout opgetreden. De deelnemer is niet verwijderd.";
                        alert(msg);
                    }
                    dispDeelnemers();
                }
            })
        });


$(document).on('click', '#addOpleiding', function() {
    var addform = $('#myModalValues');
    var modalconfirm = $('.modal-footer').find('#modalconfirm');
    $('#myModalHeader').find('.modal-title').text("Nieuwe opleiding toevoegen");
    addform.html("<label>Naam:</label><input type='text' name='opleidingnaam' id='opleidingnaam'><br>" +
        "         <label>Startdatum:</label><input type='text' name='opleidingstart' id='opleidingstart' placeholder='JJJJ-MM-DD'><br>" +
        "         <label>Einddatum:</label><input type='text' name='opleidingeind' id='opleidingeind' placeholder='JJJJ-MM-DD'><br>");
    modalconfirm.removeClass('editsavedeelnemer editsaveopleiding editsaveklas editsave addsavedeelnemer addsaveklas');
    modalconfirm.addClass('addsaveopleiding');
    $('#myModal').modal();
});

$(document).on('click', '.addsaveopleiding', function() {
    var addform = $('#myModalValues');
    var opleidingnaam = addform.find('#opleidingnaam').val();
    var opleidingstart = addform.find('#opleidingstart').val();
    var opleidingeind = addform.find('#opleidingeind').val();

    $.ajax({
        url: "apps/opleidingen/process.php",
        type: "POST",
        data: {action: 'addOpleiding', opleidingnaam : opleidingnaam, opleidingstart : opleidingstart, opleidingeind : opleidingeind
        },
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#myModal').modal('hide');
            dispOpleidingen();
            if (data == 1) {
                alert("Opleiding is toegevoegd!");
            } else {
                alert("Er is een fout opgetreden. De opleiding is niet toegevoegd.");
            }
        }
    })
});

$(document).on('click', '.edit-opleiding', function () {
    var editID = $(this).attr('data-editid');
    $.ajax({
        url: "apps/opleidingen/process.php",
        type: "POST",
        data: {action: 'editOpleiding', editID: editID},
        dataType: "html",
        cache: false,
        success: function (data) {

            var editform = $('#myModalValues');
            $('#myModalHeader').find('.modal-title').text("Bewerk opleiding");
            editform.html(data);
            $('.modal-footer').find('#modalconfirm').removeClass('addsavedeelnemer addsaveopleiding addsaveklas addsave editsavedeelnemer editsaveklas editsave').addClass('editsaveopleiding');
            $('#myModal').modal();
        }

    });
});

$(document).on('click', '.editsaveopleiding', function () {
    var editform = $('#myModalValues');
    var editID = editform.find('#opleidingid').val();
    var opleidingnaam = editform.find('#opleidingnaam').val();
    var opleidingstart = editform.find('#opleidingstart').val();
    var opleidingeind = editform.find('#opleidingeind').val();

    $.ajax({
        url: "apps/opleidingen/process.php",
        type: "POST",
        data: {
            action: 'updateOpleiding', editID: editID, opleidingnaam : opleidingnaam,
            opleidingstart : opleidingstart, opleidingeind : opleidingeind
        },
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#myModal').modal('hide');
            dispOpleidingen();
            if (data == 1) {
                alert("Opleiding is succesvol bijgewerkt!");
            } else {
                alert("Er is een fout opgetreden. De opleiding is niet bijgewerkt.");
            }
        }
    })

});

$(document).on('click', '.delete-opleiding', function () {
    var deleteID = $(this).attr('data-deleteid');
    var msg;
    $.ajax({
        url: "apps/opleidingen/process.php",
        type: "POST",
        data: {action: 'deleteOpleiding', deleteID: deleteID},
        dataType: "html",
        cache: false,
        success: function (data) {
            if (data == 1) {
                msg = "De opleiding is verwijderd!";
                alert(msg);
            } else {
                msg = "Er is een fout opgetreden. De opleiding is niet verwijderd.";
                alert(msg);
            }
            dispOpleidingen();
        }
    })
});

$(document).on('click', '#addKlas', function() {
    var addform = $('#myModalValues');
    var modalconfirm = $('.modal-footer').find('#modalconfirm');
    $('#myModalHeader').find('.modal-title').text("Nieuwe klas toevoegen");
    addform.html("<label>Klasnaam:</label><input type='text' name='klasnaam' id='klasnaam'><br>" +
        "         <label>Opleiding:</label><input type='text' name='klasopleiding' id='klasopleiding'><br>");
    modalconfirm.removeClass('editsavedeelnemer editsaveopleiding editsaveklas editsave addsavedeelnemer addsaveopleiding addsave');
    modalconfirm.addClass('addsaveklas');
    $('#myModal').modal();
});

$(document).on('click', '.addsaveklas', function() {
    var addform = $('#myModalValues');
    var klasnaam = addform.find('#klasnaam').val();
    var klasopleiding = addform.find('#klasopleiding').val();

    $.ajax({
        url: "apps/klassen/process.php",
        type: "POST",
        data: {action: 'addKlas', klasnaam : klasnaam, klasopleiding : klasopleiding
        },
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#myModal').modal('hide');
            dispKlassen();
            if (data == 1) {
                alert("Klas is toegevoegd!");
            } else {
                alert("Er is een fout opgetreden. De klas is niet toegevoegd.");
            }
        }
    })
});

$(document).on('click', '.edit-klas', function () {
    var editID = $(this).attr('data-editid');
    $.ajax({
        url: "apps/klassen/process.php",
        type: "POST",
        data: {action: 'editKlas', editID: editID},
        dataType: "html",
        cache: false,
        success: function (data) {

            var editform = $('#myModalValues');
            $('#myModalHeader').find('.modal-title').text("Bewerk klas");
            editform.html(data);
            $('.modal-footer').find('#modalconfirm').removeClass('addsavedeelnemer addsaveopleiding addsaveklas addsave editsavedeelnemer editsaveopleiding editsave').addClass('editsaveklas');
            $('#myModal').modal();
        }

    });
});

$(document).on('click', '.editsaveklas', function () {
    var editform = $('#myModalValues');
    var editID = editform.find('#klasid').val();
    var klasnaam = editform.find('#klasnaam').val();
    var klasopleiding = editform.find('#klasopleiding').val();

    alert(editID);

    $.ajax({
        url: "apps/klassen/process.php",
        type: "POST",
        data: {
            action: 'updateKlas', editID: editID, klasnaam : klasnaam, klasopleiding : klasopleiding
        },
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#myModal').modal('hide');
            dispKlassen();
            if (data == 1) {
                alert("Klas is succesvol bijgewerkt!");
            } else {
                alert("Er is een fout opgetreden. De klas is niet bijgewerkt.");
            }
        }
    })

});

$(document).on('click', '.delete-klas', function () {
    var deleteID = $(this).attr('data-deleteid');
    var msg;
    $.ajax({
        url: "apps/klassen/process.php",
        type: "POST",
        data: {action: 'deleteKlas', deleteID: deleteID},
        dataType: "html",
        cache: false,
        success: function (data) {
            if (data == 1) {
                msg = "De klas is verwijderd!";
                alert(msg);
            } else {
                msg = "Er is een fout opgetreden. De klas is niet verwijderd.";
                alert(msg);
            }
            dispKlassen();
        }
    })
});