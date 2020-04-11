<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
</head>

<body>
    <div id="app">
        <welcome :title="'{{$title}}'"></welcome>
    </div>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>