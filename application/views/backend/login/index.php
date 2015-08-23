<?php $this->load->view('backend/_header'); ?>
<div class="mainCenter">
    <div class="block1" style="width: 35%; margin: 60px auto;">
        <div class="titleStyle1">后台登录</div>
        <div class="contentBlock1">
            <?php if (isset ($message) && $message) : ?>
                <div class="errorMessage">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form action="<?php echo B_URL; ?>login/signIn" method="post">
                <table class="inputForm" width="95%" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>用户名:</th>
                        <td>
                            <input name="username" type="text" value="<?php echo set_value('username'); ?>" />
                            <?php echo form_error('username'); ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>密码:</th>
                        <td>
                            <input name="password" type="password" />
                            <?php echo form_error('password'); ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>验证码:</th>
                        <td>
                            <input name="captcha" type="text" size="8" maxlength="8" />
                            <?php echo form_error('password'); ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th></td>
                        <td>
                            <img src="<?php echo base_url(); ?>plugins/cool-php-captcha/captcha.php" id="captcha" align="absmiddle" /> 
                            <a href="#" onclick="document.getElementById('captcha').src='<?php echo base_url(); ?>plugins/cool-php-captcha/captcha.php?'+Math.random();document.getElementById('captcha-form').focus();" id="change-image">换一张?</a>
                        </td>
                        <td></td>
                    </tr>
                </table>
                <input name="login" type="hidden" value="1" />
                <div class="inputFormSubmit">
                    <input type="submit" name="button"  value="登入" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('backend/_footer'); ?>
