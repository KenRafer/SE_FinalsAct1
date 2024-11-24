<?php

require_once 'models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                addApplicant($_POST);
                break;

            case 'update':
                updateApplicant($_POST);
                break;

            case 'delete':
                deleteApplicant($_POST['id']);
                break;

            default:
                echo "Invalid action.";
                break;
        }
    }
}

function addApplicant($data) {
    $applicants = readApplicants();
    $newApplicant = [
        'id' => uniqid(),
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'email' => $data['email'],
        'yearsOfExperience' => $data['yearsOfExperience'],
        'subjectSpecialization' => $data['subjectSpecialization'],
        'highestDegree' => $data['highestDegree'],
        'teachingPhilosophy' => $data['teachingPhilosophy'],
        'preferredTeachingMethod' => $data['preferredTeachingMethod'],
    ];

    $applicants['querySet'][] = $newApplicant;
    saveApplicants($applicants['querySet']);
    header('Location: index.php');
    exit();
}

function updateApplicant($data) {
    $applicantData = [
        'id' => $data['id'],
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'email' => $data['email'],
        'yearsOfExperience' => $data['yearsOfExperience'],
        'subjectSpecialization' => $data['subjectSpecialization'],
        'highestDegree' => $data['highestDegree'],
        'teachingPhilosophy' => $data['teachingPhilosophy'],
        'preferredTeachingMethod' => $data['preferredTeachingMethod'],
    ];

    updateApplicant($applicantData);
    header('Location: index.php');
    exit();
}

function deleteApplicant($id) {
    deleteApplicant($id);
    header('Location: index.php');
    exit();
}
?>