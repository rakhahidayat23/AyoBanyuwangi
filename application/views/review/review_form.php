<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Review <?php echo $button ?></h4>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="row">

            <div class="col-md-5">
                <div class="form-group">
            <label>Spot</label>
            <input type="text" class="form-control" name="spotName" id="spotName" placeholder="Id Spot" value="<?php echo $spotName; ?>" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
            <label>Review</label>
            <input type="text" class="form-control" name="review" id="review" placeholder="Review" value="<?php echo $review; ?>" />
        </div>
        </div>

	      <div class="col-md-4">
                <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
        </div>

	    <div class="col-md-4">
                <div class="form-group">
            <label>Rating</label>
            <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating" value="<?php echo $rating; ?>" />
        </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                     <label>Spot</label>
                     <select  name="spot_id" id="spot_id" class="form-control border-input" <?php if(count($spot_data) == 0){ echo 'disabled';} ?>>
                     <?php foreach ($spot_data as $key) { ?>
                     <option value="<?= $key->id?>" <?php if($key->id == $spot_id){ echo 'selected';} ?>> <?= $key->name?></option>
                     <?php } ?>
                     </select>
                </div>
            </div>
        </div>

	    <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                     <label>User</label>
                     <select  name="user_id" id="user_id" class="form-control border-input" <?php if(count($user_data) == 0){ echo 'disabled';} ?>>
                     <?php foreach ($user_data as $key) { ?>
                     <option value="<?= $key->id?>" <?php if($key->id == $user_id){ echo 'selected';} ?>> <?= $key->name?></option>
                     <?php } ?>
                     </select>
                </div>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('review') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>