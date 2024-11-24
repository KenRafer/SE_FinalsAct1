<?php

require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicantData = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'yearsOfExperience' => $_POST['yearsOfExperience'],
        'subjectSpecialization' => $_POST['subjectSpecialization'],
        'highestDegree' => $_POST['highestDegree'],
        'teachingPhilosophy' => $_POST['teachingPhilosophy'],
        'preferredTeachingMethod' => $_POST['preferredTeachingMethod'],
    ];

    $response = createApplicant($applicantData);

    header('Location: index.php');
    exit();
}
?>