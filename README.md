# University Management System - 2023

## Academic Context
This project was developed as part of the "Introduction to Database" course (2023).

## Project Overview

This is a web-based University Management System designed to manage students, lecturers, courses, and their relationships. The system provides CRUD (Create, Read, Update, Delete) operations for various entities within a university database.

## Technologies Used

- HTML5
- CSS3
- PHP
- MySQL
- JavaScript

## Database Structure

The system uses the following database tables:

### Core Tables

1. **University**
   - UniversityID (Primary Key)
   - UniversityName

2. **Collage**
   - CollageID (Primary Key)
   - CollageName
   - UniversityID (Foreign Key)

3. **Department**
   - DepartmentID (Primary Key)
   - DepartmentName
   - CollageID (Foreign Key)

4. **Lecturer**
   - LecturerID (Primary Key)
   - Specialize
   - LecturerName
   - UniversityID (Foreign Key)

5. **Course**
   - CourseID (Primary Key)
   - CourseName
   - CreditsHours
   - DepartmentID (Foreign Key)

6. **Student**
   - StudentID (Primary Key)
   - StudentName
   - Hours
   - DepartmentID (Foreign Key)

### Relationship Tables

7. **Student_Course**
   - Degree (Max 100)
   - CourseID (Foreign Key)
   - StudentID (Foreign Key)

8. **Course_Department**
   - CourseDay
   - StartTime
   - EndTime
   - CourseID (Foreign Key)
   - LecturerID (Foreign Key)

## Features

### Student Management
- Add new students
- Delete existing students
- Edit student information
- View student details and enrolled courses

### Lecturer Management
- Add new lecturers
- Delete existing lecturers
- Edit lecturer information
- Assign specializations

### Course Management
- Add new course schedules
- Delete course schedules
- Edit course timings and days
- Assign lecturers to courses

### Course Enrollment
- Enroll students in courses
- Remove students from courses
- Set and update course grades
- View all enrollments

### Data Viewing
- Display all database tables
- View relationships between entities
- Interactive table navigation

## File Structure

```
website/
├── index.html              # Student management page
├── lecturers.html          # Lecturer management page
├── courses.html            # Course management page
├── add_courses.html        # Course enrollment page
├── jss.html               # Database tables viewer
├── index.php              # Main PHP handler for all operations
├── getData.php            # Fetches data for table display
├── styles.css             # Main stylesheet
├── ss.sql                 # Database schema and sample data
├── includes/
│   ├── dbh.inc.php       # Database connection
│   └── addstd.inc.php    # Additional student operations
└── README.md             # Project documentation
```

## Installation

### Prerequisites
- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (Apache/Nginx)
- Web browser

### Setup Steps

1. Clone or download the project to your web server directory

2. Create the database:
   ```sql
   CREATE DATABASE university;
   ```

3. Import the database schema:
   - Run the SQL commands from `ss.sql` file
   - This will create all tables and insert sample data

4. Configure database connection:
   - Open `includes/dbh.inc.php`
   - Update the following credentials if needed:
     ```php
     $dbservername="localhost";
     $dbusername="root";
     $dbpassword="";
     $dbname="university";
     ```

5. Access the application:
   - Navigate to `http://localhost/website/index.html`

## Usage

### Adding a Student
1. Navigate to the Students page
2. Fill in the Student Name and Department ID
3. Click "Add" button

### Managing Lecturers
1. Navigate to the Lecturers page
2. Enter required information (Lecturer ID, Name, University ID, Specialization)
3. Choose Add, Delete, or Edit operation

### Managing Courses
1. Navigate to the Courses page
2. Enter course details including timing and lecturer assignment
3. Submit the form

### Enrolling Students in Courses
1. Navigate to "Add Course to Student" page
2. Enter Student ID and Course ID
3. Optionally set grades for enrolled courses

### Viewing Data
1. Navigate to "Show Tables" page
2. View all database tables with their relationships
3. Data automatically fetches and displays

## Security Considerations

Current implementation includes basic SQL injection prevention through `mysqli_real_escape_string()`. For production use, consider:

- Implementing prepared statements
- Adding user authentication
- Implementing role-based access control
- Adding input validation
- Using HTTPS
- Implementing CSRF protection

## Known Limitations

- No user authentication system
- Limited error handling
- No data validation on client side
- Direct SQL queries (should use prepared statements)
- No backup/restore functionality

## Future Enhancements

- User authentication and authorization
- Advanced search and filtering
- Report generation
- Email notifications
- Attendance tracking
- Grade analytics
- Mobile responsive design improvements
- RESTful API implementation

## Database Configuration

Default configuration:
- Host: localhost
- Username: root
- Password: (empty)
- Database: university

## Browser Compatibility

Tested on:
- Google Chrome
- Mozilla Firefox
- Microsoft Edge
- Safari

## Contributors

This project was developed as part of an Introduction to Database course project.

## License

This project is for educational purposes.
