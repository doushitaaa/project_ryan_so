<?php
$this->layout = 'login';
$this->layout = 'default';
?>


<html>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 card">
            <div class=" p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Add New User</h6>
                </div>
            </div>

            <div class="col-md-12 mb-lg-0 mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <!--View Users/Back button-->
                        <div class="col-6 pt-2 ">
                            <button class="btn btn-white">
                                <a href="<?= $this->Url->build('/users/index') ?>">
                                    <i class="fa fa-arrow-left fixed-plugin-button-nav cursor-pointer icon-appear"></i></a>
                                <?= $this->Html->link(__(' < View Users'), ['action' => 'index'], ['class' => 'btn btn-white text-disappear']) ?>
                            </button>
                        </div>
                    </div>
                </div>

                <!--Text regarding password requirements-->
                <div class="card-body p-3">
                    <div class=" mb-md-0 mb-4">
                        <div class="users text-center  text-secondary opacity-7 font-weight-bolder">Password
                            Requirements:
                        </div>
                        <div class="text-center  text-secondary opacity-7">

                            <br> - Password has to be 8-100 characters long
                            <br> - Has to contain at least one UPPERCASE letter and one lowercase letter
                            <br> - Has to contain at least one number
                            <!--Form to add user -->
                            <fieldset class="form-style form-control form-center">
                                <div class="col-md-6 mb-lg-0 mb-4" style="align-content: center; text-align:center;">
                                    <form method="post" action="add">
                                        <?= $this->Flash->render() ?>
                                        <div class="txt_field align-center form-control">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Enter email" required/>
                                            <span></span>
                                        </div>
                                        <div class="txt_field align-center form-control" style="min-width: 250px;position: relative;">
<!--                                            <label>Password</label>-->
<!--                                            <input id="password" type="password" name="password"-->
<!--                                                   placeholder="Enter password" required/>-->
                                            <?php
                                            echo $this->Form->control('password', [
                                                'id' => 'password', // Add an id to the input field for easy selection with JavaScript
                                            ]);
                                            ?>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const passwordField = document.getElementById('password');

                                                    passwordField.addEventListener('input', function () {
                                                        const value = this.value;
                                                        const capitalLetterPattern = /[A-Z]/;
                                                        const lowercaseLetterPattern = /[a-z]/;
                                                        const digitPattern = /\d/;
                                                        const lengthPattern = /^.{8,100}$/;
                                                        let message = '';

                                                        if (!capitalLetterPattern.test(value)) {
                                                            message = 'Please include a capital letter';
                                                        } else if (!lowercaseLetterPattern.test(value)) {
                                                            message = 'Please include at least one lowercase letter';
                                                        } else if (!digitPattern.test(value)) {
                                                            message = 'Please include at least one digit';
                                                        } else if (!lengthPattern.test(value)) {
                                                            message = 'Password must be between 8 and 100 characters long';
                                                        }

                                                        this.setCustomValidity(message);
                                                    });
                                                });
                                            </script>
                                            <div style="position: absolute;top: 13px;right: 55px;">
                                                <svg onclick="showpass()" id="showpass" class="showpass eye-container" height="1em"
                                                     viewBox="0 0 576 512"  style="margin:10px;">
                                                    <path
                                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                                </svg>
                                                <svg onclick="hidepass()" id="hidepass" height="1em" class="hidepass eye-container"
                                                     style="display:none; margin:10px;" viewBox="0 0 640 512">
                                                    <path
                                                        d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                                                </svg>
                                            </div>

                                        </div>

                                        <br>
                                        <div style="text-align: center; margin:10px;">
                                            <input type="submit" value="Add User" class="btn btn-primary"/>

                                        </div>
                                    </form>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>


<style>
    .message.error {
        background: #fcebea;
        color: #cc1f1a;
        border-color: #ef5753;
    }

    .requirements {
        padding: 20px;
    }

    .form-center {
        display: flex;
        justify-content: center;
    }

    .form-style {
        width: 100%;
        padding: 10px;
        text-align: left;
    }

    input {
        width: 40%;
        text-align: left;
    }

    label {
        width: 40%;
        padding: 10px;
        text-align: right;

    }

    eye-container{position: relative;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);

    }
</style>
