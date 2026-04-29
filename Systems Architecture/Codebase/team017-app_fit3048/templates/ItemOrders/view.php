<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemOrder $itemOrder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item Order'), ['action' => 'edit', $itemOrder->uid], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item Order'), ['action' => 'delete', $itemOrder->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $itemOrder->uid), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Item Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itemOrders view content">
            <h3><?= h($itemOrder->uid) ?></h3>
            <table>
                <tr>
                    <th><?= __('Item Uid') ?></th>
                    <td><?= h($itemOrder->item_uid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $itemOrder->has('order') ? $this->Html->link($itemOrder->order->uid, ['controller' => 'Orders', 'action' => 'view', $itemOrder->order->uid]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Uid') ?></th>
                    <td><?= $this->Number->format($itemOrder->uid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($itemOrder->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($itemOrder->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Disc') ?></th>
                    <td><?= $this->Number->format($itemOrder->disc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($itemOrder->subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
