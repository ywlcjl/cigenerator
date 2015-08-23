<?php $this->load->view('backend/_header'); ?>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'home')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">控制台</div>
            <div class="contentBlock1">
                <p>CIGenerator v1.0.1</p>
                <p>Time <?php echo date('Y-m-d H:i:s'); ?>, 时区 <?php echo  date_default_timezone_get(); ?></p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php $this->load->view('backend/_footer'); ?>