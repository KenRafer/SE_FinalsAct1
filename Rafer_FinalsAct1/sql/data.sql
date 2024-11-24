CREATE TABLE Applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    yearsOfExperience INT NOT NULL,
    subjectSpecialization VARCHAR(100) NOT NULL,
    highestDegree VARCHAR(100) NOT NULL,
    teachingPhilosophy TEXT,
    preferredTeachingMethod VARCHAR(100)
);