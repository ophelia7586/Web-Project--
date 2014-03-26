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
$firstNameErr = $lastNameErr = $emailErr = $genderErr = $websiteErr =  $pwd1Err = $pwd2Err = "";
$firstName = $lastName = $email = $gender = $website = $pwd1 = $pwd2 = "";

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
   
   if (empty($_POST["pwd1"]))
     {
	 $pwd1Err = "Password is required";
	 }
   else
     {
     $pwd1 = test_input($_POST["pwd1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pwd1))
       {
       $pwd1Err = "Only letters and white space allowed"; 
       }
     }	

if (empty($_POST["pwd2"]))
     {
	 $pwd2Err = "Please retype the password";
	 }
   else
     {
     $pwd2 = test_input($_POST["pwd2"]);
     // check if passwords are matching
     if ($pwd1 != $pwd2)
       {
       $pwd2Err = "Passwords are not matching"; 
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

   
<br></br>Create a password<br>
 <input type="password" name="pwd1">
 <span class="error">* <?php echo $pwd1Err;?></span>
 
</br> Confirm your password</br>
  <input type="password" name="pwd2">
  <span class="error">* <?php echo $pwd2Err;?></span>
  
  <br><br>Email address<br>
<input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  
 <br><br>Website<br>
   <input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>

  
 
<br></br>Birthday</br>
 <select name="dayofbirth">  
<?php for($i=1;$i<=31;$i++)
 { ?>
  <option value= <?php echo $i?> > <?php echo $i?> </option>
  <?php 
  }
  ?>
  
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
  
  <select name="yearofbirth">  
<?php for($i=2014;$i>=1950;$i--)
 { ?>
  <option value= <?php echo $i?> > <?php echo $i?> </option>
  <?php 
  }
  ?>
  </select>
  
 <br></br>Gender</br>
 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>

<br><br><input type="checkbox" name="terms" checked>I agree to the Helping Circle <i><b>Terms of service</b></i> and <i><b>Privacy Policy</b></i><br>

<input type="submit" value="Submit">


</fieldset>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $firstName;
echo "<br>";
echo $lastName;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $gender;
?>
</body>
</html>