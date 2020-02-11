<!DOCTYPE html>
<html lang="nl">
<head>
    <title>test</title>
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../../js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/jquery/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/825da8a2f7.js" crossorigin="anonymous"></script>
    <script>
        $(document).on('click','#open',function(){
            $('#test').show();
            $('#open').hide();
            $('#hide').show();
        });

        $(document).on('click', '#hide',function(){
            $('#test').hide();
            $('#hide').hide();
            $('#open').show();
        });
    </script>
</head>
<body>
<button type="button" id="open" class="btn btn-success"><i class="fa fa-trash"></i> Open</button>
<div id="test" style="display:none;">
<h3>Ik ben Erkan</h3>
    <button type="button" id="hide" class="btn btn-secondary"><i class="fa fa-envelope-open"></i> Close</button>
</div>
</body>
</html>
