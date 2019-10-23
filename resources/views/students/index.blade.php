@extends('layouts.app')

@section('content')
<div class= "container">

<!-- Button trigger modal -->

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Students </a>

<table class ="table table-striped table-responsive">

  <thead>
    <tr>
          <th>ID</th>
          <th>IMAGE </th>
          <th>ROLL NUMBER</th>
          <th>BIRTH YEAR</th>
          <th> FULL NAME </th>
          <th>SEMESTER--INFORMATION</th>
          <th>ADDRESS</th>
          <th>CITY</th>
          <th>PINCODE</th>
          <th>DEPARTMENT</th>
         
       
        
        <th colsapn = 2><center>Action </center> </th> 
    </tr>
  </thead>
<tbody>

@foreach  ($students as $student)

@php $image = $student->student_profile->cover_image; @endphp


      <tr>
      <td>{{$student->id}}</td>
    
        <td><img src='{{asset("storage/$image")}}'></td>
   
        <td>{{$student->student_profile->roll_number}}</td>
      
        <td>{{$student->student_profile->birth_year}}</td>
        
        <td>{{$student->FullName}}</td>
        <td>{{$student->SemesterInformation}}</td>
        <td>{{$student->student_profile->address}}</td>
        <td>{{$student->student_profile->city}}</td>
        <td>{{$student->student_profile->pincode}}</td>   
        <td>{{$student->department->department_name}}</td>
 
       
       
     
      
        
      <!-- code for edit button for update the data in the database-->
        <td>
          <a href="#" data-id="{{$student->id}}" class="btn btn-success edit_student">Edit</a>
        </td>

      <!-- code for delete button for delete the data in the database -->

        <td>
          <button class="btn btn-danger delete_record" data-id="{{$student->id}}"> Delete </button>
        <td>
        </tr>

@endforeach

</tbody>
</table>

<!--Start Add  Modal -->

@include('students.create')


@include('students.edit')


<script type="text/javascript">

$(document).ready(function(){
$('.delete_record').click(function(e){
var choice = confirm('Do you really want to delete this record?');
if(choice === true) {
  e.preventDefault();
var cutomrurl ="{{URL::to('students/deleteStudent')}}";
$this = $(this)
var id = $this.data('id');
$.ajax({
    url:cutomrurl+'/'+id,
    type:'GET',
    dataType: "JSON",
    success:function(response){
      // console.log(response);
      if(response.status == true) {
        $this.parent().parent('tr').remove();
      }

      
    }
})
    return true;
}
return false;

})
}) 
</script>

@endsection