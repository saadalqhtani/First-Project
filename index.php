<?php
include './inc/db.php';
include './inc/form.php';


    $sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1 ';
   $result = mysqli_query($conn, $sql);
   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    
        
    mysqli_free_result($result);
    mysqli_close($conn);
    


?>



<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.rtl.min.css" >
    <link rel="stylesheet" href="syle.css">
    <title>اربح مع سعد</title>
</head>
<body>




<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-auto">
      <img src="images.jpg" alt="شعار مسابقة سعد">
      <div class="title-container">
        <h1 class="display-4 fw-normal">اربح مع سعد</h1>
      </div>
      
      <p class="lead fw-normal">التسجيل في المسابقة يفتح خلال</p>
      <h3 id="countdown"></h3>
      <p class="lead fw-normal">القرعة ستكون على نسخة مجانية واحدة من البرنامج، ومفتوحة لأي شخص مهتم</p>
      
      
    </div>
  <div class="container">
    <div class="steps-card">
    <h3 class="steps-title">خطوات التسجيل في المسابقة</h3>
  <ul class="list-group list-group-flush steps-list">
  <li class="list-group-item">تابعني على تويتر حتى يوصلك موعد فتح التسجيل وتفاصيل القرعة أول بأول</li>
  
  <li class="list-group-item">سجّل اسمك وبريدك الإلكتروني في النموذج أدناه بعد فتح التسجيل</li>
  <li class="list-group-item">يتم اختيار الفائز بشكل عشوائي من بين جميع المسجَّلين</li>
  <li class="list-group-item">يحصل الفائز على نسخة مجانية من البرنامج، وسيتم التواصل معه عبر البريد المسجَّل</li>
</ul>
    </div>


  </div>
  </div>
  <div class="container">
  


<div class="position-relative  text-center ">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
<form  action="index.php" method="POST">
    <h3>سجّل بياناتك للدخول في القرعة</h3>
  <div class="mb-3">
    <label for="firstName" class="form-label">الاسم الاول</label>
    <input type="text" name="firstName" id="firstName" class="form-control" value="" required>
    <div id="firstNameHelp" class="form-text error"><?php echo $errors['firstNameError'] ?></div>
  </div>

  <div class="mb-3">
    <label for="lastName" class="form-label">الاسم الاخير</label>
    <input type="text" name="lastName" id="lastName" class="form-control" value="" required>
    <div id="lastNameHelp" class="form-text error"><?php echo $errors['lastNameError'] ?></div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">البريد</label>
    <input type="email" name="email" id="email" class="form-control" value="" required>
    <div id="emailHelp" class="form-text error"><?php echo $errors['emailError'] ?></div>
  </div>
  
  
  <button type="submit" name="submit" class="btn btn-primary">تسجيل بياناتي</button>
</form>
</div>
</div>




    
  
</div>

 
<div class="loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>


<div class="d-grid gap-2 col-3 mx-auto my-5">   
<button type="button" id="winner" class="btn btn-primary" >
  إجراء القرعة الآن
</button>
</div>


<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="modalLabel">مبروك.. هذا هو الفائز</h5>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $users): ?> 
        <h1 class="display-3 text-center modal-title"><?php echo htmlspecialchars($users['firstName']) . ' '. htmlspecialchars($users['lastName']); ?></h1>
        <?php  endforeach;  ?>
      </div>
      
      </div>
    </div>
  </div>
</div>








    


 
<script src="bootstrap.bundle.min.js"></script>
<script src="loader1.js"></script>
<script src="saad1.js"></script>
</body>

</html>