<table border = 1>
    <thead>
        <tr>
            <td>Email</td>
            <td>Password</td>
            <td>Authentication</td>
            <td>Admin</td>
            <td>Delete</td>
            <td>Edit</td>
            <td><input type ="button" id="home" class="but" value="Delete"/></td>
            
        </tr>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="session.js"></script>
    </thead>
    <tbody>

        <?php
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

    $sql = "SELECT * FROM website_user WHERE is_admin = '1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
            <tr>
            <td><?php echo $row['email'] ?> </td>
            <td> <?php echo $row['password'] ?> </td>
            <td> <?php echo $row['auth_token'] ?> </td>
            <td> <?php echo $row['is_admin'] ?> </td>
            

            <td><input type ="button" class="delete" id= "<?php echo $row['email'] ?>" value="Delete"/></td>
            <td><input type ="button" class="edit" id= "<?php echo $row['email'] ?>" value="Edit"/></td>
            <td><input type ="button" class="convert" id= "<?php echo $row['email'] ?>" value="Make Normal"/></td>
        </tr>
            <?php
        }
    }


        
        ?>
    </tbody>
    <script>
    $(document).ready(function() {
        $('.delete').on('click', function(){
            var email = this.id;
             $.get( 
             "deleteUser.php",
             { "_email": email },
             function(data) {
                
             }

          );
             var url = "dummy.php";
                $(location).attr('href',url);
    
        });

        $('.edit').on('click', function(){
            var email = this.id;
             $.get( 
             "editUserSession.php",
             { "_email": email },
             function(data) {
                
             }

          );
             var url = "editUser.php";
                $(location).attr('href',url);
            
            
        });

        $('.convert').on('click', function(){
            var email = this.id;
             $.get( 
             "convertAdmin.php",
             { "_email": email },
             function(data) {
                
             }

          );
             var url = "dummy.php";
                $(location).attr('href',url);
            
            
        });
    });
    </script>
</table>
