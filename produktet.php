<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktet</title>

    <!----Linku i CSS, Fonteve, dhe Swiper Slider -->



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="produktet.css">
</head>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".product-slider", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<body>

    <!---Fillon headeri--->

    <header class="header">

        <a href="index.html" class="logo"> <i class=""></i> PayGearPlan </a>
    
        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="addProduct.php">addProducts</a>
            <a href="InsertedProducted.php">EditProducts</a>
        </nav>
    
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>

        </div>
    
        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </header>
     <!---Mbaron headeri--->

    <!---Fillon sektori i "Products"--->
    
    <section class="products" id="products">

        <h1 class="heading"> our <span>products</span> </h1>
          <!--produketet e insertuara nga useret-->
                <div class="swiper product-slider" style=" margin:.7rem 0;">
                        <?php
                     
                        $servername = "localhost"; 
                        $username = "root"; 
                        $password = "";
                        $dbname = "products_db";  

                        
                        $conn = new mysqli($servername, $username, $password, $dbname);
                      
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        
                        $sql = "SELECT product_name, product_price, product_image FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                    
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="swiper-slide box" style=" margin:1rem 0;">';
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["product_image"]) . '" alt="' . $row["product_name"] . '" width="500px" height="400px">';
                                echo '<h3>' . $row["product_name"] . '</h3>';
                                echo '<div class="price">' . $row["product_price"] . '</div>';
                                echo '<a href="#" class="btn">add to cart</a>';
                                echo '</div>';
                            }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                </div>
        <!--produketet e insertuara nga useret-->

       
        <div class="swiper product-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide box" >
                    <img name="slide" width="500px" height="100px" >
                    <div class="next-button" onclick="nextImg()"></div>
                    <div class="prev-button" onclick="prevImg()"></div>
                    <h3>Solar Panels</h3>
                    <div class="price"> $14449.99/- - 419.99/- </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>
        </div>

        <script>
            var i = 0;
            var images = [
                'solar-panels-roof-solar-cell-.jpg',
                'photovoltaic-energy-current-solar-energy.jpg',
                '360_F_212780575_jCx2m2E7XMr1xUmaMMnb3hbVMqApo2PO.jpg'
            ];
                var time = 3000;

            function changeImg() {
            document.getElementsByName("slide")[0].src = images[i];

                if (i < images.length - 1) {
                     i++;
                } else {
                     i = 0;
                }

                setTimeout(changeImg, time);
            }
            
                changeImg();
            </script>
    
        <div class="swiper product-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide box">
                    <img name="slideri2">
                    <h3>Tesla Powerwall</h3>
                    <div class="price"> $11999.99/- - 319.99/- </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>
        </div>

        <Script>
            var k = 0 ;
            var pics = [
                'D_PW_Hero_2880x1800.jpg',
                'tesla-powerwall-home-energy-storage-system.webp',
                'tesla-powerwall-2023-header-met-bart.webp'
            ];

            var koha = 3000;
            function changePics (){
                document.getElementsByName("slideri2")[0].src = pics[k];

                if(k < pics.length - 1){
                    k++;
                }else{
                    k=0;
                }

                setTimeout(changePics,koha);
            }
            changePics();
        </Script>
    
        <div class="swiper product-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide box">
                    <img name="slideriii" width="500px" height="100px">
                    <h3>Graphic Cards</h3>
                    <div class="price"> $699.99/- - 59.99/- </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>
        </div>
        <Script>
            var m = 0;
            var foto = [
                'geforce-ada-4090-web-og-1200x630@2x.jpg',
                'l9XfKm8-m02WIbGFhtFryQ.c-r_800x.webp',
                'the-best-graphics-cards-for-4k-gaming-in-2024_n9qd.jpg'
            ];

            var kohaEndrrimit= 3000;
            function changeFoto(){
                document.getElementsByName("slideriii")[0].src = foto[k];

                if(m < foto.length - 1){
                    m++;
                }else{
                    m=0;
                }
                setTimeout(changeFoto,kohaEndrrimit);
            }
            changeFoto();
        </Script>
    
        <div class="swiper product-slider">
    
            <div class="swiper-wrapper">
    
                <div class="swiper-slide box">
                    <img name="slideFotot">
                    <h3>Processors</h3>
                    <div class="price"> $499.99/- - 19.99/- </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>
        </div>
    </div>

    <Script>
        var l = 0;
        var paraqit = [
            'LD0005900238_1.jpg',
            'how-to-pick-the-right-intel-cpu-for-your-pc.webp',
            'DSC09738-800x535.jpg'
        ]

        var nderrimifotos = 3000;
        function changeParaqit(){
            document.getElementsByName("slideFotot")[0].src = paraqit[l];

            if(l < paraqit.length - 1){
                l++;
            }else{
                l=0;
            }
            setTimeout(changeParaqit,nderrimifotos);
        }
        changeParaqit();
    </Script>


    
    </section>

    <!---mbaron sektori i "Products"--->

    <!---Fillon footeri--->

    <section class="footer">

        <div class="box-container">
    
            <div class="box">
                <h3> PayGearPlan <i class=""></i> </h3>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
    
            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +383-049-123-456 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +383-049-789-012 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +383-044-123-456 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +383-044-789-012 </a>
            </div>
    
            <div class="box">
                <h3>quick links</h3>
                <a href="index.html" class="links"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="index.html" class="links"> <i class="fas fa-arrow-right"></i> features </a>
                <a href="index.html" class="links"> <i class="fas fa-arrow-right"></i> categories </a>
            </div>
    
            <div class="box">
                <h3>newsletter</h3>
                <p>subscribe for latest updates</p>
                <input type="email" placeholder="your email" class="email">
                <input type="submit" value="subscribe" class="btn">
            </div>
        </div>
    </section>

    <!---Fillon footeri--->

    <script src="script.js"></script>

</body>
</html>