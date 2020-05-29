<!DOCTYPE html>
<html>
<!-- Header y nav -->
<?php include 'app/view/inc/header.php'; ?>

<h1 class="header-h1">Plantilla</h1>
<div class="info-general-banda">
    <h2>Director</h3>
    <p><?php foreach ($matrizDirector as $director) {
            echo $director['m_nombre'];
            echo " ";
            echo $director['m_apellidos'];
            echo "<br>";
        } ?></p>
    <h4 style="display: none">Presidente</h3>
        <p style="display: none"><?php foreach ($matrizPresidente as $presidente) {
                                        echo $presidente['m_nombre'];
                                        echo " ";
                                        echo $presidente['m_apellidos'];
                                        echo "<br>";
                                    } ?></p>
    
</div>

<div id="plantilla">
    <div class="oboe">
        <h3>Oboe</h3>
        <?php
        foreach ($matrizOboe as $oboe) {
            echo $oboe['m_nombre'];
            echo " ";
            echo $oboe['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="flauta">
        <h3>Flauta</h3>
        <?php
        foreach ($matrizFlauta as $flauta) {
            echo $flauta['m_nombre'];
            echo " ";
            echo $flauta['m_apellidos'];
            echo "<br>";
        }
        ?>
        <br>
    </div>
    <div class="fagot">
        <h3>Fagot</h3>
        <?php
        foreach ($matrizFagot as $fagot) {
            echo $fagot['m_nombre'];
            echo " ";
            echo $fagot['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="requinto">
        <h3>Requinto</h3>
        <?php
        foreach ($matrizRequinto as $requinto) {
            echo $requinto['m_nombre'];
            echo " ";
            echo $requinto['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="clarinete">
        <h3>Clarinete</h3>
        <?php
        foreach ($matrizClarinete as $clarinete) {
            echo $clarinete['m_nombre'];
            echo " ";
            echo $clarinete['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="clarinete-bajo">
        <h3>Clarinete Bajo</h3>
        <?php
        foreach ($matrizClarineteBajo as $clarinetebajo) {
            echo $clarinetebajo['m_nombre'];
            echo " ";
            echo $clarinetebajo['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="saxofon">
        <h3>Saxofón Alto</h3>
        <?php
        foreach ($matrizSaxofon as $saxofon) {
            echo $saxofon['m_nombre'];
            echo " ";
            echo $saxofon['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="saxofon-tenor">
        <h3>Saxofón Tenor</h3>
        <?php
        foreach ($matrizSaxofonTenor as $saxofontenor) {
            echo $saxofontenor['m_nombre'];
            echo " ";
            echo $saxofontenor['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="saxofon-baritono">
        <h3>Saxofón Barítono</h3>
        <?php
        foreach ($matrizSaxofonBaritono as $saxofonbaritono) {
            echo $saxofonbaritono['m_nombre'];
            echo " ";
            echo $saxofonbaritono['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="trompeta">
        <h3>Trompeta</h3>
        <?php
        foreach ($matrizTrompeta as $trompeta) {
            echo $trompeta['m_nombre'];
            echo " ";
            echo $trompeta['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="fliscorno">
        <h3>Fliscorno</h3>
        <?php
        foreach ($matrizFliscorno as $fliscorno) {
            echo $fliscorno['m_nombre'];
            echo " ";
            echo $fliscorno['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="trompa">
        <h3>Trompa</h3>
        <?php
        foreach ($matrizTrompa as $trompa) {
            echo $trompa['m_nombre'];
            echo " ";
            echo $trompa['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="percusion">
        <h3>Percusión</h3>
        <?php
        foreach ($matrizPercusion as $percusion) {
            echo $percusion['m_nombre'];
            echo " ";
            echo $percusion['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="tuba" style="display:none">
        <h3>Tuba</h3>
    </div>

    <div class="trombon">
        <h3>Trombón</h3>
        <?php
        foreach ($matrizTrombon as $trombon) {
            echo $trombon['m_nombre'];
            echo " ";
            echo $trombon['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
    <div class="bombardino">
        <h3>Bombardino</h3>
        <?php
        foreach ($matrizBombardino as $bombardino) {
            echo $bombardino['m_nombre'];
            echo " ";
            echo $bombardino['m_apellidos'];
            echo "<br>";
        } ?>
    </div>
</div>



<!-- Pie -->
<!-- Incluye scripts -->
<?php include 'app/view/inc/footer.php'; ?>