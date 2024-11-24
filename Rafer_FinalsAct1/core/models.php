<?php

require_once 'dbConfig.php';

function createApplicant($applicantData) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO Applicants (firstName, lastName, email, yearsOfExperience, subjectSpecialization, highestDegree, teachingPhilosophy, preferredTeachingMethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute(array_values($applicantData))) {
        return [
            'message' => 'Applicant has been inserted successfully.',
            'statusCode' => 200
        ];
    } else {
        return [
            'message' => 'Query failed.',
            'statusCode' => 400
        ];
    }
}

function readApplicants() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM Applicants");
    return [
        'message' => 'Applicants retrieved successfully.',
        'statusCode' => 200,
        'querySet' => $stmt->fetchAll(PDO::FETCH_ASSOC)
    ];
}

function updateApplicant($id, $applicantData) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE Applicants SET firstName=?, lastName=?, email=?, yearsOfExperience=?, subjectSpecialization=?, highestDegree=?, teachingPhilosophy=?, preferredTeachingMethod=? WHERE id=?");
    if ($stmt->execute(array_merge(array_values($applicantData), [$id]))) {
        return [
            'message' => 'Applicant has been updated successfully.',
            'statusCode' => 200
        ];
    } else {
        return [
            'message' => 'Query failed.',
            'statusCode' => 400
        ];
    }
}

function deleteApplicant($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM Applicants WHERE id=?");
    if ($stmt->execute([$id])) {
        return [
            'message' => 'Applicant has been deleted successfully.',
            'statusCode' => 200
        ];
    } else {
        return [
            'message' => 'Query failed.',
            'statusCode' => 400
        ];
    }
}

function searchApplicants($searchTerm) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM Applicants WHERE firstName LIKE ? OR lastName LIKE ? OR email LIKE ? OR subjectSpecialization LIKE ? OR highestDegree LIKE ?");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->execute([$likeTerm, $likeTerm, $likeTerm, $likeTerm, $likeTerm]);
    
    return [
        'message' => 'Search results retrieved successfully.',
        'statusCode' => 200,
        'querySet' => $stmt->fetchAll(PDO::FETCH_ASSOC)
    ];
}
?>