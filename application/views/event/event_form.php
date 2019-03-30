<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Event <?php echo $button ?></h4>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="content table-responsive">    
                <div class="row">

	    <div class="col-md-5">
             <div class="form-group">
             <label>Name</label>
             <input type="text" class="form-control border-input" placeholder="Name" name="name" id="name" value="<?php echo $name; ?>">
             </div>
        </div>

	    <div class="col-md-4">
                <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
                </div>
        </div>

	    <div class="col-md-5">
             <div class="form-group">
             <label>Location</label>
             <input type="text" class="form-control border-input" placeholder="Location" name="location" id="location" value="<?php echo $location; ?>">
             </div>
        </div>

	    <div class="col-md-5">
             <div class="form-group">
             <label>Description</label>
             <input type="text" class="form-control border-input" placeholder="Description" name="description" id="description" value="<?php echo $description; ?>">
             </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control border-input" accept="image/*" name="image" id="image">
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

	    <div class="form-group">
            <label for="int">Price <?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('event') ?>" class="btn btn-default">Cancel</a>
	</form>
    <script>
    var rupiah = document.getElementById('rupiah');
    var price = document.getElementById('price'); 

    rupiah.value = formatRupiah(rupiah.value, 'Rp. ');
    
    rupiah.addEventListener('keyup', function(e){
        price.value = this.value.split(' ')[1]
        console.log(this.value.split(' '));
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    }); 

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }                              
</script>
    </body>
</html>