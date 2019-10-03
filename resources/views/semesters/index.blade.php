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



<!-- code for edit button to edit the semesters -->
            <td> 
                <a href="#" data-id="{{$semester->id}}" class="btn btn-success  edit_semester">Edit</a>
            </td>

<!-- code for delete button for delete the semester -->
            <td>

            <a href="#"  class="btn btn-danger">Delete</a>
            </td>
      </tr>
      @endforeach
     </tbody>
</table>
@include('semesters.create')
@include('semesters.edit')



@endsection