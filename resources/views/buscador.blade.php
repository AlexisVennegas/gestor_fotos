<?php 

$conector = mysqli_connect("localhost","root","","gestor_fotos");

print_r($conector);

$buscar = $_POST["buscar"] ?? null;

$buscador = mysqli_query($conector, "SELECT pictures.*, users.* 
FROM pictures
JOIN users 
ON users.id = pictures.users
WHERE pictures.picture_name
LIKE LOWER('%".$buscar."%')
ORDER BY pictures.ID DESC");


while ($hilo = mysqli_fetch_assoc($buscador)) {    ?>
   <?php $id2 = $hilo["ID"] ?>

   <?php if($hilo["fechaCreacionHilo"] > $fechaSesion) { ?>
                            <div class="hilos">
                            <div class="informationPublic">
                                <div class="imgDiv">
                                    <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>" style="color:black;" class="vperfil"><img src="<?php echo $hilo["image_user"]; ?>" alt="" class="pfHeader"></a>
                                </div>
                                <a href="conversacion.php?id=<?php echo $id2 ?>">
                                    <div class="txtHilo">
                                        <p class="titleHilo"><?php echo $hilo["nombre_Hilos"]; ?></p>
                                        <p><?php echo $hilo["descripcion"]; ?></p>
                                        <div class="boxInfo">
                                            <p class="date"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                            <img src="image/fecha.png" alt="date" class="calendar">
                                        </div>
                                        <p class="nameUser"><?php echo $hilo["nombreUsuario"]; ?></p>
                                    </div>   
                                </a>
                            </div>
                            <div class="comments">
                            <div class="fotoComentarios">
                            <?php
                                    $id = $hilo["ID"];
                                    $queryUsers = "SELECT * FROM mensajes WHERE hilo_ID = $id";
                                    $mensaje = mysqli_query($conector, $queryUsers);
                                    $count = 0;
                                    while(($mensajeArray = mysqli_fetch_assoc($mensaje)) && $count < 5)
                                    {
                                        $idUsuario = $mensajeArray['usuario_ID'];
                                        $queryFoto = "SELECT image_user FROM usuarios WHERE id= $idUsuario ORDER BY id ASC ";
                                        $foto = mysqli_query($conector, $queryFoto);
                                        $fotoArray = mysqli_fetch_assoc($foto);
                                        $fotoSrc = $fotoArray['image_user'];
                                        echo "<a href='conversacion.php?id=$id2'><img src='$fotoSrc' alt='' class='pfHeaderpf'></a>";
                                        $count++;
                                    }
                            ?>
                            </div>
                            <?php
                                $query = "SELECT COUNT(*) AS total FROM mensajes WHERE hilo_ID = $id2"; 
                                $comentarios = mysqli_query($conector, $query);
                                $comentariosArray = mysqli_fetch_assoc($comentarios);
                               
                            ?> <p class="pComentarios"><?php echo $comentariosArray['total'] ;?> Comentarios</p>

                              
                            </div>
                        </div>



                       <?php } if($hilo["fechaCreacionHilo"] < $fechaSesion) { ?>
                            <div class="hilo2">
                            <div class="informationPublic">
                                <div class="imgDiv">
                                    <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>" style="color:black;" class="vperfil"><img src="<?php echo $hilo["image_user"]; ?>" alt="" class="pfHeader"></a>
                                </div>
                                <a href="conversacion.php?id=<?php echo $id2 ?>">
                                    <div class="txtHilo">
                                        <p class="titleHilo"><?php echo $hilo["nombre_Hilos"]; ?></p>
                                        <p><?php echo $hilo["descripcion"]; ?></p>
                                        <div class="boxInfo">
                                            <p class="date"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                            <img src="image/fecha.png" alt="date" class="calendar">
                                        </div>
                                        <p class="nameUser"><?php echo $hilo["nombreUsuario"]; ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="comments">
                            <?php
                                    $id = $hilo["ID"];
                                    $queryUsers = "SELECT * FROM mensajes WHERE hilo_ID = $id";
                                    $mensaje = mysqli_query($conector, $queryUsers);
                                    $count = 0;
                                    while(($mensajeArray = mysqli_fetch_assoc($mensaje)) && $count < 5)
                                    {
                                        $idUsuario = $mensajeArray['usuario_ID'];
                                        $queryFoto = "SELECT image_user FROM usuarios WHERE id= $idUsuario";
                                        $foto = mysqli_query($conector, $queryFoto);
                                        $fotoArray = mysqli_fetch_assoc($foto);
                                        $fotoSrc = $fotoArray['image_user'];
                                        echo "<a href='conversacion.php?id=$id2'><img src='$fotoSrc' alt='' class='pfHeaderpf'></a>";
                                        $count++;
                                    }
                            ?>
                                
                            <?php
                                $query = "SELECT COUNT(*) AS total FROM mensajes WHERE hilo_ID = $id2"; 
                                $comentarios = mysqli_query($conector, $query);
                                $comentariosArray = mysqli_fetch_assoc($comentarios);
                               
                            ?> <p class="pComentarios"><?php echo $comentariosArray['total'] ;?> Comentarios</p>

                                
                            </div>
                        </div>
                       <?php } ?>
                           
                    
            <?php } ?>
