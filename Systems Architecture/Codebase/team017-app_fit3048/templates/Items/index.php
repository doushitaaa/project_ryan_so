<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Item> $items
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('uid') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('barcode') ?></th>
                    <th><?= $this->Paginator->sort('bale_qty') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('qty_available') ?></th>
                    <th><?= $this->Paginator->sort('weight') ?></th>
                    <th><?= $this->Paginator->sort('bin_loc') ?></th>
                    <th><?= $this->Paginator->sort('photo_uri') ?></th>
                    <th><?= $this->Paginator->sort('uri') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= h($item->uid) ?></td>
                    <td><?= h($item->number) ?></td>
                    <td><?= h($item->name) ?></td>
                    <td><?= h($item->barcode) ?></td>
                    <td><?= $this->Number->format($item->bale_qty) ?></td>
                    <td><?= $this->Number->format($item->price) ?></td>
                    <td><?= $this->Number->format($item->qty_available) ?></td>
                    <td><?= $this->Number->format($item->weight) ?></td>
                    <td><?= h($item->bin_loc) ?></td>
                    <td><?= h($item->photo_uri) ?></td>
                    <td><?= h($item->uri) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->uid]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->uid]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $item->uid)]) ?>
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
