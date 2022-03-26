<?php



include_once './init.php';
include app_path('middleware/guest.php');

    if(isset($_POST['register'])){
        $user_name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $errors=[];
    if($user_name==''){
        $errors['name']='User name must be enter';
    }
   
    if($email==''){$errors['email']='This field could not be empty email';}
    if($confirm_password==''){
        $errors['confirm_password']='This field could not be empty';
    }
    else{if($password!=$confirm_password){$errors['password']='Password do not match';}}
    if($password==''){$errors['password']='This field could not not be empty';}
    else{if(($password)<3){$errors['password']='Password Need to be longer';}}
    if($phone==''){
            $errors['phone']='This field could not be empty phone';
    }
    if($address==''){
            $errors['address']='This field could not be empty address';
    }
    foreach($errors as $key=>$value){
        if(empty($value)){unset($errors[$key]);}
    }

    
    
    if(count($errors) == 0) {
        $sql = "INSERT INTO  customer (`name`,`password`,`email`,`phone`,`address`)values('$user_name','$password','$email','$phone','$address')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            redirect('login.php');
        }
    }

    

    }
?>
    <?php include 'header.php'?>
    <style>
       .title{
        text-align: center;
        color: white;
        margin-bottom: 20px;
        
    }
        .page{
            border:2px double #FFD0B6 ;
           width: 50%;
           margin: auto;
           margin-top: 50px;
          
            
        }
       .container{

         padding-bottom: 10px;
          
       }
       #box{
    border-radius: 15px;
     border: 2px double #FFB6E5;

 
    }
    #box1{
        border: 2px double #FFB6E5;
    }
    #letter{
        font-size:24px;
        font-style: oblique;
        color: white;
       margin-left: 10px;
       margin-right: -10px;

    }
     </style>
</head>
<body style="background-image:url(./bg.jpg);margin-top: 10px;">
    <div class="page">
                    <h2 class="title" >Create an account</h2>     
    <div class="container" >
    <div class="row" >

    <div class=" col-md-12 mx-auto">
    <form method="post" class="form-vatical"  >
    <div class="form-group row">
        <label class="col-md-5" id="letter" > <i class="bi bi-person"></i>&nbsp;User Name</label>
        <div class="col-md-6 ">
        <input type="text" name="name" class="form-control" id="box" value="<?php echo isset($user_name)?$user_name:'' ?>" />
        <label class="text-danger"><?php echo isset($errors['name']) ? $errors['name']:''; ?> </label>
        
        </div>
        </div>
        <!--username end div -->
    <div class="form-group row">
        <label class="col-md-5" id="letter" ><i class="bi bi-envelope"></i> &nbsp;Email</label>
        <div class="col-md-6 ">
        <input type="email" name="email" class="form-control" id="box" value="<?php echo isset($email)?$email:'' ?>" />
        <label class="text-danger"><?php echo isset($errors['email']) ? $errors['email']:''; ?> </label>

        </div>
        </div><!--email end  -->
       
    <div class="form-group row">
        <label class="col-md-5" id="letter" ><i class="bi bi-key"></i>&nbsp;Password </label>
        <div class="col-md-6">
        <input type="password" name="password" class="form-control" id="box"  value="<?php echo isset($password)?$password:''; ?>"/>
        <label class="text-danger"><?php echo isset($errors['password'])? $errors['password']:''; ?></label>
        </div>
        </div><!-- password end -->
       
    <div class="form-group row">
        <label class="col-md-5" id="letter" > <i class="bi bi-key"></i>&nbsp;Confirm Password</label>
        <div class="col-md-6">
        <input type="password" name="confirm_password" class="form-control" id="box" value="<?php echo isset($confirm_password)?$confirm_password:'' ?>"/>
        <label class="text-danger"><?php echo isset($errors['confirm_password']) ? $errors['confirm_password']:''; ?> </label>
        </div>
            </div><!--conpassword end -->
           
        <div class="form-group row">
        <label class="col-md-5" id="letter" value="<?php echo isset($phone)?$phone:'' ?>"> <i class="bi bi-telephone"></i>&nbsp;Phone</label>
        <div class="col-md-6" >
        <input type="text" name="phone" class="form-control" id="box" />
        <label class="text-danger"><?php echo isset($errors['phone']) ? $errors['phone']:''; ?> </label>
        
        </div>
        </div><!--phone end  -->

    <div class="form-group row">
        <label class="col-md-5" id="letter" value="<?php echo isset($address)?$address:'' ?>"><i class="bi bi-house"></i> &nbsp;Address</label>
        <div class="col-md-6">
       <textarea name="address" class="form-control" cols="30" rows="3" id="box1"></textarea>
       <label class="text-danger"><?php echo isset($errors['address']) ? $errors['address']:''; ?> </label>
        </div>
        </div><!-- address end-->
       
        <div class="form-group row">
      <span  class="col-md-5"></span>
    <div class=" col-md-6" >

    <button type="submit" class="btn btn-primary btn-block " name="register"  value="submit" >Sign Up</button>
    <button type="reset" class="btn btn-secondary btn-block " name="register"  value="reset" >Reset</button>
  
        </div>
</div>
          
      
       
    </form>
    </div><!--row end-->

            </div><!--container end-->
            <div ><!--page end-->
        </div>     
<?php include 'footer.php'?>