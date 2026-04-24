@extends('layout')

@section('content')
<form action="/article/{{$article->id}}" method="post">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="InputName" class="form-label">Date public</label>
    <input name="datePublic" type="date" class="form-control" id="" value="{{$article->datePublic}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="" aria-describedby="emailHelp" value="{{$article->title}}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Short description</label>
    <input name="shortDesc" type="text" class="form-control" id="" value="{{$article->shortDesc}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="desc" cols="30" rows="10" class="form-control" id="">{{$article->desc}}</textarea>
    <input name="desc" type="text" class="form-control" id="" value="{{$article->desc}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
