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
                    <h4 class="title">Product List</h4>
                    <p class="category">List Of Product for Sale</p>
                </div>

                <div class="col-md-12 text-right">
                    <?php echo anchor(site_url('product/create'), 'Create', 'class="btn btn-primary"'); ?>
                </div>
                

                <div class="content table-responsive">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Spot</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // var url = window.location.href
    // url = url.split('/')
    // url = url[0]+'//'+url[2]+'/'+url[3]+'/';

    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "product/json", "type": "POST"},
            columns: [
                {
                    "data": "id",
                    "orderable": false
                },{"data": "name"},{"data": "price"},{"data": "spotName"},
                {
                    "data" : "action",
                    "orderable": false,
                    "className" : "text-center"
                }
            ],
            order: [[0, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>