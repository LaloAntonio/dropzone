<?php
include 'connecdb.php';
$getid = isset($_GET['p'])?$_GET['p']:'';
$search = "SELECT * FROM noticia WHERE idnoticia = '$getid'";
$getinfo = mysqli_query($mysqli,$search);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="dropzone-5.5.0/dist/min/dropzone.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <title>DropZone</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i class="fas fa-user"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="notiregistro.html">Noticias Registradas</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container">
    <form>
    <?php 
    $row =mysqli_fetch_assoc($getinfo)
    ?>
      <div id="dZUpload" class="dropzone">
        <div class="dz-default dz-message">
          <center>
            <h3>Subir Archivos</h3>
          </center>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="">Titulo:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['titulo'];?>">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="">Subtitulo:</label>
            <input type="text" class="form-control" name="subname" id="subname" value="<?php echo $row['subtitulo'];?>">
          </div>
        </div>
      </div>
      <p>Contenido:</p>
      <div>
        <textarea name="editor" id="editor" style="min-width: 100%"><?php echo $row['contenido'];?></textarea>
      </div>
    </form>
    <br>
    <center>
      <input type="button" class="btn btn-lg btn-info" value="Agregar Noticia" id="uploadfiles">
    </center>
    <br>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="https://kit.fontawesome.com/f2ba2b69c8.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="dropzone-5.5.0/dist/min/dropzone.min.js"></script>
  <script src="js/optionsedit.js"></script>
  <script>
    CKEDITOR.replace( 'editor');
  </script>
</body>
</html>