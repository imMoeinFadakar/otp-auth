
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
        <?php 
        if(isset($errors)){


            $errorArray =  $errors->all();  

            foreach ($errorArray as $errorArrayUnite){
    
                echo $errorArrayUnite . "<br>";
    
            }

        }
        if(isset($message)){

            echo $message;
            unset($message);
        }

        ?>  

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5 justify-content-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        otp Auth <br />
                        <span style="color: hsl(218, 81%, 75%)">Register Page</span>
                    </h1>
               
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form  method="post" action="/post-register"  >
                                <!-- Name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="name" id="name" class="form-control" />
                                    <label class="form-label" for="name">Name</label>
                                </div>

                                <!-- Phone input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="phone" id="phone" class="form-control" />
                                    <label class="form-label" for="phone">Phone</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control" />
                                    <label class="form-label" for="email">Email address</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="remember-me" checked />
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>
                                <hr>
                                <!-- Register buttons -->
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <p class="text-start fs-5">If you sign up before:</p>
                                    </div>
                                    <div class="col-6  d-flex justify-content-end">
                                        <a href="" class="btn btn-success btn-small mb-4">
                                            login
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>