@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Index Crud</h1>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
              <th scope="row">{{$post->id}}</th>
              <td >{{$post->title}}</td>
              <td >{{$post->category ? $post->category->name : ' '}}</td>
              <td>
                  <a class="btn btn-outline-primary" href="{{route('admin.posts.show', $post)}}" >SHOW</a>
                  <a class="btn btn-outline-success" href="{{route('admin.posts.edit', $post)}}" >MODIFICA</a>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$posts->links()}}
      <div class="container">
        @foreach ($categories as $category)
        <h3>{{$category->name}}</h3>
            <ul>
                @forelse ($category->posts as $post)
                    <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
                    @empty
                    <li>Non sono presenti post per questa categoria</li>
                @endforelse
            </ul>
        @endforeach
      </div>

</div>
@endsection
