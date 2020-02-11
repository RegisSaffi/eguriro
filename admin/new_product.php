<!DOCTYPE html>
<html lang="en">
<head>
<title>E guriro|new product</title>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>
<body>

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<?php include "./includes/nav.php";  ?>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">


<?php include "./includes/nav_side.php"; ?>

<div class="pcoded-content">


<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
<div class="col-sm-12">


<div class="card">
<div class="card-header">
<h5>New Product</h5>
</div>
<div class="card-block">
  <?php
  if(isset($_POST['save'])){
    require "connection.php";
    $name=$_POST['name'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $link=$_POST['link'];

  $target_dir = "images/";
$target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
$target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
$uploadOk = 1;
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$imageFileType3= strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));


    $check1 = getimagesize($_FILES["image1"]["tmp_name"]);
    $check2 = getimagesize($_FILES["image2"]["tmp_name"]);
    $check3 = getimagesize($_FILES["image3"]["tmp_name"]);

    if($check1 !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if($check2 !== false) {
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
  if($check3 !== false) {
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}


/// check type

if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
&& $imageFileType3 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if(!empty($name) && !empty($quantity) && !empty($price)){
    $target_dir = "../images/";
    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);

    $target_dir1 = "images/";
    $target_file11 = $target_dir1 . basename($_FILES["image1"]["name"]);
    $target_file22 = $target_dir1 . basename($_FILES["image2"]["name"]);
    $target_file33 = $target_dir1 . basename($_FILES["image3"]["name"]);


  if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["image2"]["tmp_name"],$target_file2) && move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file3 )) {
    $insert=mysqli_query($conn,"INSERT INTO `products`(`product_id`, `product_name`, `quantity`, `product_description`, `price`,`product_link`) VALUES (null,'$name','$quantity','$description','$price','$link')");
    if($insert==true){
      $id=mysqli_insert_id($conn);
      $insert_image1=mysqli_query($conn,"INSERT INTO `product_images`(`product_image_id`, `product_image`, `product_id`) 
      VALUES (null,'$target_file11','$id')");
      $insert_image2=mysqli_query($conn,"INSERT INTO `product_images`(`product_image_id`, `product_image`, `product_id`) 
      VALUES (null,'$target_file22','$id')");
      $insert_image3=mysqli_query($conn,"INSERT INTO `product_images`(`product_image_id`, `product_image`, `product_id`) 
      VALUES (null,'$target_file33','$id')");

      if($insert_image1==true && $insert_image2==true && $insert_image3==true){
        echo "<font color='green'>Product saved successful!</font>";
      }

      
    }
  } else {
      echo "Sorry, there was an error uploading your images.";
  }

}else{
  echo "empty field detected!";
}

}


  }
  ?>
<form id="main" method="post" action="#"  enctype="multipart/form-data" >
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name" id="name" placeholder="Product name" required>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Quantity</label>
<div class="col-sm-10">
<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product image 1</label>
<div class="col-sm-10">
<input type="file" class="form-control" id="product image" name="image1" required>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Product image 2</label>
<div class="col-sm-10">
<input type="file" class="form-control" id="product image" name="image2" required>
 <span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product image 3</label>
<div class="col-sm-10">
<input type="file" class="form-control" id="product image" name="image3" required>
 <span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product price</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="product price" name="price" placeholder="Product price" required>
 <span class="messages"></span>
</div>
</div>



<div class="form-group row">
<label class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-10">
  <textarea cols="10" rows="5" class="form-control" placeholder="Description" name="description" required></textarea>
 <span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Product link</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="product link" name="link" placeholder="Product link" required>
 <span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="save" class="btn btn-primary m-b-0">save</button>
</div>
</div>
</form>
</div>
</div>


</div>
</div>

</div>
</div>
</div>
</div>
</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>


<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>

<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<script src="files/assets/js/pcoded.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>

<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/assets/js/script.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="b8bb98f66259e62c0d3f52d3-|49" defer=""></script></body>

</html>
