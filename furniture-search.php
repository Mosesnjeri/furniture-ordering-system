
    <?php include('partials-front/menu.php'); ?>

    <!-- furnature sEARCH Section Starts Here -->
    <section class="furniture-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                $search = $_POST['search'];
            
            ?>


            <h2><a href="#" class="text-white">Furniture on Your Search "<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- furniture sEARCH Section Ends Here -->



    <!-- furniture MEnu Section Starts Here -->
    <section class="furniture-menu">
        <div class="container">
            <h2 class="text-center">Furniture</h2>

            <?php 

                //SQL Query to Get furniture based on search keyword
                $sql = "SELECT * FROM tbl_furniture WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether furniture available of not
                if($count>0)
                {
                    //Furniture Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="furniture-menu-box">
                            <div class="furniture-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/furniture/<?php echo $image_name; ?>" alt="paramount furniture" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="furniture-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="furniture-price">ksh<?php echo $price; ?></p>
                                <p class="furniture-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?furniture_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    /furniture Not Available
                    echo "<div class='error'>Furniture not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- furniture Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>