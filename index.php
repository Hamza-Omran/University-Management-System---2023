<?php
include_once 'includes/dbh.inc.php';
// Assuming you have a database connection established

if (isset($_POST['addStudent'])) {
    // Add Student
    $studentName = $_POST['studentName'];
    $departmentid=$_POST['departmentid'];
    $query = "INSERT INTO student (studentName,departmentid) VALUES ('$studentName','$departmentid');";
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?delete=successfully");
        exit();
    } else {
        die('Error deleting student: ' . mysqli_error($conn));
    }
    // Execute the query

} elseif (isset($_POST['deleteStudent'])) {
    $deleteStudentID = $_POST['studentIDDelete'];

    // Sanitize input to prevent SQL injection
    $deleteStudentID = mysqli_real_escape_string($conn, $deleteStudentID);

    $query = "DELETE FROM Student WHERE studentID = '$deleteStudentID'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?delete=successfully");
        exit();
    } else {
        die('Error deleting student: ' . mysqli_error($conn));
    }



} elseif (isset($_POST['searchStudent'])) {
    $searchStudentID = $_POST['studentIDSearch'];

    // Fetch student information from the database
    $query = "SELECT Student.StudentID, Student.StudentName, Student.Hours,
                     Course.CourseID, Course.CourseName, Course.CreditsHours
              FROM Student
              LEFT JOIN Student_Course ON Student.StudentID = Student_Course.StudentID
              LEFT JOIN Course ON Student_Course.CourseID = Course.CourseID
              WHERE Student.StudentID = '$searchStudentID'";

    $result = $conn->query($query);

    // Start generating HTML
    $output = "";

    if ($result->num_rows > 0) {
        $output .= "<h4>Search Results:</h4>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<b>Student ID:</b> " . $row['StudentID'] . "<br>";
            $output .= "<b>Student Name:</b> " . $row['StudentName'] . "<br>";
            $output .= "<b>Hours:</b> " . $row['Hours'] . "<br>";

            // Display courses associated with the student
            $output .= "<b>Courses:</b><br>";
            $output .= "- Course ID: " . $row['CourseID'] . "<br>";
            $output .= "- Course Name: " . $row['CourseName'] . "<br>";
            $output .= "- Credits Hours: " . $row['CreditsHours'] . "<br>";
            $output .= "<br>";
        }
    } else {
        $output .= "Student not found.";
    }

    // Print the HTML on the page
    echo $output;
}

