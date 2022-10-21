<?php
 
$servername = "lms-test2021.chyuyfoavfuw.eu-central-1.rds.amazonaws.com";
$username = "LLadmin";
$password = "LMSTestDB2040";
$dbname = "LLApplication";
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

//take post variable from the form
$familyName = mysqli_real_escape_string($conn, $_POST['Family-name']);
$firstName = mysqli_real_escape_string($conn, $_POST['First-name']);
$otherName = mysqli_real_escape_string($conn, $_POST['Other-name']);
$applicantEmail = mysqli_real_escape_string($conn, $_POST['E-mail']);
$phoneNumber = $_POST['Phone-number'];
$individualID = $_POST['Individual-ID'];
$nationality = mysqli_real_escape_string($conn,$_POST['Nationality']);
$address = mysqli_real_escape_string($conn, $_POST['Address']);
$placeOfBirth = mysqli_real_escape_string($conn, $_POST['Place-of-birth']);
$dateOfBirth = $_POST['Date-of-birth'];
$gender = $_POST['Gender'];
$nameOfPrimarySchool = mysqli_real_escape_string($conn, $_POST['Name-of-primary-school']);
$nameOfSecondarySchool = mysqli_real_escape_string($conn, $_POST['Name-of-secondary-school']);

if(isset($_POST["submit"])){
    //email section
    $senderEmail = 'bonface@learninglions.org';
    $emailSubject = "Learning Lions Mobile Leap Application";
    $emailBody = "Dear " . $firstName . "," . "\nYour Application has been received! We will contact you before this date";

    $headers = "From:" . $senderEmail;

    mail($applicantEmail,$emailSubject,$emailBody,$headers);
}

//insert personal information
$insertPersonalInformation = "insert into Applicants (Name,Email,Phone,IndividualID,Nationality,Address,Place_of_birth,Date_of_birth,Gender,Primary_School,Secondary_School) 
values ('$familyName $firstName $otherName', '$applicantEmail', '$phoneNumber', '$individualID', '$nationality', '$address', '$placeOfBirth', '$dateOfBirth', '$gender', '$nameOfPrimarySchool', '$nameOfSecondarySchool')";

if (mysqli_query($conn, $insertPersonalInformation)) 
{
	$applicant_id = $conn->insert_id; // get the last insert ID
    echo "New record created successfully. Last inserted ID is: " . $applicant_id;
} else 
{
    $errorMessage = "Error: " . $insertPersonalInformation . " " . mysqli_error($conn);
}


function insert_answer($field_name, $applicant_id, $question_id, $conn){
	$answer = mysqli_real_escape_string($conn, $_POST[$field_name]);
	
    if ($applicant_id) {
        //insert questionnaire answers
	    $insertQuestionnaireAnswers = "insert into QuestionnaireAnswers(ApplicantID, QuestionID, Answer, Date) values('$applicant_id', '$question_id', '$answer', NOW())";
        
        if (mysqli_query($conn, $insertQuestionnaireAnswers)) 
        {
            echo "Questionnaire Answers inserted successfully";
        } 
        else 
        {
            echo "Error: " . $insertQuestionnaireAnswers . "<br>" . mysqli_error($conn);
            exit;
        }
    }
}

//insert answers
if ($applicant_id) {
    insert_answer('Q1', $applicant_id, 1, $conn);
    insert_answer('Q2', $applicant_id, 2, $conn);
    insert_answer('Q3', $applicant_id, 3, $conn);
    insert_answer('Q4', $applicant_id, 4, $conn);
    insert_answer('Q5', $applicant_id, 5, $conn);
    insert_answer('Q6', $applicant_id, 6, $conn);
    insert_answer('Q7', $applicant_id, 7, $conn);
    insert_answer('Q8', $applicant_id, 8, $conn);
    insert_answer('Q9', $applicant_id, 9, $conn);
    insert_answer('Q10', $applicant_id, 10, $conn);
    insert_answer('Q11', $applicant_id, 11, $conn);
    insert_answer('Q12', $applicant_id, 12, $conn);
    insert_answer('Q13', $applicant_id, 13, $conn);
    insert_answer('Q14', $applicant_id, 14, $conn);
    insert_answer('Q15', $applicant_id, 15, $conn);
    insert_answer('Q16', $applicant_id, 16, $conn);
    insert_answer('Q17', $applicant_id, 17, $conn);
    insert_answer('Q18', $applicant_id, 18, $conn);
    insert_answer('Q19', $applicant_id, 19, $conn);
    insert_answer('Q20', $applicant_id, 20, $conn);
    insert_answer('Q21', $applicant_id, 21, $conn);
    insert_answer('Q22', $applicant_id, 22, $conn);
    insert_answer('Q23', $applicant_id, 23, $conn);
    insert_answer('Q24', $applicant_id, 24, $conn);
    insert_answer('Q25', $applicant_id, 25, $conn);


    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["Q21FileUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["Q21FileUpload"]["name"])){
        // Allow certain file formats
        $allowTypes = array('zip', 'pdf', 'docx');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["Q21FileUpload"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insertFile = "insert into FileUploads (ApplicantID, FileName, UploadedOn) values ('$applicant_id', '".$fileName."', NOW())";
                if(mysqli_query($conn, $insertFile)){
                    echo "The file ".$fileName. " has been uploaded successfully.";
                }
                else
                {
                    echo "File upload failed, please try again " . $insertFile . mysqli_error($conn);
                } 
            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        else
        {
            echo "Sorry, only ZIP, PDF, DOCX files are allowed to upload.";
        }
    }
    else
    {
        echo "Please select a file to upload.";
    }
}

if($applicant_id){
    header('Location: https://www.learninglions.org/thank-you/');
}
else
{
    header("Location: https://www.learninglions.org/applicationformerror?$errorMessage/");
}


 // Close connection
mysqli_close($conn);
?>