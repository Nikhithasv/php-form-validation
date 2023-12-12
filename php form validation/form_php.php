<!DOCTYPE html>  
<html>  
<head>  
<style>
       body{
        background-color: black;
        color: white;
        margin-left: 150px;
        margin-right: 150px;
    }
    button{
        padding-left: 20px ;
        padding-right: 20px ;
        margin-bottom: 20px;
    }
    span{
        color: red;
    }
 </style> 
</head>  
<body>    
  
<?php  
 
$nameErr = $emailErr = $mobilenoErr = $addressErr = $genderErr = $agreeErr = "";  
$name = $email = $mobileno = $address = $gender  = $agree = "";  
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
 
    if (emptyempty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    if (emptyempty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    if (emptyempty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            } 
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
        
    if(emptyempty ($_POST["address"])) {
        $addressErr = "Address is required";  
    } else {
        $address = input_data($_POST["address"]);  
        }
    if (emptyempty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  

    if (!isset($_POST['agree'])){  
            $agreeErr = "Accept terms of services before submit.";  
    } else {  
            $agree = input_data($_POST["agree"]);  
    }  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
  <center>
<h2>Registration Form</h2>  
 
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >  
<h2>REGISTRATION FORM</h2>
    <table cellspacing="30">
        <tr>
            <td>
                <label>Name: </label>
            </td>
            <td><p>:</p></td>
            <td> <input type="text" name="name">  
    <span class="error"><?php echo $nameErr; ?> </span> </td>
        </tr>
        <tr>
            <td><label>E-mail </label></td>
            <td><p>:</p></td>
            <td><input type="text" name="email">  
    <span class="error"><?php echo $emailErr; ?> </span>  </td>
        </tr>
        <tr>
            <td>
                <label>Mobile No </label>
            </td>
            <td><p>:</p></td>
            <td>  <input type="text" name="mobileno">  
    <span class="error"><?php echo $mobilenoErr; ?> </span>     
                </td>
        </tr>
        <tr>
            <td>
                <label>Address </label>
            </td>
            <td><p>:</p></td>
            <td>     
            <textarea name="address" rows="5" cols="40"></textarea>
      <span class="error"><?php echo $addressErr; ?> </span>  
        </tr>
        <tr>
            <td> <label>Gender </label></td>
            <td><p>:</p></td>
            <td>   
            <input type="radio" name="gender" value="male"> Male  
    <input type="radio" name="gender" value="female"> Female   
    <span class="error"><?php echo $genderErr; ?> </span>   
        </tr>  
</table>
    Agree to Terms of Service  
    <span class="error"><?php echo $agreeErr; ?> </span>  
    <br><br>                            
    <input type="submit" name="submit" value="Submit">   
    <button type="reset">clear</button>
    <br><br>                             
</form>  
</center>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $addressErr == "" && $genderErr == "" && $agreeErr == "") {  
        echo "<h3> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Mobile No: " .$mobileno;   
        echo "<br>";  
        echo "Address: " .$address;   
        echo "<br>"; 
        echo "Gender: " .$gender;  
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
</body>  
</html>  