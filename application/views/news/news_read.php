<div class="col-lg-12 col-md-12">
    <div class="card card-user">
   <br>
   <br>
   <br>
        <div class="content">
            <div class="author">

        <h4 class="title"><?php echo $spot_id; ?><br />
                    <small>Spot</small>
                </h4>
            </div>
            <p class="spot text-center">
                <?php echo $spot_id; ?>
            </p>

            <hr>
        <div class="text-center">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <h5><?php echo date('Y-m-d',strtotime($tanggal)); ?><br /><small>Date Create</small></h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $judul; ?><br /><small>Judul</small></h5>
                </div>
                <div class="col-md-3">
                    <h5><?php echo $keterangan; ?><br /><small>Keterangan</small></h5>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- <body>
        <h2 style="margin-top:0px">News Read</h2>
        <table class="table">
	    <tr><td>Id Spot</td><td><?php echo $spot_id; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html> -->