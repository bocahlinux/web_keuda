<section id="recent-works" style="margin-top: -80px;margin-bottom: -100px">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3><b style="color:aqua">BERITA</b> TERBARU</h3>
                <p>Informasi berita, artikel di Dinas Pendapatan Daerah Provinsi Kalimantan Tengah</p>
                <div class="btn-group">
                    <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
                    <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="fa fa-arrow-right"></i></a>
                </div>
                <p class="gap"></p>
            </div>
            <div class="col-md-9">
                <div id="scroller" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <?php foreach ($kueri1 as $g):?>
                                <div class="col-xs-4">
                                    <div class="portfolio-item">
                                        <div class="item-inner">
                                            <img class="img-responsive img-blog" title="<?=$g->title?>" src="<?php echo base_url();?>file/blog/<?=$g->img_header ?>" alt="<?=character_limiter($g->title,30) ?>" />
                                            <h5>
                                                <?=character_limiter($g->title,30) ?>
                                            </h5>
                                            <div class="overlay">
                                                <a class="preview btn btn-danger" title="<?=$g->title ?>" href="<?php echo base_url();?>file/blog/<?=$g->img_header ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                                    
                        <div class="item">
                            <div class="row">
                                <?php foreach ($kueri2 as $g):?>
                                <div class="col-xs-4">
                                    <div class="portfolio-item">
                                        <div class="item-inner">
                                            <img class="img-responsive img-blog" title="<?=$g->title?>" src="<?php echo base_url();?>file/blog/<?=$g->img_header ?>" alt="<?=character_limiter($g->title,30) ?>" />
                                            <h5>
                                                <?=character_limiter($g->title,30) ?>
                                            </h5>
                                            <div class="overlay">
                                                <a class="preview btn btn-danger" title="<?=$g->title ?>" href="<?php echo base_url();?>file/blog/<?=$g->img_header ?>" rel="prettyPhoto">
                                                    <i class="icon-eye-open"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
