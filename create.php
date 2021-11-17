<?php 
 require 'dbConnection.php';
 require 'helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

   $title      = Clean($_POST['title']); 
   $content    = Clean($_POST['content']);
   $image      = Clean($_POST['image']);


    # Validate Inputs ..... 
    $errors = [];

    # Name Validate
    if(!validate($title,1)){
       $errors['Title'] = "Field Required";
    }elseif(!validate($content,6)){
      $errors['Title'] = "Invalid Title , Must contain only letters";
   }

    # content Validate 
    if(!validate($content,1)){
        $errors['content'] = "Field Required";
     }elseif(!validate($content,4)){
        $errors['content'] = "Invalid Length , Length Must Be > 100 ch";
     }

     # image validate 
     if(!validate($image,1)){
        $errors['image'] = "Field Required";}
  //    elseif($allowed =  array('jpeg','jpg', "png", "JPEG","JPG", "PNG"){
  //    $ext = pathinfo($image, PATHINFO_EXTENSION){
  //    if(!in_array($ext,$allowed)) {
  //    $errors = "jpeg only";
  //    }
  //   }
  // }


     if(count($errors) > 0){
         foreach($errors as $key => $val){
             echo '* '.$key.' : '.$val.'<br>';
         }
     }else{
         // DB CODE ....... 


        // echo  sha1($password);

        $password =   md5($password);

        $sql = "insert into users (title,content,image) values ('$title','$content','$image')";
          
        $op =  mysqli_query($con,$sql);

        if($op){
            $message =  'User Inserted';
        }else{
            $message =  'Error Try Again !!!';
        }

        $_SESSION['message'] = $message;

        header("Location: index.php");

     }


    mysqli_close($con);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Blog</h2>
  
  <form   action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post">


  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputName" placeholder="Enter title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Content</label>
    <input type="text"   class="form-control"  name="content" id="exampleInputEmail1" placeholder="Enter your content here">
  </div>

  
  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"   class="form-control" name="image" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

</body>
</html>