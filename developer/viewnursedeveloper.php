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
$error="";
$success="";

$user_firstname= $row['firstname'];
$user_lastname= " ".$row['lastname'];
$user_fullname= $user_firstname.$user_lastname;



$id = $_GET['viewid'];
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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. Andrew's Hospital - View Nurse Profile</title>
    <link rel="stylesheet" href="../css/viewteacherprofi.css">
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
                <a href="./doctorsdeveloper.php" class="active">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Doctors</h3> 
                </a>
                <a href="./nursesdeveloper.php">
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
            <h1>View Nurse Profile</h1>

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
            <h2>Nurse Profile</h2>
            <h2 id="error-msg"><?php echo $error; ?></h2>
            <h2 id="success-msg"><?php echo $success; ?></h2>
            <div class="form-format">
                <div class="form-divisions">
                    <div class="form-divisions">
                        <div class="divide">
                            <?php echo "<img src='$image'>"?>
                        </div>
                    </div>                
                    <div class="divide"> 
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $id;?></strong></p>
                                <p>system id</p>
                            </div>                          
                        </div> 
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $firstname;?></strong></p>
                                <p>first Name</p>
                            </div>
                            <div class="info">
                                <p id="infos"><strong><?php echo $othername;?></strong></p>
                                <p>other Name</p>
                            </div>
                            <div class="info">
                                <p id="infos"><strong><?php echo $lastname;?></strong></p>
                                <p>last Name</p>
                            </div>                           
                        </div>
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $age;?></strong></p>
                                <p>age</p>
                            </div>                          
                        </div>  
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $date_of_birth;?></strong></p>
                                <p>date of birth</p>
                            </div>
                            <div class="info">
                                <p id="infos"><strong><?php echo $gender;?></strong></p>
                                <p>gender</p>
                            </div>   
                            <div class="info">
                                <p id="infos"><strong><?php echo $marital_status;?></strong></p>
                                <p>marital status</p>
                            </div>                        
                        </div> 
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $email;?></strong></p>
                                <p>email</p>
                            </div>                          
                        </div>
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $address;?></strong></p>
                                <p>residential address</p>
                            </div>
                            <div class="info">
                                <p id="infos"><strong><?php echo $gps_address;?></strong></p>
                                <p>gps address</p>
                            </div>   
                            <div class="info">
                                <p id="infos"><strong><?php echo $landmark;?></strong></p>
                                <p>landmark</p>
                            </div>                        
                        </div>  
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $hometown;?></strong></p>
                                <p>hometown</p>
                            </div>                          
                        </div>    
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $telephone1;?></strong></p>
                                <p>contact number</p>
                            </div> 
                            <div class="info">
                                <p id="infos"><strong><?php echo $telephone2;?></strong></p>
                                <p>second contact number</p>
                            </div>                         
                        </div> 
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $religion;?></strong></p>
                                <p>religion</p>
                            </div>                          
                        </div>    
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $spouse_firstname;?></strong></p>
                                <p>name of spouse</p>
                            </div> 
                            <div class="info">
                                <p id="infos"><strong><?php echo $spouse_lastname;?></strong></p>
                                <p>contact of spouse</p>
                            </div>                         
                        </div> 
                        <div class="info-section"> 
                            <div class="info">
                                <p id="infos"><strong><?php echo $spouse_telephone;?></strong></p>
                                <p>contact of spouse</p>
                            </div>                         
                        </div>
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $date_of_employment;?></strong></p>
                                <p>date of employment</p>
                            </div>                          
                        </div>     
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $date_added;?></strong></p>
                                <p>date added to system</p>
                            </div>                          
                        </div>  
                        <div class="info-section">
                            <div class="info">
                                <p id="infos"><strong><?php echo $added_by;?></strong></p>
                                <p>added by</p>
                            </div>                          
                        </div>                 
                    </div> 
                    <div class="buttons">
                        <button id="move-new-applicant" onclick="location.href='./editnursedeveloper.php?editid=<?php echo $id?>'">Edit Record</button>
                        <br>
                        <button id="delete-new-applicant" onclick="location.href='./deletenursedeveloper.php?deleteid=<?php echo $id?>'">Delete Record</button>

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
                        <img src="<?php echo $image;?>" alt="">
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
    </script>
    

</body>
</html>