<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include_once "controller/user_controller.php";




if(isset($_POST['logoutBtn']))
{
    unset($_SESSION['user_array']);
    header('location:login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/customize.css" />
        <script src="./js/jquery.min.js"></script>
        <link rel="icon" href="./img/logo.jpg" />
        <title>Darli SNACKS & DRINKS</title>
    </head>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark"> <a class="navbar-brand" href="./index.php"><img class="rounded" src="./img/logo.jpg"></a>
        <button
        class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link text-white" href="./index.php"><h5>Darli</h5></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#menu">Today's Menu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#about">About</a>
                    </li>
                </ul>
                <?php
                    if(isset($_SESSION['user_array'])){
                        $id=$_SESSION['user_array']['id'];
                        $userController = new UserController();
                        $users  = $userController->getUsers();
                        $user = $userController->getUser($id);
                        echo "<div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                        <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                        <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                        </svg>
                        <span>".$user['name']."</span>
                    </button>
                    <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
                            <li><a class='dropdown-item' href='myorders.php'>My Orders</a></li>
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
                        <a href='myorders.php'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-bucket' viewBox='0 0 16 16'>
                            <path d='M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z'/>
                            </svg>
                        </a>
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
    
