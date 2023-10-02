<!-- database connection here   -->
<?php


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio_php";
 
    $con = mysqli_connect($host,$username,$password,$database);
 
    if(!$con){
       echo "Database connection failed.";
    }
 
?>



<?php

    if (!empty($_POST)) {


        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    
        $inser_query = "INSERT INTO `messages`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
   
        if (!empty($name)) {
            if (!empty($email)) {
                if (!empty($message)) {
                    

                    if (mysqli_query($con, $inser_query)) {
                    
                        echo "Message Send successful.";
                    } else {
                        echo "Opps! Something Is Worng.";
                    }
                        
                } else {
                    echo "please enter your Messages.";
                }
            } else {
                echo "please enter your email address.";
            }
        } else {
            echo "please enter your name.";
        }
    }

?>


<section class="section" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <!-- contact form -->
            <form action="" method="POST" class="contact-form col-md-10 col-lg-8 m-auto">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input name="name" type="text" size="50" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" requried>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="message" id="comment" rows="6" class="form-control"
                            placeholder="Write Something"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                        <button type="submit" class="btn btn-outline-primary rounded">Send Message</button>
                        
                    </div>
                </div>
            </form><!-- end of contact form -->
        </div><!-- end of container -->
    </section>