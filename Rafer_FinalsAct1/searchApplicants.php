<?php

require_once 'core/models.php';

$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['searchTerm'];
    $searchResults = searchApplicants($searchTerm);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Applicants</title>
</head>
<body>
    <h1>Search Applicants</h1>
    <form action="searchApplicants.php" method="POST">
        <input type="text" name="searchTerm" placeholder="Enter name to search" required>
        <input type="submit" value="Search">
    </form>

    <h2>Search Results</h2>
    <ul>
        <?php if (!empty($searchResults)): ?>
            <?php foreach ($searchResults['querySet'] as $applicant): ?>
                <li><?php echo htmlspecialchars($applicant['firstName'] . ' ' . $applicant['lastName']); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No results found.</li>
        <?php endif; ?>
    </ul>
</body>
</html>