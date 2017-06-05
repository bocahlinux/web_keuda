<div class="widget tags box box-success container">
	<h3>Kategori Berita</h3>
    <ul class="tag-cloud">
        <?php foreach ($get_kategori as $g):
            $tanggal        = $g->date;
            $namahari       = date('D',strtotime($tanggal));
            if ($namahari == "Sunday") $namahari = "Minggu";
                else if ($namahari == "Mon") $namahari = "Senin";
                else if ($namahari == "Tue") $namahari = "Selasa";
                else if ($namahari == "Wed") $namahari = "Rabu";
                else if ($namahari == "Thu") $namahari = "Kamis";
                else if ($namahari == "Fri") $namahari = "Jumat";
                else if ($namahari == "Sat") $namahari = "Sabtu";
        ?>
            <li>
            	<a class="btn btn-xs btn-primary" href="<?=base_url(); ?>page/kategori/<?=$g->kategori ?>"><?php echo strtoupper($g->kategori); ?></a>
            </li>
        	<?php endforeach ?>
    </ul>
    <br>
</div>

<div class="widget tags box box-info container">
    <h3 style="margin-top: 10px;margin-bottom: 20px">Berita Populer</h3>
    <section id="faqs" class="container">
        <ul class="bpop unstyled">
            <?php 
                $no=1;
            foreach ($berita_baru as $bb):
                
                $tanggal        = $bb->date;
                $namahari       = date('D',strtotime($tanggal));
                if ($namahari == "Sunday") $namahari = "Minggu";
                    else if ($namahari == "Mon") $namahari = "Senin";
                    else if ($namahari == "Tue") $namahari = "Selasa";
                    else if ($namahari == "Wed") $namahari = "Rabu";
                    else if ($namahari == "Thu") $namahari = "Kamis";
                    else if ($namahari == "Fri") $namahari = "Jumat";
                    else if ($namahari == "Sat") $namahari = "Sabtu";
            ?>
                <li>
                    <span class="number"><?=$no++;?></span>
                    <div>
                        <h3 style="font-size: 14px">
                            <a href="<?=base_url(); ?>page/detail/<?php echo $bb->kategori.'/'.$bb->slug; ?>">
                                <?php echo strtoupper($bb->title); ?>
                            </a>
                        </h3>
                        <p style="margin-top:-10px;font-size: 12px">
                            <i class="fa fa-eye"></i> <?php echo strtoupper($bb->counter); ?>x
                        </p>
                    </div>
                </li>
                <?php endforeach ?>
        </ul>
    </section>
    <br>
</div>