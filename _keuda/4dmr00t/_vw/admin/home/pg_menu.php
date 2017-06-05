<?php
if($class=='home'){
    $home = 'class="active"';
    $pages ='class="xn-openable"';
    $artikel ='';

}elseif($class=='artikel'){
    $home = '';
    $pages ='class="xn-openable active"';
    $artikel ='class="active"';
}else{
    $home = '';
    $pages ='';
    $artikel ='';
}
?>

    <li <?php echo $home;?> >
        <a href="<?php echo base_url().$lokasi;?>">
            <span class="fa fa-desktop"></span>
            <span class="xn-text">Dashboard</span>
        </a>
    </li>

    <li <?php echo $pages;?>>
        <a href="#">
            <span class="fa fa-files-o"></span>
            <span class="xn-text">Pages</span>
        </a>
        <ul>
            <li <?php echo $artikel;?> >
              <a href="<?php echo base_url().$lokasi;?>/artikel">
                <span class="fa fa-file-text-o"></span> Article
              </a>
            </li>
            <li>
                <a href="pages-gallery.html">
                    <span class="fa fa-image"></span> Gallery
                </a>
            </li>
            <li>
                <a href="pages-profile.html">
                    <span class="fa fa-user"></span> Profile
                </a>
            </li>
            <li>
                <a href="pages-address-book.html">
                    <span class="fa fa-users"></span> Slider
                </a>
            </li>
            <li class="xn-openable">
                <a href="#">
                    <span class="fa fa-clock-o"></span> Timeline
                </a>
                <ul>
                    <li>
                        <a href="pages-timeline.html">
                            <span class="fa fa-align-center"></span> Default
                        </a>
                    </li>
                    <li>
                        <a href="pages-timeline-simple.html">
                            <span class="fa fa-align-justify"></span> Full Width
                        </a>
                    </li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#">
                    <span class="fa fa-envelope"></span> Mailbox
                </a>
                <ul>
                    <li>
                        <a href="pages-mailbox-inbox.html">
                            <span class="fa fa-inbox"></span> Inbox
                        </a>
                    </li>
                    <li>
                        <a href="pages-mailbox-message.html">
                            <span class="fa fa-file-text"></span> Message
                        </a>
                    </li>
                    <li>
                        <a href="pages-mailbox-compose.html">
                            <span class="fa fa-pencil"></span> Compose
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
