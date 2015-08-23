<?php $this->load->view('backend/_header'); ?>
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>plugins/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>plugins/kindeditor/lang/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('#editor_id', {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            allowFlashUpload : false,
            allowMediaUpload : false,
            allowFileUpload : false,
            items : [
                'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'flash', 'media', '|', 'link', 'unlink', 'pagebreak', ]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input.datepicker').Zebra_DatePicker();
    });
</script>
<div class="main">
    <div class="mainLeft">
        <?php $this->load->view('backend/_menu', array('onView' => 'article')); ?>
    </div>
    <div class="mainRight">
        <div class="block1">
            <div class="titleStyle1">
                文章页<span class="titleStyleRight"><span class="titleStyleRightLine">|</span><a href="<?php echo B_URL; ?>article/index" class="white">返回列表</a></span>
            </div>
            <div class="contentBlock1">
                <?php if ($message) : ?>
                    <div class="errorMessage">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo B_URL; ?>article/save" method="post">
                    <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>标题:</th>
                            <td>
                                <input name="title" type="text" value="<?php echo $this->backend_lib->getValue(set_value('title'), $row['title']); ?>" size="80" />
                                <?php echo form_error('title'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>作者:</th>
                            <td>
                                <input name="author" type="text" value="<?php echo $this->backend_lib->getValue(set_value('author'), $row['author']); ?>"  size="40"  />
                                <?php echo form_error('author'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>封面图:</th>
                            <td>
                                <input name="cover_pic" type="text" id="coverPic" value="<?php echo $this->backend_lib->getValue(set_value('cover_pic'), $row['cover_pic']); ?>"  size="80"  />
                                <?php echo form_error('cover_pic'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>描述:</th>
                            <td>
                                <textarea name="desc_txt" id="desc_txt" cols="60" rows="5"><?php echo $this->backend_lib->getValue(set_value('desc_txt'), $row['desc_txt']); ?></textarea>
                                <?php echo form_error('desc_txt'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>链接:</th>
                            <td>
                                <input name="hop_link" type="text" value="<?php echo $this->backend_lib->getValue(set_value('hop_link'), $row['hop_link']); ?>"  size="60"  />
                                <?php echo form_error('hop_link'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>推荐:</th>
                            <td>
                                <select name="top">
                                    <?php if ($tops) : ?>
                                        <?php foreach ($tops as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($row['top'] === (string)$key || set_value('top') === (string)$key) : ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <?php echo form_error('top'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>文章分类:</th>
                            <td>
                                <select name="article_category_id">
                                    <option value="0">默认</option>
                                    <?php if ($categorys != null) : ?>
                                        <?php foreach ($categorys as $category) : ?>
                                            <option value="<?php echo $category['id']; ?>" <?php if ($row['article_category_id'] == $category['id'] || set_value('article_category_id') == $category['id']) : ?>selected="selected"<?php endif; ?>><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <?php echo form_error('article_category_id'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>内容:</th>
                            <td>
                                <textarea id="editor_id" name="content" style="width:90%;height:400px;visibility:hidden;"><?php echo $this->backend_lib->getValue(set_value('content'), $row['content']); ?></textarea>
                                <?php echo form_error('content'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>上传附件:</th>
                            <td>
                                <div class="uploadAttach">
                                    附件列表: 
                                    <ul id="uploadAttach">
                                        <?php if ($attachs != null) : ?>
                                            <?php foreach ($attachs as $attach) : ?>
                                                <li>
                                                    <?php if($attach['setInput']) : ?><input type="hidden" name="attachId[]" value="<?php echo $attach['id']; ?>" /><?php endif; ?>
                                                    <a target="_blank" href="<?php echo base_url() . $attach['path']; ?>"><?php echo $attach['orig_name']; ?></a>
                                                    <a onclick="return attachInsertEditor(this)" href="<?php echo base_url() . $attach['path']; ?>">插入文章</a>
                                                    <a onclick="return setCoverPic(this);" href="<?php echo $attach['path']; ?>">设为封面</a>
                                                    <a onclick="return insertImgToDesc(this);" href="<?php echo $attach['path']; ?>">插入描述</a>
                                                    |&nbsp;<a target="_blank" href="<?php echo base_url() . cg_get_img_path($attach['path'], 'thumb'); ?>">缩略图</a>
                                                    <a onclick="return attachInsertEditor(this);" href="<?php echo base_url() . cg_get_img_path($attach['path'], 'thumb'); ?>">插入缩略图</a>
                                                    <a onclick="return setCoverPic(this);" href="<?php echo cg_get_img_path($attach['path'], 'thumb'); ?>">缩略图设为封面</a>
                                                    <a onclick="return insertImgToDesc(this);" href="<?php echo cg_get_img_path($attach['path'], 'thumb'); ?>">缩略图插入描述</a>
                                                    <a onclick="return deleteAttach(this);" href="<?php echo $attach['id']; ?>">删除</a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div id="attachMessage" class="errorMessage" style="display:none; width: 70%; margin-left: 0px;"></div>
                                <iframe src="<?php echo B_URL; ?>attach/upload" width="420" height="100" frameborder="0" scrolling="no" id="iframeContentAttach" ></iframe>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>发表时间:</th>
                            <td>
                                <input name="post_time" type="text" value="<?php echo $this->backend_lib->getValue(set_value('post_time'), $row['post_time']); ?>" /> <input type="checkbox" name="postTime" <?php if (!$row['id'] && !set_value('id')) : ?>checked="checked"<?php endif; ?> /> 更新当前时间
                                <?php echo form_error('post_time'); ?>
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
                                <?php echo form_error('status'); ?>
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