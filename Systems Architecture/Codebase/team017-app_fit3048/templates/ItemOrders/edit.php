<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemOrder $itemOrder
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemOrder->uid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemOrder->uid), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Item Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itemOrders form content">
            <?= $this->Form->create($itemOrder) ?>
            <fieldset>
                <legend><?= __('Edit Item Order') ?></legend>
                <?php
                    echo $this->Form->control('item_uid');
                    echo $this->Form->control('qty');
                    echo $this->Form->control('price');
                    echo $this->Form->control('disc');
                    echo $this->Form->control('subtotal');
                    echo $this->Form->control('order_id', ['options' => $orders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
