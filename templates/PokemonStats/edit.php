<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PokemonStat $pokemonStat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pokemonStat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStat->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pokemon Stats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemonStats form content">
            <?= $this->Form->create($pokemonStat) ?>
            <fieldset>
                <legend><?= __('Edit Pokemon Stat') ?></legend>
                <?php
                    echo $this->Form->control('pokemon_id', ['options' => $pokemons]);
                    echo $this->Form->control('stat_id', ['options' => $stats]);
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
