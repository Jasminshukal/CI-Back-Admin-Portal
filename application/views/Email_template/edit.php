        <div class="row">
            <div class="col-md-12">
                <div class="m-heading-1 border-purple m-bordered">
                            <p><code>{{NAME}}</code> User Name  <code>{{EMAIL}}</code> User Email </p>
                        </div>
                <div class="well well-sm">
                    <form id="FormEnvioCorreo" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="subject">
                                           Email - Name</label>
                                        <input type="text" id="subject" name="name" class="form-control" placeholder="Subject" required="required" value="<?=$email_data['email_name'];?>">
                                        <input type="hidden" name="id" value="<?=$email_data['id'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="subject">
                                           Email - Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required="required" value="<?=$email_data['email_subject'];?>">
                                        <input type="hidden" name="id" value="<?=$email_data['id'];?>">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">
                                        Email Contact </label>
                                    <textarea name="contact" id="html_text" class="form-control" required="required"
                                    ><?=$email_data['email_contact'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="control-group">
                                    <label class="control-label" for="button1id"></label>
                                    <div class="controls">
                                        <button id="button1id" type="submit" name="button1id" class="btn btn-success">Save</button>
                                        <button id="button2id" class="btn btn-danger">Back</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function()
   {
       CKEDITOR.replace('html_text', {
    toolbar: [
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike'] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align'], items: [ 'NumberedList', 'BulletedList','Outdent', 'Indent','CreateDiv','JustifyCenter','JustifyBlock','BidiLtr', 'BidiRtl', ] },
    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    ]
    });

   var BASE_URL="<?=base_url()?>";

  });
</script>