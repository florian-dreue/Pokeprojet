<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\ORM\TableRegistry;
?>
<div class="pokemons" align="center">
    <br>
    <h3 align="center"><?= __('Dashboard') ?></h3>
    <div style="margin-right:2%;margin-left:2%;">
        <table>
            <tr style="background-color:rgb(220, 220, 220);">
                <td width=1%></td>
                <td width=45% style="border-color:white;">Poid moyen des pokemons de la 4G (en kg*10)</td>
                <td style="border-color:white;" width=auto>
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
                </td>
                <td width=1% border=none></td>
            </tr>
            <tr style="background-color:rgb(207, 207, 207);">
                <td width=1%></td>
                <td width=45% style="border-color:white;">Nombre de pokemons fée dans les génération 1,3 et 7</td>
                <td style="border-color:white;">
                    <?php
                        $début=1;
                        $fin=809;
                        $count=0;
                        for($i=$début;$i<=$fin;$i++){
                            if(($i>0 AND $i<152) OR ($i>253 AND $i<385) OR ($i>721 AND $i<810)){
                                $j=$i+820;
                                $tri = TableRegistry::getTableLocator()->get('pokemon_types')->find()->where(["pokemon_id = $j"]);
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
                </td>
                <td width=1% border=none></td>
            </tr>
            <tr style="background-color:rgb(197, 197, 197);">
                <td width=1%></td>
                <td width=45%>10 premier pokemons les plus rapide</td>
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
                                    $vite=TableRegistry::getTableLocator()->get('pokemons')->find()->where(["id=$vitesse->pokemon_id"]);
                                    ?>
                                    <table>
                                        <?php
                                            foreach($vite as $rapide){
                                        ?>
                                                <tr class="type--<?php
                                                    $firstcolor=true;
                                                    $recuptypes = TableRegistry::getTableLocator()->get('pokemon_types')->find()->where(["pokemon_id=$rapide->id"]);
                                                    foreach($recuptypes as $types){
                                                        $couleurtypes = TableRegistry::getTableLocator()->get('types')->find()->where(["id=$types->type_id"]);
                                                        foreach($couleurtypes as $couleur){
                                                            if($firstcolor){
                                                                $firstcolor=false;
                                                                echo $couleur->name;
                                                            }
                                                        }
                                                    }
                                                ?>">
                                                    <td style="border-color:rgb(97, 97, 97);" width=1%></td>
                                                    <td style="border-color:rgb(97, 97, 97);" width=15%>
                                                        <?php
                                                            echo $compte+1;
                                                        ?>
                                                    </td>
                                                    <td style="border-color:rgb(97, 97, 97);" width=30%><?php $id = $rapide->id; $id = $id -820; echo $id ?></td>
                                                    <td style="border-color:rgb(97, 97, 97);" width=30%>
                                                        <?= $this->Html->link(__(ucwords($rapide->name)), ['controller' => 'Pokemons','action' => 'view', $rapide->id], ['class' => "nav-link"]); ?>
                                                    </td>
                                                    <td style="border-color:rgb(97, 97, 97);" width=25%>
                                                        <img src="<?= $rapide->default_front_sprite_url ?>" alt="default sprite" width="90%">
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                            $compte+=1;
                                        ?>
                                    </table>
                                    <?php
                                }
                            }
                        }       ?>
                </td>
                <td border=none></td>
            </tr>
        </table>
        <br>
    </div>
</div>