<?php

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

   

    if (isset($_POST['submit'])) {
          

        $firstName =   mysqli_real_escape_string($conn,$_POST['firstName'] );
        $lastName =    mysqli_real_escape_string($conn,$_POST['lastName'] );;
        $email =       mysqli_real_escape_string($conn,$_POST['email'] );



        $sql = "INSERT INTO users(firstName, lastName, email) 
            VALUES ('$firstName', '$lastName', '$email')";
   
   if(empty($firstName)){
    $errors['firstNameError'] = 'يرجى إدخال الاسم الأول';
    
   }elseif(empty($lastName)){
    $errors['lastNameError'] = 'يرجى إدخال الاسم الاخير';
   }elseif(empty($email)){
    $errors['emailError'] = 'يرجى إدخال البريد الاكتروني';
   }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailError'] = ' يرجى إدخال البريد الاكتروني صحيح';
   }else{
    if (mysqli_query($conn, $sql)){
          header('Location: index.php');
    }else{
        
        echo 'Error: ' . mysqli_error($conn);
    }
    
}
   
}