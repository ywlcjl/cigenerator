<?php $this->load->view('backend/_header'); ?>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'maintain')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">维护</div>
            <div class="contentBlock1">
                <p><a href="<?php echo B_URL; ?>home/clearCache" target="_blank" >删除缓存</a></p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php $this->load->view('backend/_footer'); ?>