<?php
$userName = $userMail = $userMessage = "";
$errorMsg = "";
if (isset($_POST['submitForm'])) {
 $userName = htmlspecialchars($_POST['user_name']);
 $userMail = $_POST['user_mail'];
 $userMessage = htmlspecialchars($_POST['user_message']);
 if(trim($userName) == '') {
  $errorMsg = 'Пожалуйста, укажите свое имя!';
 } else if(trim($userMail) == '') {
  $errorMsg = 'Пожалуйста, введите ваш email!';
 } else if(trim($userMessage) == '') {
  $errorMsg = 'Пожалуйста, введите сообщение!';
 }
 if($errorMsg == '') { ?>
  <div class="formOkMsg">
   <p>Ваше имя: <?php echo $userName; ?></p>
   <p>Ваш email: <?php echo $userMail; ?></p>
   <p>Ваше сообщение: <?php echo $userMessage; ?></p>
   <p><a href="handling-form.php">Вернуться</a> к заполнению формы</p>
  </div>
 <?php } ?>
<?php }
if(!isset($_POST['submitForm']) || $errorMsg != '') { ?>
 <form action="handling-form.php" method="POST">
  <div class="errorMsg"><?php echo $errorMsg; ?></div>
  <div>
   <label for="name">Имя *</label>
   <input type="text" id="name" name="user_name" value="<?php echo $userName; ?>" required>
  </div>
  <div>
   <label for="mail">E-mail *</label>
   <input type="email" id="email" name="user_mail" value="<?php echo $userMail; ?>" required>
  </div>
  <div>
   <label for="msg">Сообщение *</label>
   <textarea id="msg" name="user_message" required></textarea>
  </div>
  <div class="button">
   <button type="submit" name="submitForm">Отправить сообщение</button>
  </div>
 </form>
<?php } ?>
