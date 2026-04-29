<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html lang="en">
<head>

    <title>

        Material Dashboard 2 by Creative Tim
    </title>

</head>

<main class="main-content">


    <!--Doormat Welcome Image -->
    <div class="container-fluid px-2 px-md-4">
        <?= $this->Flash->render() ?>
        <div class="page-header min-height-300 border-radius-xl mt-4"
             style="background-image: url(webroot/img/doormatWelcome.jpg)">
            <span class="mask  bg-gradient-dark opacity-6"></span>
        </div>

        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="container-fluid py-4">

                    <!--Dashboard Cards -->
                    <div class="row mt-4">
                        <!--Barcode Scanner Card-->
                        <div class="col-lg-4 col-md-6 mt-4 mb-4">
                            <div class="card z-index-2 shadow-dark border-radius-lg py-3 pe-1">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                </div>
                                <a href="<?= $this->Url->build("/customers/search") ?>">
                                    <div class="card-body">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">note_add</i>
                                        </div>
                                        <!--Large Title Card-->
                                        <div class="text-end pt-1">
                                            <h5 class="h5-small mb-0">Create New Order</h5>

                                        </div>

                                        <!--Small information for card-->
                                        <hr class="dark horizontal">
                                        <div class="d-flex">
                                            <p class="card-color-text"> Scan Barcodes </p>
                                        </div>
                                        <div class="d-flex ">
                                            <p class=" text-sm"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <!--Reload Customers Card-->
                        <div class="col-lg-4 col-md-6 mt-4 mb-4">
                            <div class="card z-index-2 shadow-dark border-radius-lg py-3 pe-1">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                </div>
                                <a href="<?= $this->Url->build("/customers/loadCustomer") ?>">
                                    <div class="card-body">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">cached</i>
                                        </div>
                                        <!--Large Title Card-->
                                        <div class="text-end pt-1">
                                            <h5 class="h5-small mb-0">Reload Customers</h5>

                                        </div>
                                        <!--Small information for card-->
                                        <hr class="dark horizontal">
                                        <div class="d-flex">
                                            <p class="card-color-text">Reload Customers</p>
                                        </div>

                                        <div class="d-flex ">
                                            <p class=" text-sm"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <!--Reload Items Card-->
                        <div class="col-lg-4 col-md-6 mt-4 mb-4">
                            <div class="card z-index-2 shadow-dark border-radius-lg py-3 pe-1">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                </div>
                                <a href="<?= $this->Url->build("/items/loadItem") ?>">
                                    <div class="card-body">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">cached</i>
                                        </div>
                                        <!--Large Title Card-->
                                        <div class="text-end pt-1">
                                            <h5 class="h5-small mb-0">Reload Items</h5>

                                        </div>
                                        <!--Small information for card-->
                                        <hr class="dark horizontal">

                                        <div class="d-flex">
                                            <p class="card-color-text">Reload Items</p>
                                        </div>
                                        <div class="d-flex ">
                                            <p class=" text-sm"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <?php if ($currentUser['role'] == 1) {
                    ?>
                    <div class="row mt-4">
                        <!--View Users Card -->
                        <div class="col-lg-4 col-md-6 mt-4 mb-4">
                            <div class="card z-index-2   shadow-dark border-radius-lg py-3 pe-1">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                </div>
                                <a href="<?= $this->Url->build("/users/index") ?>">

                                    <div class="card-body">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">person</i>
                                        </div>
                                        <!--Large Title Card-->
                                        <div class="text-end pt-1">
                                            <h5 class="h5-small mb-0">View User</h5>

                                        </div>
                                        <!--Small information for card-->
                                        <hr class="dark horizontal">
                                        <div class="d-flex ">
                                            <p class="card-color-text">Show list of all Users </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <!--Add User Card -->
                        <div class="col-lg-4 col-md-6 mt-4 mb-4">
                            <div class="card z-index-2   shadow-dark border-radius-lg py-3 pe-1">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                </div>
                                <a href="<?= $this->Url->build("/users/add") ?>">
                                    <div class="card-body">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">add</i>
                                        </div>

                                        <div class="text-end pt-1">
                                            <h5 class="h5-small mb-0">Add User</h5>

                                        </div>
                                        <hr class="dark horizontal">
                                        <div class="d-flex ">
                                            <p class="card-color-text">Add New System User </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</main>

</div>
</main>
</main>

<!--   Core JS Files   -->
<script type="module" src="./js/core/popper.min.js"></script>
<script type="module" src="./js/core/bootstrap.min.js"></script>
<script type="module" src="./js/plugins/perfect-scrollbar.min.js"></script>
<script type="module" src="./js/material-dashboard.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
</body>

<style>
    .height-100vh {
        height: 100vh;
    }

</style>
</html>
