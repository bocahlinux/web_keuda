<?php foreach ($kueri as $g):?>
	<div class="blog">
		<div class="blog-item box box-success">
			<div class="blog-content">
				<p>
					<a href="<?=base_url(); ?>page/detail/<?=$g->kategori ?>/<?=$g->slug ?>">
						<h3> <?=character_limiter($g->title,30) ?> </h3>
					</a>
					<div class="entry-meta" >
						<span>
							<i class="icon-user"></i> <?=$g->author ?>
						</span>
						<span>
							<i class="icon-folder-close"></i>
							<a href="<?=base_url(); ?>page/kategori/<?=$g->kategori ?>"><?php echo ucfirst ($g->kategori) ?></a>
						</span>
						<span>
							<i class="icon-calendar"></i> <?=$hari ?>, <?=$tgl_berita?>
						</span>
						<span>
							<i class="fa fa-eye"></i> Dilihat <?=$g->counter ?>x
						</span>
					</div>

					<p style="text-align:justify;">
						<img class="img-responsive img-blog" title="<?=$g->title?>" src="<?php echo base_url();?>assets/file/img-blog/<?=$g->img_header ?>" alt="<?=character_limiter($g->title,30) ?>" style="max-height:110px;float:left;margin:0 8px 0px 0"/>
					</p>
						<?= strip_tags(character_limiter($g->content,350)) ?>
						<a class="btn btn-success" href="<?=base_url(); ?>page/detail/<?=$g->kategori ?>/<?=$g->slug ?>">
							Read More 
							<i class="icon-angle-right"></i>
						</a>
					</p>
			</div>
		</div>
	</div>
<?php endforeach ?>
<?=$pagination ?>