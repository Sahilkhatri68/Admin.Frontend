<?php include('../frontend/include/frontheader.php');

$conn=mysqli_connect("localhost","root","","admindb");
//category data select//
$sel="SELECT * FROM `category` ORDER by id desc LIMIT 5";
$chek=mysqli_query($conn,$sel);
$data=mysqli_fetch_assoc($chek);

//trend data select//
$trend="SELECT * FROM trend ORDER BY id desc limit 4";
$inq=mysqli_query($conn,$trend);


?>
<!DOCTYPE HTML>
<head>
    <style>
        .categories__text h4 {
    color: #e51212;
    font-weight: 700;
}
.trend__item {
    overflow: hidden;
    margin-bottom: 0px !important;
}
.trend__item__text {
    overflow: hidden;
    margin-bottom: 10px !important;
}
.categories__text a {
    font-size: 15px;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 600;
    position: relative;
    padding: 0 0 3px;
    display: inline-block;
}

.categories__text a:after {
    position: absolute;
    left: 0;
    bottom: 0;
   height: 0px;
   width: 0px;
}


.glow-on-hover {
    width: 110px;
    height: 25px;
    border: none;
    outline: none;
    color: #fb0606;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}
</style>
</head>
<body>

 <!-- Categories Section Begin -->
 <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="<?php echo image; ?><?php echo $data['image']; ?>">
                    <div class="categories__text">
                        <h4><?php echo $data['cattitle']; ?></h4>
                        <p><?php echo $data['description']; ?></p>
                        <a href="http://projects.test/adminpanel/frontend/include/shop.php" style="text-decoration: none;">  <button class="glow-on-hover" type="button">   Shop now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php while($data=mysqli_fetch_assoc($chek)) {?>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="<?php echo image; ?><?php echo $data['image']; ?>">
                            <div class="categories__text">
                            <h4><?php echo $data['cattitle']; ?></h4>
                        <p><?php echo $data['description']; ?></p>
                       <a href="http://projects.test/adminpanel/frontend/include/shop.php"><button class="glow-on-hover" type="button"> Shop now</button></a>
                            </div>
                        </div>
                    </div><?php } ?>
                </div>
                
            </div>
        </div>
    </div>



</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".women">Women’s</li>
                    <li data-filter=".men">Men’s</li>
                    <li data-filter=".kid">Kid’s</li>
                    <li data-filter=".accessories">Accessories</li>
                    <li data-filter=".cosmetic">Cosmetics</li>
                </ul>
            </div>
        </div>
        <?php $prod="SELECT * FROM product";
        $try=mysqli_query($conn,$prod);
        $prodata=mysqli_fetch_assoc($try);
        ?>
        <div class="row property__gallery">
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo proimage; ?><?php echo $prodata['proimage']; ?>">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="<?php echo proimage; ?><?php echo $prodata['proimage']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="http://projects.test/adminpanel/frontend/include/product_details.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $prodata['protitle']; ?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?php echo $prodata['sellprice']; ?></div>
                    </div>
                </div>
            </div>
            <?php while($prodata=mysqli_fetch_assoc($try)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix men">
                
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo proimage; ?><?php echo $prodata['proimage']; ?>">
                        <ul class="product__hover">
                            <li><a href="<?php echo proimage; ?><?php echo $prodata['proimage']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="http://projects.test/adminpanel/frontend/include/product_details.php"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $prodata['protitle']; ?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?php echo $prodata['sellprice']; ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            


<?php $produ="SELECT * FROM subcat";
        $tri=mysqli_query($conn,$produ);
        $proda=mysqli_fetch_assoc($tri);
        ?>
        <div class="row property__gallery">
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo image; ?><?php echo $proda['image']; ?>">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="<?php echo image; ?><?php echo $proda['image']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $proda['subtitle']; ?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?php echo $proda['subdescription']; ?></div>
                    </div>
                </div>
            </div>
            <?php while($proda=mysqli_fetch_assoc($tri)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix men">
                
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo image; ?><?php echo $proda['image']; ?>">
                        <ul class="product__hover">
                            <li><a href="<?php echo image; ?><?php echo $proda['image']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#"><?php echo $proda['subtitle']; ?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?php echo $proda['subdescription']; ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        











        
        
        
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="<?php echo assets; ?>img/banner/banner-2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">

    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot-Trend's</h4>
                    </div>


                    <?php 
                    
                    while($info=mysqli_fetch_assoc($inq)) { ?>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="<?php echo trendimage.$info['image'] ; ?>" width="100px" height="100px"  alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6><?php echo $info['title']; ?></h6>
                           
                            <p style="line-height:20px"><?php echo $info['description']; ?></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $info['sellprice']; ?></div>
                        </div>
                    </div>
                    <?php } ?>


                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    <div class="trend__item">
                    <?php
                    $best="SELECT * FROM best_seller ORDER BY id DESC LIMIT 4";
                    $seller=mysqli_query($conn,$best);
                     while($inf=mysqli_fetch_assoc($seller)) { ?>

                  
                        <div class="trend__item__pic">
                            
                            <img src="<?php echo bseller.$inf['image']; ?>" padding="5px" width="100px" height="100px" alt="image">
                        </div>
                        <div class="trend__item__text">
                            <h6><?php echo $inf['title']; ?></h6>
                            <p style=" line-height:20px"><?php echo $inf['description'];?></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $inf['sellprice']; ?></div>
                            
                        </div>
                        <?php } ?>
                    </div>
                 </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Featuring  Item's</h4>
                    </div>
                    <div class="trend__item">
                    <?php
                    $feature="SELECT * FROM featuring ORDER BY id DESC LIMIT 4";
                    $item=mysqli_query($conn,$feature);
                     while($proof=mysqli_fetch_assoc($item)) { ?>

                  
                        <div class="trend__item__pic">
                            
                            <img src="<?php echo feat.$proof['image']; ?>" padding="5px" width="100px" height="100px" alt="image">
                        </div>
                        <div class="trend__item__text" >
                            <h6><?php echo $proof['title']; ?></h6>
                            <p style=" line-height:20px"><?php echo $proof['description'];?></p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $proof['sellprice']; ?></div>
                            
                        </div>
                        <?php } ?>
                    </div>
                 </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="<?php echo assets; ?>img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="<?php echo assets; ?>img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->
</body>
<?php include ('../frontend/include/frontfoot.php'); ?>