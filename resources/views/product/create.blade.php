@extends('layout')
@section('dashboard-content')
<h1> Create product form</h1>

@if(Session::get('success'))
{{ Session::get('success') }}
@endif

@if(Session::get('failed'))
{{ Session::get('failed') }}
@endif


<form action="{{ URL::to('store-product') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="productName">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productPrice">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Discount</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productDiscount">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Detail</label>
    <textarea name="productDetail" id="editor1"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> Product category </label>
    <select class="form-control" name="category">
      <option> Select </option>
      @foreach($categories as $category)
      <option value="{{ $category->id }}"> {{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Photo</label>
    <input type="file" class="form-control" name="productPhoto" onchange="loadPhoto(event)">
  </div>

  <div>
    <img id="photo" height="100" width="100">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail"> Is Hot Product </label>
    <input type="checkbox" name="isHotProduct" />
  </div>

  <div class="form-group">
    <label for="exampleInputEmail"> Is New Arrival </label>
    <input type="checkbox" name="isNewArrival" />
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