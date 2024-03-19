<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <style>
        /* Custom CSS */
        .login-container {
            margin-top: 100px;
        }

        .login-form {
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6">
                <div class="card login-form">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login Form</h5>
                        <form action="{{ route('loginpost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group text-right">
                                <a href="/forgetpassword">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @endif
                            <span style="color:red;"></span>
                            Not a member? <a href="/register">Signup now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
