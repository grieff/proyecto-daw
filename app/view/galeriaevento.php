<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>
<style>
    #galeria {
        box-sizing: border-box;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
    }

    .grid:after {
        content: '';
        display: block;
        clear: both;
    }

    .grid {
        margin: 0 auto;
    }

    .grid-sizer,
    .grid-item {
        width: 30%;
        margin: 5px 0px;
    }

    @media (max-width: 575px) {

        .grid-sizer,
        .grid-item {
            width: 100%;
        }
    }

    @media (min-width: 576px) and (max-width: 767px) {

        .grid-sizer,
        .grid-item {
            width: 50%;
        }
    }

    /* To change the amount of columns on larger devices, uncomment the code below */

    @media (min-width: 768px) and (max-width: 991px) {

        .grid-sizer,
        .grid-item {
            width: 33.333%;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {

        .grid-sizer,
        .grid-item {
            width: 33.33%;
        }
    }

    @media (min-width: 1200px) {

        .grid-sizer,
        .grid-item {
            width: 33.33%;
        }
    }

    .grid-item {
        float: left;
    }

    .grid-item img {
        display: block;
        max-width: 100%;
    }
</style>
<h1 class="header-h1">Galeria</h1>
<?php include 'app/controller/Galeria.php';

?>
<div id="galeria">

    <div class="container-fluid">
        <a href="index.php?view=galeria" class="btn btn-elegant pg-miembros"> Volver </a>
        <h1 class="my-4 font-weight-bold"><?php echo $titulo ?></h1>


        <div class="grid">

            <div class="grid-sizer"></div>
            <?php foreach ($listaImg as $imagen) { ?>


                <div class="grid-item">
                    <img src="<?php echo $imagen['im_rutarchivo']; ?>" />

                </div>


            <?php  } ?>
        </div>
    </div>
</div>
<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>