<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>

<!-- Nucleo Icons -->
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
<?= $this->Html->css(['nucleo-icons.css', 'nucleo-svg.css', 'material-dashboard.css']) ?>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


<!--All Users Table Card-->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">All Users</h6>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <!--Dashboard/Home button-->
                            <div class="col-6 pt-2 ">
                                <button class="btn btn-white">
                                    <a href="<?= $this->Url->build('/') ?>">
                                        <i class="fa fa-home fixed-plugin-button-nav cursor-pointer icon-appear"></i></a>
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

                    <!--Table of Users -->
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <!--Table Headings-->
                            <thead>
                            <tr>
                                <th class="text-uppercase  text-center text-secondary font-weight-bolder opacity-7 priority2"
                                <?= $this->Paginator->sort('id') ?>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('email') ?></th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 priority1"><?= $this->Paginator->sort('role') ?></th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 priority4"><?= $this->Paginator->sort('created') ?></th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7 priority3"><?= $this->Paginator->sort('modified') ?></th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <!--Table Database Information-->
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr style="text-align: center">
                                    <td class="mb-0 priority2 "><?= h($user->id) ?></td>
                                    <td class="mb-0 "><?= h($user->email) ?></td>
                                    <td class=" font-weight-bold mb-0 priority1"><?= h($user->role == 1 ? 'Admin' : 'Employee') ?></td>
                                    <td class="mb-0 priority4 "><?= h($user->created) ?></td>
                                    <td class="mb-0 priority3"><?= h($user->modified) ?></td>

                                    <td class="" style="text-align: center">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-info']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-info priority2']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], [
                                            'class' => 'btn btn-white text-primary priority2',
                                            'confirm' => __('Are you sure you want to delete {0}?', $user->email)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



