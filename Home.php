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

<div id="container">
<div style="float:left;width=800px;"><img src="Circle of Giving_Hands.jpg" style="width=400px;height:400px;padding:50px 50px 50px 200px;"></div>

<div id="content" style="">

<img src="title.png"style="width=60px;height:60px;padding:50px 0px 10px 10px">
<form method="post" action="
<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["userName"]=="Feyza" && $_POST["pwd"]=="123")
echo "Form.php";
else
echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>
">

 User Name<br>
 <input type="text" name="userName" >
 </br>Password<br>
 <input type="password" name="pwd">
 <br>
 <input type="checkbox" name="terms" checked>Remember me
 
  <br> <br>
<input type="submit" value="Sign in">
 </form></div>
 <br> 
<a href="Form.php">Create an account</a>

<div id="footer" style="clear:both;text-align:center;">
<hr/>© 2014 Helping Circle</div>

</div>
</body>
</html>
