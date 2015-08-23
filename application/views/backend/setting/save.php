<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'setting')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">
                <span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>setting/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if ($message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo B_URL; ?>setting/save" method="post">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>键:</th>
                            <td>
                                <input name="key" type="text" value="<?php echo $this->backend_lib->getValue(set_value('key'), $row['key']); ?>" />
                                <?php echo form_error('key'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>值:</th>
                            <td>
                                <input name="value" type="text" value="<?php echo $this->backend_lib->getValue(set_value('value'), $row['value']); ?>" />
                                <?php echo form_error('value'); ?>
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
                        <tr>
                            <th>描述:</th>
                            <td>
                                <input name="txt" type="text" value="<?php echo $this->backend_lib->getValue(set_value('txt'), $row['txt']); ?>" />
                                <?php echo form_error('txt'); ?>
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