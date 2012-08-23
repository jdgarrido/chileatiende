<div id="message" class="<?=$msj_class?>"><?=$msj?></div>
<div class="wrap">
    <h2>Configuración despliegue Fichas Chileatiende</h2>
    
    <ul class="pasos">
        <li>Primero debes ingresar tu Código de acceso (access_token) y guardar</li>
        <li>A continuación, debes seleccionar el Servicio del cual deseas obtener las fichas.</li>
        <li>En el campo Fichas, debes ingresar las fichas que SOLO deseas que aparezcan, si deseas que aparezcan todas deja este campo en blanco</li>
        <li>El campo Número de fichas define cuantas fichas se mostraran, este filtro se anulará si el campo Fichas tiene datos</li>
        <li>Finalmente copia y pega el siguiente código en tu template <code>&lt;?= chileatiende_fichasportada() ?&gt;</code></li>
    </ul>

    <form method="post" name="elFormulario" action="">
        <?= settings_fields('chileatiende_options'); ?>
        <h3>Configuración General</h3>
        <table class="form-table">
            <tr>
                <th scope="row">Código de acceso (access_token)</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Código de acceso (access_token)</span></legend>
                        <label for="cha_access_token">
                            <input type="text" name="cha_access_token" id="cha_access_token" value="<?php echo (get_option('cha_access_token')) ? get_option('cha_access_token') : '' ?>" />
                            <a href="https://www.chileatiende.cl/desarrolladores/access_token">Puedes solicitar tu código de acceso desde acá</a>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <?php
            if (get_option('cha_access_token')) {
                $aData = chileatiende_getServicios(get_option('cha_access_token'));
                $aServicios = $aData->servicios->items->servicio;
            ?>
            <tr>
                <th scope="row">Servicios</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Servicio</span></legend>
                        <label for="cha_servicios">
                            <select name="cha_servicio" id="cha_servicio">
                                <option value="0">Seleccione el Servicio</option>
                                <?php
                                foreach( $aServicios as $servicio ) {
                                    $selected = (get_option('cha_servicio') == $servicio->id) ? 'selected="selected"' : '';
                                ?>
                                <option value="<?=$servicio->id?>" <?=$selected?>><?=$servicio->nombre?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">Fichas</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Fichas</span></legend>
                        <label for="cha_fichas">
                            <input type="text" name="cha_fichas" id="cha_fichas" placeholder="Ingrese los ID de fichas separadas por coma" value="<?= (get_option('cha_fichas')) ? get_option('cha_fichas') : ''; ?>" size="74" />
                            <p class="description">por ejemplo: 11488,13110,1,20</p>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row">Nro de fichas a desplegar</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text">Número de fichas a desplegar</legend>
                        <label for="cha_nrofichas">
                            <input type="text" size="3" name="cha_nrofichas" id="cha_nrofichas" value="<?= (get_option('cha_nrofichas')) ? get_option('cha_nrofichas') : 0; ?>" />
                            <span>0 para mostrar todas las fichas</span>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <?php submit_button(); ?>
        <input type="hidden" name="chileatiende_update" value="true" />
    </form>
</div>