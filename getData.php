<?php
include_once 'includes/dbh.inc.php';

function fetchTableData($tableName) {
    global $conn;

    // Modify the SQL query to perform joins where needed
    switch ($tableName) {
        case 'Student_Course':
            $query = "SELECT s.StudentName, c.CourseName, sc.Degree 
                      FROM Student_Course sc
                      JOIN Student s ON sc.StudentID = s.StudentID
                      JOIN Course c ON sc.CourseID = c.CourseID";
            break;
        
        // Add more cases for other tables if needed

        default:
            $query = "SELECT * FROM $tableName";
            break;
    }

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch data from each table
$universityData = fetchTableData('University');
$collageData = fetchTableData('Collage');
$lecturerData = fetchTableData('Lecturer');
$departmentData = fetchTableData('Department');
$courseData = fetchTableData('Course');
$studentData = fetchTableData('Student');
$studentCourseData = fetchTableData('Student_Course');
$courseDepartmentData = fetchTableData('Course_Department');

// Return data as JSON
header('Content-Type: application/json');
echo json_encode([
    'University' => $universityData,
    'Collage' => $collageData,
    'Lecturer' => $lecturerData,
    'Department' => $departmentData,
    'Course' => $courseData,
    'Student' => $studentData,
    'Student_Course' => $studentCourseData,
    'Course_Department' => $courseDepartmentData,
]);
?>
