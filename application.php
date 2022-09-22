
<?php
 
$servername = "lms-production.chyuyfoavfuw.eu-central-1.rds.amazonaws.com";
$username = "applicant_admin";
$password = "ApplicatioN@2030";
$dbname = "LLApplication";
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

//take post variable from the form
$familyName = $_POST['Family-name'];
$firstName = $_POST['First-name'];
$otherName = $_POST['Other-name'];
$phoneNumber = $_POST['Phone-number'];
$individualID = $_POST['Individual-ID'];
$nationality = $_POST['Nationality'];
$address = $_POST['Address'];
$placeOfBirth = $_POST['Place-of-birth'];
$dateOfBirth = $_POST['Date-of-birth'];
$gender = $_POST['Gender'];
$nameOfPrimarySchool = $_POST['Name-of-primary-school'];
$nameOfSecondarySchool = $_POST['Name-of-secondary-school'];

//insert personal information
$insertPersonalInformation = "insert into Applicants (Name,Phone,IndividualID,Nationality,Address,Place of birth,Date of birth,Gender,Primary School,Secondary School,ActorID) 
values 
('$familyName $firstName $otherName', '$phoneNumber', '$individualID', '$nationality', '$address', '$placeOfBirth', '$dateOfBirth', '$gender', '$nameOfPrimarySchool', '$nameOfSecondarySchool', '$actor_id')";
 
if (mysqli_query($conn, $insertPersonalInformation)) 
{
    echo "Personal information inserted successfully";
} else 
{
    echo "Error: " . $insertPersonalInformation . "<br>" . mysqli_error($conn);
}

//insert questionnaire answers
$insertQuestionnaireAnswers = "insert into QuestionnaireAnswers value()";

if (mysqli_query($conn, $insertQuestionnaireAnswers)) 
{
    echo "Questionnaire Answers inserted successfully";
} else 
{
    echo "Error: " . $insertQuestionnaireAnswers . "<br>" . mysqli_error($conn);
}

 // Close connection
mysqli_close($conn);
 ?>