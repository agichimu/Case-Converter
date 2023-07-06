<!DOCTYPE html>
<html>
<head>
    <title>Rearrange Spaces Between Words</title>
</head>
<body>
    <h1>Rearrange Spaces Between Words</h1>

    <form method="POST" action="">
        <label for="sentence">Enter a sentence:</label>
        <input type="text" name="sentence" id="sentence" required>
        <button type="submit">Rearrange Spaces</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $sentence = $_POST["sentence"];
        $words = preg_split('/\s+/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
        $numWords = count($words);

        if ($numWords <= 1) {
            $rearrangedSentence = $sentence; // No rearrangement needed
        } else {
            $numSpaces = $numWords - 1;
            $spacesBetweenWords = str_repeat(' ', intdiv(strlen($sentence) - strlen(implode($words)), $numSpaces));
            $extraSpaces = $numSpaces % $numWords;
            $rearrangedSentence = implode($words, $spacesBetweenWords) . str_repeat(' ', $extraSpaces);
        }

        echo "<p>Rearranged Sentence: " . $rearrangedSentence . "</p>";
    }
    ?>

</body>
</html>
