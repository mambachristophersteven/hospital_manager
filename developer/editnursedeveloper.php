<?php

include '../connection.php'; 
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

$username= $_SESSION['username'];
$sql= "SELECT * FROM `admins` WHERE username= '$username'";
$result= mysqli_query($con,$sql);
$nums= mysqli_num_rows($result);
$row= mysqli_fetch_assoc($result);
$adminimage= $row['image'];
$position=$row['position'];
$admin_firstname=$row['firstname'];
$admin_lastname=" ".$row['lastname'];
$admin_fullname=$admin_firstname.$admin_lastname;

$user_firstname= $row['firstname'];
$user_lastname= " ".$row['lastname'];
$user_fullname= $admin_firstname.$admin_lastname;


$error="";
$success="";

$id = $_GET['editid'];
$sqlview= "SELECT * from `nurses` WHERE id=$id";
$resultview=mysqli_query($con,$sqlview);
$rowview=mysqli_fetch_assoc($resultview);

$firstname=$rowview['firstname'];
$lastname=$rowview['lastname'];
$othername=$rowview['othername'];
$age=$rowview['age'];
$email=$rowview['email'];
$gender=$rowview['gender'];
$marital_status=$rowview['marital_status'];
$date_of_birth=$rowview['date_of_birth'];
$address=$rowview['address'];
$gps_address=$rowview['gps_address'];
$landmark=$rowview['landmark'];
$hometown=$rowview['hometown'];
$telephone1=$rowview['telephone1'];
$telephone2=$rowview['telephone2'];
$religion=$rowview['religion'];
$spouse_firstname=$rowview['spouse_firstname'];
$spouse_lastname=$rowview['spouse_lastname'];
$spouse_telephone=$rowview['spouse_telephone'];
$date_of_employment=$rowview['date_of_employment'];
$image=$rowview['image'];
$date_added=$rowview['date_added'];
$added_by=$rowview['added_by'];

$currentDate = date('Y-m-d'); 




