<?php

    // all function and config file load here 
    require_once('functions/function.php');
?>

<!-- navigation section start here  -->
<?php

    get_head();

?>
<!-- navigation section end here  -->
   
    <!-- header section start here  -->
    <?php

        get_header();
    ?>
    <!-- header section end here  -->


    <!-- about section start here -->
    <?php

        get_about();
    ?>
    <!-- about section end here -->

    <!-- service section start here -->
    <?php

       get_service();
    ?>
    <!-- service section end here-->

    <!-- portfolio section start here -->
    <?php

        get_portfolio();
    ?>
    <!--portfolio section end here-->

    <!-- pricing section start here -->
    <?php

        get_pricing();
    ?>
    <!-- pricing section end here -->

    <!--hire me section start here -->
    <?php

        get_hireMe();
    ?>
    <!--hire me section end here -->

    <!-- testimonial section start here -->
    <?php

        get_testimonial();
    ?>
    <!--testimonial section end here -->

    <!-- blog section start here -->
    <?php

        get_blog();
    ?>
    <!-- blog section end here-->

    <!-- contact section start here -->
    <?php

        get_contact();
    ?>
    <!-- contact section end here-->

<!-- footer section start here -->
<?php

    require_once('includes/footer.php');
?>