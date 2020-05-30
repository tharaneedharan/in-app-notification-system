# in-app-notification-system
## Table of contents
* [Description](#Description)
* [Technologies](#Technologies)
* [list of files](#List-of-Files)
* [Database](#Database)
* [Web server](#Web-server)
* [Connectivity](#Connectivity)
* [Credentials](#Credentials)
* [API](#API)
* [Execution Flow](#Execution-Flow)
* [Adding Students](#Adding-Students)
* [Contributors](#Contributors)

## Description
  This is add on system which is developed in order to trigger notifications to the user based on their conditions.
  This system can be able to scaled up for n number of users and can able to maintain their records anytime.
  It is developed for integration with any HTML page without making any major changes.

## Technologies
This Project is created with:
  * HTML5
  * PHP 5
  * SQL
  * CSS
  * JS
  * AJAX
  * Bootstrap

## List of Files
  * index.html
  * dashboard.php
  * admin.php
  * courses.php
  * fetch.php
  * post_notification.php
  * validate.php
  * db_con.php
  * is_clicked.php
  
## Database
  * Database : MySQL
  * Database Provider : Amazon Web Services

## Web server
  * App Services : Azure Web Services
  
## Connectivity
  Weburl : http://asguardians.azurewebsites.net/notification_manager/index.html
  
### Credentials
    Admin:
    * username : admin
    * password : admin@123
    
    Student:
    * Username : student1
    * Password : student@123
    
## API
  * fetch api - This api is used to retrive the data from the database and post it as a json variable to the notification dropdown panel.
* post notification api - The notification can be triggered by this api where it provides the link between the db and notificaton panel.
* db connect api - this api ensures the connectivity between the database and the other api by php and SQL calls.
* fonts.google.api - To access font families from google.

## Execution Flow
Steps for students portal:
  * Login with the student id in the main login page
  * It redirects to the Student Portal
  * The notification icon on the top right corner can be used to view the notifications available for the selected student.
  * At last two options will be available, one is to mark all the notifications as read and the another Delete the readed and marked notifications.
  * A tab named courses is present in the left side menu bar of the student portal will redirect to the page named courses when it is clicked.
  * In this courses page the selected courses that are available for them and can mark it as read and it will be notified to all the students.
  
Steps for Admin portal:
  * Login with the admin id in the main login page
  * It redirects to the Staff Portal
  * In that the admin can add the New courses to the students in the add course division by providing the required informations as mentioned in that.
  * In that the admin can Send notifications to the selected set of students in the Send Notification division by providing the required informations as mentioned in that.

## Adding Students
  In this portal, n number of students and admins ca be added with the register page found in the login page.

## Contributors
  * Tharaneedharan K (Sri Ramakrishna Engineering College, Coimbatore)
  * Mail : tharaneedharan.1706056@srec.ac.in
  * Phone : +91-8667329052

  
  
