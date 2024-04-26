@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration or Sign Up form in HTML CSS | CodingLab</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registration</p>
                                    <form method="POST" action="/registerpost" class="mx-1 mx-md-4"
                                        onsubmit="return validateForm()">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-user fa-lg"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope fa-lg"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter your email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-lock fa-lg"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Create password" required>
                                            </div>
                                        </div>
                                        <!-- Ajout de l'élément pour afficher les messages d'erreur -->
                                        <div id="message" class="text-danger"></div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block"
                                                value="Register Now">
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <h5>Already have an account? <a href="/login">Login now</a></h5>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var message = document.getElementById("message");

            var nameRegex = /^[a-zA-Z\s]+$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

            if (!name.match(nameRegex)) {
                message.innerHTML = "Veuillez entrer un nom valide";
                return false;
            }

            if (!email.match(emailRegex)) {
                message.innerHTML = "Veuillez entrer une adresse email valide";
                return false;
            }

            if (!password.match(passwordRegex)) {
                message.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, incluant au moins une minuscule, une majuscule et un chiffre";
                return false;
            }

            message.innerHTML = ""; // Efface tout message d'erreur précédent
            return true;
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
