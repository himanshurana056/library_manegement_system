<!-- Modal -->
<div class="modal fade" id="session-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Session</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form action="{{URL::to('/sessions/updateSession')}}" id="edit_sessions" method="POST">
           <input type="hidden" id="session_id" name="id" value="" >            
    
           {{csrf_field()}}
              <div class="modal-body">
                        <div class="form-group">
                         <label for="admission_year">Admision Year</label>
                         <input type ="date"  class="form-control" name="admission_year" value="">
                        </div>
                        
                        <div class="form-group">
                          <label for="passing_year">Passing Year </label>
                          <input type ="date" class="form-control" name="passing_year" value="">
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
$('.edit_session').click(function(e){
// alert()
    e.preventDefault();
    var cutomrurl ="{{URL::to('/sessions/editSession')}}";
    var id = $(this).data('id');
    
   $.ajax({
        url: cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
          // console.log(response);
          $form = $('#edit_sessions');
            $form.find("date[name='admission_year']").val(response.session.admission_year);
            $form.find("date[name='passing_year']").val(response.session.passing_year);
           
             $('#session_id').val(response.session.id);
          
            $('#session-modal').modal('toggle');
         
        }
    })  
    
})
})

</script>









