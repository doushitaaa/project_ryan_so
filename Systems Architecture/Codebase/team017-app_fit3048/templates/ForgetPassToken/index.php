<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ForgetPassToken> $forgetPassToken
 */
?>
<div class="forgetPassToken index content">
    <?= $this->Html->link(__('New Forget Pass Token'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forget Pass Token') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('is_valid') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forgetPassToken as $forgetPassToken): ?>
                <tr>
                    <td><?= $forgetPassToken->has('user') ? $this->Html->link($forgetPassToken->user->id, ['controller' => 'Users', 'action' => 'view', $forgetPassToken->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($forgetPassToken->is_valid) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $forgetPassToken->user_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forgetPassToken->user_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forgetPassToken->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $forgetPassToken->user_id)]) ?>
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
