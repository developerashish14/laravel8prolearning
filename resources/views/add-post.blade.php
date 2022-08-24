<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Add New Post</h2>


        @if(Session::has('post_created')) 
            <div class="alert alert-success" role = "alert">
                {{Session::get('post_created')}}
            </div>
        @endif

<form action="{{ route('posts.addPostSubmit') }}" method="post">
    
    @csrf
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Post Title</b></label>
    <input type="text" placeholder="Enter Username" name="title" required>
    @error('email')
        <span class="text-danger">{{$message}}</span>   
    @enderror

    <label for="psw"><b>Post descriptiton</b></label>
    <input type="password" placeholder="Enter Password" name="body" required>
    @error('password')
        <span class="text-danger">{{$message}}</span>
    @enderror 
    <button type="submit">Login</button>

  </div>

 
</form>

</body>
</html>