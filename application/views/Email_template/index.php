<div class="row">
   <div class="col-md-12 ">
      <div class="portlet light bordered">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject font-blue-sharp bold uppercase">Email template</span>
            </div>
         </div>
         <div class="portlet-body ">
            <div class="table-responsive">
               <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                         <th>Email Name</th>
                         <th>Subject</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="search_list">
                     
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="3">
                           <div class="pull-right" id="pagination">
                             <ul class="pagination">
                              </ul>
                           </div>
                        </td>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
         <!-- panel body -->
      </div>
      <!-- panel-->
      <!-- END SAMPLE FORM PORTLET-->
   </div>
</div>

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function()
   {
      $(document).on("click",".edit_code",function()
     {
       CKEDITOR.replace('html_text', {
    toolbar: [
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike'] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align'], items: [ 'NumberedList', 'BulletedList','Outdent', 'Indent','CreateDiv','JustifyCenter','JustifyBlock','BidiLtr', 'BidiRtl', ] },
    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    ]
    });
        //myModalLabel
        var id=$(this).data("id");
        var name=$(this).data("name");
        $("#myModalLabel").html(name);
        var subject=$(this).data("subject");
        $("#subject").val(subject);
        var contact=$(this).data("contact");
        $("#id").val(id);
        $("#html_text").text(contact);
        $("#myModal").modal('show');

     });//edit email

    $(document).on("click",".save_email",function(){
      var subject=$("#subject").val();
      var contact=$("#html_text").text();
      var data=$("#save_email_data").serialize();
      //console.log(data);

       $.ajax({
               url:"<?php echo base_url("ajax_controller/update_email"); ?>",
               type: "POST",
               data:"data="+data,
               dataType : "json",
               success:function(data){
                  console.log(data);
                  //  var data = $.parseJSON(data);
               //     $("#pagination").html(data.pagination);
                    // $(".search_list").html(data.html);
                    //var total_rows=$(".state_tr");
                    //refresh_state_data(total_rows);
             },
               error:function(data){ 
                   console.log(data);
               }
           });//ajax

    });
   
   var BASE_URL="<?=base_url()?>";

   
   function get_email_list(url="")
     {
         if(url=="")
         {
         url="<?php echo base_url("ajax_controller/get_all_email"); ?>";
         }
           $.ajax({
               url:url,
               type: "POST",
               data:"uid=1",
               success:function(data){
                    var data = $.parseJSON(data);
                    $("#pagination").html(data.pagination);
                    $(".search_list").html(data.html);
                    //var total_rows=$(".state_tr");
                    //refresh_state_data(total_rows);
             },
               error:function(data){ 
                   console.log(data);
               }
           });//ajax
     }//get listings
   
     get_email_list();
     $('#pagination').on('click', 'li a', function(e) {
           e.preventDefault();
           var url=$(this).attr('href');
           if(url=="#" || url=="")
           {
             return false;
           }
             get_email_list(url);
             return false;
     });/// pagination click

  });
</script>