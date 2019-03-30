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

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Type Spot</label>
                    <select  name="type_spot_id" id="type_spot_id" class="form-control border-input" <?php if(count($type_spot_data) == 0){ echo 'disabled';} ?>>
                        <?php foreach ($spot as $key) { ?>
                            <option value="<?= $key->id?>" <?php if($key->id == $type_spot_id){ echo 'selected';} ?>> <?= $key->name?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="varchar">Start <?php echo form_error('start') ?></label>
            <input type="text" class="form-control" name="start" id="start" placeholder="Start" value="<?php echo $start; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">End <?php echo form_error('end') ?></label>
            <input type="text" class="form-control" name="end" id="end" placeholder="End" value="<?php echo $end; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $latitude; ?>" />
        </div>
	    
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('spot') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>