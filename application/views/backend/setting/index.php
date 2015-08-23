<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        //表单全选
        checkAll();
        
        //表格行效果
        trView();
    });
</script>

<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'setting')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">列表<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>setting/save" class="white">添加设置</a></span></div>
            <div class="contentBlock1">
                <form name="form1" id="form1" method="post" action="<?php echo B_URL; ?>setting/manage">
                    <table class="listForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0" >
                        <tr class="listFormHeader">
                            <th><b>ID</b></th>
                            <td>键</td>
                            <td>值</td>
                            <td>描述</td>
                            <td>状态</td>
                            <td>更新</td>
                            <td>操作</td>
                        </tr>
                        <?php if ($result != null) : ?>
                            <?php foreach ($result as $value) : ?>
                                <tr class="listFormContent">
                                    <th><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['id']; ?>" /> <?php echo $value['id']; ?></th>
                                    <td><?php echo $value['key']; ?></td>
                                    <td><?php echo $value['value']; ?></td>
                                    <td><?php echo $value['txt']; ?></td>
                                    <td><?php echo $statuss[$value['status']]; ?></td>
                                    <td><?php echo $value['update_time']; ?></td>
                                    <td><a href="<?php echo B_URL; ?>setting/save/?id=<?php echo $value['id']; ?>">编辑</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>

                </form>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>