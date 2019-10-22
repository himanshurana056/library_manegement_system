<!-- Modal -->
<div class="modal fade" id="branch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{URL::to('branches/updateBranch')}}" id="edit_branches" method="POST">
                        <input type="hidden" id="branch_id" name="id" value="" >
        
               {{csrf_field()}}
        <div class="modal-body">
              
              <div class="form-group">
                  <label for="branch_name"> Branch Name </label>
                  <input type ="text" class="form-control" name="branch_name" value="">
              </div>
              
        </div>
              <div class="modal-footer">
                <button type="submit"  class="btn btn-primary-outline"> Update</button>
                <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
                </div>
          </form>
       </div>
   </div>
</div>

<!-- ajax call on hit of edit button -->

<script type="text/javascript">

$(document).ready(function(){
$('.edit_branch').click(function(e){
    e.preventDefault();
    var cutomrurl ="{{URL::to('branches/editBranch')}}";
    var id = $(this).data('id');
    // alert(id)
    $.ajax({
        url: cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
            $form = $('#edit_branches');
            $form.find("input[name='branch_name']").val(response.branch.branch_name);   
       
            $('#branch_id').val(response.branch.id);
          
          $('#branch-modal').modal('toggle');
         
        }
    })    
    
})
})


</script> 