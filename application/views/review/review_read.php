<div class="col-lg-12 col-md-12">
    <div class="card card-user">
   <br>
   <br>
   <br>
        <div class="content">
            <div class="author">    
            <h4 class="title"><?php echo $id_spot; ?><br />
                    <small>Spot</small>
                </h4>
            </div>

            <p class="spot text-center">
                <?php echo $id_spot; ?>
            </p>

    
        <h2 style="margin-top:0px">Review Read</h2>
        <table class="table">
	    <tr><td>Review</td><td><?php echo $review; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Rating</td><td><?php echo $rating; ?></td></tr>
	    <tr><td>Spot Id</td><td><?php echo $id_spot; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('review') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>