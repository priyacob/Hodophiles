<?php 
include 'navbar.php';
include 'connect.php';

// Fetch all restaurants
// Fetch Restaurants
$sql = "SELECT * FROM restaurants";
$result = $con->query($sql);
?>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
          </div>
        </div>
      </div>
    </div> 
</div>

    <style>
body {
    background-color: #f8f9fa;
}

h2 {
    font-weight: bold;
    color: #333;
}

.restaurant-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
    margin-bottom: 20px;
}

.restaurant-card:hover {
    transform: scale(1.05);
}

.restaurant-card img {
    height: 200px;
    object-fit: cover;
}

.card-body {
    background: #fff;
    padding: 15px;
}

.card-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #333;
}

.card-text {
    font-size: 0.9rem;
    color: #555;
}

.btn-primary {
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 0.9rem;
}

    </style>


<div class="container mt-5">
    <h2 class="text-center mb-4">Top Restaurants</h2>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card restaurant-card">
                    <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><strong>Location:</strong> <?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                        <p class="card-text"><strong>Cuisine:</strong> <?php echo $row['cuisine_type']; ?></p>
                        <p class="card-text"><strong>Rating:</strong> ⭐ <?php echo $row['rating']; ?>/5</p>
                        <p class="card-text"><strong>Opening Hours:</strong> <?php echo $row['opening_hours']; ?></p>
                        <a href="<?php echo $row['website']; ?>" target="_blank" class="btn btn-primary">Visit Website</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>








<!-- 
<section class="food py-5 bg-light text-center" id="food">
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
</section>

 -->
