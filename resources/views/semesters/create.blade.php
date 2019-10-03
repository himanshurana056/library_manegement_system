<!--start Add  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      

    <form action="{{Route('semesters.store')}}" method="post">
    
      {{csrf_field()}}
              <div class="modal-body">
                        <div class="form-group">
                         <label for="semester_number"> Semester Number </label>
                          <input type ="text"  class="form-control" name="semester_number" required>
                        </div>
                        
                        <div class="form-group">
                          <label for="total_subjects"> Total Subjects</label>
                         <input type ="text" class="form-control" name="total_subjects" required>
                        </div>

                        
                        <div class="form-group">
                         <label for="semester_room_number"> Semester Room Number</label>
                         <input type ="text" class="form-control" name="semester_room_number" required>
                        </div>
                 </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary-outline save_button"> Add</button>
                       <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
                         </div>
        </form>
     </div>
</div>

</div>


<!-- <script type="text/javascript">

$(document).ready(function(){
$('.save_button').click(function(e){
 
  
      e.preventDefault();
   
    var cutomrurl ="{{URL::to('save/saveSemester')}}";
    $this = $(this)
    var id = $this.data('id');
    
   $.ajax({
        url:cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
          // console.log(response);
        

         
        }
    }) 

      
    
    
    
  })
}) 


</script> -->