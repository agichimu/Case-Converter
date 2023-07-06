<!DOCTYPE html>
<html>
<head>
    <title>Reverse Only Letters</title>
</head>
<body>
    <h1>Reverse Only Letters</h1>

    <form method="POST" action="">
        <label for="word">Enter a word:</label>
        <input type="text" name="word" id="word" required>
        <button type="submit">Reverse</button>
    </form>

    <?php
    function reverseOnlyLetters($word) {
        if (preg_match('/[0-9]/', $word)) {
        }

        $letters = preg_replace('/[^a-zA-Z]/', '', $word);
        $reversed = strrev($letters);
        $result = '';
        $index = 0;

        for ($i = 0; $i < strlen($word); $i++) {
            if (ctype_alpha($word[$i])) {
                $result .= $reversed[$index];
                $index++;
            } else {
                $result .= $word[$i];
            }
        }

        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $word = $_POST["word"];
        $reversedWord = reverseOnlyLetters($word);
        echo "<p>Reversed Word: " . $reversedWord . "</p>";
    }
    ?>

</body>
</html>
