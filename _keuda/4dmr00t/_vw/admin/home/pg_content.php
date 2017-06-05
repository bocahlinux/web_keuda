        <div class="page-container page-navigation-top-fixed">
                <?php $this->load->view('pg_menu_side'); ?>
                <div class="page-content">
                    <?php $this->load->view('pg_menu_top'); ?>
                    <?php $this->load->view('pg_breadcrumb'); ?>
                    
                    <!-- isi kontent -->
                    <?php $this->load->view($content);?>
                    
                    <div class="page-content-wrap">

                    </div>
                </div>
        </div>