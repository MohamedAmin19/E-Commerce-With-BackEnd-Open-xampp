<?php ob_start();
session_start();
include "nav.php";
?>
<html>
  <head>
    <style>
      body{
    height: 800px;
    overflow-x: hidden;
}
h5{
    position: relative;
    bottom:500px;
    left:50px;
    color : red;
}
.online{
    background-color:#86868b;
}
.online h1{
    color: white;
    font-size: 48px;
}
.head{
    position: absolute;
    text-align: center;
    left:560px;
    top:-40;
    transform: translate(-50%,-50%);
}
.form{
    position:relative;
    left:300px;
}
.inputfile{
    position: relative;
    bottom: 35px;
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: transparent;
    display: inline-block;
    cursor: pointer;
    border: 1px solid white;
}

.inputfile:focus,
.inputfile:hover {
    background-color: rgb(121, 117, 117);
}
.icon{
    position: relative;
    top:15px;
    z-index:11111111;
}
    </style>
  </head>
<body>
<div class="online py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  <h1 class="head">Edit</h1>
                  <form action="" method="post">
                    <div class="form">
                      <input type="text"class="form-control mb-4 border-0 py-4 "id="fname" value=<?php echo $_SESSION['Name'];?> name="Name"><br> 
                      <input type="text"class="form-control mb-4 border-0 py-4 " id="mail" name="Email" value =<?php echo $_SESSION['Email'];?>><br>
                      <input type="text"class="form-control mb-4 border-0 py-4 " name="Password" value =<?php echo $_SESSION['Password'];?>><br>
                      <i class="fa fa-upload icon"></i>
                      <input type="file" class=" inputfile btn w-100 py-3" id="img" name="Image" accept="image/*" ><br><br>
                      <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["Submit"])){
    
   if(strpos($_POST["Email"], 'admin') > -1 ){
      echo "<h5>*The Email cannot contain @admin in its format</h5>"; 

    }


else if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
{
   if(strlen($_POST["Password"])>=6)
     {
         if($_POST["Image"]!=""){
        $sql = "UPDATE customer SET Email='".$_POST["Email"]."' , Password='".$_POST["Password"]."', Name='".$_POST["Name"]."', Image='".$_POST["Image"]."'WHERE Email='".$_SESSION['Email']."'";
         }
         else $sql = "UPDATE customer SET Email='".$_POST["Email"]."' , Password='".$_POST["Password"]."', Name='".$_POST["Name"]."'WHERE Email='".$_SESSION['Email']."'";
        $result=mysqli_query($conn,$sql);
        echo "<h5>*Information updated.</h5>";
   }
 else echo "<h5>*Pssword must be 6 charachters long</h5>";
}
else echo "<h5>*Email isn't in the correct format</h5>";
}





 ?>