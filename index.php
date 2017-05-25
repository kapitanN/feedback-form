<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/bootstrap.min.css">
    <title>Feedback</title>
</head>
<body>
<div class="row">
    <div class="col-md-6 col-sm-offset-3">
        <form action="services/all-feedbacks.php" method="post" id = "feedbacksForm">
            <button type="submit" class="btn btn-success" style="margin-top: 10px">All feedbacks</button>
        </form>
        <div class="well" style="margin-top: 5%;">
            <h3>Send your feedback</h3>
            <form action="services/add-data.php" method="post"  id="contact">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name" class="h4">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email" class="h4">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="homepage" class="h4">Homepage</label>
                    <input type="text" class="form-control" name="homepage" placeholder="Enter homepage">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="message" class="h4 ">Message</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                    <input class="input" type="text" name="captcha" required />
                    <img src="captcha/captcha.php" />
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
            </form>

        </div>
    </div>
</div>
</body>

<script  type="text/javascript" src="media/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="media/js/validator.min.js"></script>
<script type="text/javascript" src="media/js/form-scripts.js"></script>
</html>