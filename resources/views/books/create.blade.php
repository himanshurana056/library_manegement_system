<!--Start Add  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Books</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form  action="{{Route('books.store')}}" method="post" enctype="multipart/form-data" >
            <input type="hidden" id="department_id" method="post">

      
          {{csrf_field()}}
        <div class="modal-body">
                  <div class="form-group">
                    <label for="book_name">Book Name </label>
                    <input type ="text"  class="form-control "  name="book_name" required >
                  </div>
                  
                  <div class="form-group">
                    <label for="auther_name">Auther Name </label>
                    <input type ="text" class="form-control " name="auther_name" required  >
                  </div>

                  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type ="text" class="form-control " name="description" required  ></textarea>
                  </div>

                  <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    <input type="file" class="form-control" name="cover_image" required>
                  </div>


                  <div class="form-group">
                    <label for="department_name"> Department Name</label>
                    <select class="form-control" name="department_id">
                      <option>Choose department</option> 
                        @foreach($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                      </select> 
                  </div>
          </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary-outline"> Add</button>
                  <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
   </div>
</div>


<!-- End Add Modal -->