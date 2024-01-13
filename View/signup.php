<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- cdn CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--  Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</head>

<body>


    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class=" w-50 d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img class=" w-100" src="assets/img/LogoN.svg" alt="" style="max-height: none;">
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>
                                    <?php
                                    if (isset($errors['data'])) {
                                    ?>
                                        <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                                            insert all your information
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                    } ?>

                                    <form id="formSinup" action="/WikiTM/signup" class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Name</label>
                                            <input type="text" name="username" class="form-control" id="yourName" required>
                                            <div class="text-danger"><?php if (isset($errors['name'])) echo $errors['name']; ?></div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                                            <div class="text-danger"><?php if (isset($errors['email'])) echo $errors['email']; ?></div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="text-danger"><?php if (isset($errors['password'])) echo $errors['password']; ?></div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourimage" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="yourimage">
                                            <div id="Error-image" class="text-danger"><?php if (isset($errors['image'])) echo $errors['image']; ?></div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                                        </div>
                                    </form>
                                    <script>
                                        document.getElementById('formSinup').addEventListener('submit', function(event) {

                                            var name = document.getElementById('yourName');
                                            var email = document.getElementById('yourEmail');
                                            var password = document.getElementById('yourPassword');
                                            var imageInput = document.getElementById("yourimage");
                                            var imageM = document.getElementById("Error-image");


                                            if (!isValidEmail(email.value)) {
                                                email.classList.add('is-invalid');
                                                email.classList.remove('is-valid');
                                                event.preventDefault();
                                            } else {
                                                email.classList.add('is-valid');
                                                email.classList.remove('is-invalid');
                                            }

                                            if (!isValidPassword(password.value)) {
                                                password.classList.add('is-invalid');
                                                password.classList.remove('is-valid');
                                                event.preventDefault();
                                            } else {
                                                password.classList.add('is-valid');
                                                password.classList.remove('is-invalid');
                                            }

                                            if (!isValidName(name.value)) {
                                                name.classList.add('is-invalid');
                                                name.classList.remove('is-valid');
                                                event.preventDefault();
                                            } else {
                                                name.classList.add('is-valid');
                                                name.classList.remove('is-invalid');
                                            }
                                            if (!validateImage(imageInput.value)) {
                                                imageInput.classList.add('is-invalid');
                                                imageInput.classList.remove('is-valid');
                                                imageM.innerHTML = "Veuillez sélectionner un fichier avec une extension valide(JPG, JPEG, PNG, SVG).";
                                                event.preventDefault();
                                            } else {
                                                imageInput.classList.add('is-valid');
                                                imageInput.classList.remove('is-invalid');
                                                imageM.innerHTML = "";
                                            }

                                        });
                                        

                                        function isValidName(name) {
                                            var nameRegex = /^[A-Za-z\s]+$/;
                                            return nameRegex.test(name);
                                        }

                                        function isValidEmail(email) {
                                            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                            return emailRegex.test(email);
                                        }

                                        function isValidPassword(password) {
                                            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
                                            return passwordRegex.test(password);
                                        }

                                        function validateImage(image) {
                                            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg)$/i;
                                            if (!allowedExtensions.exec(image)) {
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        }
                                    </script>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

</body>

</html>