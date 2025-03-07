<?php 
include 'navbar.php';
include 'connect.php';


// Fetch restaurants from the database
$query = "SELECT * FROM `restaurants` WHERE `status`='active'";
$result = mysqli_query($con, $query);
?>

<!-- Food Section -->
<section class="food py-5 bg-light text-center" id="food">
    <div class="container">
        <h1 class="heading text-uppercase fw-bold mb-4">Our Special Foods</h1>
        <div class="swiper food-slider">
            <div class="swiper-wrapper row">

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="swiper-slide slide col-md-4 mb-4">
                        <div class="card border-0 shadow-lg">
                            <div class="position-relative">
                                <img src="images/<?php echo $row['image']; ?>" class="card-img-top img-fluid" alt="<?php echo $row['name']; ?>">
                                <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fw-bold"><?php echo $row['name']; ?></h3>
                                <p class="card-text text-muted"><?php echo $row['cuisine_type']; ?></p>
                                <h4 class="fw-bold text-danger">$<?php echo $row['average_cost']; ?></h4>
                                <a href="#" class="btn btn-danger">Order Now</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>
</section>



<!-- <section class="food py-5 bg-light text-center" id="food">
    <div class="container">
        <h1 class="heading text-uppercase fw-bold mb-4">Our Special Foods</h1>
        <div class="swiper food-slider">
            <div class="swiper-wrapper row">

     
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food1.jpg" class="card-img-top img-fluid" alt="Delicious Pizza">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Delicious Pizza</h3>
                            <p class="card-text text-muted">Freshly baked pizza with crispy crust, rich sauce, and premium toppings.</p>
                            <h4 class="fw-bold text-danger">$12.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

      
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food2.jpg" class="card-img-top img-fluid" alt="Spicy Burger">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Spicy Burger</h3>
                            <p class="card-text text-muted">Juicy beef patty, fresh veggies, and special spicy sauce in a toasted bun.</p>
                            <h4 class="fw-bold text-danger">$9.49</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

        
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food3.jpg" class="card-img-top img-fluid" alt="Italian Pasta">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Italian Pasta</h3>
                            <p class="card-text text-muted">Creamy alfredo sauce with perfectly cooked pasta and fresh herbs.</p>
                            <h4 class="fw-bold text-danger">$10.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food4.jpg" class="card-img-top img-fluid" alt="Chicken Tikka Masala">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Chicken Tikka Masala</h3>
                            <p class="card-text text-muted">Grilled chicken pieces in a creamy spiced tomato sauce.</p>
                            <h4 class="fw-bold text-danger">$13.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

        
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food5.jpg" class="card-img-top img-fluid" alt="Grilled Steak">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Grilled Steak</h3>
                            <p class="card-text text-muted">Tender, juicy grilled steak with a side of roasted vegetables.</p>
                            <h4 class="fw-bold text-danger">$18.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

          
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food6.jpg" class="card-img-top img-fluid" alt="Chocolate Dessert">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Chocolate Dessert</h3>
                            <p class="card-text text-muted">Rich chocolate cake topped with vanilla ice cream and caramel sauce.</p>
                            <h4 class="fw-bold text-danger">$7.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

         
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food7.jpg" class="card-img-top img-fluid" alt="Chicken Biryani">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Chicken Biryani</h3>
                            <p class="card-text text-muted">Aromatic basmati rice cooked with tender chicken and flavorful spices.</p>
                            <h4 class="fw-bold text-danger">$11.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

           
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food8.jpg" class="card-img-top img-fluid" alt="Grilled Salmon">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Grilled Salmon</h3>
                            <p class="card-text text-muted">Perfectly grilled salmon fillet served with fresh lemon and herbs.</p>
                            <h4 class="fw-bold text-danger">$14.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>

     
                <div class="swiper-slide slide col-md-4 mb-4">
                    <div class="card border-0 shadow-lg">
                        <div class="position-relative">
                            <img src="images/food9.jpg" class="card-img-top img-fluid" alt="Veggie Tacos">
                            <a href="#" class="fas fa-shopping-cart position-absolute bottom-0 end-0 p-3 text-danger"></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Veggie Tacos</h3>
                            <p class="card-text text-muted">Crispy tacos filled with fresh veggies, beans, and tangy salsa.</p>
                            <h4 class="fw-bold text-danger">$8.99</h4>
                            <a href="#" class="btn btn-danger">Order Now</a>
                        </div>
                    </div>
                </div>



    </div>
</section> -->


