<div class="page-sidebar  ">
    <ul class="x-navigation x-navigation-custom">
        <li class="xn-logo">
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="<?php echo base_url();?>assets/file/img-avatar/avatar.png" alt="Admin"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo base_url();?>assets/file/img-avatar/avatar.png" alt="Admin"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $label;?></div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        <?php $this->load->view('pg_menu'); ?>
    </ul>
</div>

