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
<div>
    <div class="column-responsive column-80">
        <div class="pokemons view content" style="margin-left:10%; margin-right:10%;">
            <h3 class="PokeName" align="center"><?= h($pokemon->name) ?></h3>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner"">
                    <?php if(!empty($pokemon->shiny_front_sprite_url)){ ?>
                        <div class="item" align="center">
                            <img src="<?= h($pokemon->shiny_front_sprite_url) ?>" alt="Shiny front" width="40%">
                        </div>
                    <?php } else{ ?>
                        <div class="item" align="center" style="margin-top:15%; margin-bottom:20.25%">
                            <img src="<?= h($pokemon->shiny_front_sprite_url) ?>" alt="Shiny front" width="40%">
                        </div>
                    <?php } ?>
                    <?php if(!empty($pokemon->shiny_back_sprite_url)){ ?>
                        <div class="item" align="center">
                            <img src="<?= h($pokemon->shiny_back_sprite_url) ?>" alt="Shiny back" width="40%">
                        </div>
                    <?php } else{ ?>
                        <div class="item" align="center" style="margin-top:15%; margin-bottom:20.25%">
                            <img src="<?= h($pokemon->shiny_back_sprite_url) ?>" alt="Shiny back" width="40%">
                        </div>
                    <?php } ?>
                    <?php if(!empty($pokemon->default_front_sprite_url)){ ?>
                        <div class="item active" align="center">
                            <img src="<?= h($pokemon->default_front_sprite_url) ?>" alt="Default" width="40%">
                        </div>
                    <?php } else{ ?>
                        <div class="item active" align="center" style="margin-top:15%; margin-bottom:20.25%">
                            <img src="<?= h($pokemon->default_front_sprite_url) ?>" alt="Default" width="40%">
                        </div>
                    <?php } ?>
                    <?php if(!empty($pokemon->default_back_sprite_url)){ ?>
                        <div class="item" align="center">
                            <img src="<?= h($pokemon->default_back_sprite_url) ?>" alt="Default" width="40%">
                        </div>
                    <?php } else{ ?>
                        <div class="item" align="center" style="margin-top:15%; margin-bottom:20.25%">
                            <img src="<?= h($pokemon->default_back_sprite_url) ?>" alt="Back" width="40%">
                        </div>
                    <?php } ?>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background:rgb(228, 228, 228);">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background:rgb(228, 228, 228);">
                    <span class="glyphicon glyphicon-arrow-right"></span>
                </a>
            </div>
            <br>
            
            <?php if ($pokemon->has_second_type) : ?>
                <div class="color_type1" align="left"><table class="types"><tr>
                    <td style="border-radius:10px; padding-left:6px;padding-right:6px; padding-top:2px; padding-bottom:2px;" class="type--<?= h($pokemon->first_type) ?>"><?= h($pokemon->first_type) ?></td>
                </tr></table></div>
                <div class="color_type2" align="right"><table class="types"><tr>
                    <td style="border-radius:10px; padding-left:6px;padding-right:6px; padding-top:2px; padding-bottom:2px;" class="type--<?= h($pokemon->second_type) ?>"><?= $pokemon->second_type ?></td>
                </tr></table></div>
            <?php else: ?>
                <div style="width:min-content; margin:auto;" class="color_type_unique"><table class="types"><tr>
                    <td style="border-radius:10px; padding-left:6px;padding-right:6px; padding-top:2px; padding-bottom:2px;" class="type--<?= h($pokemon->first_type) ?>"><?= h($pokemon->first_type) ?></td>
                </tr></table></div>
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
                                        $requete = TableRegistry::getTableLocator()->get('stats')->find()->where(["id = $pokemonStats->stat_id"]);
                                        foreach ($requete as $stats) { ?>
                                            <td class="types"><?php echo $stats->name;?></td>
                                            <td class="types"><?= h($pokemonStats->value) ?></td>
                                    <?php }  ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
