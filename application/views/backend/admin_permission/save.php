<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'adminPermission')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">
                系统后台管理员权限<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>admin_permission/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if ($message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo B_URL; ?>admin_permission/save" method="post">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>权限名称:</th>
                            <td>
                                <input name="name" type="text" value="<?php echo $this->backend_lib->getValue(set_value('name'), $row['name']); ?>" />
                                <?php echo form_error('name'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>描述:</th>
                            <td>
                                <input name="desc_txt" type="text" value="<?php echo $this->backend_lib->getValue(set_value('desc_txt'), $row['desc_txt']); ?>" />
                                <?php echo form_error('desc_txt'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>状态:</th>
                            <td>
                                <select name="status">
                                    <?php if ($statuss) : ?>
                                        <?php foreach ($statuss as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($row['status'] === (string)$key || set_value('status') === (string)$key) : ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <input name="save" type="hidden" value="1" />
                    <input name="id" type="hidden" value="<?php echo $this->backend_lib->getValue(set_value('id'), $row['id']); ?>" />
                    <div class="inputFormSubmit">
                        <input type="submit" name="button"  value="保存" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>