<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            /* background-color: #eee; */
        }
        .container{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        form{
            width: 40%;
            box-shadow: 1px 1px 4px 0 #888;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{route('auth.processLogin')}}" class="bg-secondary-subtle p-5" method="POST">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>The Message!</strong> {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
            @elseif(Session::has('error')) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>The Message!</strong> {{Session::get('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="form-header">
                <h3 class="text-center">LOGIN DASHBOARD</h3>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('email') is-invalid @enderror" name="password">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <p>
                Don't have an account ? 
                <a href="{{route('auth.register')}}">
                    Register here
                </a>
            </p>
        </form>
    </div>
    
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.bundle.min.js"></script>
</html>