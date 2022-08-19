<?php
$this->view("Layouts/head", $data);
$this->view("Layouts/navBar", $data);
?>
    <div
        class="hero page-inner overlay"
        style="background-image: url('<?= ASSETS ?>images/hero_bg_3.jpg')"
    >
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up"><?= $pageTitle ?></h1>

                    <nav
                        aria-label="breadcrumb"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="<?= ROOT ?>Home">Home</a></li>
                            <li
                                class="breadcrumb-item active text-white-50"
                                aria-current="page"
                            >
                                <?= $pageTitle ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <h2 class="font-weight-bold heading text-primary mb-lg-5">User Login</h2>
                </div>
                <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                <?= checkErrors() ?>
                    <br>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-8 mb-3">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                    name='email'
                                    value="<?= isset($_POST['email']) ? $_POST['email'] : ""; ?>"
                                />
                            </div>
                            <div class="col-8 mb-3">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    name="password"
                                />
                            </div>

                            <div class="col-lg-8">
                                <input
                                    type="submit"
                                    value="Login"
                                    name="login"
                                    class="btn btn-primary"
                                />
                            </div>
                        </div>
                        <p>Don't have Account Yet? <a href="register">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php $this->view("Layouts/footer", $data) ?>