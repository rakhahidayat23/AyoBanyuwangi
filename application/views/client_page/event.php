<form id="my-form" action="<?=base_url()?>client/PayAction" method="post">
<input type="text" name="test" id="test">
<input type="text" name="param2" id="param2">
<br>
<button id="save">Save</button>
</form>

<script>
$(document).ready(function(){
    var token = JSON.parse('<?php echo $token ?>');
    console.log(token);
    $("#my-form").submit(function(event){
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var date =  new Date().toISOString();

        var payload = 'path=/sandbox/v2/transfer/internal&verb=POST&token=' +token + '&timestamp=' + date + '&body=';

        // var hmacSignature = CryptoJS.enc.Base64.stringify(CryptoJS.HmacSHA256(payload, 'vNBIjyPII486adCr'));
        
        
        $.post( post_url, {
            param2 : $("#param2").val(),
            date : new Date().toISOString(),
            
        }, function(response) {
            console.log(response);
            
        });
    });
});
</script>