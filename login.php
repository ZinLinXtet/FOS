<?php
include_once 'layouts/header.php';

?>
  
    
    <body>
        <div class="maincontent pt-0 pb-0">
            <div class="d-md-flex h-md-100 align-items-center">
                <div class="col-md-6 p-0 h-md-100">
                    <div class="block hero2 my-auto" style="background-image:url(https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80);">
                        <div class="container-fluid text-center">
                             <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-offset="0">Darli SNACKS & DRINKS</h1>
                            <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">We are closed for the moment, but we will still deliver food at your place!</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 p-0 h-md-100 loginarea">
                    <div class="d-md-flex align-items-center h-md-100 p-3 justify-content-center">
                        <form>
                             <h3 class="mb-4 text-center">Sign In</h3>

                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="E-mail" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" required="">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label small text-muted" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-dark btn-round btn-block">Sign in</button> <small class="d-block mt-4 text-center"><a class="text-gray" href="#">Forgot your password?</a></small>

                        </form>
                    </div>
                </div>
            </div>
        </div>
       <?php
       include_once 'layouts/footer.php';

       ?>