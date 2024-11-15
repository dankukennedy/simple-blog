<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    @auth 
    <p class="text-green-500">Congrats you are logged in</p>
    <form action="/logout" method="POST">
    @csrf
    <button>Log Out</button>
    </form>

    <div  class="border-gray-400">
        <h2 class="text-green-500">Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="body content...."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div class="border-gray-400" >
         <h2 class="text-green-500">All Posts</h2>
         @foreach ($posts as $post)
         <div  class=" border-gray-200 bg-white text-sm text-green-700 shadow-sm">
              <h3>{{$post['title']}} by {{$post->user->name}}</h3>
              {{$post['body']}}
              <p>Created on {{$post['created_at']}}</p>
              <p>Updated on {{$post['updated_at']}}</p>
              <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
              <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
              </form>
         </div>
         @endforeach
    </div>

    @else
    
    <div  class="border-gray-400">
        <h2 class="text-green-500">Register</h2>
        <form action="/register" method="POST">
           @csrf
           <input type="text" name="name" placeholder="name">
           <input type="text" name="email" placeholder="email">
           <input type="password" name="password" placeholder="password">
           <button>Register</button>
        </form>
    </div>

    <div  class="border-gray-400">
        <h2 class="text-green-500">Login</h2>
        <form action="/login" method="POST">
           @csrf
           <input type="text" name="loginname" placeholder="name" >
           <input type="password" name="loginpassword" placeholder="password">
           <button>Login</button>
        </form>
    </div>
    @endauth
    
</body>
</html>