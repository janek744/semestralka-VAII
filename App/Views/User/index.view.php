<?php
$layout = 'auth';
/** @var Array $data */
?>
<title>DrevodomySlovakia - Login</title>
<section class="bodysize">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="text-center text-danger mb-3">
                            <?= @$data['message'] ?>
                        </div>
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                           required autofocus>
                                    <label class="form-label">Login</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input name="password" type="password" id="password" class="form-control"
                                           placeholder="Password" required>
                                    <label class="form-label">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="?c=user&a=register">Este nemas ucet ? Registruj sa</a></p>

                                <button class="btn btn-primary" type="submit" name="submit">Login
                                </button>
                            </form>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>