<!DOCTYPE html>

<html>
    <head>
        <title>P2</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css" type="text/css">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $("form.ajax").on("submit", function() {
                    if ($("#number_of_word").val() >=1 && $("#number_of_word").val() <=9) {
                        $.ajax({
                            url: "logic.php",
                            data: {
                                number_of_word: $("#number_of_word").val(),
                                add_number: $("#add_number:checked").val(),
                                add_symbol: $("#add_symbol:checked").val()
                            },
                            type: "POST",
                            dataType : "json",
                            success: function(result) {
                                $(".password").html(result);
                            },
                        });
                    }
                    else $(".password").html("<p id=\"generate_fail\">Invalid Input</p>");
                    return false;
                });
            });
        </script>
        <?php require("logic.php") ?>
    </head>

    <body>
        <h1>xkcd Password Generator</h1>
        <div class="password">
            <p id="ready_to_generate">Please Enter Parameters...</p>
        </div>
        <div>
            <form class="ajax" action="index.php" method="get">
                <label for="number_of_word"># of word</label>
                <input type="text" maxlength="1" name="number_of_word" id="number_of_word">
                <label class="hit" for="number_of_word">(9 Max)</label>
                <br>
                <input type="checkbox" name="add_number" id="add_number">
                <label for="add_number">Add a number.</label>
                <br>
                <input type="checkbox" name="add_symbol" id="add_symbol">
                <label for="add_symbol">Add a symbol.</label>
                <br>
                <input class="button" type="submit" value="Show Me Passworld">
            </form>
        </div>
        <div>
            <img src="http://imgs.xkcd.com/comics/password_strength.png" alt="Stronger and easy to remember pass.">
            <br>
            <p>Inspired by<a href="http://www.xkcd.com">xkcd</a>.</p>
        </div>
    </body>
</html>
