
    <?php include('partials-front/menu.php'); ?>

    <!-- furniture sEARCH Section Starts Here -->
    <section class="furniture-search2 text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>furniture-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Furniture.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- furniture sEARCH Section Ends Here -->



    <!-- furniture MEnu Section Starts Here -->
    <section class="furniture-menu">
        <div class="container">
            <h2 class="text-center">Furniture Menu</h2>

            <?php 
                //Display Furniture that are Active
                $sql = "SELECT * FROM tbl_furniture WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the furniture are availalable or not
                if($count>0)
                {
                    //Furniture Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="furniture-menu-box">
                            <div class="furniture-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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
                                <p class="furniture-price">Ksh<?php echo $price; ?></p>
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
                    //Furniture not Available
                    echo "<div class='error'>Furniture not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- furniture Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>