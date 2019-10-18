@extends('layouts.app')

@section('content')

<div class="container">


<a href="" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Branches </a>

  <table class ="table table-striped table-responsive">
     <thead>

       <tr>
            <th> Id </th>
            <th> Branch Name</th>
            <th> Student Name </th>
            <th> Gender </th>
            <th colsapn = 2> Action </th>
       </tr>
     </thead>
  @foreach($branches as $branch)
    <tbody>
     
        <tr>
              <td>{{$branch->id}}</td>
              <td>{{$branch->branch_name}}</td>
              <td>{{$branch->student_name}}</</td>
              <td>{{$branch->gender}}</</td>

     <!-- code to edit/delete button  -->

              <td>
                  <a href="#" data-id="{{$branch->id}}" class="btn btn-success edit_branch">Edit</a>
              <td>
     
              <td>
                  <button class="btn btn-danger delete_record" data-id="{{$branch->id}}"> Delete </button>
              <td>
          </tr>
                           
        @endforeach

     </tbody>
  </table>
</div>

<!--Start Add/edit Modal form -->
@include('branches.create')
@include('branches.edit')

<!-- code for ajax on delete button -->

<script type="text/javascript">
$(document).ready(function(){
$('.delete_record').click(function(e){
var choice = confirm('Do you really want to delete this record?');
  if(choice === true) {
    e.preventDefault();
  var cutomrurl ="{{URL::to('branches/deleteBranch')}}";
  $this = $(this)
  var id = $this.data('id');
  $.ajax({
      url:cutomrurl+'/'+id,
      type:'GET',
      dataType: "JSON",
      success:function(response){
        //  console.log(response);
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