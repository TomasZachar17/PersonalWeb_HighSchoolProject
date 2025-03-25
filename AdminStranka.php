<?php
    if (isset($_POST['upload'])) {
     
        $filename = $_FILES["uploadfile"]["name"];
     
        include "connection.php";
     
        $query = "INSERT INTO portfolio (filename) VALUES ('$filename')";
     
        mysqli_query($connection, $query);

        unset($query);
    }
?>



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Štýly/AdminStranka.css">
</head>

<body style="background-color: lightgrey;">
    
    <a href="PORTFOLIO.php" style="position: fixed; top: 10px; left: 20px; font-size: 20px;">X</a>

    <form class="form_container" id="myForm"action="AdminStranka.php" method="post" enctype="multipart/form-data"  onsubmit="myFunction()">
		<input class="input_button" type="file" name="uploadfile"/>
		<input class="submit_button" type="submit" name="upload"/>
	</form>
        
        <script>
        function myFunction(){
            document.getElementById("myFrom").reset();
        }
        </script>
</body>
</html>