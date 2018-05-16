<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/6603c9fd94.js"></script>
</head>

<body>
    <div id="container">
        <form action="change.php" method="post">
            <input name="passNew1" placeholder="Naujas slaptažodis" type="password">
            <input name="passNew2" placeholder="Pakartokite naują slaptažodį" type="password">
        </form>

        <button onclick="login()">Keisti</button>
    </div>
    <p></p>

    <script>
        function login() {
            $('p').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Connecting...</span>');

            $.post('change.php', {
                pass1: $('input[name="passNew1"]').val(),
                pass2: $('input[name="passNew2"]').val()
            }).done(function(resp) {
                if (resp.success) {
                    $('#container').empty();
                    $('p').html('Slaptažodis pakeistas');
                    lentele();
                } else {
                    $('p').html(resp.error)
                }
            });
            
        }

        function lentele() {
            //TODO
        }
    </script>
</body>
</html>