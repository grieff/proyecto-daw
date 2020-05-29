<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<h1 class="header-h1">Galeria</h1>

<div id="galeria">
  <!-- Card Eventos -->

  <div class="flex-galeria">

    <div class="jumbotron card card-image flex-div" style="background-image: url(public/images/galery/2019/11/SantaCecilia/11.jpg); background-position:center;">
      <div class="text-white text-center py-5 px-4">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-5 font-bold jumbo-text"><strong>Concierto Extraordinario Santa Cecilia [The Armed Man]</strong></h2>
          <p class="mx-5 mb-5 jumbo-text-mini">Noviembre 2019
          </p>
          <a class="btn btn-outline-white btn-md" href="index.php?view=galeriaevento&id=40"><i class="fas fa-clone left"></i> Ver imágenes</a>
        </div>
      </div>
    </div>

    <div class="jumbotron card card-image flex-div" style="background-image: url(public/images/galery/2018/11/SantaCecilia/02.jpg); background-position:center;">
      <div class="text-white text-center py-5 px-4">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-5 font-bold jumbo-text"><strong>Concierto Extraordinario Santa Cecilia </strong></h2>
          <p class="mx-5 mb-5 jumbo-text-mini">Noviembre 2018
          </p>
          <a class="btn btn-outline-white btn-md" href="index.php?view=galeriaevento&id=39"><i class="fas fa-clone left"></i> Ver imágenes</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Pie -->
  <!-- Incluye scripts -->
  <?php include 'app/view/inc/footer.php'; ?>