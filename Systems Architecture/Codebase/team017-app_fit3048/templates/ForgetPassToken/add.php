<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForgetPassToken $forgetPassToken
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Forget Pass Token'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forgetPassToken form content">
            <?= $this->Form->create($forgetPassToken) ?>
            <fieldset>
                <legend><?= __('Add Forget Pass Token') ?></legend>
                <?php
                    echo $this->Form->control('is_valid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
