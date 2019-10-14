<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <br>
    <center>
        <h3>Redirecting to payment website in <span id="counter">5</span>.<br><br> Search for <strong><i>DELHI PUBLIC KIDS SCHOOL BHOPAL</i></strong> </h3>
        <br>

        <img src="{{ asset('website/img/loading.gif') }}">

    </center>

    <script>
        setInterval(function () {
            var div = document.querySelector("#counter");
            var count = div.textContent * 1 - 1;
            div.textContent = count;
            if (count <= 0) {
                window.location.replace("https://eazypay.icicibank.com");
            }
        }, 1000);
    </script>
</body>

</html>
