<html> 
<form method="post" action="index.php">
    
    <input type="text" placeholder="Enter folder name" name="foldername">
    <input type="text" name="aut">
    <input type="submit">
<?php echo "hehe"; ?>
    
     </form>
<?php
  $foldername = $_POST['foldername'];
  $aut = $_POST['aut'];
  
  
  $path = "/opt/lampp/htdocs/";
  $files = scandir($path);
  $files = array_diff(scandir($path), array('.', '..'));
  foreach($files as $file){
  if ($foldername == $file ){
      
      echo "this is already extising please choose another";
      }
  else {
     $con = True;
     include("auth.php");
     foreach($auth as $at){if ($at == $aut){$att = True;}}
    
  }
  }
if ($con and $att ){
   mkdir($foldername);
      fopen("$foldername/index.php",'w');
      fopen("$foldername/post.php",'w');
      $source1 ="/opt/lampp/htdocs/conf/index.php";
      $source3 ="/opt/lampp/htdocs/conf/post.php";
      $dest1 = "$foldername/index.php";
      $dest3 = "$foldername/post.php";
      $s1 = copy($source1,$dest1);
      $s3 = copy($source3,$dest3);
      $link ="http://$foldername";
      $js = ['site' => "$link"];
      
      if ($s3){
         
          echo json_encode($js);}
     
      
}
else{
   $rp = ["rp" => "hello cracker!\n I'am here"];
   echo json_encode($rp);}
?>

</html>
