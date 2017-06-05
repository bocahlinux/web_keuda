<script type="text/javascript">
$(document).ready(function(){

    $('#main-slider').carousel({
        interval:5000,
        pause: "false"
    });
});
</script>

<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
        <?php
            $no=1;
            foreach ($get_aktif_slider as $bb):
        ?>
            <div class="item active" style="background-image: url(<?php echo base_url().'assets/file/img-slide/'.$bb->img_slide;?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="boxed animation animated-item-1"><?php echo strtoupper($bb->title_slide); ?></h2>
                                <p class="boxed animation animated-item-2"><?php echo character_limiter($bb->text_slide,100); ?></p>
                                <br>
                                <a class="boxed btn btn-md animation animated-shake" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php
            $no=1;
            foreach ($get_slider->result_array() as $cc)
            {
        ?>
            <div class="item" style="background-image: url(<?php echo base_url().'assets/file/img-slide/'.$cc['img_slide'];?>)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 class="boxed animation animated-item-1"><?php echo strtoupper($cc['title_slide']); ?></h2>
                                <p class="boxed animation animated-item-2"><?php echo character_limiter($cc['text_slide'],100); ?></p>
                                <br>
                                <a class="boxed btn btn-md animation animated-item-3" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-arrow-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" id="autoplay" name="autoplay" data-slide="next">
        <i class="fa fa-arrow-right"></i>
    </a>
</section>
