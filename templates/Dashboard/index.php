<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\ORM\TableRegistry;
?>
<div class="pokemons" align="center">
    <br>
    <h3 align="center"><?= __('Dashboard') ?></h3>
    <table style="margin-left:2%;">
        <tr><td width=45% style="border-color:white;">Poid moyen des pokemons de la 4G (en kg*10)</td>
        <td style="border-color:white;">
            <?php
                $début=387;
                $fin=493;
                $somme=0;
                $count=0;
                for($i=$début;$i<=$fin;$i++){
                    $parcour = TableRegistry::getTableLocator()->get('pokemons')->find()->where(["pokedex_number = $i"]);
                    foreach($parcour as $poid){
                        $somme=$somme+ $poid->weight;
                    }
                    $count+=1;
                }
                echo round($somme/$count,2);
            ?>
        </td></tr>
        <tr><td width=45% style="border-color:white;">Nombre de pokemons fée dans les génération 1,3 et 7</td>
        <td style="border-color:white;">
            <?php
                $début=1;
                $fin=809;
                $count=0;
                for($i=$début;$i<=$fin;$i++){
                    if(($i>0 AND $i<152) OR ($i>253 AND $i<385) OR ($i>721 AND $i<810)){
                        $tri = TableRegistry::getTableLocator()->get('pokemon_types')->find()->where(["pokemon_id = $i"]);
                        foreach($tri as $trier){
                            $type = TableRegistry::getTableLocator()->get('types')->find()->where(["id = $trier->type_id"]);
                            foreach($type as $types){
                                if($types->name=='fairy'){
                                    $count+=1;
                                }
                            }
                        }
                    }
                }
                echo $count;
            ?>
        </td></tr>
        <tr><td width=45%>10 premier pokemons les plus rapide</td>
        <td>
            <?php
                $début=1;
                $fin=898;
                $compte=0;
                for($i=$début;$i<=$fin;$i++)
                {
                    $trivit = TableRegistry::getTableLocator()->get('pokemon_stats')->find()->where(["stat_id = 6"])->order(["value" => "DESC"]);
                    foreach($trivit as $vitesse){
                        if($compte<10){
                            $vite=TableRegistry::getTableLocator()->get('pokemons')->find()->where(["pokedex_number=$vitesse->pokemon_id"]);
                            ?>
                            <table>
                                <?php
                                foreach($vite as $rapide){
                                    ?>
                                    <tr><td style="border-color:white;" width=15%>
                                            <?php
                                                echo $compte+1;
                                            ?>
                                        </td><td style="border-color:white;" width=15%><?php echo $rapide->id ?></td>
                                        <td style="border-color:white;" width=20%>
                                            <?= $this->Html->link(__(ucwords($rapide->name)), ['controller' => 'Pokemons','action' => 'view', $rapide->id], ['class' => "nav-link"]); ?>
                                        </td><td style="border-color:white;" width=50%>
                                            <img src="<?= $rapide->default_front_sprite_url ?>" alt="default sprite" width="30%">
                                        </td>
                                    </tr>
                                <?php
                                }
                                $compte+=1;?>
                            </table><?php
                        }
                    }
                }
            ?>
        </td>
        </tr>
    </table>
</div>