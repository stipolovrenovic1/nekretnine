<?php
	
get_header();

?>

<?php

$sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
$sStatus = wp_get_post_terms( $post->ID, 'status_nekretnine' )[0]->name;
$sMjesto = get_post_meta($post->ID, 'informacija_lokacija_nekretnine', true);
$sPovršina = get_post_meta($post->ID, 'informacija_površina_nekretnine', true);
$nSobe = get_post_meta($post->ID, 'informacija_sobe_nekretnine', true);
$nKupaonice = get_post_meta($post->ID, 'informacija_kupaonice_nekretnine', true);
$nGaraže = get_post_meta($post->ID, 'informacija_garaže_nekretnine', true);
$nCijena = get_post_meta($post->ID, 'informacija_cijena_nekretnine', true);

if($sStatus == "Najam")
{
	$nCijena .= "/month";
}

?>

<div class="container-fluid">
	<h1 style="margin-top: 50px; margin-left: 250px; margin-bottom: 20px; font-weight: bold;"><?php echo $post->post_title?></h1>
</div>

<div class="container-fluid">
	<img style="margin-left: 250px; width: 500px; height: 400px;" src="<?php echo $sIstaknutaSlika; ?>" alt="">
</div>

<div class="container-fluid" style="background-color: lightGrey; width: 25%; position: relative; bottom: 300px; left: 250px; padding: 25px; font-weight: bold; border-radius: 3px;">
	<p>Status: <?php echo $sStatus; ?> <span style="margin-left: 15px;">Mjesto: <?php echo $sMjesto; ?></span></p>
	<p>Površina: <?php echo $sPovršina; ?> sqft <span style="margin-left: 15px;">Broj soba: <?php echo $nSobe; ?></span></p>
	<p>Broj kupaonica: <?php echo $nKupaonice; ?> <span style="margin-left: 15px;">Broj garaža: <?php echo $nGaraže; ?></span></p>
	<p>Cijena: $<?php echo $nCijena; ?></p>
</div>

<div class="container-fluid" style="padding: 25px; margin-top: -200px; margin-left: 250px;">
	<h3 style="font-weight: bold;">Opis</h3>
	<p><?php echo $post->post_content?></p>
</div>

<?php

 get_footer(); 

 ?>