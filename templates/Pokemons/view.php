<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
use Cake\ORM\TableRegistry;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="row">
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <h3 class="PokeName" align="center"><?= h($pokemon->name) ?></h3>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">

                <div class="carousel-inner">
                    <div class="item">
                        <img src="<?= h($pokemon->sprite_shiny) ?>" alt="Shiny" width="40%">
                    </div>

                    <div class="item active">
                        <img src="<?= h($pokemon->default_front_sprite_url) ?>" alt="Default" width="40%">
                    </div>

                    <div class="item">
                        <img src="<?= h($pokemon->sprite_back) ?>" alt="Back" width="40%">
                    </div>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background:rgb(228, 228, 228);">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background:rgb(228, 228, 228);">
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </a>
            </div>
            <br>
            <div class="color_type1" align="left"><table class="types" border="2"><tr><td class="type--<?= h($pokemon->first_type) ?>"><?= h($pokemon->first_type) ?></td></tr></table></div>
            <?php if ($pokemon->has_second_type) : ?>
                <div class="color_type2" align="right"><table class="types" border="2"><tr><td class="type--<?= h($pokemon->second_type) ?>"><?= $pokemon->second_type ?></td></tr></table></div>
            <?php endif ?>
            <br>
            <br>
            <div class="related">
                <?php if (!empty($pokemon->pokemon_stats)) : ?>
                    <div class="table-responsive">
                        <table class="stats" border="5">
                            <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                                <tr>
                                    <?php
                                        $query = TableRegistry::getTableLocator()->get('stats')->find();
                                        $query
                                        ->where(["id = $pokemonStats->stat_id"]);
                                        foreach ($query as $article) { ?>
                                            <td class="types"><?php echo $article->name;?></td>
                                            <td class="types"><?= h($pokemonStats->value) ?></td>
                                            <?php } 
                                    ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
