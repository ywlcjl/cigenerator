<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        //表单全选
        checkAll();
        
        //表格行效果
        trView();
        
        //管理操作
        $('#manageName').change(function() {
            var manageName = $(this).val();
            if(manageName == 'setStatus') {
                $('#setStatus').css('display', '');
            } else {
                $('#setStatus').css('display', 'none');
            }
        });
    });
</script>

<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'adminPermission')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">系统权限列表<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>admin_permission/save" class="white">添加权限</a></span></div>
            <div class="contentBlock1">
                <form name="form1" id="form1" method="post" action="<?php echo B_URL; ?>admin_permission/manage">
                    <table class="listForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0" >
                        <tr class="listFormHeader">
                            <th><b>ID</b></th>
                            <td>名称</td>
                            <td>描述</td>
                            <td>状态</td>
                            <td>更新时间</td>
                            <td>操作</td>
                        </tr>
                        <?php if ($result != null) : ?>
                            <?php foreach ($result as $value) : ?>
                                <tr class="listFormContent">
                                    <th><input type="checkbox" name="ids[]" class="ids" <?php if($value['is_base']): ?>disabled="disabled"<?php endif; ?> value="<?php echo $value['id']; ?>" /> <?php echo $value['id']; ?></th>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['desc_txt']; ?></td>
                                    <td><?php echo $statuss[$value['status']]; ?></td>
                                    <td><?php echo $value['update_time']; ?></td>
                                    <td><?php if(!$value['is_base']): ?><a href="<?php echo B_URL; ?>admin_permission/save/?id=<?php echo $value['id']; ?>">编辑</a><?php endif; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </table>
                    <div class="pageLink"><?php echo $this->pagination->create_links(); ?></div>
                    <div class="listFormManage">
                        <a href="#" id="checkAll">全选</a>
                        <select name="manageName" id="manageName">
                            <option value="">请选择</option>
                            <option value="delete">删除</option>
                            <option value="setStatus">设置状态</option>
                        </select>
                        
                        <select name="setStatus" id="setStatus" style="display: none;">
                            <option value="">请选择</option>
                            <?php if ($statuss != null) : ?>
                                <?php foreach ($statuss as $key=>$value) : ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <input type="submit" name="manageButton" id="manageButton"  value="操作" onclick="return confirmAction();" />
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>