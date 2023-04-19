<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>
<body>
<style>

*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/lapbg.jpg");
    background-position: center;
    background-size: cover;
    background-repeat:no-repeat;
    width: 100%;
    height: 100vh;

   
}
.box{
    
    position:center;    
    top: 50%;
    left: 100%;
    padding: 20px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
    display: flex;
    align-content: center;
    width: 700px;
    height: 250px;
    margin-top: 200px;
    margin-left: 500px;
  
}


.box .content{
    margin-top: 10px;
    margin-left: 50px;
    font-size: larger;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 200px;
    height: 40px;
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: -10px;
    margin-left: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}

ul li{
    list-style: none;
    margin-left: 200px;
    /* margin-top: -1px; */
    font-size: 35px;

}
.name{
    font-weight: bold;
}

</style>



<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "lapdetails.php";</script>';
    }
    else{
    $sql2="select * from users where EMAIL='$email'";
    $name2 = mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
    $LAP_ID=$rows['LAP_ID'];
    $sql3="select * from laptops where LAP_ID='$LAP_ID'";
    $name3 = mysqli_query($con,$sql3);
    $rows3=mysqli_fetch_assoc($name3);

?>
   <ul><li> <button  class="utton"><a href="lapdetails.php">Go to Home</a></button></li>
   <li class="name">HELLO! <?php echo $rows2['FNAME']." ".$rows2['LNAME']?></li>
</ul>
    <div class="box">
         <div class="content">
             <h2>LAPTOP NAME : <?php echo $rows3['LAP_NAME']?></h2><br>
             <h2>NO OF DAYS : <?php echo $rows['DURATION']?></h2><br>
             <h2>BOOKING STATUS : <?php echo $rows['BOOK_STATUS']?></h2><br>
             
         </div>
     </div>
<?php }
?>
    
</body>
</html>