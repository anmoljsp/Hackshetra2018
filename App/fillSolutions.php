<?php
session_start();
include("config.php");
include("encryption.php");	
//dependencies and autoload
include_once( getcwd().'/autoload.php');
use Copyleaks\CopyleaksCloud;
use Copyleaks\CopyleaksProcess;
use Copyleaks\Products;

function redirect($url,$permanent=false)
{
	if($permanent)
	{
		header('HTTP/1.1 301 Moved Permanently');
	}
	header('Location: '.$url);
	exit();
}

if(!isset($_SESSION['Username'])){
	redirect("index.php");
}
	$class= $subject= "";
	$Username=$_SESSION['Username'];
	
			$class=$_SESSION["class"];
			$subject=$_SESSION["subject"];
			$assId=$_SESSION["AssID"];
			$solution=$_SESSION["id"];
            //$solution = "IT-1_Assign1943_abhi";
			if($class != ""&&$subject != "")
			{

$config = new \ReflectionClass('Copyleaks\Config');
$clConst = $config->getConstants();
$file = './create_assignment_file/*';

$email = 'piyushyadav2897@gmail.com';
$apiKey = '76a6235f-b82a-4252-a6f5-896e73e4ee40';

// Login to Copyleaks Cloud
try{
    $clCloud = new CopyleaksCloud($email, $apiKey, Products::Education);
}catch(Exception $e){
    echo "<Br/>Failed to connect to Copyleaks Cloud with exception: ". $e->getMessage();
    die();
}

//validate login token
if(!isset($clCloud->loginToken) || !$clCloud->loginToken->validate()){
    echo "<Br/><strong>Bad login credentials</strong>";
    die();
}

# Get your credit balance
//$creditBalance = $clCloud->getCreditBalance(); //get credit balance
// print_r($creditBalance);

try{
    // For more information about the optional headers please visit: https://api.copyleaks.com/GeneralDocumentation/RequestHeaders
    $additionalHeaders = array(//$clConst['SANDBOX_MODE_HEADER']=TRUE, // Sandbox mode - Scan without consuming any credits and get back dummy results
                                //$clConst['HTTP_CALLBACK'].': http://your.website.com/callbacks/', # For a fast testing of callbacks option we recommend to use http://requestb.in
                                //$clConst['IN_PROGRESS_RESULT'].': http://your.website.com/callback/results/,
                                //$clConst['EMAIL_CALLBACK'].': myemail@company.com',
                                //$clConst['CLIENT_CUSTOM_PREFIX'].'name: some name'
                                //$clConst['PARTIAL_SCAN_HEADER'],
                                $clConst['COMPARE_ONLY']=TRUE  # Compare files in between - available only on createByFiles
                                //$clConst['IMPORT_FILE_TO_DATABASE'] # Import your file to our database only
                                );
  
  
    // Create process using one of the following option.
    //$process  = $clCloud->createByURL("https://www.copyleaks.com", $additionalHeaders);
    // $process  = $clCloud->createByText('<ENTER YOUR STRING HERE>');
    //$process = $clCloud->createByFile($file, $additionalHeaders);
    $processes = $clCloud->createByFiles(array("../PHP-Plagiarism-Checker-master/apj.odt",                                                 "../PHP-Plagiarism-Checker-master/apj2.odt"),$additionalHeaders); // Array with 2 elements - the first([0]) is the successfully created processes
                                                              //                         the second([1]) is the error happend
    //$process  = $clCloud->createByOCR(imagePath,'English',$additionalHeaders);
        //print_r($processes[0]);
    //print_r($processes[1]);
    $process = $processes[0][0];
    // echo "<BR/><strong>Process created!</strong> (PID = '" . $process->processId . "')";

    // echo '<BR/><BR/><strong>Processing Started</strong>';

    // Wait for the scan to complete
    while ($process->getStatus() != 100)
    {
        sleep(2);            
    }

   // echo '<BR/><BR/><strong>Finished Processing</strong>';
  
    echo "<BR/><BR/><strong>Results:</strong>";
    $results = $process->getResult();
    // Print the results
    //$cou=sizeof($results) - 1;
    $c=1;
    foreach ($results as $result) {
$val_r= (array)$result;
echo "<div class='row'><div class='col-sm-4'>";
echo $c . ".---<br>";

echo "Title" . $val_r["Title"]."<br>";

echo "URL" . $val_r["URL"]."<br>";
    echo "Percentage plagiarized" . $val_r["Percents"]."<br><br><br></div>"; 
    $c = $c +1;   }

  
}catch(Exception $e){

    echo "<br/>Failed with exception: ". $e->getMessage();
}

//build table from PHP array
function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . $key . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $value2 = is_array($value2) ? json_encode($value2) : $value2;
            $html .= '<td>' . @$value2 . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

//print process list as HTML table
//if(isset($plist,$plist['response']) && count($plist['response'])>0)
//    echo build_table($plist['response']);

				echo "I am";
		    	$query1="SELECT `Class_Id` FROM `Classes` WHERE `Class_Name`='".$class."'";
		    	$res1=mysqli_query($db,$query1);
		    	$res1=mysqli_fetch_assoc($res1);
		    	$class=$res1["Class_Id"];
		    	$query2="SELECT `Subject_Id` FROM `Subjects` WHERE `Subject_Name`='".$subject."'";
		    	$res2=mysqli_query($db,$query2);
		    	$res2=mysqli_fetch_assoc($res2);
		    	$subject=$res2["Subject_Id"];
		    	$query3="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$Username."'";
	      		$res3=mysqli_query($db,$query3);
	      		$res3=mysqli_fetch_assoc($res3);
	      		$Std_Id=$res3["S.No."];
	      		// $Std_Id='16';
		    	$query4="INSERT INTO `Solutions`(Class_Id, Subject_Code,Ass_Id,Std_Id,Sol_Links) VALUES ('$class','$subject','$assId','$Std_Id','$solution')";
		    	$res4=mysqli_query($db,$query4);
		    	if($res4)
		    	{
		      		// redirect('UserHome.html');
		      		// echo $password;

		    	}
	    		else
	    		{
	    			echo "Error";
	    			echo("Error description: " . mysqli_error($db));
	    		}

			

	}
?>
