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

    <form action="{{Route('departments.store')}}" method="post">
    
       {{csrf_field()}}
      <div class="modal-body">
          <div class="form-group">
            <label for="department_name"> Department Name </label>
            <input type ="text"  class="form-control" name="department_name" required>
          </div>
          
          <div class="form-group">
            <label for="hod_name"> H.O.D Name </label>
            <input type ="text" class="form-control" name="hod_name" required>
          </div>
          
          <div class="form-group">
            <label for="incharge_name"> Incharge Name </label>
            <input type ="text" class="form-control" name="incharge_name" required>
          </div>
        
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary-outline"> Add</button>
              <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
          </div>
                </div>
        </form>
     </div>
  </div>
</div>

