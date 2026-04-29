<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--View Users Title Card-->
<html><div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">View User Profile</h6>
                    </div>
                </div>


                <?php if($user->role == 1) {?>
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <!--Dashboard/Home button-->
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
                        <?php
                        }?>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class=" mb-md-0 mb-4">
                                    <div class="card card-body border card-plain border-radius-lg boxed" style=" text-align:center">
                                        <table class="text-align-center" >
                                            <tr style="padding:5px">
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"><?= __('Id') ?></th>
                                                <td class="mb-0 " ><?= $this->Number->format($user->id) ?></td>
                                            </tr>
                                            <tr>
                                                <th  class="text-center text-uppercase text-secondary font-weight-bolder opacity-7" ><?= __('Email') ?></th>
                                                <td data-th=""class=" " ><?= h($user->email) ?></td>
                                            </tr>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"><?= __('Role') ?></th>
                                                <td class=" " ><?= $user->role == 1 ? 'Admin' : 'Employee' ?></td>
                                            </tr>
                                            <tr>
                                                <th class=" priority4 text-center text-uppercase text-secondary font-weight-bolder opacity-7"><?= __('Created') ?></th>
                                                <td class="mb-0 priority4 " ><?= h($user->created) ?></td>
                                            </tr>
                                            <tr class="priority4">
                                                <th class="priority4 text-center text-uppercase text-secondary font-weight-bolder opacity-7"><?= __('Modified') ?></th>
                                                <td class="priority4 mb-0" ><?= h($user->modified) ?></td>
                                            </tr>
                                        </table>
                                        <?php if($user->role == 1) {
                                        ?>
                                    </div>
                                         <div class="card-body p-3"">
                                        <div class="col-lg-12 text-center">


                                            <div class="">


                                            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-info'], ['style' => 'width:20%']) ?>
                                            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['class' => 'btn btn-white text-primary','confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                        </div>
                                            </td>
                                            <?php
                                        }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<style>
    th{
        padding:20px
    }


    @media only screen and (max-width: 400px) {
        thead th:not(:first-child) {
            display: none;

        }

        td, th {
            display: block;
            padding:10px; !important;
        }

        td[data-th]:before {
            content: attr(data-th);

        }
    }



    /*@media only screen and (max-width: 960px) {*/
    /*    thead th:not(:first-child) {*/
    /*        display: none;*/
    /*    }*/

    /*    td, th {*/
    /*        display: block;*/
    /*    }*/

    /*    td[data-th]:before {*/
    /*        content: attr(data-th);*/
    /*    }*/
    /*}*/

    /*.customer-table {*/
    /*    text-align: start;*/
    /*    margin-left: 80px;*/
    /*}*/

</style>

    </html>
