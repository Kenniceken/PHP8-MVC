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





<?php $this->view("Layouts/footer", $data) ?>
