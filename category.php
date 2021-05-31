<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    
    <?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

        

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                    List Of All Posts For
                    <small>TODO: Insert Category Here</small>
                </h1>
                
                <?php

                if(isset($_GET['cat_id'])){

                  $post_category_id = $_GET['cat_id'];

                  if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {

                    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";

                } else {

                    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id AND post_status = 'published' ";

                }
                
                $select_all_posts_query = mysqli_query($connection, $query);

                if(mysqli_num_rows($select_all_posts_query) < 1) {

                    echo "<h1 class='text-center'>No posts available</h1>";

                } else {
                
                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,100);
                        
                        ?>

                <!-- <?php

                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                // $select_all_categories_query = mysqli_query($connection, $query);

                // while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                    // $cat_title = $row['cat_title'];
                    // $cat_id = $row['cat_id'];
                

                ?> -->

                <!-- First Blog Post -->
                <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  
                    
                <?php } } } else {

                    header("Location: index.php");

                } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>
