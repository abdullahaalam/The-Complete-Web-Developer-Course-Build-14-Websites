<?php
    if($_POST["submit"]) {
        if(!$_POST['name']) {
            $error = "<br />Please enter your name";
        }
        if(!$_POST['email']) {
            $error .= "<br />Please enter your email address";
        }
        if(!$_POST['comment']) {
            $error .= "<br />Please enter a comment";
        }
        if($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error .= "<br />Please enter a valid email address";
        }
        if($error) {
            $result = '<div class="alert alert-danger"><strong>There were error(s) in your form:</strong>'.$error.'</div>';
        } else {
            if(mail("test@greenhost.org.uk", "Comment from website!", "Name: ".$_POST['name']." Email: ".$_POST['comment'])) {
                $result = '<div class="alert alert-success"><strong>Thank you!</strong>I\'ll in touch.</div>';
            } else {
                 $result = '<div class="alert alert-danger">Sorry, there was error in your message. Please try again later.</div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>My First Webpage</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
        .emailForm {
            border: 1px solid grey;
            border-radius: 10px;
            margin-top: 20px;
        }
        form {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 emailForm">
                <h1>My email form</h1>
                <?php echo $result; ?>
                <p class="lead">Please get in touch - I'll get back to you as soon as I can.</p>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="comment">Your Comment:</label>
                        <textarea class="form-control" name="comment"><?php echo $_POST['name']; ?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />
                </form>
            </div>
        </div>
    </div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>