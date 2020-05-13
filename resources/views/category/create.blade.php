@extends('layout')
@section('dashboard-content')
<h1> Create category form</h1>

@if(Session::get('success'))
{{ Session::get('success') }}
@endif

@if(Session::get('failed'))
{{ Session::get('failed') }}
@endif


<form action = "{{ URL::to('post-category-form') }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="categoryName">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Category Icon</label>
    <input type="file" class="form-control" name="categoryIcon" onchange="loadPhoto(event)">
  </div>

  <div>

        <img id="photo" height="100" width="100">
        
        </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function loadPhoto(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('photo');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

    }
    
    </script>
@stop