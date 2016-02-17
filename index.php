<!DOCTYPE html>

<html>
    <head>
        <title>P2</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css" type="text/css">
        <?php require("logic.php") ?>
    </head>

    <body>
        <h1>xkcd Password Generator<h1>
        <p id="passworld"><?php echo $password ?></p>
        <form action="index.php" method="get">
            <label for="number_of_word"># of word</label>
            <input type="text" maxlength="1" name="number_of_word" id="number_of_word">
            <label for="number_of_word">(9 Max)</label>
            <br>
            <input type="checkbox" name="add_number" id="add_number">
            <label for="add_number">Add a number.</label>
            <br>
            <input type="checkbox" name="add_symbol" id="add_symbol">
            <label for="add_symbol">Add a symbol.</label>
            <input type="submit" value="Show Me Passworld">
        </form>
        <img src="http://imgs.xkcd.com/comics/password_strength.png">
        <br>
        <p>Inspired by<a href="http://www.xkcd.com">xkcd</a>.</p>
    </body>
</html>
