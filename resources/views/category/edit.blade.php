@extends('layout')
@section('dashboard-content')
<h1> Update category form</h1>

@if(Session::get('success'))
{{ Session::get('success') }}
@endif

@if(Session::get('failed'))
{{ Session::get('failed') }}
@endif


<form action = "{{ URL::to('update-category') }}/{{ $category->id }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" class="form-control" value="{{ $category->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="categoryName">
  </div>
  <div>
        
        <label> Select category icon </label>
        <input type="file" name="categoryIcon" class="form-control" onchange="loadPhoto(event)">
        
        </div>

        <div>

        <img id="photo" height="100" width="100">
        
        </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop