<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Product <?php echo $button ?></h4>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="content table-responsive">    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type Gallery</label>
                                    <select  name="type_gallery" id="type_gallery" class="form-control border-input">
                                        <option value="1">Image</option>
                                        <option value="2">Vidio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control border-input" accept="image/*" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="spot_id" value="<?php echo $spot_id; ?>" /> 
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd"><?php echo $button ?></button>
                    </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
