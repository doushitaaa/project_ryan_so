<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForgetPassToken $forgetPassToken
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Forget Pass Token'), ['action' => 'edit', $forgetPassToken->user_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Forget Pass Token'), ['action' => 'delete', $forgetPassToken->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $forgetPassToken->user_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Forget Pass Token'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forget Pass Token'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forgetPassToken view content">
            <h3><?= h($forgetPassToken->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $forgetPassToken->has('user') ? $this->Html->link($forgetPassToken->user->id, ['controller' => 'Users', 'action' => 'view', $forgetPassToken->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Valid') ?></th>
                    <td><?= $this->Number->format($forgetPassToken->is_valid) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
