<? include('application/views/menu_script.php') ?>

<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
                <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </a>
                        
                        
                        <a class="brand" href="<?=base_url()?>"><img src="<?php echo base_url()?>assets/img/small_logo.png">&nbsp;<?=$this->config->item('site_name');?></a>
                        <div class="nav-collapse">
                            <ul class="nav nav-pills">
                            	<? if(isset($menu)){?>
                                        <? foreach ($menu as $k => $v) : ?>
                                        <? $active = ($cur1 == $k) ? 1 : 0; ?>
                                                <?php if($v['have_sub']):?>
                                                        <li class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                                <?=humanize($v['title']);?>
                                                                <b class="caret"></b>
                                                                </a>
                                                                <ul class="dropdown-menu"> 
                                                                <? foreach ($v['sub'] as $k1 => $v1) : ?>
                                                                        <? $active = ($cur1 == $k && $cur2 == $v1['item']) ? 1 : 0; ?>
                                                                        <li <?= $active ? 'class="active"' : '';?>><a href="<?=site_url()?>/<?=$k;?>/<?=$v1['item'];?>"><?=$v1['title'];?></a><li>
                                                                <? endforeach; ?>
                                                                </ul>
                                                        </li>
                                                <?php else: ?>
                                                      <li <?= ($active) ? 'class="active"' : '';?>><a href="<?=site_url()?>/<?=$k?>/<?=$v['item'];?>"><?=humanize($v['title']);?></a></li>  
                                                <?php endif;?>
                                        	
                                        <? endforeach; ?>
                                <? }?>
                            </ul>
                            <ul class="nav pull-right">
                            	<?php if($this->session->userdata('is_logged_in')) { ?>
                            		<li><a class='brand' href="<?=base_url()?>index.php/auth/logout">Log Out</a></li>
                            	<?php } ?>
                          </ul>

                            
                        </div><!--/.nav-collapse -->
                        
                </div>
        </div>
</div>