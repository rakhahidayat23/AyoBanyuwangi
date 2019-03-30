<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php if(!empty($this->session->flashdata('message') )){ ?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="position: inherit;">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('message') ?>.
                </div>
            <?php } ?>
            <div class="card">
                <div class="header">
                    <h4 class="title">List Gallery</h4>
                </div>
            
                <div class="col-md-12 text-right">
                    <?php echo anchor(site_url('gallery/create/'.$id_params), 'Create', 'class="btn btn-primary"'); ?>
                </div>

                <div class="content table-responsive">
                    <div class="row" style="padding-top: 21px;">
                        <?php foreach ($gallery as $key) { ?>
                            <div class="col-md-3">
                                <img src="<?=base_url().$key->image?>" style="width: 400px;height: auto;" class="img-responsive img-thumbnail" alt="<?=$key->image?>">
                                <a href="<?=base_url()?>gallery/delete/<?=$key->id?>/<?=$key->spot_id?>" style="margin-top: 15px;" class="btn btn-secondary btn-block" type="button">Delete</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>