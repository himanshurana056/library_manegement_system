<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{URL::to('students/updateStudent')}}" id="edit_students"  method="POST" enctype="multipart/form-data" >
              <input type="hidden" id="student_id"  name="id"  value="" >
             
      {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-group">
                    <label for="user_name"> User Name </label>
                      <input type ="text"  class="form-control" name="user_name" value="">
                    </div>
                    
                    <div class="form-group">
                      <label for="email">Email</label>
                    <input type ="text" class="form-control" name="email" value="">
                    </div>

                    
                    <div class="form-group">
                    <label for="password"> Password </label>
                    <input type ="password" class="form-control" name="password" value="">
                    </div>

<!-- student profile edit -->
                  <div class="form-group">
                    <label for="roll_number">Roll Number</label>
                      <input type ="text"  class="form-control" name="roll_number" values="" required >
                    </div>

                    <div class="form-group">
                    <label for="birth_year">Birth Year</label>
                      <input type ="date"  class="form-control" name="birth_year" values="" required >
                    </div>
                    
                    <div class="form-group">
                    <label for="first_name">First Name </label>
                      <input type ="text"  class="form-control" name="first_name" values="" required >
                    </div>
                    
                    <div class="form-group">
                      <label for="last_name">Last Name </label>
                    <input type ="text" class="form-control " name="last_name"  values=""required  >
                    </div>

                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" value="" name="cover_image" required>
                    </div>

                    
                    <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type ="text" class="form-control" name="address" values="" required  ></textarea>
                    </div>

                    <div class="form-group">
                      <label for="city">City Name </label>
                    <input type ="text" class="form-control " name="city"  values=""required  >
                    </div>

                    <div class="form-group">
                      <label for="pincode">Pincode</label>
                    <input type ="text" class="form-control " name="pincode"  values=""required  >
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

                    <div class="form-group ">
                  <label for="semester_number"> semester</label>
                      <select class="form-control" name="semester_id">
                        <option>Choose Semester</option> 
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->semester_number}}</option>
                    @endforeach
                        </select> 
                </div>


                
                <div class="modal-footer">
                <button type="submit"  class="btn btn-primary-outline"> Update</button>
                <button type="button" class="btn btn-default"data-dismiss="modal">Close</button>
                  </div>

                        
        </form>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
$('.edit_student').click(function(e){
    e.preventDefault();
    var cutomrurl ="{{URL::to('students/editStudent')}}";
    var id = $(this).data('id');
    // alert(id)
    $.ajax({
        url: cutomrurl+'/'+id,
        type:'GET',
        dataType: "JSON",
        success:function(response){
         
            $form = $('#edit_students');
            $form.find("input[name='user_name']").val(response.student.user_name);
            $form.find("input[name='email']").val(response.student.email);
            $form.find("input[name='password']").val(response.student.password);
            $form.find("select[name='department_id']").val(response.student.department_id);
            $form.find("select[name='semester_id']").val(response.student.semester_id);
// student profile

            $form.find("input[name='roll_number']").val(response.student_profile.roll_number);
            $form.find("date[name='birth_year']").val(response.student_profile.birth_year);
            $form.find("input[name='first_name']").val(response.student_profile.first_name);
            $form.find("input[name='last_name']").val(response.student_profile.last_name);
            $form.find("textarea[name='address']").val(response.student_profile.address);
            $form.find("input[name='city']").val(response.student_profile.city);
            $form.find("input[name='pincode']").val(response.student_profile.pincode);
            

            $('#student_id').val(response.student.id);
             
            $('#edit-modal').modal('toggle');
         
        }
    })  
    
})
})


</script>