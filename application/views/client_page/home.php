<!-- Let Begin -->
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">
            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Let's begin</h1>
                        <img src= "<?= base_url()?>assets/user/img/dots-3.png" alt="Dots">
                        <p class="tm-banner-subtitle">We assist you to choose the best.</p>
                        <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                    </div>    
                </div>  <!-- col-xs-12 -->                      
            </div> <!-- row -->
            <div class="row tm-banner-row" id="tm-section-search">
                <form action="<?= base_url()?>client/search" method="get" class="tm-search-form tm-section-pad-2">
                    <div class="form-row tm-search-form-row">                                
                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                            <label for="inputCity">Name Your Destination</label>
                            <input name="destination" type="text" class="form-control" id="inputCity" placeholder="Type your destination...">
                        </div>
                        <div class="form-group tm-form-group tm-form-group-1">                                    
                            <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                <label for="btnSubmit">&nbsp;</label>
                                <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">Check Destination</button>                             
                            </div>
                        </div>
                    </div> <!-- form-row -->
                    <div class="form-row tm-search-form-row">
                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                            <label for="inputCheckIn">Type Of Destination</label>
                            <select name="typeSpot" id="typeSpot" class="form-control tm-select" id="inputRoom">
                                <?php $i = 1; foreach ($type_spot as $key) { ?>
                                    <option value="<?='#'.$i.'a'?>" selected><?= $key['name']?></option>    
                                <?php $i++;} ?>
                            </select>      
                        </div>
                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                            <label for="btnSubmit">&nbsp;</label>
                            <a href="#" class="btn btn-primary tm-btn tm-btn-search text-uppercase"  id="btnSubmitType">Check Destination</a>
                        </div>
                    </div>
                    </form>                                                      
            </div> <!-- row -->
            <div class="tm-banner-overlay"></div>
        </div>  <!-- .container -->                   
    </div>     <!-- .tm-container-outer -->                 
</section>
<!-- Text Motifasi Berdestinasi -->
<section class="p-5 tm-container-outer tm-bg-gray">            
    <div class="container">
        <div class="row">
            <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                <h2 class="text-uppercase mb-4"><strong>Ayo Banyuwangi</strong> start traveling</h2>
                <p class="mb-4">Visiting Banyuwangi to enjoy nature tourism, and UMKM with the help of our application, find your favorite tourist destination !</p>
                <a href="javascript:void(0)" class="text-uppercase btn-primary tm-btn btn-continue">Continue Explore</a>                              
            </div>
        </div>
    </div>            
</section>
<!-- Tope Destination -->
<div class="tm-container-outer" id="tm-section-2">
    <?php $i = 0; foreach ($type_spot as $key) { ?>
        <section class="<?php if($i%2 == 0){ echo 'tm-slideshow-section';}else{echo 'clearfix tm-slideshow-section tm-slideshow-section-reverse';} ?>">
            <div class="<?php if($i%2 == 0){ echo 'tm-slideshow';}else{echo 'tm-right tm-slideshow tm-slideshow-highlight';} ?>">
                <?php for ($a=0; $a < 2 ; $a++) { ?>
                    <img src= "<?php if(count($key['listSpot']) > 0){echo base_url().$key['listSpot'][$a]['image'];}else{ echo base_url().'assets/user/img/tm-img-02.jpg';}?>" alt="<?php if(count($key['listSpot']) > 0){echo $key['listSpot'][$a]['name'];}else{ echo 'Default Image';}?>">
                <?php } ?>   
            </div>
            <div class="<?php if($i%2 == 0){ echo 'tm-slideshow-description tm-bg-primary';}else{echo 'tm-slideshow-description tm-slideshow-description-left tm-bg-highlight';} ?>">
                <h2 class=""><?= $key['title']?></h2>
                <p><?= $key['description'] ?></p>
                <a href="#" class="<?php if($i%2 == 0){ echo 'text-uppercase tm-btn tm-btn-white tm-btn-white-primary';}else{echo 'text-uppercase tm-btn tm-btn-white tm-btn-white-highlight';} ?>">Detail</a>
            </div>
        </section>
    <?php $i++; } ?>