if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $othername=$_POST['othername'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $gps_address=$_POST["gps_address"];
    $landmark=$_POST['landmark'];
    $hometown=$_POST['hometown'];
    $telephone1=$_POST['telephone1'];
    $telephone2=$_POST['telephone2'];
    $religion=$_POST['religion'];
    $marital_status=$_POST['marital_status'];
    $spouse_firstname=$_POST['spouse_firstname'];
    $spouse_lastname=$_POST['spouse_lastname'];
    $spouse_telephone=$_POST['spouse_telephone'];
    $date_of_employment=$_POST['date_of_employment'];
    $date_of_birth=$_POST['date_of_birth'];
    $image=$_FILES['image'];
    $imagefilesize=$image['size'];
    $date_added= date('Y-m-d'); 
    $email=$_POST['email'];

    if(empty($gps_address)){
        $gps_address="None";
    }
    else{
        $gps_address = $_POST['gps_address'];
    }
    if(empty($telephone2)){
        $telephone2="None";
    }
    else{
        $telephone2 = $_POST['telephone2'];
    }
    if(empty($spouse_firstname)){
        $spouse_firstname="None";
    }
    else{
        $spouse_firstname = $_POST['spouse_firstname'];
    }
    if(empty($spouse_lastname)){
        $spouse_lastname="None";
    }
    else{
        $spouse_lastname = $_POST['spouse_lastname'];
    }
    if(empty($spouse_telephone)){
        $spouse_telephone="None";
    }
    else{
        $spouse_telephone = $_POST['spouse_telephone'];
    }


    if(empty($firstname)){
        $error="Enter the firstname of the nurse";
    }
    else{
        if(empty($lastname)){
            $error="Enter the lastname of the nurse";
        }
        else{
            if(empty($age)){
                $error="Enter the age of the nurse";
            }
            else{
                if(empty($marital_status)){
                    $error="Select the marital status of the nurse";
                }
                else{
                    if(empty($date_of_birth)){
                        $error="Select the date of birth of the nurse";
                    }
                    else{
                        if(empty($email)){
                            $error="Enter the email address of the nurse";
                        }
                        else{
                            if(empty($address)){
                                $error="Enter the residential address of the nurse";
                            }
                            else{
                                if(empty($landmark)){
                                    $error="Enter a landmark to the residence";
                                }
                                else{
                                    if(empty($hometown)){
                                        $error="Enter the hometown of the nurse";
                                    }
                                    else{
                                        if(empty($telephone1)){
                                            $error="Enter the contact number of the nurse";
                                        }
                                        else{
                                            if(empty($religion)){
                                                $error="Enter the religion of the nurse";
                                            }
                                            else{
                                                if(empty($religion)){
                                                    $error="Enter the religion of the nurse";
                                                }
                                                else{
                                                    if(empty($religion)){
                                                        $error="Enter the religion of the nurse";
                                                    }
                                                    else{
                                                        if(empty($religion)){
                                                            $error="Enter the religion of the nurse";
                                                        }
                                                        else{
                                                            if(empty($religion)){
                                                                $error="Specify the department of the nurse";
                                                            }
                                                            else{
                                                                if($imagefilesize===0){
                                                                    $error="Select a picture of the nurse";
                                                                }
                                                                else{
                                                                    $imagefilename= $image['name'];
                                                                    $imagefiletemp= $image['tmp_name'];
                                                                    $imagefileerror= $image['error'];
                                                                    $imagefiletype= $image['type'];
                                                                    $filename_separate= explode('.',$imagefilename);
                                                                    $imagefilenameextension= strtolower($filename_separate['1']);
                                                                    $extensions= array('jpeg', 'jpg', 'png');
                                                                    if(in_array($imagefilenameextension,$extensions)){
                                                                        $upload_image='../nursesimages/'.$imagefilename;
                                                                        move_uploaded_file($imagefiletemp,$upload_image);
                                                                        $sqlinsert= "UPDATE `nurses` SET id ='$id',firstname='$firstname',lastname='$lastname',age='$age',gender='$gender',marital_status='$marital_status',image='$upload_image',date_of_birth='$date_of_birth',address='$address',gps_address='$gps_address',landmark='$landmark',hometown='$hometown',
                                                                        othername='$othername',telephone1='$telephone1',telephone2='$telephone2',religion='$religion',spouse_firstname='$spouse_firstname',spouse_lastname='$spouse_lastname',spouse_telephone='$spouse_telephone',date_added='$currentDate' WHERE id ='$id'";
                                                                        $resultin= mysqli_query($con, $sqlinsert);
                                                                        if($resultin){
                                                                            header("location: ./nursesdeveloper.php");
                                                                            exit;
                                                                        }
                                                                        else{
                                                                            die("error occurred: ".mysqli_error($con));
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }                                 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. Andrew's - Add New Doctor</title>
    <link rel="stylesheet" href="../css/addnewteacherheadma.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;0,800;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>
<body onload="initClock()"> 
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <div class="ring"></div> 
                    <img src="../developerimages/logo.png" alt="logo">
                    <h2 class="logo-name">St. Andrew's Hospital</span></h2>
                </div>
                <div class="closebtn" id="closebtn">
                <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./overviewdeveloper.php">
                    <span class="material-symbols-outlined">dashboard</span>
                    <h3>Overview</h3>    
                </a>
                <a href="./adminsdeveloper.php">
                    <span class="material-symbols-outlined">shield_person</span>
                    <h3>Administrators</h3>    
                </a>
                <a href="./doctorsdeveloper.php">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Doctors</h3> 
                </a>
                <a href="./nursesdeveloper.php" class="active">
                    <span class="material-symbols-outlined">person_3</span>
                    <h3>Nurses</h3> 
                </a>
                <a href="./patientsdeveloper.php">
                    <span class="material-symbols-outlined">recent_patient</span>
                    <h3>Patients</h3> 
                </a>
                <a href="./staffdeveloper.php">
                    <span class="material-symbols-outlined">group</span>
                    <h3>Staff</h3> 
                </a>
                <a href="./addnewdeveloper.php">
                    <span class="material-symbols-outlined">person_add</span>
                    <h3>Add New</h3> 
                </a>
                <a href="../logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>logout</h3>    
                </a>
            </div>
        </aside>
        <main>
            <h1>Edit Nurse Profile</h1>

            <!-- <div class="search">
                <input type="search" name="search" id="search" placeholder="search" autocomplete="off">
                <button type="submit"><span class="material-symbols-outlined">search</span></button>
            </div> -->

            <div class="datetime">
                <div class="date">
                    <b><span id="dayname">Day</span></b>,
                    <b><span id="daynum">00</span></b>
                    <b><span id="month">Month</span></b>,
                    <b><span id="year">Year</span></b>
                </div>
                <div class="time">
                    <span id="hours">00</span>:
                    <span id="minutes">00</span>:
                    <span id="seconds">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
            <h2>Enter Nurse's Details</h2>
            <h2 id="success-msg"><?php echo $success; ?></h2>
            <div class="form-format">              
                <div class="form">
                    <form action="" method="post" enctype="multipart/form-data" id="form">
                        <h2 class="form-legend">Personal Information</h2>
                        <div class="wrapper">
                            <div class="image-container">
                                <img src="<?php echo $image;?>" alt="upload image" id="person-image">
                            </div>
                            <label for="image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-e</title><circle cx="256" cy="272" r="64"/><path d="M432,144H373c-3,0-6.72-1.94-9.62-5L337.44,98.06a15.52,15.52,0,0,0-1.37-1.85C327.11,85.76,315,80,302,80H210c-13,0-25.11,5.76-34.07,16.21a15.52,15.52,0,0,0-1.37,1.85l-25.94,41c-2.22,2.42-5.34,5-8.62,5v-8a16,16,0,0,0-16-16H100a16,16,0,0,0-16,16v8H80a48.05,48.05,0,0,0-48,48V384a48.05,48.05,0,0,0,48,48H432a48.05,48.05,0,0,0,48-48V192A48.05,48.05,0,0,0,432,144ZM256,368a96,96,0,1,1,96-96A96.11,96.11,0,0,1,256,368Z"/></svg>
                            </label>
                            <input type="file" name="image" id="image" accept="image/*" hidden >
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">gender</h4>
                             <input type="text" name="gender" id="gender" placeholder="enter gender" value=<?php echo $gender;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">date of birth</h4>
                            <input type="date" name="date_of_birth" id="date_of_birth" placeholder="enter date of birth" value=<?php echo $date_of_birth;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">marital status</h4>
                            <input type="text" name="marital_status" id="marital_status" placeholder="enter marital status" value=<?php echo $marital_status;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">first name</h4>
                            <input type="text" name="firstname" id="firstname" placeholder="enter first name" value=<?php echo $firstname;?>>
                        </div>   
                        <div class="form-divisions">
                            <h4 class="select-heading">last name</h4>
                            <input type="text" name="lastname" id="lastname" placeholder="enter last name" value=<?php echo $lastname;?>>
                        </div>   
                        <div class="form-divisions">
                            <h4 class="select-heading">other name</h4>
                            <input type="text" name="othername" id="othername" placeholder="enter other name" value=<?php echo $othername;?>>
                        </div>                                                                    
                        <div class="form-divisions">
                            <h4 class="select-heading">age</h4>
                            <input type="number" name="age" id="age" placeholder="enter age" min="18" max="80" value=<?php echo $age;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">email</h4>
                            <input type="email" name="email" id="email" placeholder="enter email address" value=<?php echo $email;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">address</h4>
                            <input type="text" name="address" id="address" placeholder="enter residential address" value=<?php echo $address;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">landmark</h4>
                            <input type="text" name="landmark" id="landmark" placeholder="enter landmark" value=<?php echo $landmark;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">gps address</h4>
                            <input type="text" name="gps_address" id="gps_address" placeholder="enter gps address of residence" value=<?php echo $gps_address;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">hometown</h4>
                            <input type="text" name="hometown" id="hometown" placeholder="enter hometown" value=<?php echo $hometown;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">telephone number</h4>
                            <input type="tel" name="telephone1" id="telephone1" placeholder="enter phone number" minlength="10" maxlength="10" value=<?php echo $telephone1;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading"> second telephone number</h4>
                            <input type="tel" name="telephone2" id="telephone2" placeholder="enter second phone number(optional)" minlength="10" maxlength="10" value=<?php echo $telephone2;?>>                           
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">religion</h4>
                            <input type="text" name="religion" id="religion" placeholder="enter religion" value=<?php echo $religion;?>>                           
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">spouse firstname</h4>
                            <input type="text" name="spouse_firstname" id="spouse_firstname" placeholder="if married, enter spouse firstname" value=<?php echo $spouse_firstname;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">spouse lastname</h4>
                            <input type="text" name="spouse_lastname" id="spouse_lastname" placeholder="if married, enter spouse lastname" value=<?php echo $spouse_lastname;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">spouse telephone</h4>
                            <input type="tel" name="spouse_telephone" id="spouse_telephone" placeholder="enter spouse telephone number" maxlength="10" value=<?php echo $spouse_telephone;?>>
                        </div>
                        <div class="form-divisions">
                            <h4 class="select-heading">date of employment</h4>
                            <input type="date" name="date_of_employment" id="date_of_employment" placeholder="enter date of employment" value=<?php echo $date_of_employment;?>>
                        </div>
                        <h2 id="error-msg"><?php echo $error; ?></h2>
                        
                        <div class="form-divisions">
                            <input type="submit" name="submit" value="Validate Form" id="submit">
                        </div>                         
                    </form>
                    <div class="form-divisions">
                        <button id="cancel-add" onclick="location.href='./nursesdeveloper.php'">Cancel</button>
                    </div>
                </div>
            </div>

            
            


        </main>
        <!-- end of main -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <!-- <div class="toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div> -->
                <div class="profile" onclick="location.href='./developerprofile.php'">
                    <div class="info">
                        <p>Hello, <b><?php echo $user_fullname; ?></b></p>   
                        <small class="text-muted"><?php echo $position; ?></small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?php echo $adminimage;?>" alt="">
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                           <img src="../developerimages/lizzy.jpg" alt="updated person profile 1">
                        </div>
                        <div class="message">
                           <p><b>Erica Baduwaa</b> has been moved to ward 3</p>
                           <small class="text-muted">10 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../developerimages/lizzy.jpg" alt="updated person profile 1">
                        </div>
                        <div class="message">
                            <p><b>Martha Kusi</b> has been moved to ward 3</p>
                            <small class="text-muted">10 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                           <img src="../developerimages/lizzy.jpg" alt="updated person profile 1">
                        </div>
                        <div class="message">
                            <p><b>Elsie Ayeley</b> has been moved to ward 3</p>
                           <small class="text-muted">10 minutes ago</small>
                        </div>
                    </div>

                </div>             
            </div>
            
            <div class="notes-section">
                <h2>My Reminders</h2>
                <div class="notes">
                    <div class="note">
                        <p>Staff meeting at 6pm</p>
                    </div>
                    <div class="note">
                        <p>Staff meeting at 6pm</p>
                    </div>
                    <a href="./reminders.php">
                        <span class="material-symbols-outlined">add</span>
                    </a>

                </div>
                

            </div>
            <div class="socials-and-website">
                <h2>Socials</h2>
                <div class="social-icons">
                    <a href="https://www.facebook.com/" id="facebook">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path d="M480,257.35c0-123.7-100.3-224-224-224s-224,100.3-224,224c0,111.8,81.9,204.47,189,221.29V322.12H164.11V257.35H221V208c0-56.13,33.45-87.16,84.61-87.16,24.51,0,50.15,4.38,50.15,4.38v55.13H327.5c-27.81,0-36.51,17.26-36.51,35v42h62.12l-9.92,64.77H291V478.66C398.1,461.85,480,369.18,480,257.35Z" fill-rule="evenodd"/></svg>

                    </a>
                    <a href="https://www.instagram.com/" id="instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><title>ionicons-v5_logos</title><path d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"/><path d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"/><path d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"/></svg>
                    </a>
                    <a href="https://www.twitter.com/" id="twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><title>ionicons-v5_logos</title><path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/></svg>
                    </a>
                    <a href="https://www.google.com/" id="google">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><title>ionicons-v5_logos</title><path d="M473.16,221.48l-2.26-9.59H262.46v88.22H387c-12.93,61.4-72.93,93.72-121.94,93.72-35.66,0-73.25-15-98.13-39.11a140.08,140.08,0,0,1-41.8-98.88c0-37.16,16.7-74.33,41-98.78s61-38.13,97.49-38.13c41.79,0,71.74,22.19,82.94,32.31l62.69-62.36C390.86,72.72,340.34,32,261.6,32h0c-60.75,0-119,23.27-161.58,65.71C58,139.5,36.25,199.93,36.25,256S56.83,369.48,97.55,411.6C141.06,456.52,202.68,480,266.13,480c57.73,0,112.45-22.62,151.45-63.66,38.34-40.4,58.17-96.3,58.17-154.9C475.75,236.77,473.27,222.12,473.16,221.48Z"/></svg>
                    </a>
                    
                </div>
            
            </div>
        </div>
        
    </div>



    <script>
        const sideMenu = document.querySelector("aside");
        const menubtn = document.querySelector("#menu-btn");
        const closebtn = document.querySelector("#closebtn");
        const toggler= document.querySelector(".toggler")


        //show menu
        menubtn.addEventListener('click',()=>{
            sideMenu.style.display= "block";
        })

        //hide menu
        closebtn.addEventListener('click',()=>{
            sideMenu.style.display= "none";
        })

        // //change theme

        // toggler.addEventListener('click', ()=>{
        //     document.body.classList.toggle('dark-theme-variables')

        //     toggler.querySelector('span').classList.toggle('active');
        // })


        let imageInput = document.querySelector("#image");
        imageInput.onchange = function(e){
            if(e.target.files.length > 0){
                src= URL.createObjectURL(e.target.files[0]);
                image = document.querySelector(".image-container img");
                image.src=src;
            }
        }


        function updateClock(){
            var now= new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr= now.getFullYear(),
                hou = now.getHours(),
                min= now.getMinutes(),
                sec= now.getSeconds()
                pe= "";

                if(hou == 0){
                    hou= 12;
                }
                // if(hou > 12){
                //     hou = hou - 12;
                //     //pe = "PM";
                // }

                Number.prototype.pad=function(digits){
                    for(var n =this.toString(); n.length < digits; n= 0+n);
                    return n;
                }
                

                var months= ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var week= ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var ids= ["dayname", "daynum", "month", "year", "hours", "minutes", "seconds", "period"];
                var values= [week[dname], dnum.pad(2), months[mo], yr, hou.pad(2), min.pad(2), sec.pad(2), pe];

                for(var i=0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue= values[i];

        }

        function initClock(){
            updateClock();
            window.setInterval("updateClock()", 1);
        }

        const form = document.getElementById('form');
        const imageContainer = document.getElementById('person-image');
        const firstname = document.getElementById('firstname');
        const lastname = document.getElementById('lastname');
        const age = document.getElementById('age');
        const gender = document.getElementById('gender');
        const email = document.getElementById('email');
        const address = document.getElementById('address');
        const landmark = document.getElementById('landmark');
        const hometown = document.getElementById('hometown');
        const telephone1 = document.getElementById('telephone1');
        const religion = document.getElementById('religion');
        const date_of_birth = document.getElementById('date_of_birth');
        const date_of_employment = document.getElementById('date_of_employment');
        const maritalStatus = document.getElementById('marital_status');



        const errorMessage = document.getElementById('error-msg');
        const submitButton = document.getElementById('submit');

        const listener = function (e) {
            console.log("submit clicked");
            e.preventDefault();
            checkInputs();
        };

        form.addEventListener('submit', listener);

        function checkInputs(){
            const firstnameValue = firstname.value.trim();
            const lastnameValue = lastname.value.trim();
            const ageValue = age.value.trim();
            const genderValue = gender.value.trim();
            const emailValue = email.value.trim();
            const addressValue = address.value.trim();
            const landmarkValue = landmark.value.trim();
            const hometownValue = hometown.value.trim();
            const telephone1Value = telephone1.value.trim();
            const religionValue = religion.value.trim();
            const dateOfBirthValue = date_of_birth.value.trim();
            const dateOfEmploymentValue = date_of_employment.value.trim();
            const maritalStatusValue = maritalStatus.value.trim();

            if(religionValue === ''){
                //show error
                //add error class
                setErrorFor(religion, 'Enter religion of nurse');
            }
            else{
                //add success class
                setSuccessFor(religion);
            }
            if(maritalStatusValue === ''){
                //show error
                //add error class
                setErrorFor(maritalStatus, 'Enter marital status of nurse');
            }
            else{
                //add success class
                setSuccessFor(maritalStatus);
            }
            if(hometownValue === ''){
                //show error
                //add error class
                setErrorFor(hometown, 'Enter hometown of nurse');
            }
            else{
                //add success class
                setSuccessFor(hometown);
            }
            if(landmarkValue === ''){
                //show error
                //add error class
                setErrorFor(landmark, 'Enter landmark of nurse residence');
            }
            else{
                //add success class
                setSuccessFor(landmark);
            }
            if(dateOfEmploymentValue === ''){
                //show error
                //add error class
                setErrorFor(date_of_employment, 'Select the date nurse was employed');
            }
            else{
                //add success class
                setSuccessFor(date_of_employment);
            }
            if(genderValue === ''){
                //show error
                //add error class
                setErrorFor(gender, 'Select gender of nurse');
            }
            else{
                //add success class
                setSuccessFor(gender);
            }
            if(dateOfBirthValue === ''){
                //show error
                //add error class
                setErrorFor(date_of_birth, 'Select the date of birth of nurse');
            }
            else{
                //add success class
                setSuccessFor(date_of_birth);
            }
            if(emailValue === ''){
                //show error
                //add error class
                setErrorFor(email, 'Enter email address');
            }
            else{
                //add success class
                setSuccessFor(email);
            }
            if(telephone1Value === ''){
                //show error
                //add error class
                setErrorFor(telephone1, 'Enter telephone number');
            }
            else{
                //add success class
                setSuccessFor(telephone1);
            }
            if(addressValue === ''){
                //show error
                //add error class
                setErrorFor(address, 'Enter residential address');
            }
            else{
                //add success class
                setSuccessFor(address);
            }
            if(ageValue === ''){
                //show error
                //add error class
                setErrorFor(age, 'Enter age of nurse');
            }
            else{
                //add success class
                setSuccessFor(age);
            }
            if(lastnameValue === ''){
                //show error
                //add error class
                setErrorFor(lastname, 'Enter last name of nurse');
            }
            else{
                //add success class
                setSuccessFor(lastname);
            }
            if(firstnameValue === ''){
                //show error
                //add error class
                setErrorFor(firstname, 'Enter first name of nurse');
            }
            else{
                //add success class
                setSuccessFor(firstname);
            }
            if(imageInput.value===''){
                imageContainer.style.border = "3px solid #e74c3c";
                errorMessage.innerText = "Select a picture of the nurse";
            }
            else{
                imageContainer.style.border = "3px solid #7380ec";
            }

            if(firstnameValue !='' && lastnameValue !='' && ageValue !='' && emailValue !='' && addressValue !='' && genderValue !='' && landmarkValue !='' && hometownValue !='' && religionValue !='' && telephone1Value !='' && imageInput.value !='' && dateOfEmploymentValue !=''  && dateOfBirthValue !=''){
                errorMessage.style.color = "#2ecc71";
                errorMessage.innerText = "All Input Fields Validated";
                submitButton.style.background = "rgb(109, 109, 241)";
                submitButton.value = "Submit";
                form.removeEventListener("submit", listener);
            }

        }

        function setErrorFor(input, message){
        errorMessage.innerText = message;
        input.style.border = "2px solid #e74c3c";
        }

        function setSuccessFor(input){
            input.style.border = "2px solid #2ecc71";
        }

        // function checkedCheckBoxes(){
        //     var checked = 0;    
        //     //Reference all the CheckBoxes in the form.
        //     var chks = document.querySelectorAll('input[type="checkbox"]');
    
        //    // Loop and count the number of checked CheckBoxes.
        //     for (var i = 0; i < chks.length; i++) {
        //         if (chks[i].checked) {
        //             checked++;
        //         }
        //     }
    
        //     if (checked > 0) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

    </script>
    

</body>
</html>