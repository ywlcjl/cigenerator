<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'articleCategory')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">
                内容分类<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>/article_category/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if ($message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo B_URL; ?>/article_category/save" method="post">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>分类名称:</th>
                            <td>
                                <input name="name" type="text" value="<?php echo $this->backend_lib->getValue(set_value('name'), $row['name']); ?>" />
                                <?php echo form_error('name'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>父ID:</th>
                            <td>
                                <select name="parent_id">
                                    <option value="0">未分类</option>
                                    <?php if ($categorys != null) : ?>
                                        <?php foreach ($categorys as $category) : ?>
                                            <option value="<?php echo $category['id']; ?>" <?php if ($row['parent_id'] == $category['id'] || set_value('parent_id') == $category['id']) : ?>selected="selected"<?php endif; ?>><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <?php echo form_error('parent_id'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>跳转链接:</th>
                            <td>
                                <input name="hop_link" type="text" value="<?php echo $this->backend_lib->getValue(set_value('hop_link'), $row['hop_link']); ?>" />
                                <?php echo form_error('hop_link'); ?>
                            </td>
                            <td>将分类作为一个链接</td>
                        </tr>
                        <tr>
                            <th>排序:</th>
                            <td>
                                <input name="sort" type="text" value="<?php echo $this->backend_lib->getValue(set_value('sort'), $row['sort'], 0); ?>" />
                                <?php echo form_error('sort'); ?>
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