</div> 
<!-- List Destination -->
<div class="tm-container-outer" id="tm-section-3">
    <ul class="nav nav-pills tm-tabs-links">
        <?php $i = 1; foreach ($type_spot as $key) { ?>
            <li class="tm-tab-link-li" id="<?= $i.'l'?>">
                <a href="<?= '#'.$i.'a'?>" data-toggle="tab" class="tm-tab-link">
                    <img src= "<?= base_url().$key['image']?>" alt="<?= $key['name']?>" class="img-fluid">
                    <?= $key['name']?>
                </a>
            </li>
        <?php $i++;} ?>
    </ul>
    <div class="tab-content clearfix">
        <!-- Tab 1 -->
        <?php $i = 1; foreach ($type_spot as $key) { ?>
            <div class="tab-pane fade <?php if($i == 4){ echo 'show active';} ?>" id="<?= $i.'a'?>">
                <div class="tm-recommended-place-wrap">
                    <?php foreach ($key['listSpot'] as $keySpot){ ?>
                        <div class="tm-recommended-place">
                            <img src= "<?= base_url().$keySpot['image']?>" alt="<?= $keySpot['name']?>" class="img-fluid tm-recommended-img" style="height: 200px;">
                            <div class="tm-recommended-description-box">
                                <h3 class="tm-recommended-title"><?= $keySpot['name']?></h3>
                                <h6 class="tm-text-gray"><?= $key['status']?></h6>   
                                <p class="tm-text-highlight"><?= $keySpot['latitude']?> , <?= $keySpot['longitude']?> </p>
                                <p class="tm-text-gray"><?= $keySpot['description']?></p>   
                            </div>
                            <a href="client/detail/<?= $keySpot['id']?>" class="tm-recommended-price-box">
                                <p class="tm-recommended-price">✩<?=$keySpot['reting']?></p>
                                <p class="tm-recommended-price-link">Go Destination</p>
                            </a>                        
                        </div>
                    <?php } ?>
                </div>                        
                <a href="<?= base_url()?>client/more/<?=$key['id']?>" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Show More Places</a>
            </div>
        <?php $i++;} ?>
        <!-- tab-pane -->
    </div>
</div>
<!-- Maps -->
<div class="tm-container-outer tm-position-relative" id="tm-section-4">
    <div id="google-map"></div>
</div> <!-- .tm-container-outer -->
<?php $tmp = $listMaps; ?>
<script>
    /* Google Maps------------------------------------------------*/
    var mapsList = JSON.parse('<?php echo $listMaps ?>');
    
    
    var map = '';
    var center;

    function initialize() {
        var marker, i

        var mapOptions = {
            zoom: 11,
            center: new google.maps.LatLng(-8.20731141166983,114.36764512289437),
            scrollwheel: false,
        };

        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
        setMarkers(map,mapsList);

        function setMarkers(map,locations){
            for (i = 0; i < locations.length; i++){  
                var type =  locations[i]['type']

                if(type == 'ATM'){
                    var location = locations[i]['lokasi']
                    var alamat = locations[i]['alamat']
                    var latitude = locations[i]['latitude']
                    var longitude =  locations[i]['longitude']
                    var name =  locations[i]['name']
                    var id =  locations[i]['id']
                }else{
                    var description = locations[i]['description']
                    var image = locations[i]['image']
                    var latitude = locations[i]['latitude']
                    var longitude =  locations[i]['longitude']
                    var name =  locations[i]['name']
                    var id =  locations[i]['id']
                }


                latlngset = new google.maps.LatLng(latitude, longitude);
                if(type == 'ATM'){
                    image = 'http://localhost/InsunBanyuwangi/assets/upload/atm.png';
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset,
                        icon : image, 
                    });

                }
                else if(type == 'Mountain'){
                    image = 'http://localhost/InsunBanyuwangi/assets/upload/mountain.png';
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset,
                        icon : image, 
                    });

                }
                else if(type == 'Beach'){
                    image = 'http://localhost/InsunBanyuwangi/assets/upload/beach.png';
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset,
                        icon : image, 
                    });

                }
                else if(type == 'Island'){
                    image = 'http://localhost/InsunBanyuwangi/assets/upload/island.png';
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset,
                        icon : image, 
                    });

                }
                else if(type == 'Forest'){
                    image = 'http://localhost/InsunBanyuwangi/assets/upload/forest.png';
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset,
                        icon : image, 
                    });

                }
                else{
                    var marker = new google.maps.Marker({  
                        map: map, 
                        title: name , 
                        position: latlngset  
                    });
                }

                map.setCenter(marker.getPosition())

                if(type == 'ATM'){
                    var content = '<div class="container-fluid">'+
                            '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<h3 class="text-center">'+name+'</h3>'+
                            '<hr>'+
                            '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<p> Location : '+location+'</p>'+
                            '<p> Alamat : '+alamat+'</p>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>';

                }else{
                    var content = '<div class="container-fluid">'+
                            '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<h3 class="text-center">'+name+'</h3>'+
                            '<hr>'+
                            '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<img src="'+image+'" class="img-fluid img-thumbnail" alt="'+name+'" style="width: 100%;height: auto;">'+
                            '</div>'+
                            '<div class="col-md-6">'+
                            '<p>'+description+'</p>'+
                            '</div>'+
                            '</div>'+
                            '<hr>'+
                            '<h6>'+
                            'Detail : <a href="client/detail/'+id+'">'+name+'</a>'+
                            '</h6>'+
                            '</div>'+
                            '</div>'+
                            '</div>';
                }

                var infowindow = new google.maps.InfoWindow()

                google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                    return function() {
                        infowindow.setContent(content);
                        infowindow.open(map,marker);
                    };
                })(marker,content,infowindow)); 
            }
        }
    }

    function calculateCenter() {
        center = map.getCenter();
    }
</script>
