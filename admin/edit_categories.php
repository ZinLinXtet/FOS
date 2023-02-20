<?php
ob_start();
include_once 'layouts/header.php';
include_once "controller/categories_controller.php";

$categoriesController=new CategoriesController();
$id=$_GET['id'];
$result=$categoriesController->getCat($id);
$parents=$categoriesController->getParent();
if(isset($_POST['update'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    $parent=$_POST['parent'];
    $update=$categoriesController->updateCategory($id,$name,$parent);
    if($update){
        header('location:categories.php');
    }
}


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                    <div class="row">
                    
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <a href="categories.php" class="btn btn-primary mt-5">ထွက်မည်</a>
                        <form action="" method="post">
                            <div class="my-3">
                                <label for="" class="form-label" >အမည်</label>
                                <input type="text" name="name" id="" class="form-control" value="<?php echo $result['name'];?>">
                            </div>
                           <div>
                                <select name="parent" id="" class="form-select">
                                    <?php
                                    if($result['parent']==0){
                                        echo "<option value='0'>No Parent</option>";
                                        for ($row=0; $row <count($parents) ; $row++) {
                                            if($parents[$row]['id']==$result['parent'])
                                                echo "<option value='".$parents[$row]['id']."' selected >".$parents[$row]['name']."</option>";
                                            else
                                            echo "<option value='".$parents[$row]['id']."'  >".$parents[$row]['name']."</option>";


                                            
                                        }
                                    }
                                   
                                    else{
                                        for ($row=0; $row <count($parents) ; $row++) {
                                            if($parents[$row]['id']==$result['parent'])
                                                echo "<option value='".$parents[$row]['id']."' selected >".$parents[$row]['name']."</option>";
                                            else
                                            echo "<option value='".$parents[$row]['id']."'  >".$parents[$row]['name']."</option>";


                                            
                                        }
                                        echo "<option value='0'>No Parent</option>";
                                    }



                                            ?>
                                    
                                   

                                </select>
                            </div>
                            <div class="my-3">
                                <button class="btn btn-success" name="update">ထည့်မည်</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-3"></div>
                </div>      

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          <?php
include_once 'layouts/footer.php';

?>

