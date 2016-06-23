<?php
/**
 * @see  https://autocomplete-js.com/
 * @see  https://github.com/datacharmer/test_db
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Testing autocomplete with MySQL employees example database</title>
    <link rel="stylesheet" type="text/css" href="/styles/autocomplete.css">
</head>
<body>

    <form>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name">
    </form>

    <script type="text/javascript" src="/js/autocomplete.js"></script>
    <script type="text/javascript">
        AutoComplete({
            EmptyMessage: "No item found",
            Url: "/autocomplete.php",
        }, "#last_name");
    </script>
</body>
</html>