
#The $_POST is a global php variable , that recieves all the objects with a "name" tag in html FORM. 
##NOTE: The if statement checks wether , the user submitted the form, before uploading the information.
##NOTE: Users that have some knwoledge might be able to access inside the database directly if this is not done. 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = $_POST['firstname'];
$questions = $_POST['questions'];
$email = $_POST['email'];

#Normally here you would "sanitize" the data , but you do this if your trying to show data , or push data back to the front (HTML) 


#Here we "import" a file directly into this file. In php you import the syntax of the file directly into the <script class="
##So basically its like copy pasting it in here. In other languages this is NOT possible. 
require_once "mysqli_connection.php";

#-------------------------------This section is if you are using MY_SQLI object oriented style--------------------------------------------#
#We use named values when in the $sql statement instead of INSERTING the information (variables) directly.
##NOTE: This is measure is taken , to prevent your database to be compromised. Basically the program assigns parameters, rather than the infomration itself
###NOTE: FILL IN WITH ADDITIONAL UNDERSTANDING 
$stmt = $conn -> prepare("INSERT INTO `PAID_CONTACTS` (Name, email, Questions) VALUES (?, ?, ?)");
#Connect parameters to actual information (POST_method_variables)
$stmt->bind_param("sss", $name, $email, $questions);

#SQL query is exectuted 
$stmt->execute();

#Clear any statements/queries 
$stmt -> close();

#Clear any type of connection details/passwords/server_names etc
$conn -> close();

#Send the user back to the original page
header("Location: index.html");
}

#This else statement is connected to the if statement above 
##NOTE: If user does not submit the form (POST-METHOD), they will be redirected to the home page. 
else { 
#Send the user back to the original page
header("Location: index.html");
exit();
}
