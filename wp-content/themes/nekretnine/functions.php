<?php
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik"
		) );
		add_theme_support( 'custom-background', apply_filters
			(
				'test_custom_background_args', array
				(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 	
			) 
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_post_type_support( 'nekretnina', 'thumbnail' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

function aktiviraj_sidebar()
{
	register_sidebar(
		array (
			'name' => "Glavni sidebar",
			'id' => 'glavni-sidebar',
			'description' => "Glavni sidebar",
			'before_widget' => '<div class="widget-content">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'aktiviraj_sidebar' );

function register_nekretnina_cpt() {

	$labels = array(
		'name'                  => _x( 'Nekretnine', 'Post Type General Name', 'nekretnine' ),
		'singular_name'         => _x( 'Nekretnina', 'Post Type Singular Name', 'nekretnine' ),
		'menu_name'             => __( 'Nekretnine', 'nekretnine' ),
		'name_admin_bar'        => __( 'Nekretnine', 'nekretnine' ),
		'archives'              => __( 'Nekretnine arhiva', 'nekretnine' ),
		'attributes'            => __( 'Atributi', 'nekretnine' ),
		'parent_item_colon'     => __( 'Roditeljski element', 'nekretnine' ),
		'all_items'             => __( 'Sve nekretnine', 'nekretnine' ),
		'add_new_item'          => __( 'Dodaj novu nekretninu', 'nekretnine' ),
		'add_new'               => __( 'Dodaj novu', 'nekretnine' ),
		'new_item'              => __( 'Nova nekretnina', 'nekretnine' ),
		'edit_item'             => __( 'Uredi nekretninu', 'nekretnine' ),
		'update_item'           => __( 'Ažuriraj nekretninu', 'nekretnine' ),
		'view_item'             => __( 'Vidi nekretninu', 'nekretnine' ),
		'view_items'            => __( 'Vidi nekretnine', 'nekretnine' ),
		'search_items'          => __( 'Traži nekretninu', 'nekretnine' ),
		'not_found'             => __( 'Nije pronađeno', 'nekretnine' ),
		'not_found_in_trash'    => __( 'Nije pronađeno u smeću', 'nekretnine' ),
		'featured_image'        => __( 'Glavna slika', 'nekretnine' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'nekretnine' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'nekretnine' ),
		'use_featured_image'    => __( 'Postavi za glavnu sliku', 'nekretnine' ),
		'insert_into_item'      => __( 'Umetni', 'nekretnine' ),
		'uploaded_to_this_item' => __( 'Preneseno', 'nekretnine' ),
		'items_list'            => __( 'Lista', 'nekretnine' ),
		'items_list_navigation' => __( 'Navigacija među nekretninama', 'nekretnine' ),
		'filter_items_list'     => __( 'Filtriranje nekretnina', 'nekretnine' ),
	);
	$args = array(
		'label'                 => __( 'Nekretnina', 'nekretnine' ),
		'description'           => __( 'nekretnina post type', 'nekretnine' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' 			=> 'dashicons-video-alt2'
	);
	register_post_type( 'nekretnina', $args );

}
add_action( 'init', 'register_nekretnina_cpt', 0 );


function registriraj_taksonomiju_status_nekretnine() {
$labels = array(
'name' => _x( 'Statusi nekretnina', 'Taxonomy General Name', 'nekretnine' ),
'singular_name' => _x( 'Status nekretnine', 'Taxonomy Singular Name', 'nekretnine' ),
'menu_name' => __( 'Statusi nekretnina', 'nekretnine' ),
'all_items' => __( 'Svi statusi nekretnina', 'nekretnine' ),
'parent_item' => __( 'Roditeljski status', 'nekretnine' ),
'parent_item_colon' => __( 'Roditeljski status', 'nekretnine' ),
'new_item_name' => __( 'Novi status nekretnine', 'nekretnine' ),
'add_new_item' => __( 'Dodaj novi status nekretnine', 'nekretnine' ),
'edit_item' => __( 'Uredi status nekretnine', 'nekretnine' ),
'update_item' => __( 'Ažuriraj status nekretnine', 'nekretnine' ),
'view_item' => __( 'Pogledaj status nekretnine', 'nekretnine' ),
'separate_items_with_commas' => __( 'Odvojite statuse sa zarezima', 'nekretnine' ),
'add_or_remove_items' => __( 'Dodaj ili ukloni status nekretnine', 'nekretnine' ),
'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'nekretnine' ),
'popular_items' => __( 'Popularni statusi nekretnina', 'nekretnine' ),
'search_items' => __( 'Pretraga', 'nekretnine' ),
'not_found' => __( 'Nema rezultata', 'nekretnine' ),
'no_terms' => __( 'Nema statusa nekretnina', 'nekretnine' ),
'items_list' => __( 'Lista statusa nekretnina', 'nekretnine' ),
'items_list_navigation' => __( 'Navigacija', 'nekretnine' ),
);
$args = array(
'labels' => $labels,
'hierarchical' => true,
'public' => true,
'show_ui' => true,
'show_admin_column' => true,
'show_in_nav_menus' => true,
'show_tagcloud' => true,
);
register_taxonomy( 'status_nekretnine', array( 'nekretnina' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_status_nekretnine', 0 );

function add_meta_box_istaknutost_nekretnine()
{
	add_meta_box( 'nekretnine_nekretnina_istaknutost', 'Istaknuto?', 'html_meta_box_nekretnina', 'nekretnina');
}
function html_meta_box_nekretnina($post)
{
	wp_nonce_field('spremi_istaknutost_nekretnine', 'informacija_istaknuto_nonce');

	$informacija_istaknutost = get_post_meta($post->ID, 'informacija_istaknutost_nekretnine', true);

	switch($informacija_istaknutost)
	{
		case "true":
			echo '
			<div>
				<div>
					<label for="informacija_istaknutost_nekretnine">Istaknuto: </label>
					<select id="informacija_istaknutost_nekretnine" name="informacija_istaknutost_nekretnine">				  
							<option value="true" selected>Da</option>
							<option value="false">Ne</option>				  
					</select>
				</div>
			</div>';
		break;

		case "false":
			echo '
			<div>
				<div>
					<label for="informacija_istaknutost_nekretnine">Istaknuto: </label>
					<select id="informacija_istaknutost_nekretnine" name="informacija_istaknutost_nekretnine">				  
							<option value="true">Da</option>
							<option value="false" selected>Ne</option>				  
					</select>
				</div>
			</div>';
		break;
	}
}
function spremi_istaknutost_nekretnine($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	$is_valid_nonce_informacija_istaknutost = ( isset( $_POST[ 'informacija_istaknutost_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_istaknutost_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce_informacija_istaknutost )
	{
	 	return;
 	}

 	if(!empty($_POST['informacija_istaknutost_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_istaknutost_nekretnine',
		$_POST['informacija_istaknutost_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_istaknutost_nekretnine');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_istaknutost_nekretnine' );
add_action( 'save_post', 'spremi_istaknutost_nekretnine' );

function add_meta_box_informacije_nekretnine()
{
	add_meta_box( 'nekretnine_nekretnina_informacije', 'Osnovne informacije', 'html_meta_box_nekretnina2', 'nekretnina');
}
function html_meta_box_nekretnina2($post)
{
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_lokacija_nonce');
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_površina_nonce');
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_sobe_nonce');
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_kupaonice_nonce');
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_garaže_nonce');
	wp_nonce_field('spremi_informaciju_nekretnine', 'informacija_cijena_nonce');
	
	$informacija_lokacija = get_post_meta($post->ID, 'informacija_lokacija_nekretnine', true);
	$informacija_površina = get_post_meta($post->ID, 'informacija_površina_nekretnine', true);
	$informacija_sobe = get_post_meta($post->ID, 'informacija_sobe_nekretnine', true);
	$informacija_kupaonice = get_post_meta($post->ID, 'informacija_kupaonice_nekretnine', true);
	$informacija_garaže = get_post_meta($post->ID, 'informacija_garaže_nekretnine', true);
	$informacija_cijena = get_post_meta($post->ID, 'informacija_cijena_nekretnine', true);
	echo '
	<div>
	<div>
		<label for="informacija_lokacija_nekretnine">Mjesto nekretnine: </label>
		<input type="text" id="informacija_lokacija_nekretnine"
		name="informacija_lokacija_nekretnine" value="'.$informacija_lokacija.'" />
	</div><br/>
	<div>
		<label for="informacija_površina_nekretnine">Površina: </label>
		<input type="number" id="informacija_površina_nekretnine"
		name="informacija_površina_nekretnine" value="'.$informacija_površina.'" />
		<span> sq feet</span>
	</div><br/>
	<div>
		<label for="informacija_sobe_nekretnine">Broj spavaćih soba: </label>
		<input type="number" id="informacija_sobe_nekretnine"
		name="informacija_sobe_nekretnine" value="'.$informacija_sobe.'" />
	</div><br/>
	<div>
		<label for="informacija_kupaonice_nekretnine">Broj kupaonica: </label>
		<input type="number" id="informacija_kupaonice_nekretnine"
		name="informacija_kupaonice_nekretnine" value="'.$informacija_kupaonice.'" />
	</div><br/>
	<div>
		<label for="informacija_garaže_nekretnine">Broj garaža: </label>
		<input type="number" id="informacija_garaže_nekretnine"
		name="informacija_garaže_nekretnine" value="'.$informacija_garaže.'" />
	</div><br/>
	<div>
		<label for="informacija_cijena_nekretnine">Cijena: </label>
		<input type="number" id="informacija_cijena_nekretnine"
		name="informacija_cijena_nekretnine" value="'.$informacija_cijena.'" />
		<span> dolar/a</span>
	</div><br/>
	</div>';
}
function spremi_informaciju_nekretnine($post_id)
{
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce_informacija_lokacija = ( isset( $_POST[ 'informacija_lokacija_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_lokacija_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_površina = ( isset( $_POST[ 'informacija_površina_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_površina_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_sobe = ( isset( $_POST[ 'informacija_sobe_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_sobe_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_kupaonice = ( isset( $_POST[ 'informacija_kupaonice_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_kupaonice_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_garaže = ( isset( $_POST[ 'informacija_garaže_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_garaže_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_cijena = ( isset( $_POST[ 'informacija_cijena_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_cijena_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	$is_valid_nonce_informacija_istaknutost = ( isset( $_POST[ 'informacija_istaknutost_nonce' ] ) && wp_verify_nonce($_POST[ 'informacija_istaknutost_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	if ( $is_autosave || $is_revision || !$is_valid_nonce_informacija_lokacija || !$is_valid_nonce_informacija_površina || !$is_valid_nonce_informacija_sobe ||
		!$is_valid_nonce_informacija_kupaonice || !$is_valid_nonce_informacija_garaže || !$is_valid_nonce_informacija_cijena )
	{
	 	return;
 	}
	if(!empty($_POST['informacija_lokacija_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_lokacija_nekretnine',
		$_POST['informacija_lokacija_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_lokacija_nekretnine');
	}
	if(!empty($_POST['informacija_površina_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_površina_nekretnine',
		$_POST['informacija_površina_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_površina_nekretnine');
	}
	if(!empty($_POST['informacija_sobe_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_sobe_nekretnine',
		$_POST['informacija_sobe_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_sobe_nekretnine');
	}
	if(!empty($_POST['informacija_kupaonice_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_kupaonice_nekretnine',
		$_POST['informacija_kupaonice_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_kupaonice_nekretnine');
	}
	if(!empty($_POST['informacija_garaže_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_garaže_nekretnine',
		$_POST['informacija_garaže_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_garaže_nekretnine');
	}
	if(!empty($_POST['informacija_cijena_nekretnine']))
	{
		update_post_meta($post_id, 'informacija_cijena_nekretnine',
		$_POST['informacija_cijena_nekretnine']);
	}
	else
	{
	delete_post_meta($post_id, 'informacija_garaže_nekretnine');
	}
}
add_action( 'add_meta_boxes', 'add_meta_box_informacije_nekretnine' );
add_action( 'save_post', 'spremi_informaciju_nekretnine' );

function dajIstaknuteNekretnine()
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'nekretnina',
		'post_status' => 'private',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$nekretnine = get_posts( $args );

	$IstaknutiID = array();
	$sHtml = "<h1 style='margin-top: 50px; margin-left: 150px; margin-bottom: 20px; font-weight: bold;'>Istaknute nekretnine</h1>
			  <ul style='list-style-type:none; margin-left: 100px;'>";

	foreach ($nekretnine as $nekretnina)
	{
	$nNekretninaId = $nekretnina->ID;
	$sNekretninaIstaknutost = get_post_meta($nNekretninaId, 'informacija_istaknutost_nekretnine', true);
	if($sNekretninaIstaknutost == "true")
	{
		$sNekretninaUrl = $nekretnina->guid;
		$sNekretninaNaziv = $nekretnina->post_title;
		$sIstaknutaSlika = get_the_post_thumbnail_url($nNekretninaId);
		$sNekretninaStatusi = wp_get_post_terms( $nNekretninaId, 'status_nekretnine' );
		$sNekretninaStatus = $sNekretninaStatusi[0];
		$nNekretninaCijena = get_post_meta($nNekretninaId, 'informacija_cijena_nekretnine', true);
		$sNekretninaSobe = get_post_meta($nNekretninaId, 'informacija_sobe_nekretnine', true);
		$sNekretninaKupaone = get_post_meta($nNekretninaId, 'informacija_kupaonice_nekretnine', true);
		$sNekretninaPovršina = get_post_meta($nNekretninaId, 'informacija_površina_nekretnine', true);
		$sNekretninaLokacija = get_post_meta($nNekretninaId, 'informacija_lokacija_nekretnine', true);	
		$sHtml .= '<li class= "listItem" style= "display:inline-block;  box-shadow: 5px 5px 5px; margin-right: 50px; height: 350px; margin-bottom: 30px; border-radius: 		5px;">
					<div style="width: 260px;">
				        <figure style ="height: 250px; width: 200px;">
				       	<a style="color: black; text-decoration: none;" href="'.$sNekretninaUrl.'">
		        		<p style="position: absolute; opacity: 0.75; padding: 3px; border-radius: 2px; background-color: red; color: white; font-weight: bold; z-index: 10; margin-top: 5px; margin-left: 5px;">'.$sNekretninaStatus->name.'</p>
				        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:130%">';

		if($sNekretninaStatus->name == "Najam")
		{
			$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'/month</p>';
		}
		else
		{
			$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'</p>';
		}

		$sHtml .= '<p style="font-size: 15px; margin-top: -30px; margin-left: 10px;">Spavaće sobe: '.$sNekretninaSobe.' Kupaone: '.$sNekretninaKupaone.' Površina: '.					$sNekretninaPovršina.' sqft</p>
				   <h5 style="margin-left: 10px;">'.$sNekretninaNaziv.'</h5>
				   <h6 style="margin-left: 10px;">'.$sNekretninaLokacija.'</h6>
			                   </a>
				            </figure>
				        </div>
				     </li>';	
		array_push($IstaknutiID, $nNekretninaId);
		}
	}

	if(count($IstaknutiID) < 5)
	{
		$nBrojNekretnina = count($IstaknutiID);
		foreach($nekretnine as $nekretnina)
		{
			if($nBrojNekretnina == 5)
			{
				break;
			}

			$nNekretninaId = $nekretnina->ID;
			if(in_array($nNekretninaId, $IstaknutiID) == false)
			{
				$sNekretninaUrl = $nekretnina->guid;
				$sNekretninaNaziv = $nekretnina->post_title;
				$sIstaknutaSlika = get_the_post_thumbnail_url($nNekretninaId);
				$sNekretninaStatusi = wp_get_post_terms( $nNekretninaId, 'status_nekretnine' );
				$sNekretninaStatus = $sNekretninaStatusi[0];
				$nNekretninaCijena = get_post_meta($nNekretninaId, 'informacija_cijena_nekretnine', true);
				$sNekretninaSobe = get_post_meta($nNekretninaId, 'informacija_sobe_nekretnine', true);
				$sNekretninaKupaone = get_post_meta($nNekretninaId, 'informacija_kupaonice_nekretnine', true);
				$sNekretninaPovršina = get_post_meta($nNekretninaId, 'informacija_površina_nekretnine', true);
				$sNekretninaLokacija = get_post_meta($nNekretninaId, 'informacija_lokacija_nekretnine', true);	
				$sHtml .= '<li class= "listItem" style= "display:inline-block;  box-shadow: 5px 5px 5px; margin-right: 50px; height: 350px; margin-bottom: 30px; border-radius: 		5px;">
						   	<div style="width: 260px;">
				                <figure style ="height: 250px; width: 200px;">
				                	<a style="color: black; text-decoration: none;" href="'.$sNekretninaUrl.'">
				                		<p style="position: absolute; opacity: 0.75; padding: 3px; border-radius: 2px; background-color: red; color: white; font-weight: bold; z-index: 10; margin-top: 5px; margin-left: 5px;">'.$sNekretninaStatus->name.'</p>
				                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:130%">';

				if($sNekretninaStatus->name == "Najam")
				{
					$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'/month</p>';
				}
				else
				{
					$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'</p>';
				}

				$sHtml .= '<p style="font-size: 15px; margin-top: -30px; margin-left: 10px;">Spavaće sobe: '.$sNekretninaSobe.' Kupaone: '.$sNekretninaKupaone.' Površina: '.$sNekretninaPovršina.' sqft</p>
						   <h5 style="margin-left: 10px;">'.$sNekretninaNaziv.'</h5>
						   <h6 style="margin-left: 10px;">'.$sNekretninaLokacija.'</h6>
				                    </a>
				                </figure>
				            </div>
				           </li>';	
			}
		}	
	}

	$sHtml .= "</ul>";
	return $sHtml;
}

function dajNekretnine()
{
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'nekretnina',
		'post_status' => 'private',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$nekretnine = get_posts( $args );

	$IstaknutiID = array();
	$sHtml = "<h1 style='margin-top: 50px; margin-left: 150px; margin-bottom: 20px; font-weight: bold;'>Nekretnine</h1>
			  <ul style='list-style-type:none; margin-left: 100px;'>";

	foreach ($nekretnine as $nekretnina)
	{
		$nNekretninaId = $nekretnina->ID;
		$sNekretninaUrl = $nekretnina->guid;
		$sNekretninaNaziv = $nekretnina->post_title;
		$sIstaknutaSlika = get_the_post_thumbnail_url($nNekretninaId);
		$sNekretninaStatusi = wp_get_post_terms( $nNekretninaId, 'status_nekretnine' );
		$sNekretninaStatus = $sNekretninaStatusi[0];
		$nNekretninaCijena = get_post_meta($nNekretninaId, 'informacija_cijena_nekretnine', true);
		$sNekretninaSobe = get_post_meta($nNekretninaId, 'informacija_sobe_nekretnine', true);
		$sNekretninaKupaone = get_post_meta($nNekretninaId, 'informacija_kupaonice_nekretnine', true);
		$sNekretninaPovršina = get_post_meta($nNekretninaId, 'informacija_površina_nekretnine', true);
		$sNekretninaLokacija = get_post_meta($nNekretninaId, 'informacija_lokacija_nekretnine', true);	
		$sHtml .= '<li class= "listItem" style= "display:inline-block;  box-shadow: 5px 5px 5px; margin-right: 50px; height: 350px; margin-bottom: 30px; border-radius: 5px;">
				   	<div style="width: 260px;">
		                <figure style ="height: 250px; width: 200px;">
		                	<a style="color: black; text-decoration: none;" href="'.$sNekretninaUrl.'">
		                		<p style="position: absolute; opacity: 0.75; padding: 3px; border-radius: 2px; background-color: red; color: white; font-weight: bold; z-index: 10; margin-top: 5px; margin-left: 5px;">'.$sNekretninaStatus->name.'</p>
		                        <img src="'.$sIstaknutaSlika.'" alt="" style="height: 80%; width:130%">';

		if($sNekretninaStatus->name == "Najam")
		{
			$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'/month</p>';
		}
		else
		{
			$sHtml .= '<p style="background-color: green; opacity: 0.75; border-radius: 2px; padding: 3px; color: white; font-weight: bold; width: 8em; position: relative; left: 5px; bottom: 40px;">$'.$nNekretninaCijena.'</p>';
		}

		$sHtml .= '<p style="font-size: 15px; margin-top: -30px; margin-left: 10px;">Spavaće sobe: '.$sNekretninaSobe.' Kupaone: '.$sNekretninaKupaone.' Površina: '.$sNekretninaPovršina.' sqft</p>
				   <h5 style="margin-left: 10px;">'.$sNekretninaNaziv.'</h5>
				   <h6 style="margin-left: 10px;">'.$sNekretninaLokacija.'</h6>
		                    </a>
		                </figure>
		            </div>
		           </li>';	
	}
	$sHtml .= "</ul>";
	return $sHtml;
}

function UcitajCssTeme()
{	
	wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'UcitajCssTeme' );

function UcitajJsTeme()
{		
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'UcitajJsTeme' );
?>