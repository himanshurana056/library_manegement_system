<!--Start Add  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add students</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>

          </div>
               <form  action="{{Route('students.store')}}" method="post" enctype="multipart/form-data">
               <input type="hidden" id="student_profile">
               <input type="hidden" id="department_id" method="post">
               <input type="hidden" id="semester_id" method="post">
               <input type="hidden" id="session_id" method="post">
               
                {{csrf_field()}}
              
        <div class="modal-body">
              <div class="form-group">
                <label for="user_name">User Name </label>
                <input type ="text"  class="form-control "  name="user_name" required >
              </div>
              
              <div class="form-group">
                <label for="email">Email  </label>
                <input type ="text" class="form-control " name="email" required  >
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type ="password" class="form-control " name="password" required >
              </div>
<!-- create students profile  -->


                <div class="form-group">
                  <label for="cover_image">Cover Image</label>
                  <input type="file" class="form-control" name="cover_image" required>
                </div>

                <div class="form-group">
                  <label for="roll_number">Roll Number</label>
                  <input type ="text"  class="form-control" name="roll_number" required >
                </div>

                  <div class="form-group">
                    <label for="birth_year">Birth Year</label>
                    <input type ="date"  class="form-control" name="birth_year" required >
                  </div>

                  <div class="form-group">
                    <label for="first_name">First Name </label>
                    <input type ="text"  class="form-control" name="first_name" required >
                  </div>

                
                  <div class="form-group">
                    <label for="last_name">Last Name </label>
                    <input type ="text" class="form-control " name="last_name" required  >
                  </div>
                  
        
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type ="text" class="form-control " name="address" required  ></textarea>
                  </div>


                  <div class="form-group">
                    <label for="branch_name">Branch Name </label>
                    <input type ="text"  class="form-control" name="branch_name" required >
                  </div>



                  <div class="form-group">
                      <label for="city">City </label>
                      <input type ="text" class="form-control " name="city" required  >
                    </div>

                    <div class="form-group">
                      <label for="pincode">Pincode </label>
                      <input type ="text" class="form-control " name="pincode" required  >
                    </div>

                    <div class="form-group ">
                  <label for="department_name"> Department Name</label>
                  <select class="form-control" name="department_id">
                    <option>Choose department</option> 
                      @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                      @endforeach
                    </select> 
                </div>

                <div class="form-group ">
                  <label for="semester_number"> semester</label>
                  <select class="form-control" name="semester_id">
                    <option>Choose Semester</option> 
                      @foreach($semesters as $semester)
                    <option value="{{$semester->id}}">{{$semester->semester_number}}</option>
                      @endforeach
                    </select> 
                 </div>

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
                  <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
              </div>
          </form>
    </div>
</div>
</div>


<!-- End Add Modal -->