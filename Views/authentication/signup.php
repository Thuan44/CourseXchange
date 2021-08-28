<div class="container-fluid w-100 p-0 login-page-container">
    <div class="row">
        <div class="col-md-6 px-0">
            <div class="login-logo-container">
                <img src="<?= PUBLIC_DIRECTORY . '/src/' . 'logo-epsi.png' ?>" alt="logo EPSI" class="w-100">
            </div>
            <div class="login-left d-flex justify-content-center align-items-center">
                <img src="<?= PUBLIC_DIRECTORY . '/src/' . 'welcome.svg' ?>" alt="login image" class="w-50 login-img">
            </div>
        </div>
        <div class="col-md-6 col-xs-12 px-0">
            <div class="login-right">
                <div class="login-form d-flex justify-content-center align-items-center h-100 flex-column">
                    <h3 class="login-title text-center mb-4">Course<span class="text-uppercase">X</span>change</h3>
                    <div class="form-container rounded p-5">
                        <form class="form" action="/CourseXchange/signup" method="POST">
                            <h4 class="text-center mb-3 signup-title">Créer un compte</h4>

                            <?php if (isset($_SESSION['userAlreadyExists']) && $_SESSION['userAlreadyExists'] === true) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <small>
                                        <?= 'Nom d\'utilisateur non-disponible'; ?>
                                    </small>
                                </div>
                            <?php } ?>

                            <?php if (isset($_SESSION['errors'])) { ?>

                                <?php foreach ($_SESSION['errors'] as $errorsArray) { ?>
                                    <div class="mb-3">
                                        <?php foreach ($errorsArray as $errors) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php foreach ($errors as $error) { ?>
                                                    <small>
                                                        <?= $error . '<br>'; ?>
                                                    </small>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            <?php } ?>

                            <?php session_destroy(); ?>

                            <input type="text" class="form-control mb-2" placeholder="Nom d'utilisateur" name="user_name" value="">
                            <input type="password" class="form-control mb-2" placeholder="Mot de passe" name="user_password" value="">
                            <input type="password" class="form-control mb-2" placeholder="Confirmer mot de passe" name="password_confirmation" value="">
                            <button type="submit" class="btn w-100 login-btn rounded text-white mb-3">Créer compte</button>
                        </form>
                        <div class="signup-group mx-auto text-center">
                            <a href="/CourseXchange/login" class="text-decoration-none"><i class="fas fa-arrow-left"></i> Connexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>