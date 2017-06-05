                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>
                                        <div class="widget-title">
                                            Total Visitors
                                        </div>
                                        <div class="widget-subtitle">
                                            <?php echo $tgl;?>
                                        </div>
                                        <div class="widget-int">
                                            <?php echo $v_year;?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="widget-title">
                                            Returned Visitors
                                        </div>
                                        <div class="widget-subtitle">
                                             <?php echo $bln;?>
                                        </div>
                                        <div class="widget-int">
                                            <?php echo $v_mount;?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="widget-title">New</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int"><?php echo $v_day;?></div>
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="bottom" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php echo $c_user;?>
                                    </div>
                                    <div class="widget-title">
                                        New Users
                                    </div>
                                    <div class="widget-subtitle">
                                        In your website
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                            <!-- END WIDGET MESSAGES -->

                        </div>
                        <div class="col-md-3">

                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-desktop"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">
                                        <?php echo $c_article;?>
                                    </div>
                                    <div class="widget-title">
                                        Articles
                                    </div>
                                    <div class="widget-subtitle">
                                        On your website
                                    </div>
                                </div>
                                <div class="widget-controls">
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-3">
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class=" widget-c3">
                                    <center style="color:#4d00a3">
                                    <b>Selamat Datang <?php echo ucwords($nama);?></b>
                                    </center>
                                </div>
                                <div class=" widget-buttons widget-big-int plugin-clock">
                                    00:00
                                </div>
                                <div class="widget-subtitle plugin-date">
                                    Loading...
                                </div>
                            </div>
                            <!-- END WIDGET CLOCK -->

                        </div>
                    </div>
                    <!-- END WIDGETS -->

                    <div class="row">
                        <div class="col-md-4">

                            <!-- START VISITORS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Users Activity</h3>
                                        <span>Users Visitor Website</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li>
                                            <a href="#" class="panel-fullscreen" data-toggle="tooltip" data-placement="top" title="Fullscreen">
                                                <span class="fa fa-expand"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="panel-refresh" data-toggle="tooltip" data-placement="bottom" title="Refresh Data">
                                                <span class="fa fa-refresh"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="panel-collapse" data-toggle="tooltip" data-placement="top" title="Collapse Widget">
                                                <span class="fa fa-angle-down"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                                </div>
                            </div>
                            <!-- END VISITORS BLOCK -->

                        </div>

						<div class="col-md-8">

                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Order Article</h3>
                                        <span>New Article</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li>
                                            <a href="#" class="panel-fullscreen" data-toggle="tooltip" data-placement="top" title="Fullscreen">
                                                <span class="fa fa-expand"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="panel-refresh" data-toggle="tooltip" data-placement="bottom" title="Refresh Data">
                                                <span class="fa fa-refresh"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="panel-collapse" data-toggle="tooltip" data-placement="left" title="Collapse Widget">
                                                <span class="fa fa-angle-down"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="80%">Title Article</th>
                                                    <th width="20%">Hit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($post as $p){ ?>
                                            <tr>
                                                <td><strong><?php echo $p['title']; ?></strong></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active" data-toggle="tooltip" data-placement="top" title="<?php echo $p['counter'];?>x view" >
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $p['prog'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $p['prog'];?>%;">
                                                               <?php echo $p['prog'];?>
                                                            </div>
                                                        </div>
                                                    </td>


                                            </tr>
                                        <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


