<?php
session_start();
include_once "layouts/header.php";
include_once "controller/user_controller.php";
include_once "admin/controller/categories_controller.php";
include_once "admin/controller/product_controller.php";
include_once "controller/viewCart_controller.php";
include_once "controller/login_controller.php";


$categories=new CategoriesController();
$results=$categories->getCategories();

$parents = array_filter($results,function($value){
    if($value["parent"] == 0) 
        return $value;
});

$products_controller=new ProductController();
$products=$products_controller->getProducts();

// if(isset($_SESSION['user_array']))
// {
//     $user_id = $_SESSION['user_array']['id'];
//     $loginController = new LoginController();
//     $userSessionId = $loginController->getUser_SessionId($user_id);
//     var_dump($userSessionId);   
//     // echo $_SESSION['user_session_id'].'<br>';
//     // echo $_SESSION['user_array']['id'];

//     if($_SESSION['user_session_id'] != $userSessionId['user_session_id'])
//     {
//         $data['output'] = 'logout';
//     }
//     else{
//         $data['output'] = 'login';
//     }

//     echo json_encode($data);
// }
// var_dump($_SESSION['auth_user']['_token']);




?>
<!-- https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80 -->

    <body>
    <div class="block hero1 my-auto"
        style="background-image:url(img/darli_banner.jpg);">
            <div class="container-fluid text-center">
            <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0">Darli
                SNACKS & DRINKS</h1>
            <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">We are closed
                for the moment, but we will still deliver food at your place!</p>
            <a href="#menu" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">View Today's Menu</a>
            <a href="#about" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">About</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="maincontent">
        <div class="container">
            <section id="menu">
                <div class="block menu1">
                    <div class="row">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <div class="col-md-3 d-flex">
                                <li class="nav-item ml-3 mb-3" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">ALL</button>
                                </li>
                            </div>
                            <div class="col-md-9 d-flex">
                                <?php 
                                for($i = 0; $i < count($parents); $i++){
                            ?>

                                <li class="nav-item ml-3" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#<?php echo $parents[$i]['name']; ?>" type="button" role="tab"
                                        aria-controls="pills-profile"
                                        aria-selected="false"><?php echo $parents[$i]['name']; ?></button>
                                </li>

                                <?php
                                }
                            ?>
                            </div>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                                <div class="row mx-auto d-flex text-dark justify-content-start">
                                    <?php
                                        for($row=0;$row<count($products);$row++){
                                        echo ' 
                                    <div class="col-md-3 my-3 text-center">
                                        <div class="card" style="width: 15rem;">
                                            <img class="card-img-top" src="admin/uploads/'.$products[$row]['image'].'"alt=""  width="200px" height="200px">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$products[$row]['name'].'</h5>
                                                <p class="card-text">'.$products[$row]['price'].'</p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <form action="manageCart.php" method="post">

                                                    <div class="d-flex">
                                                        <input type="number" name="pQty" class="form-control w-100 mr-2" value="1" min="1">

                                                        <button name="addToCart" class=" btn btn-outline-primary my-cart-btn w-100"
                                                        data-id="'.$products[$row]['id'].'" data-name="'.$products[$row]['name'].'" data-price="'.$products[$row]['price'].'" data-quantity="1"
                                                        data-image="admin/uploads/'.$products[$row]['image'].'"alt="">Add</button>  
                                                    </div>
                                                    <input type="hidden" name="pId" value="'.$products[$row]['id']. '">
                                                    <input type="hidden" name="pName" value="'.$products[$row]['name']. '">
                                                    <input type="hidden" name="pPrice" value="'.$products[$row]['price']. '">
                                                </form>
                                                <div class="d-flex">
                                                    <a href="viewProduct.php?item_id=' .$products[$row]['id'] . '" class="mx-2"><button class="btn btn-outline-primary">View</button></a> 
                                                </div>

                                            </div>
                                        </div>
                                    </div>';


                                    }?>
                                            

                                </div>

                            </div>
                        </div>
                        <?php 
                            for($i = 0; $i < count($parents); $i++){
                        ?>
                            <div class="tab-pane fade" id="<?php echo $parents[$i]['name']; ?>" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">
                                <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                                    <div class="row mx-auto d-flex text-dark justify-content-start">
                                        <?php
                                            for($row=0;$row<count($products);$row++){
                                                if($products[$row]["category_id"] == $parents[$i]['id']){
                                                echo '
                                                <div class="col-md-3 my-3 text-center">
                                                <div class="card" style="width: 15rem;">
                                                    <img class="card-img-top" src="admin/uploads/'.$products[$row]['image'].'"alt=""  width="200px" height="200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">'.$products[$row]['name'].'</h5>
                                                        <p class="card-text">'.$products[$row]['price'].'</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-center">
                                                        <form action="manageCart.php" method="post">
        
                                                            <div class="d-flex">
                                                                <input type="number" name="pQty" class="form-control w-100 mr-2" value="1" min="1">
        
                                                                <button name="addToCart" class=" btn btn-outline-primary my-cart-btn w-100"
                                                                data-id="'.$products[$row]['id'].'" data-name="'.$products[$row]['name'].'" data-price="'.$products[$row]['price'].'" data-quantity="1"
                                                                data-image="admin/uploads/'.$products[$row]['image'].'"alt="">Add</button>  
                                                            </div>
                                                            
                                                            <input type="hidden" name="pId" value="'.$products[$row]['id']. '">
                                                            <input type="hidden" name="pName" value="'.$products[$row]['name']. '">
                                                            <input type="hidden" name="pPrice" value="'.$products[$row]['price']. '">
                                                        </form>
                                                        <div class="d-flex">
                                                            <a href="viewProduct.php?item_id=' .$products[$row]['id'] . '" class="mx-2"><button class="btn btn-outline-primary">View</button></a> 
                                                        </div>
        
                                                    </div>
                                                </div>
                                            </div>';
                                                        
                                                } 
                                            }                           

                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
        </div>
        <!-- End Pizza Menu -->
        
    </div>
    <!-- End block -->
    <script src="./js/mycart.js"></script>
    <script src="./js/mycart-custom.js"></script>
    </section>
    </div>
    </div>
    <div class="maincontent">
        <div class="container" id="about">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4 text-center">Ways to deliver at your home and the measures we take</h1>

                    <div class="featured-img mt-5 mb-5">
                        <img data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0"
                            src="img/about_us.png" class="w-80" height="500px">
                    </div>
                    <article class="article" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0"
                        data-aos-delay="200">
                        <p>Welcome to Darli Snacks and Drinks shop! We are a team of passionate foodies who 
                            believe that everyone deserves access to fresh and delicious food, no matter
                             where they are located. Our online shop is designed to make it easy for you
                              to find and order your favorite meals, snacks, and drinks, all from the comfort
                               of your own home. Whether you are looking for a quick lunch, a romantic dinner, 
                               or a special treat for yourself or someone you love, we have everything you need
                                to satisfy your cravings.</p>
                        <p>At our online food shop, we are committed to using only the highest quality ingredients
                            in all of our products. We work with local farmers and producers to source the freshest fruits,
                             vegetables, meats, and dairy products, ensuring that everything we offer is both delicious and
                              nutritious. We also believe in offering a wide range of options to meet the needs of every customer, 
                              including vegan, gluten-free, and other dietary restrictions. With our easy-to-use website, 
                              you can browse our menu, place your order, and have it delivered right to your doorstep in no time.</p>
                        <p>We are proud to be a part of the growing movement towards more sustainable and ethical food practices. We are
                             constantly seeking out new ways to reduce our environmental impact, such as using biodegradable packaging and
                              sourcing ingredients from local suppliers. We also believe in supporting our community, and regularly donate
                               a portion of our profits to local charities and organizations. Thank you for choosing our online food shop,
                                and we look forward to serving you soon!</p>
                    </article>
                </div>
            </div>
        </div>

    </div>


    <?php
    include_once 'layouts/footer.php';


    ?>