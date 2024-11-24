<?php

require_once 'core/models.php';

$applicants = readApplicants();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application System for Teachers</title>
    <script>
        function populateUpdateForm(applicant) {
            document.getElementById('updateId').value = applicant.id;
            document.getElementById('updateFirstName').value = applicant.firstName;
            document.getElementById('updateLastName').value = applicant.lastName;
            document.getElementById('updateEmail').value = applicant.email;
            document.getElementById('updateYearsOfExperience').value = applicant.yearsOfExperience;
            document.getElementById('updateSubjectSpecialization').value = applicant.subjectSpecialization;
            document.getElementById('updateHighestDegree').value = applicant.highestDegree;
            document.getElementById('updateTeachingPhilosophy').value = applicant.teachingPhilosophy;
            document.getElementById('updatePreferredTeachingMethod').value = applicant.preferredTeachingMethod;
            document.getElementById('updateForm').style.display = 'block';
        }
    </script>
</head>
<body>
    <h1>Job Application System for Teachers</h1>

    <h2>Create Applicant</h2>
    <form action="createApplicants.php" method="POST">
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="yearsOfExperience" placeholder="Years of Experience" required>
        <input type="text" name="subjectSpecialization" placeholder="Subject Specialization" required>
        <input type="text" name="highestDegree" placeholder="Highest Degree" required>
        <textarea name="teachingPhilosophy" placeholder="Teaching Philosophy"></textarea>
        <input type="text" name="preferredTeachingMethod" placeholder="Preferred Teaching Method">
        <button type="submit" name="create">Create Applicant</button>
    </form>

    <h2>Search Applicants</h2>
    <form action="searchApplicants.php" method="POST">
        <input type="text" name="searchTerm" placeholder="Search..." required>
        <button type="submit" name="search">Search</button>
    </form>

    <h2>Applicants List</h2>
<ul>
    <?php foreach ($applicants['querySet'] as $applicant): ?>
        <li>
            <?php echo htmlspecialchars($applicant['firstName'] . ' ' . $applicant['lastName']); ?>
            <form action="deleteApplicants.php" method="GET" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $applicant['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
            <button onclick="populateUpdateForm(<?php echo htmlspecialchars(json_encode($applicant)); ?>)">Update</button>
        </li>
    <?php endforeach; ?>
</ul>

    <h2>Update Applicant</h2>
    <form id="updateForm" action="updateApplicants.php" method="POST" style="display:none;">
        <input type="hidden" name="id" id="updateId">
        <input type="text" name="firstName" id="updateFirstName" placeholder="First Name" required>
        <input type="text" name="lastName" id="updateLastName" placeholder="Last Name" required>
        <input type="email" name="email" id="updateEmail" placeholder="Email" required>
        <input type="number" name="yearsOfExperience" id="updateYearsOfExperience" placeholder="Years of Experience" required>
        <input type="text" name="subjectSpecialization" id="updateSubjectSpecialization" placeholder="Subject Specialization" required>
        <input type="text" name="highestDegree" id="updateHighestDegree" placeholder="Highest Degree" required>
        <textarea name="teachingPhilosophy" id="updateTeachingPhilosophy" placeholder="Teaching Philosophy"></textarea>
        <input type="text" name="preferredTeachingMethod" id="updatePreferredTeachingMethod" placeholder="Preferred Teaching Method">
        <button type="submit" name="update">Update Applicant</button>
    </form>

</body>
</html>