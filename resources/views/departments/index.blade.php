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

  

      <td> 
      <a href="#" data-id="{{$department->id}}" class="btn btn-success edit_department">Edit</a>
      </td>


    <!-- code for delete button for delete the data in the database -->
    <td>
                            <!-- <form action ="{{route('departments.destroy',$department->id)}}" method="post"> -->
                                <!-- <input type ="hidden" name="_method" value="DELETE"> -->
                                <button class="btn btn-danger delete_record" data-id="{{$department->id}}"> Delete </button>
                                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                    <td>
                             </form>


      </tr>
      @endforeach
     </tbody>
</table>

<!--including the modal of add-->
@include('departments.create')

<!-- including the modal of edit -->
@include('departments.edit')

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
  
  
// alert()
  //   e.preventDefault();
  //   var status
  //   var cutomrurl ="{{URL::to('departments/deleteDepartment')}}";
  //   $this = $(this)
  //   var id = $this.data('id');
    
  //  $.ajax({
  //       url:cutomrurl+'/'+id,
  //       type:'GET',
  //       dataType: "JSON",
  //       success:function(response){
  //         // console.log(response);
  //         if(response.status == true) {
  //           $this.parent().parent('tr').remove();
  //         }

         
  //       }
  //   })  
    
})
}) 


</script>
@endsection