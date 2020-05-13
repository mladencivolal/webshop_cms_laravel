@extends('layout')
@section('dashboard-content')
<h1> Update category form</h1>

@if(Session::get('success'))
{{ Session::get('success') }}
@endif

@if(Session::get('failed'))
{{ Session::get('failed') }}
@endif


<form action="{{ URL::to('update-product') }}/{{ $product->id }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" value="{{ $product->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="productName">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Price</label>
    <input type="number" class="form-control" value="{{ $product->price }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productPrice">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Discount</label>
    <input type="number" class="form-control" value="{{ $product->discount }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productDiscount">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Product Detail</label>
    <textarea name="productDetail" id="editor1">{!! $product->detail !!}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> Product category </label>
    <select class="form-control" name="category">
      <option> Select </option>
      @foreach($categories as $category)
      <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif> {{ $category->name }}</option>
      @endforeach

    </select>
  </div>


  <div>

    <label> Select product photo </label>
    <input type="file" name="productPhoto" class="form-control" onchange="loadPhoto(event)">

  </div>

  <div>

    <img id="photo" height="100" width="100">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail"> Is Hot Product </label>
    <input type="checkbox" name="isHotProduct" @if($product->is_hot_product > 0) checked @endif/>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail"> Is New Arrival </label>
    <input type="checkbox" name="isNewArrival" @if($product->is_new_arrival > 0) checked @endif />
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
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