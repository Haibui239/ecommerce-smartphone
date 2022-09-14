<?php
    session_start();
    $connect=new MySQLi("localhost",'root','','hcs');
    mysqli_set_charset($connect,'utf8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSQUARE</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="css/jquery.nice-number.css"> -->
    <!-- <link rel="stylesheet" href="css/style.scss?v=<//?php echo time(); ?>"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <section>
        <?php include "layout/header.php" ?>
        <section style="display: flex; width: 90%; margin: auto; padding-top: 10vh; position: relative;" class="mobile-res">
            <section  class="left">
              <?php include "layout/left.php" ?>
            </section>
            <section class="cart-home">
              <section style="width: 60%;" class="content-home">
                <?php include "layout/content.php" ?>
              </section>
            </section>
            <section class="right">
              <?php include "layout/right.php" ?> 
            </section>
        </section>
        <?php include "layout/footer.php" ?>
        <script>
          AOS.init();
        </script> 
    </section>
    <!--slick-slider-->
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <!--js-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="js/app.js"></script>
  </body>
</html>