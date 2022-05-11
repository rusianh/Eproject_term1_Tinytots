<?php



   $name = isset($_POST['name']) ? trim($_POST['name']) : "";
   $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
   $email = isset($_POST['email']) ? trim($_POST['email']) : "";

   if(empty($name) || empty($phone)|| empty($email)){
       echo "<p style='font-weight: bold; color: #ff1d1e'>Please fill in all fields !!</p>";
   } else{
       echo "<p style='font-weight: bold; color: forestgreen'>Thank you for your contact. We call you as soon as possible. Have a good day!!</p>";
   }


