<!--Start Add  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add branches</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form  action="{{Route('sessions.store')}}" method="post" >
      {{csrf_field()}}
       <div class="modal-body">
            <div class="form-group">
              <label for="admission_year">Admission Year</label>
              <input type ="date"  class="form-control" name="admission_year" required >
            </div>

            <div class="form-group">
              <label for="passing_year">Passing Year</label>
              <input type ="date"  class="form-control" name="passing_year" required >
            </div>

      </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary-outline"> Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>


<!-- End Add Modal -->