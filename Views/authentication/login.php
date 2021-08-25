    <div class="container-fluid w-100 p-0 login-page-container">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="login-logo-container">
                    <img src="<?= PUBLIC_DIRECTORY . '/src/' . 'logo-epsi.png' ?>" alt="logo EPSI" class="w-100">
                </div>
                <div class="login-left d-flex justify-content-center align-items-center">
                    <img src="<?= PUBLIC_DIRECTORY . '/src/' . 'login_img.svg' ?>" alt="login image" class="w-50 login-img">
                </div>
            </div>
            <div class="col-md-6 col-xs-12 px-0">
                <div class="login-right">
                    <div class="login-form d-flex justify-content-center align-items-center h-100 flex-column">
                        <h3 class="login-title text-center mb-4">Course<span class="text-uppercase">X</span>change</h3>
                        <div class="form-container rounded p-5">
                            <form class="form" action="/CourseXchange/login">
                                <input type="text" class="form-control mb-2" placeholder="Nom d'utilisateur">
                                <input type="password" class="form-control mb-2" placeholder="Mot de passe">
                                <button class="btn w-100 login-btn rounded text-white mb-3">Se connecter</button>
                            </form>
                            <div class="signup-group mx-auto text-center">
                                <p class="d-inline-block mb-0">Pas encore inscrit ?</p>
                                <a href="#" class="text-decoration-none">Créer un compte</a>
                                <div class="small-divider"></div>
                                <a href="#" class="text-decoration-none"><small>Mot de passe oublié ?</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>