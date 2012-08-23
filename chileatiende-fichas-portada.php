<div class="cha_fichas">
    <ul>
        <?php
        $alasFichas = ($lasFichas) ? explode(',', $lasFichas) : array();
        
        foreach ($aFichasServicio->fichas->items as $key => $ficha) {
            //mostramos las fichas específicas de un servicio
            if (count($alasFichas)) {
                $aData = explode('/', $ficha->permalink);
                $idFicha = $aData[5];//corresponde 
                if (in_array($idFicha, $alasFichas)) {
                    ?>
                    <li><a href="<?= $ficha->permalink ?>" target="_blank"><?= $ficha->titulo ?></a></li>
                    <?php
                }
            } else {
                //mostramos todas las fichas
                if ($nroFichas == 0) {
                    ?>
                    <li><a href="<?= $ficha->permalink ?>" target="_blank"><?= $ficha->titulo ?></a></li>
                    <?php
                }
                //se muestra un nro determinado de fichas
                if ($key < $nroFichas) {
                    ?>
                    <li><a href="<?= $ficha->permalink ?>" target="_blank"><?= $ficha->titulo ?></a></li>
                    <?php
                }
            }
        }
        ?>
    </ul>
</div>