<?php
    $web_library_code = [];

    for ($i=0; $i<15 ; $i++) {
    # for ($i=0; $i<1 ; $i++) {
        $value_holder_1 = $i * 2 + 1;
        $value_holder_2 = $value_holder_1 + 1;
        if ($value_holder_1 < 10) {
            $value_holder_1 = "0".$value_holder_1;
        }
        if ($value_holder_2 < 10) {
            $value_holder_2 = "0".$value_holder_2;
        }
        $web_library_code[$i] = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-$value_holder_1-$value_holder_2-hundred.html");
    }

    $counter = 0;
    foreach ($web_library_code as $key => $value) {
        preg_match_all("|<li>[\s]*([\w]*)[\s]*</li>|U", $value, $out, PREG_PATTERN_ORDER);
        foreach ($out[1] as $key_out => $value_out) {
            $word_bank[$counter] = $value_out;
            $counter += 1;
        }
    }

    $password = "Please Enter Parameters...";

    if (isset($_GET["number_of_word"])) {
        if ($_GET["number_of_word"] >=1 AND $_GET["number_of_word"] <=9) {
            $password = "";
            for ($i=0; $i<$_GET["number_of_word"]; $i++) {
                $password = $password.$word_bank[array_rand($word_bank)];
                if ($i<$_GET["number_of_word"]-1) {
                    $password = $password."-";
                }
            }

            if (isset($_GET["add_number"])) {
                $password = $password.rand(0, 9);
            }

            if (isset($_GET["add_symbol"])) {
                $symbol_bank = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "+", "-", "=", "{", "}", "|", "[", "]", "\"", "\\", "/", ":"];
                $password = $password.$symbol_bank[array_rand($symbol_bank)];
            }

            echo $password;
        }
    }
    else {
        $password = "ERROR";
        echo $password;
    }
?>
