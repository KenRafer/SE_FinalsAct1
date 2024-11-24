<?php

require_once 'core/models.php';

if (isset($_GET['id'])) {
    $applicantId = $_GET['id'];

    $result = deleteApplicant($applicantId);

    if ($result['statusCode'] === 200) {
        header('Location: index.php');
        exit();
    } else {

        echo "Error: " . $result['message'];
        exit();
    }
}