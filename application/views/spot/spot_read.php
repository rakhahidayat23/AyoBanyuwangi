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
        <h2 style="margin-top:0px">Spot Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Latitude</td><td><?php echo $latitude; ?></td></tr>
	    <tr><td>Longitude</td><td><?php echo $longitude; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Type Spot Id</td><td><?php echo $type_spot_id; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('spot') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>