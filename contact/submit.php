<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Jem Gallego - Contact</title>

        <link href="/style.css" rel="stylesheet" type="text/css" />

        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
<body>

<div id="container">
        <!--BEGIN HEADER-->
        <header>
            <a href="/"><span id="site-title">Jem Gallego</span></a>
            
            <nav>
                <li><a href="/">work</a></li>
                <li><a href="/about/">about</a></li>
                <li><a href="/contact/">contact</a></li>
            </nav>
        </header>

        <div id="content">
            <?php
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $from = 'From: jemgallego'; 
                $to = 'hello@jemgallego.com'; 
                $subject = 'Email Inquiry';

                $body = "From: $name \nE-Mail: $email \n\nMessage: \n$message";
            ?>

            <div id="submit-form">
                <?php
                if ($_POST['submit']) {
                    do {

                        /* Validate Name */
                        if(strlen($name) < 2 || strlen($name) > 30) {
                            echo '<h1>Oops!</h1> 
                                Name must be between 2-20 characters';
                            break;
                        }

                        if (!(preg_match("/^[\w\-\s\']+$/", $name))) {
                            echo '<h1>Oops!</h1> 
                                Your name is invalid. <br/>
                                Name must consist of either letters [a-z], <br/> 
                                numbers [0-9], space, hyphen, or apostrophe.';
                            break;
                        }

                        /* Validate Email */
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                            echo '<h1>Oops!</h1> 
                                Your email is invalid. <br/>
                                Email must follow this format: myemail@example.com';
                            break;
                        }
                        
                        /* Validate Message */
                        if(strlen($message) < 5) {
                            echo '<h1>Oops!</h1> 
                                Your message must have more than 5 characters.';
                            break;
                        }

                        if (mail ($to, $subject, $body, $from)) { 
                            echo '<div id="form-valid"> Your message has been sent. </div>';
                            echo 'Before you leave, take a moment to 
                                make sure you sent the right information. <br/><br/>
                                <div id="form-review"><span>Name:</span> '.$name.'<br/><span>Email:</span> '.$email.'<br/>
                                <br/><span>Message:</span> <br/>'.$message.'</div>';
                            echo '<br/><br/>Made a mistake? Fill out the <a href="/contact/">form</a> again or &#8595';
                        } else { 
                            echo '<div id="form-error">
                                <h1>Oops!</h1> 
                                An error occurred. Try sending your message again.</div>'; 
                        }
                    } while (false);
                }
                ?>
            </div>
        </div>

        <footer>
            say hello at <a href="mailto:hello@jemgallego.com">hello@jemgallego.com</a>

            <ul class="socialicons">    
                <li><a href="http://www.linkedin.com/pub/john-gallego/67/319/183/"><img src="/images/icons/linkedin.png" alt="linkedin" width="36"></a></li>
                <li><a href="http://instagram.com/jemsomniac"><img src="/images/icons/instagram.png" alt="instagram" width="36"></a></li>
                <li><a href="http://www.github.com/jemsomniac"><img src="/images/icons/github.png" alt="github" width="36"></a></li>
                <li><a href="http://www.twitter.com/jemsomniac"><img src="/images/icons/twitter.png" alt="twitter" width="36"></a></li>
            </ul>   
        </footer>
    </div>
</body>
</html>