<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        toMessage();
    });
</script>
<div class="mainCenter">
    <div class="block1" style="width: 35%; margin: 60px auto;">
        <div class="titleStyle1">信息提示</div>
        <div class="contentBlock1" style="text-align: center;">
            <h4><?php echo $message; ?></h4>
            <div class="line"></div>
            <div style="margin-bottom: 10px;"><a href="<?php echo $url; ?>" id="toUrl">马上跳转...</a> 剩余 <span id="second"><?php echo $second; ?></span> 秒</div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>