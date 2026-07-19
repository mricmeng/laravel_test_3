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
        <form class="bg-secondary-subtle p-5">
            <div class="form-header">
                <h3 class="text-center">LOGIN DASHBOARD</h3>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
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
</html>