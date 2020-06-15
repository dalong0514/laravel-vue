<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="http://yui.yahooapis.com/3.18.1/build/yui/yui-min.js"></script>
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

    <script>
    // Create a YUI sandbox on your page.
    YUI().use('node', 'event', function (Y) {
        // The Node and Event modules are loaded and ready to use.
        // Your code goes here!
        console.log('dalong');
    });
    </script>
</body>

</html>