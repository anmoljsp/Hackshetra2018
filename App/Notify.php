<?php
include('config.php');
$query="SELECT `Class_Id`,`Ass_Link` FROM `Assignments` ORDER BY `Ass_No` DESC LIMIT 1";
$res=mysqli_query($db, $query);
$row=mysqli_fetch_assoc($res);
$class_id=$row["Class_Id"];
echo $class_id;
$Ass_Link=$row["Ass_Link"];
$query1="SELECT `Std_Id` FROM `Student-Details` WHERE Class_Id='".$class_id."'";
$res1=mysqli_query($db, $query1);
$row1=mysqli_fetch_assoc($res1);
$Std_Id=$row1["Std_Id"];
echo $Std_Id;

$query2="SELECT `Contact_No` FROM `Acounts` WHERE `S.No.`='".$Std_Id."'";
$res2=mysqli_query($db, $query2);
// $echo "The contact numbers are ";
while($row2=mysqli_fetch_assoc($res2))
{
    $Contact_No=$row2["Contact_No"];
    echo $Contact_No;
}
require __DIR__ .'/vendor/autoload.php';
// Use the RESTClient to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACcf655e4f5706a3dcda6a056a8905f7a8';
$token = 'fdb52ae44dec12e927ccca6810fcf648';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->account->messages->create(
    // the number you'd like to send the message to
    '+917419111578',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+61488810558',
        // the body of the text message you'd like to send
        'body' => "Hey Abhinandan new assignment added and its link is '".$Ass_Link."'"
    )
);

?>  
