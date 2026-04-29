<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->uid], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $order->uid), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->uid) ?></h3>
            <table>
                <tr>
                    <th><?= __('Shiptoaddress') ?></th>
                    <td><?= h($order->shiptoaddress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Uid') ?></th>
                    <td><?= h($order->customer_uid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Memo') ?></th>
                    <td><?= h($order->memo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uid') ?></th>
                    <td><?= $this->Number->format($order->uid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($order->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
