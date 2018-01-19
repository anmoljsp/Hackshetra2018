<?php
session_start();
include("config.php");
include("encryption.php");	
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
	echo "hey";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['submit']))
		{
			$class=$_POST["Class"];
			$subject=$_POST["Subject"];
			$assId=$_POST["AssId"];
			$solution=$_POST["Solution"];
			echo "Here it is";
			if($class != ""&&$subject != "")
			{
//dependencies and autoload
include_once( getcwd().'/autoload.php');
use Copyleaks\CopyleaksCloud;
use Copyleaks\CopyleaksProcess;
use Copyleaks\Products;

/* CREATE CONFIG INSTANCE */
$config = new \ReflectionClass('Copyleaks\Config');
$clConst = $config->getConstants();

/*
    CONSTRUCT ACCEPTS 3 PARAMETER (email, api_key, type of product).

    AVAILABLE PRODUCTS:
    1. Businesses - Products::Businesses - https://api.copyleaks.com/businessesdocumentation
    2. Education - Products::Education - https://api.copyleaks.com/academicdocumentation
    3. Websites - Products::Websites - https://api.copyleaks.com/websitesdocumentation

*/

// Use the email that you used to register to Copyleaks.
// If you don't have an account yet register on https://copyleaks.com/account/register
// Your API-KEY is available at the dashboards on https://api.copyleaks.com/. Choose the dashboard of the product that you would like to use.
$email = 'piyushyadav2897@gmail.com';
$apiKey = '76a6235f-b82a-4252-a6f5-896e73e4ee40';

// Login to Copyleaks Cloud
try{
    $clCloud = new CopyleaksCloud($email, $apiKey, Products::Businesses);
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
    $additionalHeaders = array(//$clConst['SANDBOX_MODE_HEADER'], // Sandbox mode - Scan without consuming any credits and get back dummy results
                                //$clConst['HTTP_CALLBACK'].': http://your.website.com/callbacks/', # For a fast testing of callbacks option we recommend to use http://requestb.in
                                //$clConst['IN_PROGRESS_RESULT'].': http://your.website.com/callback/results/,
                                //$clConst['EMAIL_CALLBACK'].': myemail@company.com',
                                //$clConst['CLIENT_CUSTOM_PREFIX'].'name: some name'
                                //$clConst['PARTIAL_SCAN_HEADER'],
                                $clConst['COMPARE_ONLY']=TRUE # Compare files in between - available only on createByFiles
                                //$clConst['IMPORT_FILE_TO_DATABASE'] # Import your file to our database only
                                );
  
  
    // Create process using one of the following option.
    //$process  = $clCloud->createByURL("https://www.copyleaks.com", $additionalHeaders);
    // $process  = $clCloud->createByText('<ENTER YOUR STRING HERE>');
    //$process = $clCloud->createByFile(filePath, $additionalHeaders);
    $processes = $clCloud->createByFiles(array($solution,
                                                 "apj2.odt"),
                                         $additionalHeaders); // Array with 2 elements - the first([0]) is the successfully created processes
                                                              //                         the second([1]) is the error happend
    //$process  = $clCloud->createByOCR(imagePath,'English',$additionalHeaders);
        //print_r($processes[0]);
    //print_r($processes[1]);
    $process = $processes[0][0];
    echo "<BR/><strong>Process created!</strong> (PID = '" . $process->processId . "')";

    echo '<BR/><BR/><strong>Processing Started</strong>';

    // Wait for the scan to complete
    while ($process->getStatus() != 100)
    {
        sleep(2);            
    }

    echo '<BR/><BR/><strong>Finished Processing</strong>';
  
    echo "<BR/><BR/><strong>Results:</strong>";
    $results = $process->getResult();
    // Print the results
    //$cou=sizeof($results) - 1;
    $c=1;
    foreach ($results as $result) {
$val_r= (array)$result;
echo $c + ".---";
echo "Title" + $val_r["Title"];

echo "URL" + $val_r["URL"];
    echo "Percentage plagiarized" + $val_r["Percents"]; 
    $c = $c +1;   }
    //echo $results[$cou];
    //print_r($results[0]);
    
    //echo $results[$cou][1];
    //echo $results[$cou]['Percents'];
    // Get the source text, result text and the comparison report between them.
    //echo "<BR/><BR/><strong>Cached Version:</strong> ".$process->getRawText()."<BR/>";
    //echo "<BR/><strong>Result Raw Text:</strong> ".$clCloud->getResultRawText($results[0])."<BR/>";
    //echo "<BR/><strong>Comparison Report:</strong><BR/>";
    //print_r($clCloud->getResultComparisonReport($results[0]));

    //DELETE process example
    //echo '<Br/>delete process';
    //$deletedProcess = $process->delete();
    //print_r($deletedProcess);

    //get processes list
    //$process_list = $clCloud->getProcessList();
    //print_r($process_list);
  
    //Get supported file types
    //$supportedFileTypes = $clCloud->getSupportedFileTypes();
    //echo "<BR/><BR/><strong>Supported File Types:</strong><BR/>";
    //print_r($supportedFileTypes);
  
    //Get OCR's(Images of text) supported languages
    //$ocrSupportedLanguages = $clCloud->getSupportedOCRLanguages();
    //echo "<BR/><BR/><strong>Supported OCR(Images of text only) Languages:</strong><BR/>";
    //print_r($ocrSupportedLanguages);
  
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
		    	echo "Here i am ";
		    	echo $class;
		    	$query2="SELECT `Subject_Id` FROM `Subjects` WHERE `Subject_Name`='".$subject."'";
		    	$res2=mysqli_query($db,$query2);
		    	$res2=mysqli_fetch_assoc($res2);
		    	$subject=$res2["Subject_Id"];
		    	// $query3="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$Username."'";
	      // 		$res3=mysqli_query($db,$query3);
	      // 		$res3=mysqli_fetch_assoc($res3);
	      		// $Std_Id=$res3["S.No."];
	      		$Std_Id='16';
		    	$query4="INSERT INTO `Solutions`(Class_Id, Subject_Code,Ass_Id,Std_Id,Sol_Links) VALUES ('$class','$subject','$assId','$Std_Id','$solution')";
		    	$res4=mysqli_query($db,$query4);
		    	if($res4)
		    	{
		      		redirect('UserHome.html');
		      		// echo $password;

		    	}
	    		else
	    		{
	    			echo "Error";
	    			echo("Error description: " . mysqli_error($db));
	    		}

			}

		}

	}
?>