<?php

session_start();
if(isset($_SESSION['msg'])){
 echo $_SESSION['msg'];
 unset($_SESSION['msg']);
}

if(isset($_POST['submit'])){
    $conn=mysqli_connect('127.0.0.1:3307','root','','ckeditor');
   
    $adt=date('Y-m-d h:i:s');
    $n="shiv";
    $cnt=$_POST['ckeditortxt'];
    $sql="INSERT INTO `editortab`(`name`, `content`, `createdat`) VALUES ('$n','$cnt','$adt')";
    
    if(mysqli_query($conn,$sql)){
        $_SESSION['msg']='data inserted';
        header('location:index.php');
        die();
         echo "successfully"; 
    }else{
        echo "please try again";
    }
    
}
?>

<html>
    <head>
        <title>ckeditor</title>
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ck/ckeditor/ckfinder.js"></script>
    </head>
    <body>
               <form action="#" method="post">
                   <textarea id="ckeditortxt" name="ckeditortxt">

                   </textarea>
                   <input type="submit" name="submit">

               </form>
               <script>
                   var editor=  CKEDITOR.replace('ckeditortxt');
                   CKFinder.setupCKEditor( editor );
                 //  config.disableNativeSpellChecker=true;
                  // config.scayt_autoStartup = true;

               </script>
               
                
    </body>
</html>
