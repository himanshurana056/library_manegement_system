@extends('layouts.app')

@section('content')
<div class= "container">

 <!-- Button trigger modal -->

 <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add books </a>

 <table class ="table table-striped table-responsive">

    <thead>
         <tr>
                <th> Id </th>
                <th>COVER IMAGE</th>
                <th>BOOK NAME</th>
                <th>AUTHER NAME</th>
                <th>DESCRIPTION</th>
                <th>DEPARTMENT NAME</th>
                <th colsapn = 2><center>Action </center> </th> 
           </tr>
      </thead>

    <tbody>
@foreach  ($books as $book)
         <tr>
             
              <td>{{$book->id}}</td>
              <td><img src='{{asset("storage/$book->cover_image")}}'></td>
              <td>{{$book->book_name}}</td>
              <td>{{$book->auther_name}}</td>
              <td>{{$book->description}}</td>
              <td>{{$book->department->department_name}}</td>

<!-- code to edit/delete button  -->
              <td>
                  <a href="#" data-id="{{$book->id}}" class="btn btn-success edit_book">Edit</a>
              </td>

              <td>
                  <button class="btn btn-danger delete_record" data-id="{{$book->id}}"> Delete </button>
              <td>
                             
          </tr>

@endforeach
    </tbody>
  </table>
</div>
<!--Start Add/edit Modal form -->

@include('books.create')  
@include('books.edit')

<!-- code for ajax on delete button -->

<script type="text/javascript">

$(document).ready(function(){
$('.delete_record').click(function(e){
  var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
      e.preventDefault();
    var cutomrurl ="{{URL::to('books/deleteBook')}}";
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
  //   var cutomrurl ="{{URL::to('books/deleteBook')}}";
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