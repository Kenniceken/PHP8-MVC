<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="<?= ROOT ?>Home" class="logo m-0 float-start"><?= APP_NAME ?></a>

                <ul
                        class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
                >
                    <li><a href="<?= ROOT ?>About_Us">About Us</a></li>
                    <li class="has-children">
                        <a href="<?= ROOT ?>Project">Projects</a>
                        <ul class="dropdown">
                            <li><a href="#">Buy Property</a></li>
                            <li><a href="#">Sell Property</a></li>
                            <li class="has-children">
                                <a href="#">Dropdown</a>
                                <ul class="dropdown">
                                    <li><a href="#">Sub Menu One</a></li>
                                    <li><a href="#">Sub Menu Two</a></li>
                                    <li><a href="#">Sub Menu Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= ROOT ?>Services">Services</a></li>

                    <li><a href="<?= ROOT ?>Contact_Us">Contact Us</a></li>

                    <?php if (isset($data['userData'])) : ?>
                        <li><a href="<?= ROOT ?>Users/profile">Profile</a></li>
                        <li><a href="<?= ROOT ?>Users/logout">Logout</a></li>
                    <?php else :; ?>
                        <li><a href="<?= ROOT ?>Users/login">Login</a></li>
                        <li><a href="<?= ROOT ?>Users/register">Register</a></li>
                    <?php endif; ?>

                </ul>

                <a
                        href="#"
                        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                        data-toggle="collapse"
                        data-target="#main-navbar"
                >
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>

