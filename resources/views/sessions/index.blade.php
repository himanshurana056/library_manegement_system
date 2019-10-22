@extends('layouts.app')

@section('content')

<div class="container">

<a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Sessions </a>

<table class ="table table-striped table-responsive">

        <thead>
          <th> Id </th>
          <th> ADMISSION YEAR</th>
          <th> PASSING YEAR</th>
          <th colsapn = 2><center>Action </center> </th> 
        </thead>

    <tbody>
@foreach ($sessions as $session)


        <tr>
            <td>{{$session->id}}</td>
            <td>{{$session->admission_year}}</td>
            <td>{{$session->passing_year}}</td>



            <td>
                <a href="#" data-id="{{$session->id}}" class="btn btn-success edit_session">Edit</a>
             </td>


             <td>
                <a href="#" data-id="{{$session->id}}" class="btn btn-danger delete_record">Delete</a>
             </td>




        </tr> 

    </tbody>
@endforeach

</table>

<!--Start Add/edit Modal form -->
@include('sessions.create')
@include('sessions.edit')


<!-- code for ajax on delete button -->

<script type="text/javascript">

$(document).ready(function(){
$('.delete_record').click(function(e){
var choice = confirm('Do you really want to delete this record?');
if(choice === true) {
  e.preventDefault();
var cutomrurl ="{{URL::to('sessions/deleteSession')}}";
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