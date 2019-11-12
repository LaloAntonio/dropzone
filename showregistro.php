<table class="table">
  <thead class="bg-primary">
    <tr>
      <th class="center-text" scope="col">#</th>
      <th class="center-text" scope="col">Titulo</th>
      <th class="center-text" scope="col">Fecha de Creacion</th>
      <th class="center-text" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include 'connecdb.php';
    $search = "SELECT * FROM noticia";
    $ejecutar = mysqli_query($mysqli,$search);
    while ($row =mysqli_fetch_assoc($ejecutar)) {
    ?>
    <tr>
        <th class="center-text"><?php echo $row['idnoticia'];?></th>
        <td class="center-text"><?php echo $row['titulo'];?></td>
        <td class="center-text"><?php echo $row['dateCreate'];?></td>
        <td class="center-text">
        <a class="btn btn-primary" href="editarnoticia.php?p=<?php echo $row['idnoticia'];?>" role="button">Editar</a>
        <button type="button" class="btn btn-danger">Eliminar</button>
        </td>
    </tr>
    <?php }?>
  </tbody>
</table>
