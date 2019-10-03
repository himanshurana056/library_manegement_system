@extends('layouts.app')

@section('content')
<div class= "container">

 <!-- Button trigger modal -->

 <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add books </a>

 <table class ="table table-striped table-responsive">

    <thead>
     <tr>
        <th> Id </th>
        <th>BOOK NAME</th>
        <th>AUTHER NAME</th>
        <th>DESCRIPTION</th>
        <th colsapn = 2><center>Action </center> </th> 
    </tr>
    </thead>

    <tbody>
@foreach ($books as $book)
<tr>
    <td>{{$book->id}}</td>
    <td>{{$book->book_name}}</td>
    <td>{{$book->auther_name}}</td>
    <td>{{$book->description}}</td>


    <!-- code for edit button for update the data in the database-->
                    <td>
                        <a href="#" data-id="{{$book->id}}" class="btn btn-success edit_book">Edit</a>
                        
                    </td>

    <!-- code for delete button for delete the data in the database -->
                    <td>
                            <!-- <form action ="{{route('books.destroy',$book->id)}}" method="post">
                                <input type ="hidden" name="_method" value="DELETE"> -->
                                <button class="btn btn-danger delete_record" data-id="{{$book->id}}"> Delete </button>
                                <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                    <td>
                             <!-- </form> -->
</tr>
@endforeach
    </tbody>
  </table>

<!--Start Add  Modal -->

@include('books.create')

<!-- End Add modal -->

<!--Start Edit  Modal -->

  @include('books.edit')

<!-- end of edit modal -->

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