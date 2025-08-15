<?php 
include "./inc/dp.php";
include "./inc/form.php";  
include "./parts/header.php";
include "./inc/select.php";

?>

<div class="position-relative  text-center bg-light">
    <div class="col-md-8 p-lg-5 mx-auto my-5">
      <img src="images\imagesElebiary-icon.jpg" style="transform: translateX(255px);"> 
        <h1 class="display-4 fw-normal">Win with Elebiany</h1>
        <p class="lead fw-normal">Login is still open</p>
        <h3 id="countdown"></h3>
        <p class="lead fw-normal">project (php,css,html and mysql) <br>
         *كالقابض علي الجمر* </p>
        
    </div>
    <ul class="list-group list-group-flush">
  <li class="list-group-item">project for (كالقابض علي الجمر)</li>
         <li class="list-group-item">تابع السحب</li>
         <li class="list-group-item">اربح مع Elebiary</li>
         <li class="list-group-item">سيتم السحب عشوائي</li>
         <li class="list-group-item">اذكر الله</li>
</ul>
</div>




<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3>pleasw inter your information </h3>

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo isset($firstName) ? $firstName : ''; ?>">
                <div class="form-text error"><?php echo isset($errors['firstNameError']) ? $errors['firstNameError'] : ''; ?></div>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo isset($lastName) ? $lastName : ''; ?>">
                <div class="form-text error"><?php echo isset($errors['lastNameError']) ? $errors['lastNameError'] : ''; ?></div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>">
                <div class="form-text error"><?php echo isset($errors['emailError']) ? $errors['emailError'] : ''; ?></div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit Your information</button>
        </form>
    </div>
</div>



<?php // استعلام لجلب البيانات من قاعدة البيانات
$sql = "SELECT firstName, lastName, email FROM users ORDER BY RAND()  LIMIT 1 ";
$result = mysqli_query($conn, $sql);

// تحويل النتائج إلى مصفوفة
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>






<?php if(isset($users) && !empty($users)): ?>

<div id="loder">
  <canvas id="circularlooader" width="200" height="200"></canvas>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-6 mx-auto my-5">
  <button type="button" id="winner" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#winnerModal">
    select winner
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="winnerModal" tabindex="-1" aria-labelledby="winnerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3 text-center w-100" id="winnerModalLabel">THE WINNER</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <?php foreach($users as $user): ?>
          <h2 class="my-4"><?php echo htmlspecialchars($user['firstName']); ?></h2>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


    <!---<div id='cards' class="row mb-5 pb-5">
        
        

          <div class ="col-sm-6"></div>
          <div class="card my-2 bg-light"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
        
    </div>
    ---->
<?php endif; ?>


<?php include "./parts/footer.php"; ?>
