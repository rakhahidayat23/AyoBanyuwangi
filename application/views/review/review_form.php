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
        <h2 style="margin-top:0px">Review <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Review <?php echo form_error('review') ?></label>
            <input type="text" class="form-control" name="review" id="review" placeholder="Review" value="<?php echo $review; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Rating <?php echo form_error('rating') ?></label>
            <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating" value="<?php echo $rating; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Spot Id <?php echo form_error('spot_id') ?></label>
            <input type="text" class="form-control" name="spot_id" id="spot_id" placeholder="Spot Id" value="<?php echo $spot_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('review') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>