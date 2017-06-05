<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>
                    <b style="color: #cd5200">
                        DETAIL BERITA
                    </b>
                </h3> 
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="<?php echo base_url();?>page/berita">Berita</a></li>
                    <li><a href="<?=base_url(); ?>page/kategori/<?=$kategori ?>"><?php echo ucfirst ($kategori) ?></a></li>
                    <li><span class="page-active"><?=$judul ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="blog" class="container">
    <div class="row">
        <aside class="col-sm-4 col-sm-push-8">
            <?php $this->view('view_berita/v_kat');?>
            <?php $this->view('view_berita/q_info');?>
        </aside>
        
        <div class="col-sm-8 col-sm-pull-4">
            <div class="blog">
                <div class="blog-item box box-primary">
                    <div class="blog-content">
                        <img class="img-responsive img-blog" src="<?php echo base_url(); ?>assets/file/img-blog/<?=$images ?>" alt="" />
                            <div class="blog-post-meta">
                                <div class="entry-meta" >
                                    <span><i class="icon-user"></i> <?=$author ?></span>
                                    <span><i class="icon-folder-close"></i> <a href="<?=base_url(); ?>page/kategori/<?=$kategori ?>"><?php echo ucfirst ($kategori) ?></a></span>
                                    <span><i class="icon-calendar"></i> <?=$hari ?>, <?=$tgl_berita?> </span>
                                    <span>
                                        <i class="fa fa-eye"></i> Dilihat <?=$counter ?>x
                                    </span>
                                </div>
                            </div>
                        <h3 ><?=$judul ?></h3>
                        <hr />
                        <span style="float:right">
                            <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5359d68b414720e1"></script>
                        </span>
                        <?=$isi_berita ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>