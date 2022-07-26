<?php
# get a connection to the mysql database
function get_mysql_conn($servername, $username,$password) {
// Create connection
	$conn = new mysqli($servername, $username, $password, "LLApplication");

// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;	

}	
# Read file line-by-line and parse into an array of array, delimited by a tab
function tsvToArray($tsvFile){
 
    $file_to_read = fopen($tsvFile, 'r');
		if ( $file_to_read == false) {
			die("cannot open tsv file $tsvFile\n");
		}
		$lines = array();
    while (!feof($file_to_read) ) {
				$line = fgets($file_to_read);
				array_push($lines, explode("\t", $line));
 
    }
 
    fclose($file_to_read);
    return $lines;
}

# Prompt for the mysql password rather than passing on command line
/*function getPassword($prompt = "Enter Password:") {
    echo $prompt;
    system('stty -echo');
    $password = trim(fgets(STDIN));
    system('stty echo');
    return $password;
} */
 


$usage = "USAGE: gen_sql.php <tsv-file> <username> <password>";
# Validate that the correct # of arguments where password on the command line
if ( $argc != 4 ) {
	echo "$usage\n";
	exit(1);
}
$tsvFile = $argv[1];
$username = $argv[2];
$passwd = $argv[3];
# $passwd = getPassword();
# echo "\n";

$conn = get_mysql_conn('lms-production.chyuyfoavfuw.eu-central-1.rds.amazonaws.com', $username,$passwd);
$tsv = tsvToArray($tsvFile);

	
$row = 0;
$found = 0;

foreach ( $tsv as $record ) {
	$row++;
	if ( $row > 1) {
		# validate that the row has the expected number of columns
		if ( count($record)<15) {
			fwrite(STDERR, "Too few columns " . count($record) . " on row: $row\n");
		
		} else {
			$name = $record[5];  # Take from the corrected column
			$phone = $record[11]; 
			$email = $record[12];  # Take from the corrected column

			// for ($i=0; $i < count($record); $i++) { 
			// 	echo "$record[$i] ";
			// }
			// echo "\n";

			// if(true){
			// 	continue;
			// }
			
			$phone2 = $phone;
			$phone3 = $phone;
			# Chop off the 254 from the phone and try to match without
			if ( substr( $phone2,0,3) == "254" ) {
				$phone2 = substr($phone,3);
				$phone3 = "0$phone2";  # a few have leading zeros, so try that
			}			

			$sql = "select ID, Name, Phone, Email /* $name */ from Actors where Phone = '$phone' OR Phone = '$phone2' OR Phone = '$phone3' OR Email = '$email'";
			$actor_id = 'NULL';
			$participant_id = 0;
			if ( $results = mysqli_query($conn, $sql)) {
				
				if ( mysqli_num_rows($results) == 1 ) {
					while ($r = mysqli_fetch_row($results)) {
							$actor_id = $r[0];
							break;
					}
				}	
				mysqli_free_result($results);
				echo "$record[0] $actor_id\n";
			}

			# Add code to insert Participant
			$add_applicant = "insert into Applicants values ($record[0],'$record[]','$record[11]','$email'";
			# Insert participant here
			# echo "$add_participant\n";
			if (mysqli_query($conn, $add_applicant)) {
				echo "Participant added!";
			  } else {
				echo "Error: " . $add_applicant . "<br>" . mysqli_error($conn);
				die("Failed to insert Participants");
			  }
		}
	} else {
			echo "Wrong column count on row $row\n" ;
	}
	
}
?>