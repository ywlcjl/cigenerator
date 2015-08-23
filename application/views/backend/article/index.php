<?php $this->load->view('backend/_header'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        //表单全选
        checkAll();
        
        //表格行效果
        trView();
        
        //搜索框
        searchForm();
        
        //日期插件
        $('.datepicker').Zebra_DatePicker();

        //搜索框隐藏bug修正, 必须放在日期插件加载后隐藏
        <?php if (!$search) : ?>
            $('#searchForm').css('display', 'none');
        <?php endif; ?>

        //管理操作
        $('#manageName').change(function() {
            var manageName = $(this).val();
            if(manageName == 'set_category_id') {
                $('#set_category_id').css('display', '');
            } else {
                $('#set_category_id').css('display', 'none');
            }
            if(manageName == 'set_status') {
                $('#set_status').css('display', '');
            } else {
                $('#set_status').css('display', 'none');
            }
            if(manageName == 'set_top') {
                $('#set_top').css('display', '');
            } else {
                $('#set_top').css('display', 'none');
            }
        });
        
    });
</script>

<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'article')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">文章列表<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>article/save" class="white">添加文章</a></span></div>
            <div class="contentBlock1">
                <form name="form1" id="form1" method="post" action="<?php echo B_URL; ?>article/manage">
                    <table class="listForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0" >
                        <tr class="listFormHeader">
                            <th><b>ID</b></th>
                            <td>标题</td>
                            <td>分类</td>
                            <td>作者</td>
                            <td>推荐</td>
                            <td>管理员</td>
                            <td>状态</td>
                            <td>发表日期</td>
                            <td>操作</td>
                        </tr>
                        <?php if ($result != null) : ?>
                            <?php foreach ($result as $value) : ?>
                                <tr class="listFormContent">
                                    <th><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['id']; ?>" /> <?php echo $value['id']; ?></th>
                                    <td><?php echo $value['title']; ?></td>
                                    <td><?php echo $value['categoryName']; ?></td>
                                    <td><?php echo $value['author']; ?></td>
                                    <td><?php echo $tops[$value['top']]; ?></td>
                                    <td><?php echo $value['adminName']; ?></td>
                                    <td><?php echo $statuss[$value['status']]; ?></td>
                                    <td><?php echo $value['post_time']; ?></td>
                                    <td><a href="<?php echo B_URL; ?>article/save/?id=<?php echo $value['id']; ?>">编辑</a></td>
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
                            <option value="set_status">设置status</option>
                            <option value="set_top">设置top</option>
                            <option value="set_category_id">设置分类</option>
                        </select>

                        <select name="set_status" id="set_status" style="display: none;">
                            <option value="">请选择</option>
                            <?php if ($statuss != null) : ?>
                                <?php foreach ($statuss as $key=>$value) : ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <select name="set_top" id="set_top" style="display: none;">
                            <option value="">请选择</option>
                            <?php if ($tops != null) : ?>
                                <?php foreach ($tops as $key=>$value) : ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <select name="set_category_id" id="set_category_id" style="display: none;">
                            <option value="">请选择</option>
                            <?php if ($categorys != null) : ?>
                                <?php foreach ($categorys as $category) : ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <input type="submit" name="manageButton" id="manageButton"  value="操作" onclick="return confirmAction();" />
                    </div>
                </form>
            </div>
        </div>

        <div class="blank30"></div>

        <div class="block1">
            <div class="titleStyle1">
                <a href="#" id="searchFormTitle" class="white">搜索筛选+</a><span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>article/index" class="white">清空条件</a></span>
            </div>
            <div class="contentBlock1" id="searchForm">
                <form action="<?php echo B_URL; ?>article/index/" method="get">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>ID:</th>
                            <td>
                                <input name="id" type="text" value="<?php echo $id; ?>" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>标题:</th>
                            <td>
                                <input name="title" type="text" value="<?php echo $title; ?>" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>作者:</th>
                            <td>
                                <input name="author" type="text" value="<?php echo $author; ?>" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>推荐:</th>
                            <td>
                                <select name="top">
                                    <option value="">请选择</option>
                                    <?php if ($tops != null) : ?>
                                        <?php foreach ($tops as $key=>$value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($top === (string)$key) : ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>分类:</th>
                            <td>
                                <select name="article_category_id">
                                    <option value="">请选择</option>
                                    <?php if ($categorys != null) : ?>
                                        <?php foreach ($categorys as $category) : ?>
                                            <option value="<?php echo $category['id']; ?>" <?php if ($article_category_id == $category['id']) : ?>selected="selected"<?php endif; ?>><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>管理员:</th>
                            <td>
                                <select name="adminId">
                                    <option value="">请选择</option>
                                    <?php if ($admins != null) : ?>
                                        <?php foreach ($admins as $admin) : ?>
                                            <option value="<?php echo $admin['id']; ?>" <?php if ($adminId == $admin['id']) : ?>selected="selected"<?php endif; ?>><?php echo $admin['username']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>状态:</th>
                            <td>
                                <select name="status">
                                    <option value="">请选择</option>
                                    <?php if ($statuss != null) : ?>
                                        <?php foreach ($statuss as $key=>$value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($status === (string)$key) : ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>发布日期:</th>
                            <td>
                                <input name="postTimeStart" class="datepicker" type="text" value="<?php echo $postTimeStart; ?>" /> - <input class="datepicker" name="postTimeEnd" type="text" value="<?php echo $postTimeEnd; ?>" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>创建日期:</th>
                            <td>
                                <input name="createTimeStart" class="datepicker" type="text" value="<?php echo $createTimeStart; ?>" /> - <input class="datepicker" name="createTimeEnd" type="text" value="<?php echo $createTimeEnd; ?>" />
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <input name="search" type="hidden" value="1" />
                    <div class="inputFormSubmit">
                        <input type="submit" name="button"  value="搜索" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>