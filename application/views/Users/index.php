<div class="row">
   <div class="col-md-12 ">
      <div class="portlet light bordered">
         <div class="portlet-title">
            <div class="caption">
               <span class="caption-subject font-blue-sharp bold uppercase">User List </span>
            </div>
         </div>
         <div class="portlet-body ">
            <div class="table-responsive">
               <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Register Date</th>
                        <th>Last Seen</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody class="user_list">
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="7">
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
      var BASE_URL="<?=base_url()?>";

   
   function get_user_list(url="")
   {
      if(url=="")
      {
      url="<?php echo base_url("ajax_controller/get_all_user"); ?>";
      }
        $.ajax({
            url:url,
            type: "POST",
            data:"uid=1",
            success:function(data){
                 var data = $.parseJSON(data);
                 $("#pagination").html(data.pagination);
                 $(".user_list").html(data.html);
                 //var total_rows=$(".state_tr");
                 //refresh_state_data(total_rows);
          },
            error:function(data){ 
                console.log(data);
            }
        });//ajax
   }
   //get User listings
   
   get_user_list();

   $('#pagination').on('click', 'li a', function(e) {
        e.preventDefault();
        var url=$(this).attr('href');
        if(url=="#" || url=="")
        {
          return false;
        }
          get_user_list(url);
          return false;
   });/// pagination click


       });
</script>
