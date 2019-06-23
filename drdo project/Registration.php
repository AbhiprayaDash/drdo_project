
<?php
$db = mysqli_connect("localhost", "root", "", "drdo");

if(mysqli_connect_error()){
    echo "connection unsucessful";
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $town = $_POST['town'];
    $phone = $_POST['phone'];
    $DOB = $_POST['dob'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $rank = $_POST['rank'];
    $dept = $_POST['dept'];
    $exp =$_POST['exp'];
    $doj = $_POST['doj'];
    


 if($name==''||$password==''||$password1==''||$town==''||$phone==''||$DOB==''||$email==''||$job==''||$rank==''||$dept==''||$exp ==''||$doj=='')
 {
    echo '<script language="javascript">';
    echo 'alert("Please Fill out All details")';
     echo '</script>';

 }
else{
    if($password!=$password1){
        echo '<script language="javascript">';
        echo 'alert("Enter the correct password")';
         echo '</script>';
    }
    else{
        $hash = md5($_POST['password'], PASSWORD_DEFAULT);
        $query="INSERT INTO sign (name1,pass,rank,town,phone,email,dept,job,doj,dob,unique1) VALUES ('$name','$hash','$rank','$town','$phone','$email','$dept','$job','$doj','$DOB','$unique')";
        mysqli_query($db, $query);
        header("Location:loginpg.php");
    }
 }}




?>




<!doctype html>
<html>
    <head>
        <title>Resume.page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reg.css">
    </head>
    <body>
    <div id="error"><?php echo '<script language="javascript">';
echo 'alert $error';
 echo '</script>'; ?></div>
        <form action="/drdo project/Registration.php" class="base" method="post">
            <fieldset class="field">
                <h1>Register</h1>
                Name<br>  <input class="bar" type="text" name="name" value=<?php if(isset($_POST['name'])){echo $name;}else{echo " ";}?>><br><br>
                password<br> <input class="add" type="password" min="5" name="password"value=<?php if(isset($_POST['password'])){echo $password;}else{echo " ";}?>><br><br>
                Confirm password<br> <input class="add" type="password" min="5" name="password1"value=<?php if(isset($_POST['password1'])){echo $password1;}else{echo " ";}?>><br><label>Length of the password must be greater than 5</label><br><br>
                Town/locality<br> <input class="add" type="text" name="town"value=<?php if(isset($_POST['town'])){echo $town;}else{echo " ";}?>><br><br>
                Phone number<br>  <input class="num" name="phone" min="12" max="60" value=<?php if(isset($_POST['phone'])){echo $phone;}else{echo " ";}?>><br><br>
                DOB <br> <input class="num1" type="date" name="dob" value=<?php if(isset($_POST['dob'])){echo $DOB;}else{echo " ";}?>>
                <br><br>
                Email<br>  <input class="add" type="text" name="email" value=<?php if(isset($_POST['email'])){echo $email;}else{echo " ";}?>><br><br>
                <!--Interests<br><br>
                <textarea class="comment" name="comment1" placeholder="Some of your most loved interests..."></textarea>
                <br><br>
                Key Skills<br> <input class="key" type="text" placeholder="keyskills, specializations, expertise" name="skills">
                <br><br>-->
                <h1>Job Details</h1>
                <br>
                Job Title<br><input class="num" type="text" name="job" value=<?php if(isset($_POST['job'])){echo $job;}else{echo " ";}?>><br><br>
                Scientist Rank<br>
                <div class="box">
                    <select name="rank" value=<?php if(isset($_POST['rank'])){echo $rank;}else{echo " ";}?>>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                        <option>F</option>
                        <option>G</option>
                        <option>H</option>
                        <option>I</option>
                    </select>
                </div>
                <br>
                Department<br><input class="add" type="text" name="dept" value=<?php if(isset($_POST['dept'])){echo $dept;}else{echo " ";}?>><br><br>
                Years of experience<br>
                <select class="exp" name="exp"value=<?php if(isset($_POST['exp'])){echo $exp;}else{echo " ";}?>>
                <option value="0">
                    ---
                </option>
                <option value="0.5">less than 1 year</option>
                <option value="1"> 1 year</option>
                <option value="2"> 2 years</option>
                <option value="3"> 3 years</option>
                <option value="4"> 4 years</option>
                <option value="5"> 5 years or more</option>
                </select>
                <br><br>
                date of Joining<br> <input class="num1" type="date" name="doj" value=<?php if(isset($_POST['doj'])){echo $doj;}else{echo " ";}?>>
                <br><br>
 

                <button class="icl-Button icl-Button--primary icl-Button--lg" type="submit" name="submit">Submit</button>
            </fieldset>
</form>
    </body>
</html>