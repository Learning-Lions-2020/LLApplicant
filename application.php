
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
	$last_id = $conn->insert_id; // get the last insert ID
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else 
{
    echo "Error: " . $insertPersonalInformation . "<br>" . mysqli_error($conn);
}

function insert_answer($field_name, $applicant_id, $question_id){
	$answer = $_POST[$field_name];
	//insert questionnaire answers
	$insertQuestionnaireAnswers = "insert into QuestionnaireAnswers(ApplicantID, QuestionID, Answer, Date) values('$applicant_id', '$question_id', '$answer', 'NOW()')";
}



//insert answers
insert_answer('Q1', $applicant_id, 1);
insert_answer('Q2', $applicant_id, 2);
insert_answer('Q3', $applicant_id, 3);
insert_answer('Q4', $applicant_id, 4);
insert_answer('Q5', $applicant_id, 5);
insert_answer('Q6', $applicant_id, 6);
insert_answer('Q7', $applicant_id, 7);
insert_answer('Q8', $applicant_id, 8);
insert_answer('Q9', $applicant_id, 9);
insert_answer('Q10', $applicant_id, 10);
insert_answer('Q11', $applicant_id, 11);
insert_answer('Q12', $applicant_id, 12);
insert_answer('Q13', $applicant_id, 13);
insert_answer('Q14', $applicant_id, 14);
insert_answer('Q15', $applicant_id, 15);
insert_answer('Q16', $applicant_id, 16);
insert_answer('Q17', $applicant_id, 17);
insert_answer('Q18', $applicant_id, 18);
insert_answer('Q19', $applicant_id, 19);
insert_answer('Q20', $applicant_id, 20);
insert_answer('Q21', $applicant_id, 21);
insert_answer('Q22', $applicant_id, 22);
insert_answer('Q23', $applicant_id, 23);
insert_answer('Q24', $applicant_id, 24);
insert_answer('Q25', $applicant_id, 25);

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