<style>
	.star-group { margin:0; padding:0; }
	.star { cursor:pointer; list-style-type: none; display: inline-block; color: #F0F0F0; text-shadow: 0 0 1px #666666; font-size:20px; }
	.highlight, .selected { color:#F4B30A; }
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				<?=$spot->name?>
			</h3>
			<h6 class="text-center">
				<?=$type->title?>
			</h6>
			<div class="p-3 carousel slide" id="carousel-448636">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-448636" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-448636">
					</li>
					<li data-slide-to="2" data-target="#carousel-448636">
					</li>
				</ol>
				<div class="carousel-inner">
					<?php for ($i=0; $i < 3; $i++) { ?>
						<div class="carousel-item <?php if($i== 0){echo 'carousel-item-next carousel-item-left';}else if($i == 2){echo 'active carousel-item-left';} ?>">
							<img class="d-block w-100" style="max-height: 400px;" alt="<?php if(empty($image[$i])){echo 'Image Note Found';}else{ echo $image[$i]->id;} ?>" src="<?php if(empty($image[$i])){echo 'https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg';}else{ echo $root_url.$image[$i]->image;} ?>" />
						</div>
					<?php } ?>
				</div> <a class="carousel-control-prev" href="#carousel-448636" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-448636" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
			<div class="p-4 row">
				<div class="col-md-12">
					<h4>
						Description
					</h4>
					<p>
						<?=$spot->description?>
					</p>
					<hr>
					<h4>
						Rating
					</h4>
					<p>
						Gift the rating on this location
					</p>
					<h1><?=$rating?>★</h1>
					<form action="<?= $action?>" method="POST" role="form">
						<div id='rate-1'>
							<input type='hidden' name='rating' id='rating' value='<?=$review?>'>
							<input type='hidden' name='spot_id' id='spot_id' value='<?=$spot->id?>'>
							<ul class="star-group" onMouseOut="resetRating(<?=$spot->id?>)">
								<?php for($i=1; $i<=5; $i++) {
								if($i <= $review){ $selected = "selected"; }else{ $selected = ""; }
									echo "<li class='star $selected' onmouseover=\"highlightStar(this,$spot->id)\" onmouseout=\"removeHighlight($spot->id);\" onClick=\"addRating(this,$spot->id)\">★</li>"; 
								} ?>					
							<ul>
						</div>
						<div class="form-group">
							<textarea name="review" id="input" class="form-control" rows="3" required="required" placeholder="Review"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					
					<hr>
					<h4>
						Maps
					</h4>
					<a class="btn btn-primary" id="open_maps" target="_blank">Open Maps</a>
					
					<div class="tm-container-outer tm-position-relative pt-3" id="tm-section-4">
						<div class="row">
							<div class="col-6">
								<div id="google-map"></div>
							</div>
							<div class="col-6">
								<div id="right-panel"></div>
							</div>
						</div>
					</div> <!-- .tm-container-outer -->
					<?php if(!empty($product)){ ?>
						<hr>
						<h4>
							Product
						</h4>
						<div class="row">
							<?php for($i=0; $i < count($product) and $i < 3 ; $i++) { ?>
								<div class="col-md-4">
									<div class="card">
										<img class="card-img-top" alt=<?= $product[$i]->name?>" src="<?= $root_url.$product[$i]->image?>" />
										<div class="card-block">
											<h5 class="p-3 card-title">
												<?= $product[$i]->name?>
											</h5>
											<p class="pl-3 pr-3 card-text">
											<?=  substr($product[$i]->description,0,170);?>
											</p>
											<p class="p-3">
												<a class="btn btn-primary" href="#">Detail</a>
											</p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>

					<div class="pt-3 row">
						<div class="col-md-12">
							<a href="#" class="btn btn-primary float-right">Read More</a>
						</div>
					</div>
					<h4>
						News and Review
					</h4>
					<div class="tabbable" id="tabs-598573">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active show" href="#tab1" data-toggle="tab">News</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab2" data-toggle="tab">Review</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" style="margin: 20px;" id="tab1">
								<div class="p-2 media">
									<img class="mr-3" alt="Bootstrap Media Preview" src="https://www.layoutit.com/img/sports-q-c-64-64-8.jpg" />
									<div class="media-body">
										<h5 class="mt-0">
											Nested media heading
										</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
									</div>
								</div>
								<div class="p-2 media">
									<img class="mr-3" alt="Bootstrap Media Preview" src="https://www.layoutit.com/img/sports-q-c-64-64-8.jpg" />
									<div class="media-body">
										<h5 class="mt-0">
											Nested media heading
										</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
									</div>
								</div>
								<div class="p-2 media">
									<img class="mr-3" alt="Bootstrap Media Preview" src="https://www.layoutit.com/img/sports-q-c-64-64-8.jpg" />
									<div class="media-body">
										<h5 class="mt-0">
											Nested media heading
										</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
									</div>
								</div>
								<div class="p-2 media">
									<img class="mr-3" alt="Bootstrap Media Preview" src="https://www.layoutit.com/img/sports-q-c-64-64-8.jpg" />
									<div class="media-body">
										<h5 class="mt-0">
											Nested media heading
										</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
									</div>
								</div>
								
							</div>
							<div class="tab-pane" style="margin: 20px;" id="tab2">
								<?php if(!empty($review_all)){ ?>
									<?php foreach ($review_all as $key) { ?>
										<div class="p-2 media">
											<img class="mr-3" style="max-width: 50px;height: 50px;" alt="<?= $key->name?>" src="<?=$root_url.$key->image?>" />
											<div class="media-body">
												<a href="">
													<h5 class="mt-0">
														<?= $key->name?>
													</h5>
												</a>
												<ul class="star-group" onMouseOut="resetRating(<?=$spot->id?>)">
													<?php for($i=1; $i<=5; $i++) {
														if($i <= $key->rating){ $selected = "selected"; }else{ $selected = ""; }
														echo "<li class='star $selected' onmouseover=\"highlightStar(this,$spot->id)\" onmouseout=\"removeHighlight($spot->id);\">★</li>"; 
													} ?>					
												</ul>
												<p><?= $key->review?></p>
											</div>
										</div>
									<?php } ?>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $spotJson = json_encode($spot); ?>
<script>
	
	var mapsList = JSON.parse('<?php echo $spotJson ?>');

	var destination = mapsList.latitude+','+mapsList.longitude;
	var myPos;
	var map = '';
    var center;

	document.getElementById("open_maps").href = "https://www.google.com/maps/dir/-7.9655683,112.6619038/-7.587871,110.450197/@-7.6504576,111.0373411,9z/data=!3m1!4b1";

    function initialize() {

		var directionsDisplay = new google.maps.DirectionsRenderer;
		var directionsService = new google.maps.DirectionsService;

        var marker, i

        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(mapsList.latitude,mapsList.longitude),
            scrollwheel: false,
        };

        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);
		
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('right-panel'));

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
		
		if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
			myPos = position.coords.latitude+','+position.coords.longitude

			calculateAndDisplayRoute(directionsService,directionsDisplay)

			function calculateAndDisplayRoute(directionsService, directionsDisplay) {
				directionsService.route({
					origin: myPos,
					destination: destination,
					travelMode: 'DRIVING',
					drivingOptions: {
						departureTime: new Date(Date.now()),
						trafficModel: 'optimistic'
					},
					unitSystem: google.maps.UnitSystem.METRIC
				}, function(response, status) {
					if (status === 'OK') {
						directionsDisplay.setDirections(response);
					} else {
						window.alert('Directions request failed due to ' + status);
					}
				});
				// document.getElementById("open_maps").href = "https://www.google.com/maps/dir/"+myPos+"/"+destination+"/@"+myPos+",7.96z";
			}

          })
        }
		
		
		
		
    }

    function calculateCenter() {
        center = map.getCenter();
    }

	// saat mengarahkan kursor ke bintang maka bintang akan kuning
	function highlightStar(obj,id) {
		removeHighlight(id);		
		$('#rate-1 li').each(function(index) {
			$(this).addClass('highlight');
			if(index == $('#rate-1 li').index(obj)) {
				return false;	
			}
		});
	}

	// saat mengarahkan kursor ke bintang maka bintang akan transparant
	function removeHighlight(id) {
		$('#rate-1 li').removeClass('selected');
		$('#rate-1 li').removeClass('highlight');
	}

	// Aksi untuk proses rating ke database di saat bintang diklik
	function addRating(obj,id) {
		$('#rate-1 li').each(function(index) {
			$(this).addClass('selected');
			$('#rate-1 #rating').val((index+1));
			if(index == $('#rate-1 li').index(obj)) {
				return false;	
			}
		});
		// $.ajax({
		// 	url: "<?php echo base_url('berita/tambah_rating'); ?>",
		// 	data:'id='+id+'&rating='+$('#rate-1 #rating').val(),
		// 	type: "POST"
		// });
	}

	// Ketika Kursor meninggalkan bintang maka kembali kepada keaadan awal
	function resetRating(id) {
		if($('#rate-1 #rating').val() != 0) {
			$('#rate-1 li').each(function(index) {
				$(this).addClass('selected');
				if((index+1) == $('#rate-1 #rating').val()) {
					return false;	
				}
			});
		}
	} 
</script>