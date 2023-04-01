<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pampelDOC</title>
    <style>
        body {
            background-color: #444;
            color: #ddd;
            font-size: 1.4rem;
        }
    </style>
</head>
<body>
    <form action="calculatorOutput.php" method="POST">
        <label for="number1">Zahl1</label>
        <input type="number" id="number1" name="number1" required autofocus><br>
        <label for="number2">Zahl2</label>
        <input type="number" id="number2" name="number2" required><br>
        <input type="submit" name="compute" value="+">
        <input type="submit" name="compute" value="-">
        <input type="submit" name="compute" value="*">
        <input type="submit" name="compute" value="/">
        <input type="submit" name="compute" value="%">
    </form>
</body>
</html>
