<html lang="en">
<head>
    <title>{{$title ?? "Log Viewer"}} | Log Viewer</title>
    <meta charset="utf-8" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://static.aldevadigital.com/atlassian-apps/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://static.aldevadigital.com/atlassian-apps/jquery-ui/1.12.1/jquery-ui.min.css">
    <script src="https://static.aldevadigital.com/atlassian-apps/jquery-ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Open Sans", sans-serif;
        }
    </style>

    @stack("styles")
    @stack("libs")

</head>
<body>
@yield("main")

@stack("scripts")
</body>
</html>
