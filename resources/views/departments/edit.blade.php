<!-- Modal -->
<div class="modal fade"  id="department-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
               <form action="{{URL::to('/departments/updateDepartment')}}" id="edit_departments" method="POST">
               <input type="hidden" id="department_id" name="id" value="" >

               {{csrf_field()}}
        <div class="modal-body">
                 <div class="form-group">
                            <label for="department_name"> Department Name </label>
                            <input type ="text"  class="form-control" name="department_name" value="">
                        </div>
                        
                        <div class="form-group">
                            <label for="hod_name"> H.O.D Name </label>
                            <input type ="text" class="form-control" name="hod_name" value="">
                        </div>

                        
                        <div class="form-group">
                            <label for="incharge_name"> Incharge Name </label>
                            <input type ="text" class="form-control" name="incharge_name" value="">
                        </div>
                 </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary-outline">Update</button>
                           <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
                         </div>
          </form>
       </div>
   </div>
</div>


<!-- ajax call on hit of edit button -->

<script type="text/javascript">

$(document).ready(function(){
$('.edit_department').click(function(e){
// alert()
    e.preventDefault();
    var cutomrurl ="{{URL::to('/departments/editDepartment')}}";
    var id = $(this).data('id');
    
   $.ajax({
        url: cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
          // console.log(response);
          $form = $('#edit_departments');
          $form.find("input[name='department_name']").val(response.department.department_name);
          $form.find("input[name='hod_name']").val(response.department.hod_name);
          $form.find("input[name='incharge_name']").val(response.department.incharge_name);

          $('#department_id').val(response.department.id);
          $('#department-modal').modal('toggle');
         
        }
    })  
    
})
})


</script>


