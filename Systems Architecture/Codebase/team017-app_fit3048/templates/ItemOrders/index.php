<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ItemOrder> $itemOrders
 */
?>
<div class="itemOrders index content">
    <?= $this->Html->link(__('New Item Order'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Item Orders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('uid') ?></th>
                    <th><?= $this->Paginator->sort('item_uid') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('disc') ?></th>
                    <th><?= $this->Paginator->sort('subtotal') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itemOrders as $itemOrder): ?>
                <tr>
                    <td><?= $this->Number->format($itemOrder->uid) ?></td>
                    <td><?= h($itemOrder->item_uid) ?></td>
                    <td><?= $this->Number->format($itemOrder->qty) ?></td>
                    <td><?= $this->Number->format($itemOrder->price) ?></td>
                    <td><?= $this->Number->format($itemOrder->disc) ?></td>
                    <td><?= $this->Number->format($itemOrder->subtotal) ?></td>
                    <td><?= $itemOrder->has('order') ? $this->Html->link($itemOrder->order->uid, ['controller' => 'Orders', 'action' => 'view', $itemOrder->order->uid]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $itemOrder->uid]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemOrder->uid]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemOrder->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $itemOrder->uid)]) ?>
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
