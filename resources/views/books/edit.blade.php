<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Edit book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="{{URL::to('books/updateBook')}}" id="edit_books" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" id="book_id"  name="id" value=""> 

{{csrf_field()}}
    <div class="modal-body">
              <div class="form-group">
                <label for="book_name"> Book Name </label>
                <input type ="text"  class="form-control" name="book_name" value="">
              </div>
              
              <div class="form-group">
                <label for="auther_name"> Auther Name </label>
                <input type ="text" class="form-control" name="auther_name" value="">
              </div>
              
              <div class="form-group">
                  <label for="cover_image">Cover Image</label>
                  <input type="file"  class="form-control" value="" name="cover_image" required>
              </div>
              
              <div class="form-group">
                <label for="description"> Description </label>
                <input type ="text" class="form-control" name="description" value="">
              </div>

            
              <div class="form-group">
                  <label for="department_name"> Department Name</label>
              <select class="form-control" name="department_id">
                  <option>Choose department</option> 
                    @foreach($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select> 
              
              <div class="modal-footer">
                <button type="submit"  class="btn btn-primary-outline"> Update</button>
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
              </div>

              
        </form>
       </div>
   </div>
</div>


<!-- ajax call on hit of edit button -->

<script type="text/javascript">

$(document).ready(function(){
$('.edit_book').click(function(e){
  e.preventDefault();
  var cutomrurl ="{{URL::to('books/editBook')}}";
  var id = $(this).data('id');
  // alert(id)
  $.ajax({
      url: cutomrurl+'/'+id,
      type:'GET',
      dataType: "JSON",
      success:function(response){
        
          $form = $('#edit_books');
          $form.find("input[name='book_name']").val(response.book.book_name);
          $form.find("input[name='auther_name']").val(response.book.auther_name);
          $form.find("input[name='description']").val(response.book.description);
        
          
          $form.find("select[name='department_id']").val(response.book.department_id);
          $('#book_id').val(response.book.id);
          
          $('#edit-modal').modal('toggle');
        
      }
  })  
  
})
})


</script>