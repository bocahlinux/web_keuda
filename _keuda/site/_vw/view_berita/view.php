<section id="services">
    <div class="container">
        <div class="row" >
            <div class="col-sm-12">
				<h3 style="margin-top:-20px;margin-bottom:-10px">
	            	<b style="color: #cd5200;margin-left:20px">
	            		BERITA
	            	</b>
				</h3> 
				<hr>
            </div>
        </div>

		<section id="blog" class="container">
	        <div class="row">
	        	<aside class="col-sm-4 col-sm-push-8">
					<?php $this->view('view_berita/v_kat');?>
					<?php $this->view('view_berita/q_info');?>
	            </aside>
	            <div class="col-sm-8 col-sm-pull-4">
					<?php $this->view('view_berita/v_isi_berita');?>
				</div>
			</div>
		</section>
	</div>
</section>