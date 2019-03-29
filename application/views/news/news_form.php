<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">News <?php echo $button ?></h4>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
            <label>Spot</label>
            <input type="text" class="form-control" name="spot_id" id="spot_id" placeholder="Id Spot" value="<?php echo $spot_id; ?>" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                </div>
            </div>
            
            <div class="col-md-4">
	            <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
            </div>
        </div>

        
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>