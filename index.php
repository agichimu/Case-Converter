<!DOCTYPE html>
<html>
<head>
    <title>Project-Case Converter</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
   

    <?php
    $convertedSentence = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sentence = $_POST['sentence'];
        $case = $_POST['case'];
        $convertedSentence = convertToCase($sentence, $case);
    }

    function convertToCase($sentence, $case) {
        $words = explode(' ', $sentence);

        switch ($case) {
            case 'camel':
                $convertedWords = array_map(function ($word) {
                    return lcfirst($word);
                }, $words);
                return implode('', $convertedWords);

            case 'snake':
                return implode('_', $words);

            case 'kebab':
                return implode('-', $words);

            case 'pascal':
                $convertedWords = array_map(function ($word) {
                    return ucfirst($word);
                }, $words);
                return implode('', $convertedWords);

            case 'upper':
                $convertedWords = array_map('strtoupper', $words);
                return implode('_', $convertedWords);

            default:
                return $sentence; 
        }
    }
    ?>
    <div>
        <h1>Project-Case Converter</h1>
    <form method="POST">
        <label for="sentence">Enter a sentence:</label>
        <input type="text" name="sentence" id="sentence" required><br>

        <label for="case">Select desired case:</label>
        <select name="case" id="case" required>
            <option>choose case</option>
            <option value="camel">camelCase</option>
            <option value="snake">snake_case</option>
            <option value="kebab">kebab-case</option>
            <option value="pascal">PascalCase</option>
            <option value="uppercasesnake">UPPER_CASE_SNAKE_CASE</option>
        </select><br>

        <button type="submit">Convert</button>
    </form>
</div>
   

    <?php if (!empty($convertedSentence)) { ?>
        <p>Converted Sentence: <?php echo $convertedSentence; ?></p>
    <?php } ?>

</body>
</html>
