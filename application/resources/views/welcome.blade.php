<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="96x96" href="static/img/favicon.ico">
    <title>TB.Botman</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/')
        ]);

        if (isset($user)) {
            echo "localStorage.setItem('api_token', '".$user->api_token."')";
        }

        ?>
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>