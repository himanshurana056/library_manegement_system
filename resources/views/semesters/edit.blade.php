<!-- Modal -->
<div class="modal fade" id="semester-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('/semesters/updateSemester')}}" id="edit_semesters" method="POST">
      <input type="hidden" id="semester_id" name="id" value="" >
    
                        
    
      {{csrf_field()}}
              <div class="modal-body">
                        <div class="form-group">
                         <label for="semester_number">  Semester Number </label>
                          <input type ="text"  class="form-control" name="semester_number" value="">
                        </div>
                        
                        <div class="form-group">
                          <label for="total_subjects">Total Subjects </label>
                         <input type ="text" class="form-control" name="total_subjects" value="">
                        </div>

                        
                        <div class="form-group">
                         <label for="semester_room_number"> Semester Room Number </label>
                         <input type ="text" class="form-control" name="semester_room_number" value="">
                        </div>
                 </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary-outline">Update</button>

                       <button type="button" class="btn btn-default"       data-dismiss="modal">Close</button>
                         </div>
        </form> 
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
$('.edit_semester').click(function(e){
// alert()
    e.preventDefault();
    var cutomrurl ="{{URL::to('/semesters/editSemester')}}";
    var id = $(this).data('id');
    
   $.ajax({
        url: cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
          // console.log(response);
          $form = $('#edit_semesters');
            $form.find("input[name='semester_number']").val(response.semester.semester_number);
            $form.find("input[name='total_subjects']").val(response.semester.total_subjects);
            $form.find("input[name='semester_room_number']").val(response.semester.semester_room_number);
             $('#semester_id').val(response.semester.id);
          
            $('#semester-modal').modal('toggle');
         
        }
    })  
    
})
})

</script>









