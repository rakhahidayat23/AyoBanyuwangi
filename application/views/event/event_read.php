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
        <h2 style="margin-top:0px">Event Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Lokasi</td><td><?php echo $location; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Image</td><td><?php echo $image; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $userName; ?></td></tr>
	    <tr><td>Id Spot</td><td><?php echo $spotName; ?></td></tr>
        <tr><td>Price</td><td><?php echo $price; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('event') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>