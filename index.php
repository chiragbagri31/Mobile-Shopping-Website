<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopping Website</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
	
	
</head>

<body>
<!-- start #header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Jordan Calderon 430-985 Eleifend St. Duluth Washington 92611 (427) 930-5255</p>
    </div>

    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">Mobile Shopping Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item">
                    <a class="nav-link" href="#message">Top Sale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blogs">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#new-phones">Coming Soon</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light" id =  "cart-item"></span>
                </a>
            </form>
        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->

<main id = "main-site">
<!-- Owl-carousel -->
<section id="banner-area">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="image/Banner1.png" alt="Banner1">
        </div>
        <div class="item">
            <img src="image/Banner2.png" alt="Banner2">
        </div>
        <div class="item">
            <img src="image/Banner1.png" alt="Banner3">
        </div>
    </div>
</section>
<!-- !Owl-carousel -->

</main>



  <!-- Displaying Products Start -->
  <div class="container">
    <div id="message"></div>
		<h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
    <div class="row mt-2 pb-3">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
		
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 mb-2" style = "border:none;">
            <img src="<?= $row['product_image'] ?>" class="card-img-top image" height="250" style = "padding:30px;">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info" style = "font-size:25px;"><?= $row['product_name'] ?></h4>
			                <div class="rating text-warning font-size-6" style = "text-align:center; padding-bottom:8px;">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
              <h5 class="card-text text-center text-danger"  style = "font-size:20px; padding-bottom:10px;"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>
            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" min="1" max="5" style = "text-align:center;" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
  
  
  <!-- Banner Ads  -->
<section id="banner_adds">
    <div class="container py-5 text-center">
        <img src="image/banner1-cr-500x150.jpg" alt="banner1" class="img-fluid">
        <img src="image/banner2-cr-500x150.jpg" alt="banner1" class="img-fluid">
    </div>
</section>
<!-- !Banner Ads  -->

<!-- New Phones -->
  <section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">Upcoming New Phones</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/1.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Samsung Galaxy 10</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/2.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Redmi Note 7</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/3.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Redmi Note 6</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/4.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Redmi Note 5</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/5.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Redmi Note 4</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="item py-2 bg-light">
                    <div class="product font-rale">
						<img src="image/6.png" alt="product1" class="img-fluid">
                        <div class="text-center">
                            <h6>Redmi Note 5 pro</h6>
                            <div class="price py-2">
                                <span><i class="fas fa-rupee-sign">____</i></span>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !New Phones -->

<!-- Blogs -->
<section id="blogs">
    <div class="container py-4">
        <h4 class="font-rubik font-size-20">Latest Blogs</h4>
        <hr>

        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="image/blog1.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="image/blog2.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="image/blog3.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->



  <!-- start #footer -->
<footer id="footer" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <h4 class="font-rubik font-size-20">Mobile Shopping Website</h4>
                <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
            </div>
            <div class="col-lg-4 col-12">
                <h4 class="font-rubik font-size-20">Newslatter</h4>
                <form class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Email *">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Information</h4>
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
                </div>
            </div>
            <div class="col-lg-2 col-12">
                <h4 class="font-rubik font-size-20">Account</h4>
                <div class="d-flex flex-column flex-wrap">
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                    <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright text-center bg-dark text-white py-2">
    <p class="font-rale font-size-14">&copy; Copyrights 2020. Desing By <a href="#" class="color-second">Mobile Shopping Website</a></p>
</div>
<!-- !start #footer -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!--  isotope plugin cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

<!-- Custom Javascript -->
<script src="index.js"></script>
</body>

</html>