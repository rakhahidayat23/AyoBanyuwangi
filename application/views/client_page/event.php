<div class="tm-container-outer" id="tm-section-3">
    <div class="tab-content clearfix">
        <div class="tab-pane fade show active pt-5">
            <div class="tm-recommended-place-wrap">
                <?php foreach ($data as $keySpot) { ?>
                    <div class="tm-recommended-place">
                        <img src= "<?= base_url().$keySpot->image?>" alt="<?= $keySpot->image?>" class="img-fluid tm-recommended-img" style="height: 200px;">
                        <div class="tm-recommended-description-box">
                            <h3 class="tm-recommended-title"><?= $keySpot->name?></h3>
                            <h6 class="tm-text-gray">Rp. <?= $keySpot->price?></h6>   
                            <p class="tm-text-highlight"><?= $keySpot->location?> </p>
                            <p class="tm-text-gray"><?= $keySpot->description?></p>   
                        </div>
                        <a href="<?=base_url()?>client/detail/<?= $keySpot->id?>" class="tm-recommended-price-box">
                            <p class="tm-recommended-price-link">Go Event</p>
                        </a>                                             
                    </div>
                <?php } ?>
            </div>                  
            <?php echo $pagination; ?>
        </div>
    </div>
</div>