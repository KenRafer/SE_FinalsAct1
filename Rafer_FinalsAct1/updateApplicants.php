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

    $applicantId = $_POST['id'];
    updateApplicant($applicantId, $applicantData);
    header('Location: index.php');
    exit();
}

$applicantId = $_GET['id'];
$applicant = getApplicantById($applicantId);

function getApplicantById($id) {
    $applicants = readApplicants();
    foreach ($applicants['querySet'] as $applicant) {
        if ($applicant['id'] == $id) {
            return $applicant;
        }
    }
    return null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Applicant</title>
</head>
<body>
    <h1>Update Applicant</h1>
    <form action="updateApplicants.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($applicant['id']); ?>">

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($applicant['firstName']); ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($applicant['lastName']); ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($applicant['email']); ?>" required><br>

        <label for="yearsOfExperience">Years of Experience:</label>
        <input type="number" name="yearsOfExperience" value="<?php echo htmlspecialchars($applicant['yearsOfExperience']); ?>" required><br>

        <label for="subjectSpecialization">Subject Specialization:</label>
        <input type="text" name="subjectSpecialization" value="<?php echo htmlspecialchars($applicant['subjectSpecialization']); ?>" required><br>

        <label for="highestDegree">Highest Degree:</label>
        <input type="text" name="highestDegree" value="<?php echo htmlspecialchars($applicant['highestDegree']); ?>" required><br>

        <label for="teachingPhilosophy">Teaching Philosophy:</label>
        <textarea name="teachingPhilosophy" required><?php echo htmlspecialchars($applicant['teachingPhilosophy']); ?></textarea><br>

        <label for="preferredTeachingMethod">Preferred Teaching Method:</label>
        <input type="text" name="preferredTeachingMethod" value="<?php echo htmlspecialchars($applicant['preferredTeachingMethod']); ?>" required><br>

        <input type="submit" value="Update Applicant">
    </form>
</body>
</html>