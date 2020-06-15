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
        // All our functions and tests go here
        function convertCurrency(amount, rateOfConversion) {
            // Business logic to convert currency
            let toCurrencyAmount = 0;
            toCurrencyAmount = rateOfConversion * amount;
            toCurrencyAmount = Number.parseFloat(toCurrencyAmount).toFixed(2);
            return toCurrencyAmount;
        }
        // Create a new YUI instance and populate it with the required modules.
        YUI().use('test-console', function (Y) {
            // Test is available and ready for use. Add implementation
            // code here.
            let testCase = new Y.Test.Case({
                setUp: () => {
                    this.expectedResult = 1.59;
                },
                tearDown: () => {
                    delete this.expectedResult;
                },
                testCurrencyConversion: () => {
                    Y.Assert.areEqual(expectedResult, convertCurrency(100, 1/63), 
                    '100 INR should be equal to $ 1.59');
                }
            });

            // in the container (div here) with id testLogs.
            new Y.Test.Console({
                newstOnTop: false,
                width: '800px',
                height: '600px',
            }).render('#testLogs');

            Y.Test.Runner.add(testCase);
            // run the tests
            Y.Test.Runner.run();
        });
    </script>
</head>
<body class="yui3-skin-sam">
    <div id="testLogs"></div>
</body>
</html>