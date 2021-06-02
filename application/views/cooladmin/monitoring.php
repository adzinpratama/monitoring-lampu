<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* z-index: 9999; */
        /* background-color: #fff; */
    }

    .preloader .loading {
        position: absolute;
        left: 65%;
        top: 55%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row" id="load-lampu">
                <div class="preloader">
                    <div class="loading">
                        <img src="<?= base_url('assets/img/spinner.gif'); ?>" width="80">
                        <p>Harap Tunggu..</p>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>
<script>    
    $(document).ready(function() {
        selesai();        
    })
    function update() {
        $.ajax({
            url: '<?= base_url('monitoring/load'); ?>',
            dataType: 'html',
            type: 'GET',
            success: function(data) {
                $('#load-lampu').html(data);
            }
        })
    }
    function selesai() {
        setTimeout(function() {
            update();
            selesai();
        }, 100);
    }
    
</script>