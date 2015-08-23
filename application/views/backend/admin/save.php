<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'admin')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">
                后台管理员<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>admin/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if (isset($message) && $message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo B_URL; ?>admin/save" method="post">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>用户名:</th>
                            <td>
                                <input name="username" type="text" value="<?php echo $this->backend_lib->getValue(set_value('username'), $row['username']); ?>" />
                                <?php echo form_error('username'); ?>
                            </td>
                            <td>大于3个字符少于18个字符</td>
                        </tr>
                        <tr>
                            <th>密码:</th>
                            <td>
                                <input name="password" type="password" value="" />
                                <?php echo form_error('password'); ?>
                            </td>
                            <td>密码少于18位</td>
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