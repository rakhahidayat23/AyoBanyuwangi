<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Product <?php echo $button ?></h4>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control border-input" accept="image/*" name="image" id="image">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control border-input" name="rupiah" id="rupiah" placeholder="1.000.000" value="<?php echo $price; ?>" > 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="5" class="form-control border-input" name="description" id="description" placeholder="Description"><?php if(!empty($description)){ echo $description;} ?></textarea>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Store</label>
                            <select  name="spot_id" id="spot_id" class="form-control border-input" <?php if(count($spot_data) == 0){ echo 'disabled';} ?>>
                                <?php foreach ($spot_data as $key) { ?>
                                    <option value="<?= $key->id?>" <?php if($key->id == $spot_id){ echo 'selected';} ?>> <?= $key->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="foto_lama" value="<?php echo $image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <input type="hidden" name="price" id="price" value="<?php echo $price; ?>" /> 
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd"><?php echo $button ?></button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
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