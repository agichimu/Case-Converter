<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>palindrome</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <form method="post">
        <label for="input">Enter a string</label>
        <input type="text" name="input" id="input" placeholder="Enter a string">
        <input type="submit" name="submit" id="submit" value="Submit">
    </form>
    <?php 
    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        if (isPalindrome($input)) {
            echo "The string is a palindrome";
        } else {
            echo "The string is not a palindrome";
        }
    }
    function isPalindrome($input) {
    $input = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(trim($input)));
    return $input === strrev($input);
}

 ?>
    </body>
</html>