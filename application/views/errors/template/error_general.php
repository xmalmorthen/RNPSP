<link rel="stylesheet" href="<?php echo base_url('assets/css/views/errorsView.css'); ?>">
<section class="body-error">
    <div class="center-error pt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-error mb-xlg">
                    <h2 class="error-code text-dark text-center text-semibold m-none">Error <i class="fa fa-exclamation-triangle"></i></h2>
                    <p class="error-explanation text-center"><?php echo $heading; ?></p>
                </div>
                <h4><?php echo $message; ?></h4>
            </div>            
        </div>
    </div>
</section>