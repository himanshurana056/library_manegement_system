<!-- Modal -->
<div class="modal fade" id="branch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Modal</h5>
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

              
              <div class="form-group">
                  <label for="student_name"> Studnet Name </label>
                  <input type ="text" class="form-control" name="student_name" value="">
              </div>

              <div class="form-group">
                <label for="gender"> Correct The Gender</label>
              <select name="gender"> gender
                    <option> Gender </option>
                    <option value="male" @if ($branch->gender == 1) @endif >  male</option>
                    <option value="female" @if ($branch->gender == 0) @endif > female</option>
              </select>
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
            $form.find("input[name='student_name']").val(response.branch.student_name);
            $form.find("input[name='gender']").val(response.branch.gender);
            $('#branch_id').val(response.branch.id);
          
          $('#branch-modal').modal('toggle');
         
        }
    })    
    
})
})


</script> 