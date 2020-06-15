<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" 
    href="http://yui.yahooapis.com/2.9.0/build/logger/assets/skins/sam/logger.css"> 
    <script src="http://yui.yahooapis.com/3.18.1/build/yui/yui-min.js"></script>

    <script>
        function convertCurrency(amount, rateOfConversion) {
            // Business logic to convert currency
        }
        // Create a new YUI instance and populate it with the required modules.
        YUI().use('test-console', function (Y) {
            // Test is available and ready for use. Add implementation
            // code here.

            // in the container (div here) with id testLogs.
            new Y.Test.Console().render('#testLogs');

            // run the tests
            Y.Test.Runner.run();
        });
    </script>
</head>
<body class="yui3-skin-sam">
    <div id="testLogs"></div>
</body>
</html>