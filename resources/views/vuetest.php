<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <div id="app">
        {{ message }}
    </div>

    <script>
        var app = new Vue({
            el: "#app",
            data: {
                message: "hello Vue",
            }
        })
    </script>
    
</body>
</html>