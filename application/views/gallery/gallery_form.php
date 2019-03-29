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
        <h2 style="margin-top:0px">Gallery <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Image <?php echo form_error('image') ?></label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Spot Id <?php echo form_error('spot_id') ?></label>
            <input type="text" class="form-control" name="spot_id" id="spot_id" placeholder="Spot Id" value="<?php echo $spot_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gallery') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>