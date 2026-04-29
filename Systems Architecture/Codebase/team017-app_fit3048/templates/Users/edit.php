<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<html>
<!--Title Card Edit User-->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit
                            User <?= $this->Number->format($user->id) ?></h6>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <!--View Users/Back button-->
                            <div class="col-6 pt-2 ">
                                <button class="btn btn-white">
                                    <a href="<?= $this->Url->build('/users/index') ?>">
                                        <i class="fa fa-arrow-left fixed-plugin-button-nav cursor-pointer icon-appear"></i></a>
                                    <?= $this->Html->link(__('< Dashboard'), ['controller' => 'pages', 'action' => 'admin'], ['class' => 'text-disappear ']) ?>
                                </button>
                            </div>

                            <!--Add New User Button-->
                            <div class="col-6 text-end">
                                <button class="btn btn-white ">
                                    <a href="<?= $this->Url->build('/users/add') ?>">
                                        <i class="fa fa-plus fixed-plugin-button-nav cursor-pointer icon-appear btn btn-info"></i></a>
                                    <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ['class' => 'text-disappear text-white btn btn-info ']) ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--Text of Password requirements-->
                    <div class="card-body p-3">
                        <div class=" mb-md-0 mb-4">
                            <div class="users text-center  text-secondary opacity-7 font-weight-bolder">Password
                                Requirements:
                            </div>
                            <div class="text-center  text-secondary opacity-7">

                                <br> - Password has to be 8-100 characters long
                                <br> - Has to contain at least one UPPERCASE letter and one lowercase letter
                                <br> - Has to contain at least one number
                                <?= $this->Form->create($user) ?>
                                <fieldset class="form-style form-check">


                                    <?php
                                    echo $this->Form->control('email');
                                    echo $this->Form->control('password');
                                    echo $this->Form->control('role', ['label' => 'Admin?', 'class' => 'form-check-input ', 'type' => 'checkbox', 'id' => 'fcustomCheck1']);
                                    ?>
                                </fieldset>


                                <div class="col-lg-12">
                                    <?= $this->Form->button(__('Submit'),
                                        array('class' => 'btn btn-primary text-white',
                                        )) ?>
                                    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class' => 'btn btn-white text-primary', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>



                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .form-style {
        width: 100%;
        padding: 10px;
        text-align: left;
    }

    input {
        width: 20%;
        text-align: left;
    }

    button {

    }

    label {
        width: 50%;
        padding: 10px;
        text-align: right;

    }

    input[type="checkbox"] {
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        float: right;

    }

    checkbox {
        float: right;
        margin: 5px 0px;
        width: 200px;
    }

    .input.radio label {

    }
</style>
</html>
