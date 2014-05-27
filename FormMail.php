<!-- Sukran burada degisiklik yapmadi... -->



<html>
<head>
<style>
h1{font-family:"Buxton Sketch";color="darkblue";}
body
{
background-image:url('back.gif');
background-repeat:repeat;
}
.error {color: #FF0000;}
</style>
</head>

<body>

<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $genderErr = $websiteErr = "";
$firstName = $lastName = $email = $gender = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["firstName"]))
     {
	 $firstNameErr = "First name is required";
	 }
   else
     {
     $firstName = test_input($_POST["firstName"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstName))
       {
       $firstNameErr = "Only letters and white space allowed"; 
       }
     }
	 
	 if (empty($_POST["lastName"]))
     {
	 $lastNameErr = "Last name is required";
	 }
   else
     {
     $lastName = test_input($_POST["lastName"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastName))
       {
       $lastNameErr = "Only letters and white space allowed"; 
       }
     }	 
   
   if (empty($_POST["email"]))
     {
	 $emailErr = "Email is required";
	 }
   else
     {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
       $emailErr = "Invalid email format"; 
       }
     }
     
   if (empty($_POST["website"]))
     {
	 $website = "";
	 }
   else
     {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
       {
       $websiteErr = "Invalid URL"; 
       }
     }

   if (empty($_POST["gender"]))
     {
	 $genderErr = "Gender is required";
	 }
   else
     {
	 $gender = test_input($_POST["gender"]);
	 }
	 
	 
	 require 'PHPMailerAutoload.php';
     $mail = new PHPMailer(); 
     #$body = file_get_contents('contents.html');
     #$body = eregi_replace("[\]",'',$body);
     $body ="Hello".$firstName.$lastName."<br>We sent a verification mail to your email which is:".$email;
 
$mail->IsSMTP(); // telling the class to use SMTP
#$mail->Host = "mail.yourdomain.com"; // SMTP server
#$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->Username = "ceng310new@gmail.com"; // GMAIL username
$mail->Password = "fatih2014"; // GMAIL password
 
$mail->SetFrom('ceng310new@gmail.com', 'CENG 310');
 
#$mail->AddReplyTo("name@yourdomain.com","First Last");
 
$mail->Subject = "PHPMailer Test Subject via smtp (Gmail),basic";
 
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$address = "ceng310new@gmail.com";
$mail->AddAddress($address, "CENG 310");
$mail->AddCC($email,$firstName);
$mail->AddBCC($address, "Zeynep Orhan"); 
//$mailer->ConfirmReadingTo = 'ceng310new@gmail.com';//If you want to request a Read Receipt from the person who receives the E-Mail, you can use the following setting:
$mail->AddAttachment("images/FU.gif"); // attachment
#$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
 
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}
//$mailer->ClearAddresses();
//$mailer->ClearAttachments();
  } 

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>

 
<h1>Create your Helping Circle account</h1>
<p><span class="error">* required field.</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

First Name<br>
<input type="text" name="firstName" value="<?php echo $firstName;?>">
<span class="error">* <?php echo $firstNameErr;?></span>
<br>Last Name<br>
<input type="text" name="lastName" value="<?php echo $lastName;?>">
<span class="error">* <?php echo $lastNameErr;?></span>

<br><br>Email address<br>
<input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  
 <br><br>Website<br>
   <input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>
   
<br></br>Create a password<br>
 <input type="password" name="pwd1">
</br> Confirm your password</br>
  <input type="password" name="pwd2">
  
 
<br></br>Birthday</br>
 <select name="dayofbirth">  
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
   <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
   <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
 </select>
  <select name="months">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>  
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
  </select>
  <input type="text" size="4" name="yearofbirth" value="Year">
  
 <br></br>Gender</br>
 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>

<br><br><input type="checkbox" name="terms" checked>I agree to the Helping Circle <i><b>Terms of service</b></i> and <i><b>Privacy Policy</b></i><br>

<input type="submit" value="Submit">


</fieldset>
</form>



<?php
echo "<h2>Hello".$firstName.$lastName."<br>We sent a verification mail to your email which is:".$email."</h2>";

?>

</body>
</html>
