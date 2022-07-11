@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        @if ($errors->any())
            <div class="col-8 offset-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form id="crate" action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text"
          class="form-control @error('title') is-invalid @enderror"
          id="title"
          name="title"
          placeholder="Titolo"
          value="{{old('title')}}">
          @error('title')
          <p class="error-msg">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="content">Scrivi</label>
          <textarea class="form-control @error('content') is-invalid
          @enderror"
          id="content"
          name="content"
          cols="30"
          rows="10"
          value="{{old('content')}}"></textarea>
          @error('content')
          <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div>
            <select class=" mb-3 form-select" aria-label="Default select example" name="category_id">
                <option value="">Seleziona la categoria</option>
                @foreach ($categories as $category)
                    <option @if ($category->id === old('category_id')) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-primary">CREA</button>
      </form>



  </form>
@endsection