elseif (isset($_POST['studentedit'])) {
    // Add Student
    $studentid = $_POST['studenteditid'];
    $studenteditname=$_POST['studenteditname'];
    $query = "UPDATE Student SET StudentName = '$studenteditname' WHERE StudentID = '$studentid'";
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?edit=successfully");
        exit();
    } else {
        die('Error deleting student: ' . mysqli_error($conn));
    }
    // Execute the query

}elseif (isset($_POST['addlecturer'])) {
    // Add Lecturer
    $lecturerid = $_POST['lecturerid'];
    $lecturername = $_POST['lecturerName'];
    $universityid = $_POST['universityid'];
    $specialize = $_POST['specialize'];

    // Ensure the order of columns matches your table structure
    $query = "INSERT INTO lecturer (lecturerID, lecturerName, UniversityID, Specialize) VALUES ('$lecturerid', '$lecturername', '$universityid', '$specialize');";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?add=successfully");
        exit();
    } else {
        die('Error adding lecturer: ' . mysqli_error($conn));
    }
}elseif (isset($_POST['deletelecturer'])) {
    $deleteStudentID = $_POST['lecturerIDDelete'];

    // Sanitize input to prevent SQL injection
    $deleteStudentID = mysqli_real_escape_string($conn, $deleteStudentID);

    $query = "DELETE FROM lecturer WHERE lecturerID = '$deleteStudentID'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?delete=successfully");
        exit();
    } else {
        die('Error deleting student: ' . mysqli_error($conn));
    }
}elseif (isset($_POST['lectureredit'])) {
    // Add Student
    $lecturerid = $_POST['lecturerid'];
    $lecturername = $_POST['lecturerName'];
    $universityid = $_POST['universityid'];
    $specialize = $_POST['specialize'];
    $query = "UPDATE lecturer SET lecturerName = '$lecturername',specialize='$specialize',universityid='$universityid' WHERE lecturerID = '$lecturerid'";
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?edit=successfully");
        exit();
    } else {
        die('Error deleting student: ' . mysqli_error($conn));
    }
    // Execute the query

}elseif (isset($_POST['addCourse'])) {
    // Add Lecturer
    $courseID = $_POST['courseID'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];  // Fix the variable name here
    $courseDay = $_POST['courseDay'];
    $lecturerID = $_POST['lecturerID'];

    // Ensure the order of columns matches your table structure
    $query = "INSERT INTO course_Department (courseID, startTime, endTime, courseDay, lecturerID) VALUES ('$courseID', '$startTime', '$endTime', '$courseDay', '$lecturerID');";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?add=successfully");
        exit();
    } else {
        die('Error adding lecturer: ' . mysqli_error($conn));
    }
}elseif (isset($_POST['deleteCourse'])) {
    $deletecourseID = $_POST['courseID'];
    $deletelecturerID = $_POST['lecturerID'];

    // Sanitize input to prevent SQL injection
    $deletecourseID = mysqli_real_escape_string($conn, $deletecourseID);
    $deletelecturerID = mysqli_real_escape_string($conn, $deletelecturerID);

    $query = "DELETE FROM course_department WHERE LecturerID = '$deletelecturerID' AND CourseID = '$deletecourseID'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?delete=successfully");
        exit();
    } else {
        die('Error deleting course: ' . mysqli_error($conn));
    }
}
elseif (isset($_POST['editCourse'])) {
    // Add Student
    $courseID = $_POST['courseID'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $courseDay = $_POST['courseDay'];
    $lecturerID = $_POST['lecturerID'];

    // Fix the missing single quotes around $courseDay
    $query = "UPDATE course_department SET startTime = '$startTime', endTime = '$endTime', courseDay = '$courseDay' WHERE lecturerID = '$lecturerID' AND courseID = '$courseID'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?edit=successfully");
        exit();
    } else {
        die('Error updating course: ' . mysqli_error($conn));
    }
    // Execute the query
}elseif (isset($_POST['addcourseto'])) {
    // Add Lecturer
    $courseID = $_POST['courseID'];
    $lecturerID = $_POST['studentID'];

    // Ensure the order of columns matches your table structure
    $query = "INSERT INTO student_course (courseID, studentID) VALUES ('$courseID', '$lecturerID');";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?add=successfully");
        exit();
    } else {
        die('Error adding lecturer: ' . mysqli_error($conn));
    }
}elseif (isset($_POST['deletecoursefrom'])) {
    $deletecourseID = $_POST['courseID'];
    $deletelecturerID = $_POST['studentID'];

    // Sanitize input to prevent SQL injection
    $deletecourseID = mysqli_real_escape_string($conn, $deletecourseID);
    $deletelecturerID = mysqli_real_escape_string($conn, $deletelecturerID);

    $query = "DELETE FROM student_course WHERE studentID = '$deletelecturerID' AND CourseID = '$deletecourseID'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?delete=successfully");
        exit();
    } else {
        die('Error deleting course: ' . mysqli_error($conn));
    }
}elseif (isset($_POST['senddegree'])) {
        // Add Student
        $courseID = $_POST['courseID'];
        $lecturerID = $_POST['studentID'];
        $degree=$_POST['degree'];
    
        // Fix the missing single quotes around $courseDay
        $query = "UPDATE student_course SET degree = '$degree' WHERE studentID = '$lecturerID' AND courseID = '$courseID'";
    
        if (mysqli_query($conn, $query)) {
            header("Location: ../index.php?edit=successfully");
            exit();
        } else {
            die('Error updating course: ' . mysqli_error($conn));
        }
        // Execute the query
    }



// Redirect back to the main page or show a success message
header("Location: index.html");
exit();
?>


