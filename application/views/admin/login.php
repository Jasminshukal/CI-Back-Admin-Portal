                   <!--  <?php if( isset($login_error) ) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong> <?=$login_error?> </strong>
                        </div>
                    <?php } ?> -->
                    <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                      <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                    </div>
                    <?php endif; ?>

                    <form action="<?=base_url("login")?>" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="username">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="username" id="username" class="form-control">
                            <span class="input-form-error"></span>
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="***" required="" value="" name="password" id="password" class="form-control">
                            <span class="input-form-error"></span>
                            <span class="help-block small">Use strong password</span>
                        </div>

                        <!-- <div class="checkbox">
                            <input type="checkbox" class="i-checks" checked>
                                 Remember login
                            <p class="help-block small">(if this is a private computer)</p>
                        </div> -->

                        <button type="submit" class="btn btn-success btn-block" name="btn_login">Login</button>
                    </form>