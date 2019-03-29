<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Type Spot <?php echo $button ?></h4>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <label>Name</label>
                            <input type="text" class="form-control border-input" placeholder="Name" name="name" id="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                        <label>Title</label>
                            <input type="text" class="form-control border-input" placeholder="Title" name="title" id="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                        <label>Description</label>
                            <input type="text" class="form-control border-input" placeholder="Description" name="description" id="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control border-input" accept="image/*" name="image" id="image">
                        </div>
                    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('type_spot') ?>" class="btn btn-default">Cancel</a>
	</form>
    <input type="hidden" name="foto_lama" value="<?php echo $image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />  
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd"><?php echo $button ?></button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>