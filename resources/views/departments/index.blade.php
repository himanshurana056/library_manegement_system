@extends('layouts.app')

@section('content') 
<div class="container">

<a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Department </a>

<table class ="table table-striped table-responsive">
          <thead>
            <th> Id </th>
            <th> Department Name </th>
            <th> H.O.D Name </th>
            <th> Incharge Name </th>
            <th colsapn = 2> Action </th>
          </thead>
  
      <tbody>
@foreach($departments as $department)
      <tr>
            <td>{{$department->id}}</td>
            <td>{{$department->department_name}}</td>
            <td>{{$department->hod_name}}</td>
            <td>{{$department->incharge_name}}</td>

<!-- code to edit/delete button  -->

            <td> 
                <a href="#" data-id="{{$department->id}}" class="btn btn-success edit_department">Edit</a>
            </td>

            <td>
                <button class="btn btn-danger delete_record" data-id="{{$department->id}}"> Delete </button>
            <td>
      </tr>

    @endforeach

  </tbody>
</table>

<!--Start Add/edit Modal form -->
@include('departments.create')
@include('departments.edit')

<!-- code for ajax on delete button -->

<script type="text/javascript">

$(document).ready(function(){
$('.delete_record').click(function(e){
var choice = confirm('Do you really want to delete this record?');
  if(choice === true) {
    e.preventDefault();

  var cutomrurl ="{{URL::to('departments/deleteDepartment')}}";
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