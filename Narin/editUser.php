


<?php
session_start();
$email = $_SESSION["email"] ;


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'narinsd';

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from website_user WHERE email = '".$email."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

	$row = $result->fetch_assoc() ;
}
 

?>

<label >
	Email
</label></br>

<label >
	<?php echo $email ?>
</label></br>



<label >
	Password
</label></br>

<input type="text" class="form-control" id="pwd-container" value="<?php echo $row['password'] ?>"></br>



<label >
	Authentication Code
</label></br>

<label >
	<?php echo $row['auth_token'] ?>
</label></br>




<input type="button" class="cancel" value="Cancel"/>
<input type="button" class="save" value="Save"/>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
 $(document).ready(function() {
        $('.cancel').on('click', function(){
            
             var url = "searchAllUsers.php";
                $(location).attr('href',url);
    
        });

        $('.save').on('click', function(){
            var pwd = $("#pwd-container").val();

             $.get( 
             "updateUserSession.php",
             { "_pwd": pwd },
             function(data) {
                
             }

          );
             var url = "updateUser.php";
                $(location).attr('href',url);
            
            
        });
    });
    </script>


