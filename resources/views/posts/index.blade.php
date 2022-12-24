<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/fonts/FontAwesome.Pro.5.15.2.Web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   


    
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
</head>
@extends('layouts.app')

@section('content')

    <body>
      

      <div class="flex justify-center" style="text-align: center;">
          <div class="w-8/12" style="width: 8/12;">
              <form action="{{ route('posts.store') }}" method="POST" style="margin-bottom: 4px;">
                @csrf
                <div style="margin-bottom: 4px; ">
                  <label for="body" class="sr-only">Body</label>
                  <textarea name="body" id="body" cols="60" rows="10"
                  style="background-color: white; padding:4px;"
                    class="@error ('body') border-color:red; @enderror"
                  placeholder="Post something"></textarea>

                  @error('body')
                    <div class="" style="color: red; font-size:small;">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-8" style="margin-left: 3%;">
                  <button class="btn btn-primary p-4">
                    Post
                  </button>
                </div>
              </form>
              <div class="col-9" style="margin-left: 2%;">
                  @if($posts->count())
                  @foreach ($posts as $post)
                      <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                        <div>
                          <form action="{{ route('posts.destroy') }}" method="get" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-defualt" style="color: blue">Delete</button>
                          </form>
                        </div>

                        <div class="d-flex item-center" style="margin-left: 43%">
                          @auth
                            @if (!$post->likedBy(auth()->user()))
                              <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                  @csrf
                                  <button type="submit" class="btn btn-defualt" style="color: blue">Like</button>
                              </form>
                            @else
                              <form action="" method="get" class="mr-1">
                                @csrf
                                <button type="submit" class="btn btn-defualt" style="color: blue">Unlike</button>
                              </form>
                            @endif 
                          @endauth
                          
                          <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
                      </div>
                  @endforeach

                  {{ $posts->links() }}
                  @else 
                     <p>There are no posts</p>
                  @endif
               
              </div>
          </div>
      </div>
    </body>
</html>
@endsection