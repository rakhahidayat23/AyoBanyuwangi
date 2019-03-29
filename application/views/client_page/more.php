<div class="tm-container-outer" id="tm-section-3">
    <div class="tab-content clearfix">
        <div class="tab-pane fade show active">
            <div class="tm-recommended-place-wrap">
            <form action="<?= base_url()?>client/search" method="get"   class="form-inline p-5">
            <div class="input-group col-sm-10">
                <span class="input-group-addon">Find</span>
                <input id="msg" type="text" class="form-control" name="msg" placeholder="Search Item">
            </div>
            <a href="" class="btn btn-info ">Cari</a>
            </form>
            </div>  
            <div class="tm-recommended-place-wrap">
                <?php foreach ($data as $keySpot) { ?>
                    <div class="tm-recommended-place">
                        <img src= "<?= base_url().$keySpot['image']?>" alt="<?= $keySpot['name']?>" class="img-fluid tm-recommended-img" style="height: 200px;">
                        <div class="tm-recommended-description-box">
                            <h3 class="tm-recommended-title"><?= $keySpot['name']?></h3>
                            <h6 class="tm-text-gray"><?= $keySpot['status']?></h6>   
                            <p class="tm-text-highlight"><?= $keySpot['latitude']?> , <?= $keySpot['longitude']?> </p>
                            <p class="tm-text-gray"><?= $keySpot['description']?></p>   
                        </div>
                        <a href="<?=base_url()?>client/detail/<?= $keySpot['id']?>" class="tm-recommended-price-box">
                            <p class="tm-recommended-price">✩<?=$keySpot['reting']?></p>
                            <p class="tm-recommended-price-link">Go Destination</p>
                        </a>                                             
                    </div>
                <?php } ?>
            </div>                  
            <?php echo $pagination; ?>
        </div>
    </div>
</div>