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
                管理员权限分配<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>admin/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if ($message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo B_URL; ?>admin/addPermission" method="post">
                    <h3>管理员: <?php echo $admin['username']; ?> 的权限</h3>
                    <?php if ($permissionList != null) : ?>
                        <?php foreach ($permissionList as $value) : ?>
                            <p>
                                <input type="checkbox" name="permission[]" id="checkbox<?php echo $value['id'];?>" value="<?php echo $value['id']; ?>" <?php if (in_array($value['id'], $permissionArray)) : ?>checked="checked"<?php endif; ?> /> 
                                <label for="checkbox<?php echo $value['id'];?>"><?php echo $value['name']; ?></label>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <input name="id" type="hidden" value="<?php echo $this->backend_lib->getValue(set_value('id'), $admin['id']); ?>" />
                    <input name="add" type="hidden" value="1" />
                    <p><input type="submit" name="button"  value="保存" /></p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>