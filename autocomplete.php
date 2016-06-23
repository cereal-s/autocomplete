<?php

# check if the $_GET array is populated
if($_GET)
{
    require './app/helpers.php';

    # filter GET request
    $input = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    $result = [];

    # check if input is valid
    if(is_null($input) === FALSE && $input !== FALSE && ! empty($input))
    {
        $conn = require './app/db.php';

        # prepare input for the query
        $data   = [
            ':last_name' => $input.'%'
        ];

        # query
        $stmt = $conn->prepare('SELECT CONCAT_WS(" ", `last_name`, `first_name`) as `name` FROM `employees` WHERE `last_name` LIKE :last_name ORDER BY `last_name`, `first_name` LIMIT 10');
        $stmt->execute($data);

        if($conn->query('SELECT FOUND_ROWS()')->fetchColumn() > 0)
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = NULL;
    }

    # response
    header('Content-Type: application/json');
    echo json_encode(array_column($result, 'name'));
    exit;
}