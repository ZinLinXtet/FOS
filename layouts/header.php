<?php
    
    include_once "controller/user_controller.php";
    include_once "controller/login_controller.php";



    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }

    if(!isset($_SESSION['auth_user']))
    {
        $_SESSION['auth_user'] = [];
    }

    // var_dump($_SESSION['auth_user']);
    if(count($_SESSION['auth_user']) > 0)
    {
        // $userController = new UserController();
        $user_id = $_SESSION['auth_user']['id'];
        // var_dump($_SESSION['auth_user']['id']);
        $loginController = new LoginController();
        $db_session = $loginController->getUser_SessionId($user_id);
        // var_dump($db_session['user_session_id']);
        // var_dump($_SESSION['auth_user']['_token']);
        if($db_session['user_session_id'] != $_SESSION['auth_user']['_token']){
            // session_destroy();
            unset($_SESSION['user_array']);
            unset($_SESSION['auth_user']);
            unset($_SESSION['cart']);
            header('Location: login.php');
        }
    }

    if(isset($_POST['logoutBtn']))
    {
        // session_id($_SESSION['user_session_id']);
        // session_destroy();
        unset($_SESSION['user_array']);
        unset($_SESSION['auth_user']);
        unset($_SESSION['cart']);
        header('location:login.php');
    }







?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
        <!-- Scroll W3School CSS -->
        <style>
            /* width */
            ::-webkit-scrollbar {
            width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px gold; 
            border-radius: 6px;
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #000000;
            box-shadow: inset 0 0 5px #ffffff; 
            border-radius: 6px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #ffffff; 
            box-shadow: inset 0 0 5px #000000; 
            }
        </style>
        <!-- Animate.Style CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/customize.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">  
        <script src="./js/jquery.min.js"></script>
        <script src="https://cdn.jsdeliv    r.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- Alertify CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        <link rel="icon" href="./img/logo.jpg" />

        <title>Darli SNACKS & DRINKS</title>
    </head>
    <nav class="navbar navbar-expand-lg navbar-light mx-sm-auto p-2 fixed-top bg-dark"> <a class="navbar-brand" href="./index.php">
        <img class="rounded ml-lg-4" src="./img/logo.jpg"></a>
        <button
        class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link text-white" href="./index.php"><h5>Darli</h5></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#menu">Today's Menu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#about">About Us</a>
                    </li>
                </ul>
                <?php
                    if(isset($_SESSION['user_array'])){
                        $id=$_SESSION['user_array']['id'];
                        $userController = new UserController();
                        $users  = $userController->getUsers();
                        $user = $userController->getUser($id);
                        // echo $user['password'];
                        echo "
                        <ul class='navbar-nav mr-end'>
                            <li class='nav-item'> <a class='nav-link text-white' href='./contact.php'>Contant Us</a>
                            </li>
                            <li class='nav-item'> <a class='nav-link text-white' href='./myorders.php'>My Orders</a>
                            </li>
                            <li class='nav-item mt-1 mx-3'>
                                <a href='viewCart.php'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-bucket' viewBox='0 0 16 16'>
                                <path d='M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z'/>
                                </svg>
                                </a>
                            </li>
                        </ul>
                        <div class='dropdown ms-3'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                        <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                        </svg>
                        <span>".$_SESSION['user_array']['name']."</span>
                    </button>
                    <ul class='dropdown-menu text-center'>
                            <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
                            <li>
                                <a class='dropdown-item' href='#'>
                                    <form action='' method='post'>
                                        <button type='submit' class='btn btn-danger btn-sm float-end' name='logoutBtn' onclick='return confirm('Are you sure to logout?')'>Logout</button>
                                    </form>  
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class='mt-2 mx-3'>
                    </div>";
                    }
                    else{
                        echo "<div>
                        <a href='login.php' class='mx-3'>Login</a>
                        <a href='register.php'>Register</a>
                    </div>";
                    }
                ?>
                
            </div>
    </nav>

    
    
    
    
