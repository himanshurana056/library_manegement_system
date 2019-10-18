@extends('layouts.app')

@section('content')

<div class="container">

<a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Semester </a>

<table class ="table table-striped table-responsive">

        <thead>
          <th> Id </th>
          <th> Semester Number</th>
          <th> Total Subjects </th>
          <th> Semester Room Number</th>
          <th colsapn = 2> Action </th>
        </thead>
  
    <tbody>

@foreach($semesters as $semester)
      <tr>
          <td>{{$semester->id}}</td>
          <td>{{$semester->semester_number}}</td>
          <td>{{$semester->total_subjects}}</td>
          <td>{{$semester->semester_room_number}}</td>

<!-- code to edit/delete button  -->

          <td> 
              <a href="#" data-id="{{$semester->id}}" class="btn btn-success  edit_semester">Edit</a>
          </td>

          <td>
              <a href="#" data-id="{{$semester->id}}" class="btn btn-danger delete_record">Delete</a>
          </td>
      </tr>

@endforeach
  
     </tbody>
</table>

<!--Start Add/edit Modal form -->
@include('semesters.create')
@include('semesters.edit')

<!-- code for ajax on delete button -->

<script type="text/javascript">

$(document).ready(function(){
$('.delete_record').click(function(e){
var choice = confirm('Do you really want to delete this record?');
  if(choice === true) {
    e.preventDefault();
  
  var cutomrurl ="{{URL::to('semesters/deleteSemester')}}";
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