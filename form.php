<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuytcuyt Home</title>
  <!-- font awesome cnd -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- boostrap css-->
  <!-- boostrap js -->
  <script src="./bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <title>Document</title>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $websiteErr = "";
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Yêu cầu nhập tên";
    } else {
      $name = test_input($_POST["name"]);

      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Chỉ cho phép chữ cái và khoảng trắng";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Yêu cầu nhập E-mail";
    } else {
      $email = test_input($_POST["email"]);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Định dạng email không hợp lệ";
      }
    }

    if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        $websiteErr = "URL không hợp lệ";
      }
    }

    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Yêu cầu nhập giới tính";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <div class="container ">
    <div class="row text-center">
      <h2>Đăng ký thông tin</h2>
      <!-- <p><span class="error">* Trường bắt buộc nhập</span></p> -->
    </div>

    <div class="d-flex justify-content-center ">

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row py-2">
          <label for="inputPassword6" class="col-form-label">Họ tên</label>
          <div class="col-auto">
            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="name" value="<?php echo $name; ?>">
          </div>
          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
              <span class="error">* <?php echo $nameErr; ?></span>
            </span>
          </div>
        </div>

        <div class="row py-2">

          <label for="inputPassword6" class="col-form-label">E-mail</label>

          <div class="col-auto">
            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="email" value="<?php echo $email; ?>">
          </div>
          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
              <span class="error">* <?php echo $emailErr; ?></span>
            </span>
          </div>
        </div>

        <div class="row py-2">

          <label for="inputPassword6" class="col-form-label">Website</label>

          <div class="col-auto">
            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" name="website" value="<?php echo $website; ?>">
          </div>
          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
              <span class="error"><?php echo $websiteErr; ?></span>
            </span>
          </div>
        </div>

        Bình luận
        <br>
        <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        Giới tính:
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Nam" <?php if (isset($gender) && $gender == "Nam") echo "checked"; ?>>
          <label class="form-check-label" for="inlineRadio1">Nam</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Nữ" <?php if (isset($gender) && $gender == "Nữ") echo "checked"; ?>>
          <label class="form-check-label" for="inlineRadio2">Nữ</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Khác" <?php if (isset($gender) && $gender == "Khác") echo "checked"; ?>>
          <label class="form-check-label" for="inlineRadio3">Khác</label>
        </div>
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Gửi đi">
      </form>

    </div>




    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
</body>

</html>