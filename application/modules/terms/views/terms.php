 <section class="az-tnc-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Terms & Conditions</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
            </div>
        </div>
    </section>
    <section class="az-staticpage-body">
        <div class="container">
            <?php  foreach($tnc_data as $tnc){  ?>
            <h2>
                <?php echo $tnc->heading_title;?>
            </h2>
            <p>
                <?php echo $tnc->descrip;?>
            </p>
            <h4>
                <?php echo $tnc->heading2;?>
            </h4>
            <p>
                <?php echo $tnc->descrip2;?>
            </p>
            <h4 align="left">
                <?php echo $tnc->heading3;?>
            </h4>
            <p>
                <?php echo $tnc->descrip3;?>
            </p>
             <?php  }  ?>
        </div>
    </section>