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
        <h2 style="margin-top:0px">Spot <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Latitude <?php echo form_error('latitude') ?></label>
            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Type Spot Id <?php echo form_error('type_spot_id') ?></label>
            <input type="text" class="form-control" name="type_spot_id" id="type_spot_id" placeholder="Type Spot Id" value="<?php echo $type_spot_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('spot') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>