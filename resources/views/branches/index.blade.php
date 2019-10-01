@extends('layouts.app')

@section('content')

<div class="container">


<a href="" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Branches </a>

    <table class ="table table-striped table-responsive">
    <thead>
      <th> Id </th>
      <th> Branch Name</th>
      <th> Student Name </th>
      <th colsapn = 2> Action </th>
    </thead>
     @foreach($branches as $branch)
     <tbody>
     
  <tr>
     <td>{{$branch->id}}</td>
     <td>{{$branch->branch_name}}</td>
     <td>{{$branch->student_name}}</</td>



<!-- code for edit the branch -->

            <td>
            <a href="#" data-id="{{$branch->id}}" class="btn btn-success edit_branch">Edit</a>
            <td>
<!-- code for delete the branches -->
      
      @endforeach
     </tbody>
</table>
</div>

<!-- include the pop code for create and edit  branch file -->
@include('branches.create')

@include('branches.edit')


@endsection