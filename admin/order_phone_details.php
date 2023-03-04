<?php
    ob_start();
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";
    include_once "controller/product_controller.php";
    $id=$_GET['id'];
    $order=new OrderController();

    $order_details=$order->getOrderDetails($id);
    $orderinfo=$order->getSpecificOrder($id);
    $orderStatus=$orderinfo['status'];

    $productController= new ProductController();
    $getproducts=$productController->getProducts();

    if(isset($_POST['updateStatus'])){
        $status=$_POST['orderStatus'];

        $result=$order->updateOrderStatus($status,$id);
        header("Location:order_by_phone.php");
    }

?>
        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">အော်ဒါအသေးစိတ်</h1>
                        
                    </div>
                    <a href="order_by_phone.php" class="btn btn-primary mx-4">ထွက်မည်</a>
                    <div class="container-md" id="bill">
                        <div class="row"  >
                            <div class="col-md-2">
                                <form method="post">
                                    <div class="text-left mt-5">    
                                        <div class="row">
                                            <b><label for="name" class="mt-4">Order Status</label></b>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex">
                                                <input class="form-control" id="status" name="orderStatus" value="<?php echo $orderStatus; ?>" type="number" min="<?php echo $orderStatus; ?>" max="5" required>    
                                                <button type="button" class="btn btn-secondary ml-1" class="btn btn-primary" title="1=Order Placed. 2=Order Confirmed. 3=Preparing your Order.4=Your order is on the way! 5=Order Delivered.">
                                                    <i class="fas fa-info"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>"> -->
                                    <button type="submit" class="btn btn-success mt-2" name="updateStatus">Update</button>
                                </form>
                            </div>
                            <div class="col-md-6 shadow">
                                <h2 class="text-center">Darli Snacks & Drinks</h2>
                                <div class="mt-3 d-sm-flex align-items-center justify-content-between">
                                    <p>အော်ဒါနံပါတ်: <?php echo $order_details[0]['order_id']; ?></p>
                                    <p>ရက်စွဲ: <?php echo explode(" ",$order_details[0]['created_date'])[0]; ?></p>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>နံပါတ်</th>
                                            <th>စားသောက်ကုန်</th>
                                            <th>အရေအတွက်</th>
                                            <th>ကျသင့်ငွေ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;$i<count($order_details);$i++){
                                                echo "<tr>";
                                                echo "<td>".$i+1 ."</td>";
                                                echo "<td>".$order_details[$i]['name']."</td>";
                                                echo "<td>".$order_details[$i]['qty']."</td>";
                                                echo "<td>".$order_details[$i]['product_price']*$order_details[$i]['qty']."</td>";
                                                echo "</tr>";
                                            }
                                            echo "<tr>";
                                            echo "<td colspan='3' class='text-end'>စုစုပေါင်းကုန်ကျငွေ</td>";
                                            echo "<td>".$orderinfo['total_balance']."</td>";
                                            echo "</tr>";
                                        ?>
                                    </tbody>
                                </table>
                                <div class="my-4">
                                    <h5 class="text-center">ဝယ်ယူအားပေးမှုအတွက်ကျေးဇူးအထူးတင်ရှိပါသည်။</h5>
                                </div>
                            </div>
                            <div class="col-md-2">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                            <button class="btn  btn-info mx-4" onclick="myprint()">ပရင့်ထုတ်မည်</button>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
    <?php
        include_once "layouts/footer.php";
    ?>