<div class="col-lg-12 col-md-12">
    <div class="card card-user">
   <br>
   <br>
   <br>
        <div class="content">
            <div class="author">
                
                <img src="<?php echo base_url().$image; ?>" class="img-responsive" alt="Image" style="height: auto;width: 50%;margin-left: 25%;">
                
                <h4 class="title"><?php echo $name; ?><br />
                    <small>Deskripsion</small>
                </h4>
            </div>
            <p class="description text-center">
                <?php echo $description; ?>
            </p>
        </div>
        <hr>
        <div class="text-center">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <h5><?php echo date('Y-m-d',strtotime($date)); ?><br /><small>Date Create</small></h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo "Rp ".$price." ,00"; ?><br /><small>Price Sell</small></h5>
                </div>
                <div class="col-md-3">
                    <h5><?php echo $spotName; ?><br /><small>Store</small></h5>
                </div>
            </div>
        </div>
    </div>
</div>