<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Review Read</h2>
        <table class="table">
	    <tr><td>Review</td><td><?php echo $review; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Rating</td><td><?php echo $rating; ?></td></tr>
	    <tr><td>Spot Id</td><td><?php echo $spot_id; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('review') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>