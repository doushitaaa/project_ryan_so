<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemOrder $itemOrder
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Item Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itemOrders form content">
            <?= $this->Form->create($itemOrder) ?>
            <fieldset>
                <legend><?= __('Add Item Order') ?></legend>
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
