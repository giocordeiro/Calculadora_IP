<?php include 'CalcIP.php'; ?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calculadora IP</title>
    <style>
        body {
            font-style: normal;
            font-weight: 500;
            font-family: Andele mono monospace;
            font-size: 25px;
            line-height: 1.2;
            background: radial-gradient(#EED5D2,#CDB7B5, #8B7D7B);
        }
        .resultado{
            border-style: double;
            border-top: 5px double #CD6090;
            border-left: 5px double #CD6090;
            border-right: 5px double #CD6090;
            border-bottom: 5px double #CD6090;
            background-color: #EED5D2;
            color: #CD6090;
        }


    </style>
</head>
<body>
    <section>
        <h1> Calculadora IP </h1>
    </section>
    <form method="POST">
        <b style="color: #CD6090"> IP/CIDR </b> <small>(Ex.: 192.168.0.1/24)</small> <br>
        <input style="border:1.5px solid white; line-height: 2.5; padding: 0 10px; width: 150px;" type="text" name="ip" value="<?php echo @$_POST['ip'];?>">
        <input style="border:1.5px solid antiquewhite; background: white; color: #CD6090; font-weight: 600; cursor: pointer; line-height: 2.5; padding: 0 10px;" type="submit" value="Calcular">
    </form>
    </section>

</body>
</html>
