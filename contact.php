<?php 
                
            require('newpmsdb.php');
            if(isset($_POST['sendmail'])) {
                $name = $_POST['name'];
                $name = 'Contact '.$name;
                $to = $_POST['email'];
                $message = $_POST['message'];
                //$receiver ='From: shubham9694279109@gmail.com';
                $receiver ='From: Pharmacy Management System<shubham9694279109@gmail.com>';
              //  ini_set("SMTP", "smtp.gmail.com");
               // ini_set("smtp_port", 587);
              $contact = mail($to, $name, $message, $receiver);

                $q = "INSERT INTO contact(name, email, message) VALUES('$name','$to','$message')";
                if(mysqli_query($mysqli, $q) && $contact)
                {
                        
                        
                        echo"<script>alert('Successfully!, We Contact your earlier')</script>";
                }
                else 
                {
                        echo "<script>alert('failed! try again)'</script>";
                }
            }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Management System</title>

    <meta charset="utf-8">
    <link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="asset/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="asset/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap jquery and proper.js -->
    <script src="asset/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="asset/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- meta tag for responsive website -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pharmacy managment</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <style>
        li {
            padding: 5px;margin: 5px;
        }
        body {
            /*background-color: black;*/
        }
    </style>

</head>
<body>


<nav id="navbaroption" class="navbar navbar-dark bg-dark ">
    <a href="index.php">   <img src="image/Untitled.png" height="80" width="200"  style="margin-right: 553px; float: left;" />
    <ul class="navbar-nav auto" style="display: flex; flex-direction: row;float: right; font-size: 16px;">




    <li class="nav-item " >
                    <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT US</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="btn btn-outline-light  glyphicon glyphicon-off" style="text-decoration: none; font-size: 18px;"></a>
                </li>
            </ul>

        </nav><hr style="background-color: white;">
    </div>

<div class="container-fluid rounded">
    <div class="row px-5">
        <div class="col-sm-6">
            <div>
                <h3 class="text-white">Get a quote</h3>
                <p class="text-secondary">Fill up the form and our Team will get back to you within in 24 hours</p>
            </div>
            
            <div class="links" id="bordering" > <a href="#" class="btn rounded text-white p-3"><i class="fa fa-phone icon text-primary pr-3"></i>+0123 4567 8910</a> <a href="#" class="btn rounded text-white p-3"><i class="fa fa-envelope icon text-primary pr-3"></i>ash723185@gmail.com</a> <a href="#" class="btn rounded text-white p-3"><i class="fa fa-map-marker icon text-primary pr-3 active"></i> Jaipur, Rajasthan</a> 
            </div>
        
            

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.6880019637942!2d75.76510871482016!3d26.84987408315476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db5a1bbbeb331%3A0x37a3fb509cba88d9!2sSt.%20Wilfred&#39;s%20PG%20College!5e0!3m2!1sen!2sin!4v1615034934386!5m2!1sen!2sin" width="600" height="311" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-sm-5 pad" style="margin-left: 75px;">
            <div class="row"><div class="pad-icon"> <a class="fa fa-facebook text-white" href="#"></a> </div>
                <div class="pad-icon"> <a class="fa fa-twitter text-white" href="#"></a> </div>
                <div class="pad-icon"> <a class="fa fa-instagram text-white" href="#"></a> </div></div>
            <form class="rounded msg-form" method = "POST" action="">
                <div class="form-group"> <label for="name" class="h6">Your Name</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-xl-5 pt-sm-3">
                            <i class="fa fa-user text-primary"></i>
                        </div> <input type="text" name = "name" class="form-control border-0">
                    </div>
                </div>
                <div class="form-group"> <label for="name" class="h6">Email</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-xl-5 pt-sm-3"> <i class="fa fa-envelope text-primary"></i> </div> <input type="text" class="form-control border-0" name="email">
                    </div>
                </div>
                <div class="form-group"> <label for="msg" class="h6">Message</label> <textarea name="message" id="msgus" cols="10" rows="5" class="form-control bg-light" placeholder="Message"></textarea> </div>
                <div class="form-group d-flex justify-content-end"> <input type="submit" name="sendmail" class="btn btn-primary text-white" value="send message"> </div>
            </form>

        </div>
    </div>
</div>
<style>
    body {
        background-color: #343a40!important
    }

    .container-fluid {
        background-color: #010449
    }

    .msg-form {
        background-color: white;
        padding: 20px
    }

    .pad-icon {
        padding-top: 50px;
        padding-left: 20px
    }

    .pad-icon a {
        text-decoration: none;
        margin-right: 40px
    }

    .input-group input:focus {
        border: 1px solid blue
    }

    .pad-icon a:active {
        height: 30px;
        width: 30px;
        background-color: #0080ff;
        border-radius: 100%
    }

    .links {
        padding-top: 50px;
        width: 50%
    }

    #bordering a:active {
        border: 1px solid #0080ff
    }

    @media(min-width:568px) {
        .container-fluid {
            margin: 100px 30px;
            width: 96%;
            padding-top: 50px;
            padding-bottom: 50px
        }
    }

    @media(max-width:567px) {
        .container-fluid {
            margin: 10px 10px;
            width: 94%;
            padding-top: 20px;
            padding-bottom: 20px
        }

        .pad {
            padding-top: 20px
        }
    }</style>

</div></body></html>