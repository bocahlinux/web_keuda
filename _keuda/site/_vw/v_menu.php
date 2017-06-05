<?php
if($class=='home'){
    $home = 'class="active"';
    $berita ='';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='berita'){
    $home = '';
    $berita ='class="active"';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='organisasi'){
    $home = '';
    $berita ='';
    $profil ='class="dropdown active"';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='class="active"';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='visi'){
    $home = '';
    $berita ='';
    $profil ='class="dropdown active"';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='class="active"';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='info_pajak'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='class="dropdown active"';
    $info_pjk ='class="active"';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='info_pad'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='class="dropdown active"';
    $info_pjk ='';
    $info_pad ='class="active"';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='info_njkb'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='class="dropdown active"';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='class="active"';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='galeri'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = 'class="active"';
    $daftar_upt = '';
    $saran = '';
}elseif($class=='daftar_upt'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = 'class="active"';
    $saran = '';
}elseif($class=='kotak_saran'){
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = 'class="active"';
}else{
    $home = '';
    $berita ='';
    $profil ='';
    $info_cepat ='';
    $info_pjk ='';
    $info_pad ='';
    $info_njkb ='';
    $org ='';
    $visi ='';
    $galeri = '';
    $daftar_upt = '';
    $saran = '';
}
?>

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li <?php echo $home;?> >
                <a href="<?php echo base_url();?>">Beranda</a>
            </li>
            <li <?php echo $berita;?> >
                <a href="<?php echo base_url();?>page/berita">Berita</a>
            </li>
            <li <?php echo $profil;?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li <?php echo $org;?> >
                            <a href="#">Organisasi</a>
                        </li>
                        <li <?php echo $visi;?> >
                            <a href="#">Visi & Misi</a>
                        </li>
                    </ul>
            </li>

            <li <?php echo $info_cepat;?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info Cepat <i class="icon-angle-down"></i></a>
                <ul class="dropdown-menu">
                        <!--
                        <li <?php echo $info_pjk;?> >
                            <a href="<?php echo base_url();?>site/pg_info_cpt/pkb">Info Pajak Kendaraan</a>
                        </li>
                        <li <?php echo $info_njkb;?> >
                            <a href="<?php echo base_url();?>site/pg_info_cpt/njkb"">Info Nilai Jual Kendaraan</a>
                        </li>
                        -->
                        <li <?php echo $info_pad;?> >
                            <a href="#">Info PAD</a>
                        </li>
                    </ul>
            </li>
            <li <?php echo $galeri;?> >
                <a href="#">Galeri</a>
            </li>
            <li <?php echo $daftar_upt;?> >
                <a href="#">Daftar UPTD</a>
            </li>
            <li <?php echo $saran;?> >
                <a href="#">Kotak Saran</a>
            </li>
        </ul>
    </div>