<!DOCTYPE html>
<html>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit:200|Open+Sans|Taviraj" rel="stylesheet">

<body>

<style>
body {
    background-color: white;
}
h1 {
    color: #072140;
    text-align: center;
}
p {
    font-family: verdana;
    font-size: 20px;
}
input[type=text], select {
    width: 100%;
    padding: 12px 28px;
    margin: 8px 2px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.kanit {
  font-family: 'Kanit', sans-serif;
}.Taviraj {
  font-family: 'Taviraj', serif;
    font-size: 20px;
    margin: 24px 20px;
}
.button {
    background-color: white; /* Green */
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 0px 0px;
    cursor: pointer;
    
}
.button1 {
    background-color: white; 
    color: #072140; 
    border: 2px solid white;
    border-radius: 8px;
    width: 100%;
    
}
</style>
<?php
  $username= $_GET["action"];
  echo $username;
  //echo $_GET["action"];
  
 $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
         echo "Error : Unable to open database\n";
      } else {
         //echo "Opened database successfully\n";
      }
     $sql ="SELECT * FROM user_info WHERE id='".$_GET["action"]."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         $n = 1;
         while($row = pg_fetch_row($ret) ){
          
          $checking = 1;
         }
         if($checking == 0 ){
          header("Location: https://numpapick.herokuapp.com/user_info.php?userid=$username");
         //echo "Records created successfully\n";
       }
      }
     
      pg_close($db) ;   
?>
<div class="w3-container" id="demo">

  <h1 class="kanit" style = "color: #072140; ">จัดการข้อมูล</h1>
  <br>
  <label for="fname" class = "Taviraj" style = "color: #808080; ">แก้ไขประวัติผู้ดูแล</label>

    <ul class="w3-ul">
    <li> </li>
    <form action="https://numpapick.herokuapp.com/user_information.php" method="get">
    <li> <button class="button button1" style = "color: #505050;" value="<?php echo $username;?>" name="action">
    <i class="fas fa-user" style="color: #0F4484;">
    </i>&emsp;ข้อมูลส่วนตัว <i class="fas fa-chevron-right" style="float:right; color: #505050; "></i></button></li>
    </form>
    <li></li>
    
  </ul>
  <br>
  <br>
  <br>
<label for="fname" class = "Taviraj" style = "color: #808080;">อุปกรณ์</label>
<ul class="w3-ul">
    <li> </li>
  
    <form action="https://numpapick.herokuapp.com/manage.php" method="get">
    <li> <button  class="button button1" style = "color: #505050;" value="<?php echo $username;?>" name="action">
    <i class="fas fa-tasks" style="color: #0F4484;">
    </i>&emsp;จัดการอุปกรณ์ <i class="fas fa-chevron-right" style="float:right; color: #505050;"></i></button></li>
    </form>
    <li> <button class="button button1 " style = "color: #505050;">
    <i class="fas fa-chart-line" style="color: #0F4484; ">
    </i>&emsp;ประวัติการใช้งาน 
    <i class="fas fa-chevron-right" style="float:right; color: #505050;"></i></button></li>
    <li></li>
    
  </ul>
  
  <br>
  <br>
  <br>
<ul class="w3-ul">
    <li> </li>
    <li> <button class="button button1" style = "color: #505050;">
    <i class="far fa-trash-alt"></i><i class="fas fa-trash-alt" style="color: #0F4484;">
    </i>&emsp;ยกเลิกบริการ <i class="fas fa-chevron-right" style="float:right; color: #505050;"></i></button></li>
    <li></li>
    
  </ul>
 
</div>

</body>
</html>username
