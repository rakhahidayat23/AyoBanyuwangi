<div class="col-lg-12 col-md-12">
    <div class="card card-user">
   <br>
   <br>
   <br>
        <div class="content">
            <div class="author">
            <h2 style="margin-top:0px">Review Read</h2>
            <h4 class="Review"><?php echo $review; ?><br />
                </h4>
            </div>

        <div class="text-center">
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <h5><?php echo date('Y-m-d',strtotime($date)); ?><br /><small>Date Create</small></h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo "$rating"; ?><br /><small>Ratingl</small></h5>
                </div>
                <div class="col-md-3">
                    <h5><?php echo $spotName; ?><br /><small>Spot</small></h5>
                </div>
                <div class="col-md-3">
                    <h5><?php echo $userName; ?><br /><small>User</small></h5>
                </div>
            </div>
        </div>
    </div>