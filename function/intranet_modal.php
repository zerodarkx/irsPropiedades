<?php 
    $opc = $_POST['opc'];

    switch ($opc) {
        case 'perfil':
            $id_usuario         = $_SESSION['id_usuario'];
            $usuario_controller = new Propiedad();
            $usuario            = $usuario_controller->getUsuarioPerfil($id_usuario);

            $html = '
                <div class="row">
                    <div class="col-md-12">
                        <h3>Datos Personales del Usuario</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="rut_usu">Rut</label>
                        <input type="text" name="rut_usu" id="rut_usu" value="'.$usuario[0]['rut_usuario'].'" readonly class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="nom_com">Nombre Completo</label>
                        <input type="text" name="nom_com" id="nom_com" value="'.$usuario[0]['nombre_usuario'].'" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="tel_usu">Teléfono</label>
                        <input type="text" name="tel_usu" id="tel_usu" value="'.$usuario[0]['telefono_usuario'].'" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="correo_usu">Correo</label>
                        <input type="text" name="correo_usu" id="correo_usu" value="'.$usuario[0]['correo_usuario'].'" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h3>Cambiar Contraseña</h3>
                    </div>
                </div>
                <form id="form-password" method="post" onsubmit="return false">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="password_usuario">Nueva Contraseña</label>
                        <input type="password" name="password_usuario" id="password_usuario" class="form-control" required minlength="8">
                    </div>
                    <div class="col-md-3 align-self-end">
                        <button class="btn btn-success btn-block" onclick="changePassword(this.form.id)">Cambiar Contraseña</button>
                    </div>
                </div>
                </form>
            ';

            echo $html;
            break;

        case 'documentos':
            $html = '
                <div class="row">
                    <div class="col-md-6">
                        <h3>Documentos cargados en el Sistema</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h5>listado de documentos</h5>
                    </div>
                </div>
            ';

            $html.= '
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="alert alert-secondary">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa fa-trash"></i>
                                </div>
                                <div class="col-md-8">
                                    Contrato
                                </div>
                                <div class="col-md-1">
                                    <a href="#" target="__blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-secondary">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa fa-trash"></i>
                                </div>
                                <div class="col-md-8">
                                    Carnet Para Delantera
                                </div>
                                <div class="col-md-1">
                                    <a href="#" target="__blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-secondary">
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="fa fa-trash"></i>
                                </div>
                                <div class="col-md-8">
                                    Carnet Para Trasera
                                </div>
                                <div class="col-md-1">
                                    <a href="#" target="__blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            
            echo $html;
            break;

        case 'home':
            $id_usuario             = $_SESSION['id_usuario'];
            $propiedades_controller = new PropiedadController();
            $propiedades            = $propiedades_controller->getPropiedadesSubastadasPorUsuario($id_usuario);
            $html = '
                <div class="row">
                    <div class="col-md-6">
                        <h3>Propiedades Pujadas Activas</h3>
                    </div>
                </div>
                <div class="row mt-2">
            ';

            $propiedades_anteriores = '0,';
            $html.= (count($propiedades) == 0) ? 'No Tiene Casos' : '';

            for ($i=0; $i < count($propiedades) ; $i++) {
                $propiedades_anteriores.= $propiedades[$i]['propiedad'].',';
                $imagen_controller      = new ImagenController();
                $imagen                 = $imagen_controller->getImagenFrontis($propiedades[$i]['propiedad']);
                $path                   = "https://dsalp.com/public/propiedades/".$propiedades[$i]['propiedad']."/".$imagen[0]['arc'];
                $html.='
                    <div class="col-md-6">
                        <div class="card">
                            <img class="card-img-top" style="height: 300px;" src="'.$path.'" alt="Card image cap">
                            <div class="card-body">
                                <table width="100%">
                                    <tr>
                                        <td width="30%">Propiedad</td>
                                        <td>:</td>
                                        <td># '.$propiedades[$i]['propiedad'].'</td>
                                        <td width="15%" rowspan="4">
                                            <button class="btn btn-success btn-block" onclick="verPropiedad('.$propiedades[$i]['propiedad'].')">Ver Propiedad</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Valor Puja</td>
                                        <td>:</td>
                                        <td>'.number_format($propiedades[$i]['valor'], 0, ',', '.').' UF</td>
                                    </tr>
                                    <tr>
                                        <td>Valor Antes de Puja</td>
                                        <td>:</td>
                                        <td>'.number_format($propiedades[$i]['antes_valor'], 0, ',', '.').' UF</td>
                                    </tr>
                                    <tr>
                                        <td>Región</td>
                                        <td>:</td>
                                        <td>'.$propiedades[$i]['region'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Comuna</td>
                                        <td>:</td>
                                        <td>'.$propiedades[$i]['comuna'].'</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                ';
            }


            $html.='
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Propiedades Perdidas Pujadas</h3>
                    </div>
                </div>
                <div class="row mt-2">
            ';

            $propiedades_anteriores = substr($propiedades_anteriores, 0, -1);
            $propiedades_controller = new PropiedadController();
            $propiedades            = $propiedades_controller->getPropiedadesSubastadasPerdidasPorUsuario($id_usuario , $propiedades_anteriores);
            $html.= (count($propiedades) == 0) ? 'No Tiene Casos' : '';
            for ($i=0; $i < count($propiedades) ; $i++) {
                $imagen_controller      = new ImagenController();
                $imagen                 = $imagen_controller->getImagenFrontis($propiedades[$i]['propiedad']);
                $path                   = "https://dsalp.com/public/propiedades/".$propiedades[$i]['propiedad']."/".$imagen[0]['arc'];
                $html.='
                    <div class="col-md-6">
                        <div class="card">
                            <img class="card-img-top" style="height: 300px;" src="'.$path.'" alt="Card image cap">
                            <div class="card-body">
                                <table width="100%">
                                    <tr>
                                        <td width="30%">Propiedad</td>
                                        <td>:</td>
                                        <td># '.$propiedades[$i]['propiedad'].'</td>
                                        <td width="15%" rowspan="4">
                                            <button class="btn btn-success btn-block" onclick="verPropiedad('.$propiedades[$i]['propiedad'].')">Ver Propiedad</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Valor Puja</td>
                                        <td>:</td>
                                        <td>'.number_format($propiedades[$i]['valor'], 0, ',', '.').' UF</td>
                                    </tr>
                                    <tr>
                                        <td>Valor Antes de Puja</td>
                                        <td>:</td>
                                        <td>'.number_format($propiedades[$i]['antes_valor'], 0, ',', '.').' UF</td>
                                    </tr>
                                    <tr>
                                        <td>Región</td>
                                        <td>:</td>
                                        <td>'.$propiedades[$i]['region'].'</td>
                                    </tr>
                                    <tr>
                                        <td>Comuna</td>
                                        <td>:</td>
                                        <td>'.$propiedades[$i]['comuna'].'</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                ';
            }

            $html.='
                </div>
            ';

            echo $html;
            break;
        
        default:
            echo "nada que mostrar";
            break;
    }
?>