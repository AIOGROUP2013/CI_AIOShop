                   <div id="show_login">
                   <div  id="tamgiac_login"></div>
                      <div id="formlogin">
                          <form action="<?php echo base_url(); ?>index.php/welcome/kiemtra_dangnhap" method="post">
                              <h2>Đăng nhập</h2>
                              <div id="line"></div>
                              <p class="email">Email:</p>
                              <input type="text" id="input_username" name="email_login" size="30" value="" class="input_login">
                              <div class="arrow" style="display:none"></div>
                              <p class="error" style="display:none">Địa chỉ email không chính xác</p>
                              <p class="email">Mật khẩu:</p>
                              <input type="password" id="input_pass" name="pass_login" size="30" value="" class="input_login">
                              <div class="arrow" style="display:none"></div>
                              <p class="error" style="display:none">Vui lòng nhập mật khẩu</p>
                              <div id="chexbox">
                              <input class="valign checkbox" type="checkbox" name="remember_me" id="remember_me_popup" value="Y" checked="checked">

                              <label for="remember_me_popup" class="valign">Nhớ trạng thái đăng nhập</label>
                              </div>
                              <button class="submit" type="submit">Đăng nhập</button>
                              <span id="span_quenmatkhau">[</span> <a href="#" class="forgotpass">Quên mật khẩu?</a> <span>]</span><br>
							  <a href="<?=base_url()?>index.php/loginfb"><img src="<?=base_url()?>public/icon/login_facebook_small.png"></a>
                          </form>
                      </div>
                   </div>