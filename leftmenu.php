<!-- start leftcol -->
<?php 
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
?>
<div class="leftcol">
    <ul class="tabs-nav two-items">
        <li class="active"><a href="#general" role="tab" data-toggle="tab"><i class="fa fa-reorder" aria-hidden="true"></i></a></li>
        <li><a href="#stuff" role="tab" data-toggle="tab"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
    </ul>
    <div class="tab-content">
        <div id="general" class="tab-pane active">
            <div class="leftcol-content">               
                <!-- start navigation -->
                <div class="navigation">
                    <ul>
                        <li><a href="<?php echo base_url().'Admin'; ?>" title="Dashboard" <?php if($this->uri->segment(1) == "Admin") { echo "class='active'"; } ?>><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
                        <li class="<?php if($uri2 == 'createmenumaster' || $uri2 == 'viewmenumaster' || $uri2 == 'editmenumaster' || $uri2 == 'trashmenumaster') { echo 'open'; } ?>">
                            <a href="#" title="Menumaster" class="dd"><i class="fa fa-bars" aria-hidden="true"></i> Menu Master<i class="fa fa-angle-down dd-icon" aria-hidden="true"></i></a>
                            <ul>
                                <li><a href="<?php echo base_url('Menumaster/createmenumaster'); ?>" title="Create Menu">Create</a>                 
                                </li>
                                <li><a href="<?php echo base_url('Menumaster/viewmenumaster'); ?>" title="View menu">View / Edit</a></li>
                                 <li><a href="<?php echo base_url('Menumaster/trashmenumaster'); ?>" title="Trash menu">Trash</a></li>
                            </ul>
                        </li>
                        <!--permission menu start-->
                        <?php foreach($leftmenu as $lm) { $i=0; $haschild = haschildleft($lm['menumaster_id']); ?>
                        <li class="<?php if($uri1 == $lm['modulename']) { echo 'open active'; } ?>">
                        <?php
                            if(count($haschild) > 0) {
                            ?>
                            <a href="<?php echo base_url().$lm['modulename']; ?>" title="<?php echo $lm['modulename']; ?>" <?php foreach($haschild as $hcc) { static $l=0; ?> class="dd <?php if($uri1 == $lm['modulename']) { echo 'active'; } ?>"<?php $l++; } ?>><i class="<?php echo $lm['icon']; ?>" aria-hidden="true"></i> <?php echo $lm['title']; ?><i class="fa fa-angle-down dd-icon" aria-hidden="true"></i></a>
                           <?php
                            }else {
                        ?><a href="<?php echo base_url().$lm['modulename']; ?>" title="<?php echo $lm['modulename']; ?>" class="<?php if($uri1 == $lm['modulename']) { echo 'active'; } ?>"><i class="<?php echo $lm['icon']; ?>" aria-hidden="true"></i> <?php echo $lm['title']; ?></a> 
                            <?php
                            }
                            if(count($haschild) > 0) {
                            ?>
                            <ul>
                                <?php 
                                 foreach($haschild as $cmm) { $j=0; $haschild = haschildleft($cmm['menumaster_id']); ?>
                                 <?php if(count($haschild) > 0) { ?>
                                <li><a href="<?php echo base_url().$lm['modulename'].'/'.$cmm['modulename']; ?>" title="<?php echo $cmm['title']; ?>" class="dd2"><?php echo $cmm['title']; ?><i class="fa fa-angle-down dd-icon" aria-hidden="true"></i></a>
                                <?php 
                                        if(count($haschild) > 0) {
                                ?>
                                <ul>
                                <?php 
                                 foreach($haschild as $cmm2) { $k=0; ?>
                                <li><a href="<?php echo base_url().$lm['modulename'].'/'.$cmm2['modulename']; ?>" title="<?php echo $cmm2['title']; ?>"><?php echo $cmm2['title']; ?></a></li>
                                 <?php $k++; } ?>
                                </ul>
                                <?php } ?>
                                </li>
                                 <?php } else { ?>
                                 <li><a href="<?php echo base_url().$lm['modulename'].'/'.$cmm['modulename']; ?>" class="<?php if($uri2 == $cmm['modulename']) { echo 'active'; } ?>" title="<?php echo $cmm['title']; ?>"><?php echo $cmm['title']; ?></a></li>
                                 <?php } ?>
                                 <?php $j++; } ?>
                            </ul>
                            <?php } ?>
                        </li> 
                        <?php $i++; } ?>
                        <!--permission menu end-->  

                    </ul>
                </div>
                <!-- end navigation -->
            </div>
        </div>
        <div id="stuff" class="tab-pane">
            <div class="leftcol-content">
                <div class="heading1">
                    <h4><i class="fa fa-twitter" aria-hidden="true"></i> Social</h4>
                </div>
                <ul class="social-stats">
                    <li>
                        <a href="#" title="" class="orange-square"><i class="fa fa-rss" aria-hidden="true"></i></a>
                        <div>
                            <h4>1,286</h4>
                            <span>total feed subscribers</span>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="" class="blue-square"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <div>
                            <h4>12,683</h4>
                            <span>total twitter followers</span>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="" class="dark-blue-square"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <div>
                            <h4>530,893</h4>
                            <span>total facebook likes</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end leftcol -->