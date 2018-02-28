<?php
/***
Plugin Name: CP Testimonial
Description:CP Testimonial is a super-easy Wordpress Plugin that lets you add Testimonials to your Wordpress theme using a shortcode!
Version: 1.0.0
Author:Creative pig
Author URI: www.creativepig.net
***/
define('PLUGIN_NAME', 'Creative Testimonial');
define('PLUGIN_SLUG', 'ct');
define('PLUGIN_BASENAME', basename(dirname(__FILE__)));
define('PLUGIN_DIR', rtrim(plugin_dir_path(__FILE__), '/'));
define('PLUGIN_URL', rtrim(plugin_dir_url(__FILE__), '/'));
define('PLUGIN_CSS_PATH', PLUGIN_URL . '/assets/css/');
define('PLUGIN_JS_PATH', PLUGIN_URL . '/assets/js/');
define('PLUGIN_IMAGE_URL', PLUGIN_URL . '/assets/images/' );
/*-------------------------------------------------------------------------------------------*/
/* Creative_Testimonial Post Type */
/*-------------------------------------------------------------------------------------------*/
class Creative_Testimonial {

	function __construct() {
		add_action( 'init',array($this,'testimonials_post_type'));
		add_action( 'admin_menu', array($this, 'submenupage'));
		add_action( 'add_meta_boxes', array($this, 'testimonialmetaboxes') );
		add_action( 'admin_enqueue_scripts', array( $this,'admin_scripts'));
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ));
		add_action( 'wp_enqueue_scripts', array($this, 'frontend_styling'));
		add_action( 'wp_enqueue_scripts', array($this, 'frontend_scripts'));
		add_action( 'admin_footer', array($this, 'add_testimonial' ));
		add_action( 'save_post', array($this, 'testimonial_save_data'));
		add_filter( 'manage_edit-creativetestimonial_columns',array($this, 'testimonial_column'));
		add_action( 'manage_creativetestimonial_posts_custom_column', array($this, 'testimonial_content'), 10, 2);
		add_shortcode( 'CPTESTIMONIAL', array( $this, 'shortcode_callback' ) );
		register_activation_hook(__FILE__, array( $this, 'client_initialize'));
		add_action('wp_enqueue_scripts', array( $this, 'google_fonts'));

		//add_action( 'admin_init', array($this, 'add_setting_item'));

	}

	public function client_initialize(){
    $options_not_set = get_option('testimonials_settings');
    if( $options_not_set ) return;

    $defaultsettings = array('aiwidth' => 100, 'aiheight' => 100, 'astar' => active, 'aimgstyle' => top, 'nof' => 1, 'son' => true, 'sbstyle' => style1,
	'authorimg_style' => square, 'fsize' => 15, 'ffamily' => Allan, 'aname' => on, 'aurl' => on, 'aimage' => on, 'tepagination' => true, 'tcolor' => '#ffffff' , 'bcolor'
	 => '#000000','bopacity'=>0.9 );
    update_option('testimonials_settings', $defaultsettings);
    }


	public function google_fonts(){
		 $fonts = get_option('testimonials_settings');
		 $google = $fonts['ffamily'];
		 wp_register_style( 'google_fonts', add_query_arg( $google, "//fonts.googleapis.com/css" ), array(), null );
	}

	public function testimonials_post_type() {
		$labels = array(
						'name'                  => _x( 'Creative Testimonial', 'Post Type General Name', PLUGIN_SLUG ),
						'singular_name'         => _x( 'Creative Testimonial', 'Post Type Singular Name', PLUGIN_SLUG ),
						'menu_name'             => __( 'Creative Testimonial', PLUGIN_SLUG ),
						'name_admin_bar'        => __( 'Creative Testimonial', PLUGIN_SLUG ),
						'archives'              => __( 'Item Archives', PLUGIN_SLUG ),
						'parent_item_colon'     => __( 'Parent Item:', PLUGIN_SLUG ),
						'all_items'             => __( 'All Testimonials', PLUGIN_SLUG ),
						'add_new_item'          => __( 'Add New Testimonial', PLUGIN_SLUG ),
						'add_new'               => __( 'Add Testimonial', PLUGIN_SLUG ),
						'new_item'              => __( 'New Testimonial', PLUGIN_SLUG ),
						'edit_item'             => __( 'Edit Testimonial', PLUGIN_SLUG ),
						'update_item'           => __( 'Update Testimonial', PLUGIN_SLUG ),
						'view_item'             => __( 'View Testimonial', PLUGIN_SLUG ),
						'search_items'          => __( 'Search Testimonial', PLUGIN_SLUG ),
						'not_found'             => __( 'Not found', PLUGIN_SLUG ),
						'not_found_in_trash'    => __( 'Not found in Trash', PLUGIN_SLUG ),
						'featured_image'        => __( 'Featured Image', PLUGIN_SLUG ),
						'set_featured_image'    => __( 'Set featured image', PLUGIN_SLUG ),
						'remove_featured_image' => __( 'Remove featured image', PLUGIN_SLUG ),
						'use_featured_image'    => __( 'Use as featured image', PLUGIN_SLUG ),
						'insert_into_item'      => __( 'Insert into Testimonial', PLUGIN_SLUG ),
						'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', PLUGIN_SLUG ),
						'items_list'            => __( 'Testimonials list', PLUGIN_SLUG ),
						'items_list_navigation' => __( 'Testimonials list navigation', PLUGIN_SLUG ),
						'filter_items_list'     => __( 'Filter Testimonials list', PLUGIN_SLUG ),


		           );
	          	$args = array(
								'label'                 => __( 'creativetestimonial', PLUGIN_SLUG ),
								'description'           => __( 'Testimonial Type Description', PLUGIN_SLUG ),
								'labels'                => $labels,
								'supports'              => array( 'title', 'thumnail' ),
								'taxonomies'            => array(),
								'hierarchical'          => true,
								'public'                => true,
								'show_ui'               => true,
								'show_in_menu'          => true,
								'menu_position'         => 20,
								'menu_icon'             => 'dashicons-format-quote',
								'show_in_admin_bar'     => true,
								'show_in_nav_menus'     => true,
								'can_export'            => true,
								'has_archive'           => true,
								'exclude_from_search'   => false,
								'publicly_queryable'    => true,
								'capability_type'       => 'post',
								'rewrite'				=> array('slug' => 'testimonial'),
		                 );
		          register_post_type('creativetestimonial',$args);
	}

	public function submenupage(){

		add_submenu_page( 'edit.php?post_type=creativetestimonial', 'Settings', 'Settings', 'manage_options', 'creative_testimonial', array($this, 'testimonial_settings_page'), '' );

	}




	public function testimonial_settings_page($rgb){
	?>
         <div class="wrap">
        <h2>Testimonials Settings</h2>
        <hr/>
		<?php

        $googlefonts = array("ABeeZee" => "ABeeZee",
        "Abel" => "Abel",
        "Abril Fatface" => "Abril+Fatface",
        "Aclonica" => "Aclonica",
        "Acme" => "Acme",
        "Actor" => "Actor",
        "Adamina" => "Adamina",
        "Advent Pro" => "Advent+Pro",
        "Aguafina Script" => "Aguafina+Script",
        "Akronim" => "Akronim",
        "Aladin" => "Aladin",
        "Aldrich" => "Aldrich",
        "Alegreya" => "Alegreya",
        "Alegreya SC" => "Alegreya+SC",
        "Alex Brush" => "Alex+Brush",
        "Alfa Slab One" => "Alfa+Slab+One",
        "Alice" => "Alice",
        "Alike" => "Alike",
        "Alike Angular" => "Alike+Angular",
        "Allan" => "Allan",
        "Allerta" => "Allerta",
        "Allerta Stencil" => "Allerta+Stencil",
        "Allura" => "Allura",
        "Almendra" => "Almendra",
        "Almendra Display" => "Almendra+Display",
        "Almendra SC" => "Almendra+SC",
        "Amarante" => "Amarante",
        "Amaranth" => "Amaranth",
        "Amatic SC" => "Amatic+SC",
        "Amethysta" => "Amethysta",
        "Anaheim" => "Anaheim",
        "Andada" => "Andada",
        "Andika" => "Andika",
        "Angkor" => "Angkor",
        "Annie Use Your Telescope" => "Annie+Use+Your+Telescope",
        "Anonymous Pro" => "Anonymous+Pro",
        "Antic" => "Antic",
        "Antic Didone" => "Antic+Didone",
        "Antic Slab" => "Antic+Slab",
        "Anton" => "Anton",
        "Arapey" => "Arapey",
        "Arbutus" => "Arbutus",
        "Arbutus Slab" => "Arbutus+Slab",
        "Architects Daughter" => "Architects+Daughter",
        "Archivo Black" => "Archivo+Black",
        "Archivo Narrow" => "Archivo+Narrow",
        "Arimo" => "Arimo",
        "Arizonia" => "Arizonia",
        "Armata" => "Armata",
        "Artifika" => "Artifika",
        "Arvo" => "Arvo",
        "Asap" => "Asap",
        "Asset" => "Asset",
        "Astloch" => "Astloch",
        "Asul" => "Asul",
        "Atomic Age" => "Atomic+Age",
        "Aubrey" => "Aubrey",
        "Audiowide" => "Audiowide",
        "Autour One" => "Autour+One",
        "Average" => "Average",
        "Average Sans" => "Average+Sans",
        "Averia Gruesa Libre" => "Averia+Gruesa+Libre",
        "Averia Libre" => "Averia+Libre",
        "Averia Sans Libre" => "Averia+Sans+Libre",
        "Averia Serif Libre" => "Averia+Serif+Libre",
        "Bad Script" => "Bad+Script",
        "Balthazar" => "Balthazar",
        "Bangers" => "Bangers",
        "Basic" => "Basic",
        "Battambang" => "Battambang",
        "Baumans" => "Baumans",
        "Bayon" => "Bayon",
        "Belgrano" => "Belgrano",
        "Belleza" => "Belleza",
        "BenchNine" => "BenchNine",
        "Bentham" => "Bentham",
        "Berkshire Swash" => "Berkshire+Swash",
        "Bevan" => "Bevan",
        "Bigelow Rules" => "Bigelow+Rules",
        "Bigshot One" => "Bigshot+One",
        "Bilbo" => "Bilbo",
        "Bilbo Swash Caps" => "Bilbo+Swash+Caps",
        "Bitter" => "Bitter",
        "Black Ops One" => "Black+Ops+One",
        "Bokor" => "Bokor",
        "Bonbon" => "Bonbon",
        "Boogaloo" => "Boogaloo",
        "Bowlby One" => "Bowlby+One",
        "Bowlby One SC" => "Bowlby+One+SC",
        "Brawler" => "Brawler",
        "Bree Serif" => "Bree+Serif",
        "Bubblegum Sans" => "Bubblegum+Sans",
        "Bubbler One" => "Bubbler+One",
        "Buda" => "Buda",
        "Buenard" => "Buenard",
        "Butcherman" => "Butcherman",
        "Butterfly Kids" => "Butterfly+Kids",
        "Cabin" => "Cabin",
        "Cabin Condensed" => "Cabin+Condensed",
        "Cabin Sketch" => "Cabin+Sketch",
        "Caesar Dressing" => "Caesar+Dressing",
        "Cagliostro" => "Cagliostro",
        "Calligraffitti" => "Calligraffitti",
        "Cambo" => "Cambo",
        "Candal" => "Candal",
        "Cantarell" => "Cantarell",
        "Cantata One" => "Cantata+One",
        "Cantora One" => "Cantora+One",
        "Capriola" => "Capriola",
        "Cardo" => "Cardo",
        "Carme" => "Carme",
        "Carrois Gothic" => "Carrois+Gothic",
        "Carrois Gothic SC" => "Carrois+Gothic+SC",
        "Carter One" => "Carter+One",
        "Caudex" => "Caudex",
        "Cedarville Cursive" => "Cedarville+Cursive",
        "Ceviche One" => "Ceviche+One",
        "Changa One" => "Changa+One",
        "Chango" => "Chango",
        "Chau Philomene One" => "Chau+Philomene+One",
        "Chela One" => "Chela+One",
        "Chelsea Market" => "Chelsea+Market",
        "Chenla" => "Chenla",
        "Cherry Cream Soda" => "Cherry+Cream+Soda",
        "Cherry Swash" => "Cherry+Swash",
        "Chewy" => "Chewy",
        "Chicle" => "Chicle",
        "Chivo" => "Chivo",
        "Cinzel" => "Cinzel",
        "Cinzel Decorative" => "Cinzel+Decorative",
        "Clicker Script" => "Clicker+Script",
        "Coda" => "Coda",
        "Coda Caption" => "Coda+Caption",
        "Codystar" => "Codystar",
        "Combo" => "Combo",
        "Comfortaa" => "Comfortaa",
        "Coming Soon" => "Coming+Soon",
        "Concert One" => "Concert+One",
        "Condiment" => "Condiment",
        "Content" => "Content",
        "Contrail One" => "Contrail+One",
        "Convergence" => "Convergence",
        "Cookie" => "Cookie",
        "Copse" => "Copse",
        "Corben" => "Corben",
        "Courgette" => "Courgette",
        "Cousine" => "Cousine",
        "Coustard" => "Coustard",
        "Covered By Your Grace" => "Covered+By+Your+Grace",
        "Crafty Girls" => "Crafty+Girls",
        "Creepster" => "Creepster",
        "Crete Round" => "Crete+Round",
        "Crimson Text" => "Crimson+Text",
        "Croissant One" => "Croissant+One",
        "Crushed" => "Crushed",
        "Cuprum" => "Cuprum",
        "Cutive" => "Cutive",
        "Cutive Mono" => "Cutive+Mono",
        "Damion" => "Damion",
        "Dancing Script" => "Dancing+Script",
        "Dangrek" => "Dangrek",
        "Dawning of a New Day" => "Dawning+of+a+New+Day",
        "Days One" => "Days+One",
        "Delius" => "Delius",
        "Delius Swash Caps" => "Delius+Swash+Caps",
        "Delius Unicase" => "Delius+Unicase",
        "Della Respira" => "Della+Respira",
        "Denk One" => "Denk+One",
        "Devonshire" => "Devonshire",
        "Didact Gothic" => "Didact+Gothic",
        "Diplomata" => "Diplomata",
        "Diplomata SC" => "Diplomata+SC",
        "Domine" => "Domine",
        "Donegal One" => "Donegal+One",
        "Doppio One" => "Doppio+One",
        "Dorsa" => "Dorsa",
        "Dosis" => "Dosis",
        "Dr Sugiyama" => "Dr+Sugiyama",
        "Droid Sans" => "Droid+Sans",
        "Droid Sans Mono" => "Droid+Sans+Mono",
        "Droid Serif" => "Droid+Serif",
        "Duru Sans" => "Duru+Sans",
        "Dynalight" => "Dynalight",
        "EB Garamond" => "EB+Garamond",
        "Eagle Lake" => "Eagle+Lake",
        "Eater" => "Eater",
        "Economica" => "Economica",
        "Electrolize" => "Electrolize",
        "Elsie" => "Elsie",
        "Elsie Swash Caps" => "Elsie+Swash+Caps",
        "Emblema One" => "Emblema+One",
        "Emilys Candy" => "Emilys+Candy",
        "Engagement" => "Engagement",
        "Englebert" => "Englebert",
        "Enriqueta" => "Enriqueta",
        "Erica One" => "Erica+One",
        "Esteban" => "Esteban",
        "Euphoria Script" => "Euphoria+Script",
        "Ewert" => "Ewert",
        "Exo" => "Exo",
        "Expletus Sans" => "Expletus+Sans",
        "Fanwood Text" => "Fanwood+Text",
        "Fascinate" => "Fascinate",
        "Fascinate Inline" => "Fascinate+Inline",
        "Faster One" => "Faster+One",
        "Fasthand" => "Fasthand",
        "Federant" => "Federant",
        "Federo" => "Federo",
        "Felipa" => "Felipa",
        "Fenix" => "Fenix",
        "Finger Paint" => "Finger+Paint",
        "Fjalla One" => "Fjalla+One",
        "Fjord One" => "Fjord+One",
        "Flamenco" => "Flamenco",
        "Flavors" => "Flavors",
        "Fondamento" => "Fondamento",
        "Fontdiner Swanky" => "Fontdiner+Swanky",
        "Forum" => "Forum",
        "Francois One" => "Francois+One",
        "Freckle Face" => "Freckle+Face",
        "Fredericka the Great" => "Fredericka+the+Great",
        "Fredoka One" => "Fredoka+One",
        "Freehand" => "Freehand",
        "Fresca" => "Fresca",
        "Frijole" => "Frijole",
        "Fruktur" => "Fruktur",
        "Fugaz One" => "Fugaz+One",
        "GFS Didot" => "GFS+Didot",
        "GFS Neohellenic" => "GFS+Neohellenic",
        "Gabriela" => "Gabriela",
        "Gafata" => "Gafata",
        "Galdeano" => "Galdeano",
        "Galindo" => "Galindo",
        "Gentium Basic" => "Gentium+Basic",
        "Gentium Book Basic" => "Gentium+Book+Basic",
        "Geo" => "Geo",
        "Geostar" => "Geostar",
        "Geostar Fill" => "Geostar+Fill",
        "Germania One" => "Germania+One",
        "Gilda Display" => "Gilda+Display",
        "Give You Glory" => "Give+You+Glory",
        "Glass Antiqua" => "Glass+Antiqua",
        "Glegoo" => "Glegoo",
        "Gloria Hallelujah" => "Gloria+Hallelujah",
        "Goblin One" => "Goblin+One",
        "Gochi Hand" => "Gochi+Hand",
        "Gorditas" => "Gorditas",
        "Goudy Bookletter 1911" => "Goudy+Bookletter+1911",
        "Graduate" => "Graduate",
        "Grand Hotel" => "Grand+Hotel",
        "Gravitas One" => "Gravitas+One",
        "Great Vibes" => "Great+Vibes",
        "Griffy" => "Griffy",
        "Gruppo" => "Gruppo",
        "Gudea" => "Gudea",
        "Habibi" => "Habibi",
        "Hammersmith One" => "Hammersmith+One",
        "Hanalei" => "Hanalei",
        "Hanalei Fill" => "Hanalei+Fill",
        "Handlee" => "Handlee",
        "Hanuman" => "Hanuman",
        "Happy Monkey" => "Happy+Monkey",
        "Headland One" => "Headland+One",
        "Henny Penny" => "Henny+Penny",
        "Herr Von Muellerhoff" => "Herr+Von+Muellerhoff",
        "Holtwood One SC" => "Holtwood+One+SC",
        "Homemade Apple" => "Homemade+Apple",
        "Homenaje" => "Homenaje",
        "IM Fell DW Pica" => "IM+Fell+DW+Pica",
        "IM Fell DW Pica SC" => "IM+Fell+DW+Pica+SC",
        "IM Fell Double Pica" => "IM+Fell+Double+Pica",
        "IM Fell Double Pica SC" => "IM+Fell+Double+Pica+SC",
        "IM Fell English" => "IM+Fell+English",
        "IM Fell English SC" => "IM+Fell+English+SC",
        "IM Fell French Canon" => "IM+Fell+French+Canon",
        "IM Fell French Canon SC" => "IM+Fell+French+Canon+SC",
        "IM Fell Great Primer" => "IM+Fell+Great+Primer",
        "IM Fell Great Primer SC" => "IM+Fell+Great+Primer+SC",
        "Iceberg" => "Iceberg",
        "Iceland" => "Iceland",
        "Imprima" => "Imprima",
        "Inconsolata" => "Inconsolata",
        "Inder" => "Inder",
        "Indie Flower" => "Indie+Flower",
        "Inika" => "Inika",
        "Irish Grover" => "Irish+Grover",
        "Istok Web" => "Istok+Web",
        "Italiana" => "Italiana",
        "Italianno" => "Italianno",
        "Jacques Francois" => "Jacques+Francois",
        "Jacques Francois Shadow" => "Jacques+Francois+Shadow",
        "Jim Nightshade" => "Jim+Nightshade",
        "Jockey One" => "Jockey+One",
        "Jolly Lodger" => "Jolly+Lodger",
        "Josefin Sans" => "Josefin+Sans",
        "Josefin Slab" => "Josefin+Slab",
        "Joti One" => "Joti+One",
        "Judson" => "Judson",
        "Julee" => "Julee",
        "Julius Sans One" => "Julius+Sans+One",
        "Junge" => "Junge",
        "Jura" => "Jura",
        "Just Another Hand" => "Just+Another+Hand",
        "Just Me Again Down Here" => "Just+Me+Again+Down+Here",
        "Kameron" => "Kameron",
        "Karla" => "Karla",
        "Kaushan Script" => "Kaushan+Script",
        "Kavoon" => "Kavoon",
        "Keania One" => "Keania+One",
        "Kelly Slab" => "Kelly+Slab",
        "Kenia" => "Kenia",
        "Khmer" => "Khmer",
        "Kite One" => "Kite+One",
        "Knewave" => "Knewave",
        "Kotta One" => "Kotta+One",
        "Koulen" => "Koulen",
        "Kranky" => "Kranky",
        "Kreon" => "Kreon",
        "Kristi" => "Kristi",
        "Krona One" => "Krona+One",
        "La Belle Aurore" => "La+Belle+Aurore",
        "Lancelot" => "Lancelot",
        "Lato" => "Lato",
        "League Script" => "League+Script",
        "Leckerli One" => "Leckerli+One",
        "Ledger" => "Ledger",
        "Lekton" => "Lekton",
        "Lemon" => "Lemon",
        "Libre Baskerville" => "Libre+Baskerville",
        "Life Savers" => "Life+Savers",
        "Lilita One" => "Lilita+One",
        "Limelight" => "Limelight",
        "Linden Hill" => "Linden+Hill",
        "Lobster" => "Lobster",
        "Lobster Two" => "Lobster+Two",
        "Londrina Outline" => "Londrina+Outline",
        "Londrina Shadow" => "Londrina+Shadow",
        "Londrina Sketch" => "Londrina+Sketch",
        "Londrina Solid" => "Londrina+Solid",
        "Lora" => "Lora",
        "Love Ya Like A Sister" => "Love+Ya+Like+A+Sister",
        "Loved by the King" => "Loved+by+the+King",
        "Lovers Quarrel" => "Lovers+Quarrel",
        "Luckiest Guy" => "Luckiest+Guy",
        "Lusitana" => "Lusitana",
        "Lustria" => "Lustria",
        "Macondo" => "Macondo",
        "Macondo Swash Caps" => "Macondo+Swash+Caps",
        "Magra" => "Magra",
        "Maiden Orange" => "Maiden+Orange",
        "Mako" => "Mako",
        "Marcellus" => "Marcellus",
        "Marcellus SC" => "Marcellus+SC",
        "Marck Script" => "Marck+Script",
        "Margarine" => "Margarine",
        "Marko One" => "Marko+One",
        "Marmelad" => "Marmelad",
        "Marvel" => "Marvel",
        "Mate" => "Mate",
        "Mate SC" => "Mate+SC",
        "Maven Pro" => "Maven+Pro",
        "McLaren" => "McLaren",
        "Meddon" => "Meddon",
        "MedievalSharp" => "MedievalSharp",
        "Medula One" => "Medula+One",
        "Megrim" => "Megrim",
        "Meie Script" => "Meie+Script",
        "Merienda" => "Merienda",
        "Merienda One" => "Merienda+One",
        "Merriweather" => "Merriweather",
        "Merriweather Sans" => "Merriweather+Sans",
        "Metal" => "Metal",
        "Metal Mania" => "Metal+Mania",
        "Metamorphous" => "Metamorphous",
        "Metrophobic" => "Metrophobic",
        "Michroma" => "Michroma",
        "Milonga" => "Milonga",
        "Miltonian" => "Miltonian",
        "Miltonian Tattoo" => "Miltonian+Tattoo",
        "Miniver" => "Miniver",
        "Miss Fajardose" => "Miss+Fajardose",
        "Modern Antiqua" => "Modern+Antiqua",
        "Molengo" => "Molengo",
        "Molle" => "Molle",
        "Monda" => "Monda",
        "Monofett" => "Monofett",
        "Monoton" => "Monoton",
        "Monsieur La Doulaise" => "Monsieur+La+Doulaise",
        "Montaga" => "Montaga",
        "Montez" => "Montez",
        "Montserrat" => "Montserrat",
        "Montserrat Alternates" => "Montserrat+Alternates",
        "Montserrat Subrayada" => "Montserrat+Subrayada",
        "Moul" => "Moul",
        "Moulpali" => "Moulpali",
        "Mountains of Christmas" => "Mountains+of+Christmas",
        "Mouse Memoirs" => "Mouse+Memoirs",
        "Mr Bedfort" => "Mr+Bedfort",
        "Mr Dafoe" => "Mr+Dafoe",
        "Mr De Haviland" => "Mr+De+Haviland",
        "Mrs Saint Delafield" => "Mrs+Saint+Delafield",
        "Mrs Sheppards" => "Mrs+Sheppards",
        "Muli" => "Muli",
        "Mystery Quest" => "Mystery+Quest",
        "Neucha" => "Neucha",
        "Neuton" => "Neuton",
        "New Rocker" => "New+Rocker",
        "News Cycle" => "News+Cycle",
        "Niconne" => "Niconne",
        "Nixie One" => "Nixie+One",
        "Nobile" => "Nobile",
        "Nokora" => "Nokora",
        "Norican" => "Norican",
        "Nosifer" => "Nosifer",
        "Nothing You Could Do" => "Nothing+You+Could+Do",
        "Noticia Text" => "Noticia+Text",
        "Nova Cut" => "Nova+Cut",
        "Nova Flat" => "Nova+Flat",
        "Nova Mono" => "Nova+Mono",
        "Nova Oval" => "Nova+Oval",
        "Nova Round" => "Nova+Round",
        "Nova Script" => "Nova+Script",
        "Nova Slim" => "Nova+Slim",
        "Nova Square" => "Nova+Square",
        "Numans" => "Numans",
        "Nunito" => "Nunito",
        "Odor Mean Chey" => "Odor+Mean+Chey",
        "Offside" => "Offside",
        "Old Standard TT" => "Old+Standard+TT",
        "Oldenburg" => "Oldenburg",
        "Oleo Script" => "Oleo+Script",
        "Oleo Script Swash Caps" => "Oleo+Script+Swash+Caps",
        "Open Sans" => "Open+Sans",
        "Open Sans Condensed" => "Open+Sans+Condensed",
        "Oranienbaum" => "Oranienbaum",
        "Orbitron" => "Orbitron",
        "Oregano" => "Oregano",
        "Orienta" => "Orienta",
        "Original Surfer" => "Original+Surfer",
        "Oswald" => "Oswald",
        "Over the Rainbow" => "Over+the+Rainbow",
        "Overlock" => "Overlock",
        "Overlock SC" => "Overlock+SC",
        "Ovo" => "Ovo",
        "Oxygen" => "Oxygen",
        "Oxygen Mono" => "Oxygen+Mono",
        "PT Mono" => "PT+Mono",
        "PT Sans" => "PT+Sans",
        "PT Sans Caption" => "PT+Sans+Caption",
        "PT Sans Narrow" => "PT+Sans+Narrow",
        "PT Serif" => "PT+Serif",
        "PT Serif Caption" => "PT+Serif+Caption",
        "Pacifico" => "Pacifico",
        "Paprika" => "Paprika",
        "Parisienne" => "Parisienne",
        "Passero One" => "Passero+One",
        "Passion One" => "Passion+One",
        "Patrick Hand" => "Patrick+Hand",
        "Patrick Hand SC" => "Patrick+Hand+SC",
        "Patua One" => "Patua+One",
        "Paytone One" => "Paytone+One",
        "Peralta" => "Peralta",
        "Permanent Marker" => "Permanent+Marker",
        "Petit Formal Script" => "Petit+Formal+Script",
        "Petrona" => "Petrona",
        "Philosopher" => "Philosopher",
        "Piedra" => "Piedra",
        "Pinyon Script" => "Pinyon+Script",
        "Pirata One" => "Pirata+One",
        "Plaster" => "Plaster",
        "Play" => "Play",
        "Playball" => "Playball",
        "Playfair Display" => "Playfair+Display",
        "Playfair Display SC" => "Playfair+Display+SC",
        "Podkova" => "Podkova",
        "Poiret One" => "Poiret+One",
        "Poller One" => "Poller+One",
        "Poly" => "Poly",
        "Pompiere" => "Pompiere",
        "Pontano Sans" => "Pontano+Sans",
        "Port Lligat Sans" => "Port+Lligat+Sans",
        "Port Lligat Slab" => "Port+Lligat+Slab",
        "Prata" => "Prata",
        "Preahvihear" => "Preahvihear",
        "Press Start 2P" => "Press+Start+2P",
        "Princess Sofia" => "Princess+Sofia",
        "Prociono" => "Prociono",
        "Prosto One" => "Prosto+One",
        "Puritan" => "Puritan",
        "Purple Purse" => "Purple+Purse",
        "Quando" => "Quando",
        "Quantico" => "Quantico",
        "Quattrocento" => "Quattrocento",
        "Quattrocento Sans" => "Quattrocento+Sans",
        "Questrial" => "Questrial",
        "Quicksand" => "Quicksand",
        "Quintessential" => "Quintessential",
        "Qwigley" => "Qwigley",
        "Racing Sans One" => "Racing+Sans+One",
        "Radley" => "Radley",
        "Raleway" => "Raleway",
        "Raleway Dots" => "Raleway+Dots",
        "Rambla" => "Rambla",
        "Rammetto One" => "Rammetto+One",
        "Ranchers" => "Ranchers",
        "Rancho" => "Rancho",
        "Rationale" => "Rationale",
        "Redressed" => "Redressed",
        "Reenie Beanie" => "Reenie+Beanie",
        "Revalia" => "Revalia",
        "Ribeye" => "Ribeye",
        "Ribeye Marrow" => "Ribeye+Marrow",
        "Righteous" => "Righteous",
        "Risque" => "Risque",
        "Roboto" => "Roboto",
        "Roboto Condensed" => "Roboto+Condensed",
        "Rochester" => "Rochester",
        "Rock Salt" => "Rock+Salt",
        "Rokkitt" => "Rokkitt",
        "Romanesco" => "Romanesco",
        "Ropa Sans" => "Ropa+Sans",
        "Rosario" => "Rosario",
        "Rosarivo" => "Rosarivo",
        "Rouge Script" => "Rouge+Script",
        "Ruda" => "Ruda",
        "Rufina" => "Rufina",
        "Ruge Boogie" => "Ruge+Boogie",
        "Ruluko" => "Ruluko",
        "Rum Raisin" => "Rum+Raisin",
        "Ruslan Display" => "Ruslan+Display",
        "Russo One" => "Russo+One",
        "Ruthie" => "Ruthie",
        "Rye" => "Rye",
        "Sacramento" => "Sacramento",
        "Sail" => "Sail",
        "Salsa" => "Salsa",
        "Sanchez" => "Sanchez",
        "Sancreek" => "Sancreek",
        "Sansita One" => "Sansita+One",
        "Sarina" => "Sarina",
        "Satisfy" => "Satisfy",
        "Scada" => "Scada",
        "Schoolbell" => "Schoolbell",
        "Seaweed Script" => "Seaweed+Script",
        "Sevillana" => "Sevillana",
        "Seymour One" => "Seymour+One",
        "Shadows Into Light" => "Shadows+Into+Light",
        "Shadows Into Light Two" => "Shadows+Into+Light+Two",
        "Shanti" => "Shanti",
        "Share" => "Share",
        "Share Tech" => "Share+Tech",
        "Share Tech Mono" => "Share+Tech+Mono",
        "Shojumaru" => "Shojumaru",
        "Short Stack" => "Short+Stack",
        "Siemreap" => "Siemreap",
        "Sigmar One" => "Sigmar+One",
        "Signika" => "Signika",
        "Signika Negative" => "Signika+Negative",
        "Simonetta" => "Simonetta",
        "Sintony" => "Sintony",
        "Sirin Stencil" => "Sirin+Stencil",
        "Six Caps" => "Six+Caps",
        "Skranji" => "Skranji",
        "Slackey" => "Slackey",
        "Smokum" => "Smokum",
        "Smythe" => "Smythe",
        "Sniglet" => "Sniglet",
        "Snippet" => "Snippet",
        "Snowburst One" => "Snowburst+One",
        "Sofadi One" => "Sofadi+One",
        "Sofia" => "Sofia",
        "Sonsie One" => "Sonsie+One",
        "Sorts Mill Goudy" => "Sorts+Mill+Goudy",
        "Source Code Pro" => "Source+Code+Pro",
        "Source Sans Pro" => "Source+Sans+Pro",
        "Special Elite" => "Special+Elite",
        "Spicy Rice" => "Spicy+Rice",
        "Spinnaker" => "Spinnaker",
        "Spirax" => "Spirax",
        "Squada One" => "Squada+One",
        "Stalemate" => "Stalemate",
        "Stalinist One" => "Stalinist+One",
        "Stardos Stencil" => "Stardos+Stencil",
        "Stint Ultra Condensed" => "Stint+Ultra+Condensed",
        "Stint Ultra Expanded" => "Stint+Ultra+Expanded",
        "Stoke" => "Stoke",
        "Strait" => "Strait",
        "Sue Ellen Francisco" => "Sue+Ellen+Francisco",
        "Sunshiney" => "Sunshiney",
        "Supermercado One" => "Supermercado+One",
        "Suwannaphum" => "Suwannaphum",
        "Swanky and Moo Moo" => "Swanky+and+Moo+Moo",
        "Syncopate" => "Syncopate",
        "Tangerine" => "Tangerine",
        "Taprom" => "Taprom",
        "Tauri" => "Tauri",
        "Telex" => "Telex",
        "Tenor Sans" => "Tenor+Sans",
        "Text Me One" => "Text+Me+One",
        "The Girl Next Door" => "The+Girl+Next+Door",
        "Tienne" => "Tienne",
        "Tinos" => "Tinos",
        "Titan One" => "Titan+One",
        "Titillium Web" => "Titillium+Web",
        "Trade Winds" => "Trade+Winds",
        "Trocchi" => "Trocchi",
        "Trochut" => "Trochut",
        "Trykker" => "Trykker",
        "Tulpen One" => "Tulpen+One",
        "Ubuntu" => "Ubuntu",
        "Ubuntu Condensed" => "Ubuntu+Condensed",
        "Ubuntu Mono" => "Ubuntu+Mono",
        "Ultra" => "Ultra",
        "Uncial Antiqua" => "Uncial+Antiqua",
        "Underdog" => "Underdog",
        "Unica One" => "Unica+One",
        "UnifrakturCook" => "UnifrakturCook",
        "UnifrakturMaguntia" => "UnifrakturMaguntia",
        "Unkempt" => "Unkempt",
        "Unlock" => "Unlock",
        "Unna" => "Unna",
        "VT323" => "VT323",
        "Vampiro One" => "Vampiro+One",
        "Varela" => "Varela",
        "Varela Round" => "Varela+Round",
        "Vast Shadow" => "Vast+Shadow",
        "Vibur" => "Vibur",
        "Vidaloka" => "Vidaloka",
        "Viga" => "Viga",
        "Voces" => "Voces",
        "Volkhov" => "Volkhov",
        "Vollkorn" => "Vollkorn",
        "Voltaire" => "Voltaire",
        "Waiting for the Sunrise" => "Waiting+for+the+Sunrise",
        "Wallpoet" => "Wallpoet",
        "Walter Turncoat" => "Walter+Turncoat",
        "Warnes" => "Warnes",
        "Wellfleet" => "Wellfleet",
        "Wendy One" => "Wendy+One",
        "Wire One" => "Wire+One",
        "Yanone Kaffeesatz" => "Yanone+Kaffeesatz",
        "Yellowtail" => "Yellowtail",
        "Yeseva One" => "Yeseva+One",
        "Yesteryear" => "Yesteryear",
        "Zeyada" => "Zeyada1",
        );
        if (isset($_POST['submit'])) {
			$parameters = array();
			$parameters['aiwidth'] = $_POST['aiwidth'];
			$parameters['aiheight'] = $_POST['aiheight'];
			$parameters['astar'] = $_POST['astar'];
			$parameters['aimgstyle'] = $_POST['aimgstyle'];
			$parameters['nof'] = $_POST['nof'];
			$parameters['son'] = $_POST['son'];
			$parameters['sbstyle'] = $_POST['sbstyle'];
			$parameters['authorimg_style'] = $_POST['authorimg_style'];
			$parameters['fsize'] = $_POST['fsize'];
			$parameters['ffamily'] = $_POST['ffamily'];
			$parameters['aname'] = $_POST['aname'];
			$parameters['aurl'] = $_POST['aurl'];
			$parameters['aimage'] = $_POST['aimage'];
			$parameters['tepagination'] = $_POST['tepagination'];
			$parameters['tcolor'] = $_POST['tcolor'];
			$parameters['bcolor'] = $_POST['bcolor'];
			$parameters['starcolor'] = $_POST['starcolor'];
			$parameters['iconcolor'] = $_POST['iconcolor'];
			$parameters['pagicolor'] = $_POST['pagicolor'];
			$parameters['pagiactivecolor'] = $_POST['pagiactivecolor'];
			$parameters['bopacity'] = $_POST['bopacity'];




		//$parameters = serialize($parameters);
		update_option( 'testimonials_settings', $parameters );
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>'.__('Settings saved.').'</strong></p></div>';
        }
        $settings = get_option('testimonials_settings');
		//echo "<pre>";
	    //print_r($settings);
        ?>


 <form method="post" action="">
 	   <table class="form-table">
       <tr>
       		<th scope="row">Author Image Width</th>
            <td><input type="text" id="aiwidth" name="aiwidth" value="<?php echo $settings['aiwidth'];?>"><p class="description">Author Image Width</p></td>
       </tr>
       <tr>
       <th scope="row">Author Image Height</th>
       <td><input type="text" id="aiheight" name="aiheight" value="<?php echo $settings['aiheight'];?>"><p class="description">Author Image Height</p></td>
       </tr>
       <tr>
       <th scope="row">Author Star</th>
       <td>
			<select name="astar" id="astar">
			<option  value="active"  <?php if($settings['astar']=='active'){echo 'selected';} ?>>ON</option>
            <option  value="deactive" <?php if($settings['astar']=='deactive'){echo 'selected';} ?>>OFF</option>
            </select><p class="description">Author Star</p>
	   </td>
       </tr>
       <tr>
       <th scope="row">Author Image Style</th>
       <td>
			<select name="aimgstyle" id="aimgstyle">
			<option  value="top" <?php if($settings['aimgstyle']=='top'){echo 'selected';} ?>>Top</option>
            <option  value="bottom" <?php if($settings['aimgstyle']=='bottom'){echo 'selected';} ?>>Bottom</option>
            <option  value="right" <?php if($settings['aimgstyle']=='right'){echo 'selected';} ?>>Right</option>
            <option  value="left" <?php if($settings['aimgstyle']=='left'){echo 'selected';} ?>>Left</option>
            </select><p class="description">Author Image Style</p>
	   </td>
       </tr>
       <tr>
       <th scope="row">No of Testimonial</th>
       <td><input type="text" id="nof" name="nof" value="<?php echo $settings['nof'];?>"><p class="description">No of Testimonial</p></td>
       </tr>
       <tr>
       <th scope="row">Autoplay</th>
       <td>
       	     <select name="son" id="son">
			<option  value="true"  <?php if($settings['son']=='true'){echo 'selected';} ?>>ON</option>
            <option  value="false"  <?php if($settings['son']=='false'){echo 'selected';} ?>>OFF</option>
            </select><p class="description">Testimonial Autoplay</p>
       </td>
       </tr>
       <tr>
       <th scope="row">Slider Button Style</th>
       <td>
			<select name="sbstyle" id="sbstyle">
			<option  value="style1"  <?php if($settings['sbstyle']=='style1'){echo 'selected';} ?>>Style 1</option>
            <option  value="style2"  <?php if($settings['sbstyle']=='style2'){echo 'selected';} ?>>Style 2</option>
            <option  value="style3"  <?php if($settings['sbstyle']=='style3'){echo 'selected';} ?>>Style 3</option>
            <option  value="style4"  <?php if($settings['sbstyle']=='style4'){echo 'selected';} ?>>Style 4</option>
    	   </select><p class="description">Slider Button Style</p>
	   </td>
       </tr>
       <tr>
       <th scope="row">Author Image Style</th>
       <td>
			<select name="authorimg_style" id="authorimg-style">
			<option  value="square"  <?php if($settings['authorimg_style']=='square'){echo 'selected';} ?>>Square</option>
            <option  value="circle"  <?php if($settings['authorimg_style']=='circle'){echo 'selected';} ?>>Circle</option>
           </select><p class="description">Choose Author Image Style</p>
	   </td>
       </tr>

       <tr><th scope="row">Font Size</th>
       <td><input type="text" id="fsize" name="fsize" value="<?php echo $settings['fsize'];?>"><p class="description">Font Size</p></td>
       </tr>
       <tr><th scope="row">Font Family</th>
       <td>
       <select id="ffamily" name="ffamily">
	<?php foreach ($googlefonts as $key=>$front){?>
    <option value="<?php echo $front;?>"  <?php if($settings['ffamily']==$front){echo 'selected';} ?>><?php echo $key;?></option>
    <?php } ?>
</select>
     <p class="description">Font Family</p></td>
       </tr>
       <tr><th scope="row">Author Name</th>
       <td><select name="aname" id="aname">
			<option  value="on"  <?php if($settings['aname']=='on'){echo 'selected';} ?>>On</option>
            <option  value="off"  <?php if($settings['aname']=='off'){echo 'selected';} ?>>OFF</option>
            </select><p class="description">Author Name</p>
       </td>
       </tr>
       <tr>
       <th scope="row">Author Url</th>
       <td>  <select name="aurl" id="aurl">
			<option  value="on"  <?php if($settings['aurl']=='on'){echo 'selected';} ?>>On</option>
            <option  value="off"  <?php if($settings['aurl']=='off'){echo 'selected';} ?>>OFF</option>
            </select><p class="description">Author Url</p>
       </td>
       </tr>
       <tr>
       <th scope="row">Author Image</th>
       <td><select name="aimage" id="aimage">
			<option  value="on"  <?php if($settings['aimage']=='on'){echo 'selected';} ?>>On</option>
            <option  value="off"  <?php if($settings['aimage']=='off'){echo 'selected';} ?>>OFF</option>
           </select><p class="description">Author Image</p>
	   </td>
       </tr>
       <tr>
       <th scope="row">Testimonial Pagination</th>
       <td> <select name="tepagination" id="tepagination">
			<option  value="true"  <?php if($settings['tepagination']=='true'){echo 'selected';} ?>>On</option>
            <option  value="false"  <?php if($settings['tepagination']=='false'){echo 'selected';} ?>>OFF</option>
            </select><p class="description">Pagination</p>
      </td>
      </tr>
      <tr>
      <th scope="row">Star Rating</th>
      <td>

      <input type="text" id="starcolor" name="starcolor" value="<?php echo $settings['starcolor'];?>" class="my-color-field" data-default-color="#effeff"> <p class="description">Star Rating Color</p>
      </td>
      </tr>

      <tr>
      <th scope="row">Next/Prev Icon Color</th>
      <td>

      <input type="text" id="iconcolor" name="iconcolor" value="<?php echo $settings['iconcolor'];?>" class="my-color-field" data-default-color="#ffffff"> <p class="description">Next/Prev Icon Color</p>
      </td>
      </tr>


      <tr>
      <th scope="row">Pagination Color</th>
      <td>

      <input type="text" id="pagicolor" name="pagicolor" value="<?php echo $settings['pagicolor'];?>" class="my-color-field" data-default-color="#effeff"> <p class="description">Pagination Color</p>
      </td>
      </tr>

       <tr>
      <th scope="row">Pagination Active Color</th>
      <td>

      <input type="text" id="pagiactivecolor" name="pagiactivecolor" value="<?php echo $settings['pagiactivecolor'];?>" class="my-color-field" data-default-color="#effeff"> <p class="description">Pagination Active Color</p>
      </td>
      </tr>

      <tr>
      <th scope="row">Text Color</th>
      <td>

      <input type="text" id="tcolor" name="tcolor" value="<?php echo $settings['tcolor'];?>" class="my-color-field" data-default-color="#effeff"> <p class="description">Text Color</p>
      </td>
      </tr>
      <tr>
      <th scope="row">Background Color</th>
      <td>
      <input type="text" id="bcolor" name="bcolor" value="<?php echo $settings['bcolor'];?>" class="my-color-field" data-default-color="#effeff"><p class="description">Background Color</p>
	  </td>
      </tr>
      <tr>
      <th scope="row">Background Color Opacity</th>
      <td>

       <input name="bopacity" id="bopacity" type ="range" min ="0" max="1" value="<?php echo $settings['bopacity'];?>" step ="0.1" />
      <p class="description">Background Color Opacity</p>
	  </td>
      </tr>

      </table>
      <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></p>

 </form>



<?php }

	public function testimonialmetaboxes(){
		  add_meta_box( 'testimonial_id', __( 'Testimonial', PLUGIN_SLUG ), array($this, 'testimonial_callback'), 'creativetestimonial', 'normal', 'high' );
	}
	public function testimonial_callback( $post ){
			$testimon = get_post_meta( $post->ID, 'testtimonial', true ) ;

		?>
        <div class="wrap">

        <?php 	if (is_array($testimon) || is_object($testimon))
{
foreach($testimon as  $authordata){ ?>
        	<div class="testwrap">

				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Name:</span>
				</div>
				<div>
					<input required="required" type="text" name="authorname[]" value="<?php echo $authordata['author_name']; ?>" placeholder="Author Name" class="txt-focus regular-text code" />
					</div>
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Url:</span></div>
					<div>
					<input type="text" name="authorurl[]" value="<?php echo $authordata['author_url']; ?>" placeholder="Author url" class="txt-focus regular-text code" /></div>
				</div>
                	<div class="form-row">
                	<div class="title_row">
					<span class="description">Designation:</span></div>
					<div>
					<input type="text" name="designation[]" value="<?php echo $authordata['designation']; ?>" placeholder="Designation" class="txt-focus regular-text code" /></div>
				</div>

                <div class="form-row">
                	<div class="title_row">
					<span class="description">Star Rating:</span></div>
					<div>
                    <?php
					$gd=$authordata['starrating'];
				for($i = 1; $i <= 5; $i++ ) {
					if($i <= $gd) { ?>
						<div dt="<?php echo $i;?>" class="dashicons dashicons-star-filled rt-star rt-<?php echo $i;?>"></div>
					<?php } else { ?>
						<div dt="<?php echo $i;?>" class="dashicons dashicons-star-empty rt-star rt-<?php echo $i;?>"></div>
				<?php }
				} ?>
				 <input type="hidden" name="testimonial_star[]" value="<?php echo $gd;?>" />
                    </div>
				</div>


				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Content:</span></div>
					<div><textarea cols="14" rows="2" class="authorcontent" name="authorcontent[]"><?php echo $authordata['author_content']; ?></textarea></div>
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Photo:</span></div>
				<div>
                	<?php
					                    $thumbnail_url = '';
										$thumbnail_id = $authordata['auth_image_id'];
										if ($thumbnail_id) {
											$thumbnail_url = wp_get_attachment_thumb_url( $thumbnail_id );
										}
										$upload_button_status = ' style="display:none;" ';
										if ( empty( $thumbnail_url ) ) {
											$upload_button_status = '';
										}

					?>
                 <input type="hidden" name="testimonial_id[]" value="<?php echo esc_attr( $authordata['auth_image_id'] ); ?>" class="author_image_id" />
						<input type="button" class="select_img button button-primary" value="<?php _e( 'Upload', 'npcl' ); ?>" data-uploader_button_text="<?php _e( 'Select' );?>" data-uploader_title="<?php _e( 'Select Image' );?>" <?php echo $upload_button_status; ?>/>
                        <?php
						$style_text="display:none;";
										if ( !empty($thumbnail_url)) {
											$style_text = '';
										}
						?>
						<div class="author_wrap"   style="<?php echo $style_text; ?>">

							<img class="authorimage" alt="" src="<?php echo $thumbnail_url; ?>" />
							<a href="#" class="btn_remove_image">
								<span>Remove</span>
							</a>
						</div>
						</div>

				</div>
                 <input type="button" value="<?php  esc_attr( _e( 'Remove') ); ?>" class="button button-primary btn_remove_item"/>
				</div>
                <?php }
				}
				 ?>
                <div id="main_list_wrap"></div>


        <p><input type="button" value="<?php  esc_attr( _e( 'Add New Testimonial', PLUGIN_SLUG ) ); ?>" class="button button-primary btn-add-item" /></p>
        </div>
        <?php


	}

	public function admin_scripts(){
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_media();
		wp_enqueue_script('testimonial', PLUGIN_JS_PATH .'testimonial.js', '1.0.0');
		wp_enqueue_script( 'my-script', PLUGIN_JS_PATH .'my-script.js', array( 'wp-color-picker' ), '1.0.0', false );



	}
	public function admin_styles(){
		wp_enqueue_style('testimonial', PLUGIN_CSS_PATH . 'testimonial.css', '1.0.0');


	}


	public function frontend_styling(){
		wp_enqueue_style('bootstrap-min', PLUGIN_CSS_PATH . 'bootstrap.min.css', '');
		wp_enqueue_style('font-awesome', PLUGIN_CSS_PATH . 'font-awesome.css', '');
		wp_enqueue_style('stylesheet-testimonial', PLUGIN_CSS_PATH . 'stylesheet_testimonial.css','');


	}
	public function frontend_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_script('owl-carousel', PLUGIN_JS_PATH .'owl.carousel.js', '','',false);


	}
	public function testimonial_save_data($post_id){

		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if( !current_user_can( 'edit_post' , $post_id ) )
			return $post_id;
		$author_array = array();
 		if ( isset( $_POST['authorname'] ) ) {

			$author_array = $_POST['authorname'];

		}
		if ( empty( $author_array ) ) {
			return;
		}
		$testiarray = array();
		$i = 0;
		foreach($author_array as $key => $auth){
			if ( empty( $auth ) ) {
				continue;
			}
			$testiarray[$i]['author_name']              =  $_POST['authorname'][$key] ;
			$testiarray[$i]['author_url']               =  $_POST['authorurl'][$key] ;
			$testiarray[$i]['author_content']           =  esc_textarea($_POST['authorcontent'][$key]) ;
			$testiarray[$i]['designation']              =  $_POST['designation'][$key] ;
			$testiarray[$i]['starrating']               =  $_POST['testimonial_star'][$key] ;
			$testiarray[$i]['auth_image_id']            =  $_POST['testimonial_id'][$key];
			$i++;

		}

if(! empty( $testiarray )){
update_post_meta($post_id, 'testtimonial', $testiarray);
} else{
}

	}

	public function add_testimonial(){

		?>
        <script type="text/javascript">
		jQuery(document).ready(function(){

		jQuery("body").on("click", ".rt-star", function() {
						var cntStar = jQuery(this).attr("dt");
						var cntStar1 = jQuery(this).parent();
						for(var i=1; i <= 5; i++) {
							if(i <= cntStar) {
								cntStar1.find(".rt-"+i).removeClass("dashicons-star-empty");
								cntStar1.find(".rt-"+i).addClass("dashicons-star-filled");
							}
							else {
								cntStar1.find(".rt-"+i).removeClass("dashicons-star-filled");
								cntStar1.find(".rt-"+i).addClass("dashicons-star-empty");
							}
						}
						cntStar1.find("input[name='testimonial_star[]']").val(cntStar);

					});
					});

		</script>
        <script type="text/javascript" id='template_testimoninal'>
			<div class="testwrap">
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Name:</span>
				</div>
				<div>
					<input required="required" type="text" name="authorname[]" value="" placeholder="Author Name" class="txt-focus regular-text code" />
					</div>
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Url:</span></div>
					<div>
					<input type="text" name="authorurl[]" value="" placeholder="Author url" class="txt-focus regular-text code" /></div>
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Designation:</span></div>
					<div>
					<input type="text" name="designation[]" value="" placeholder="Designation" class="txt-focus regular-text code" /></div>
				</div>
				<div class="form-row">
					<div class="title_row">
						<span class="description">Star Rating</span>
					</div>
					<?php
				for($i = 1; $i <= 5; $i++ ) { ?>

						<div dt="<?php echo $i;?>" class="dashicons dashicons-star-empty rt-star rt-<?php echo $i;?>"></div>
				<?php
				} ?>
				 <input type="hidden" name="testimonial_star[]" value="" />
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Content:</span></div>
					<div><textarea cols="14" rows="2" class="authorcontent" name="authorcontent[]"></textarea></div>
				</div>
				<div class="form-row">
				<div class="title_row">
					<span class="description">Author Photo:</span></div>
				<div>	<input type="hidden" name="testimonial_id[]" value="" class="author_image_id" />
						<input type="button" class="select_img button button-primary" value="<?php _e( 'Upload' ); ?>" data-uploader_button_text="<?php _e( 'Select' );?>" data-uploader_title="<?php _e( 'Select Image' );?>" />
						<div class="author_wrap" style="display:none;" >
							<img class="authorimage" alt="" src="" />
							<a href="#" class="btn-remove-image-upload">
								<span>Remove</span>
							</a>
						</div>
						</div>
				</div>
				<input type="button" value="<?php  esc_attr( _e( 'Remove') ); ?>" class="button btn_remove_item button-primary"/>
				</div>
		</script>
        <?php
	}

	public function testimonial_column( $columns){
		$new_columns['cb']     = '<input type="checkbox" />';
		$new_columns['title']  = $columns['title'];
		$new_columns['cpteston']  = __( 'Shortcode' );
		$new_columns['categories'] = __('Categories');
		$new_columns['date']   = $columns['date'];
		return $new_columns;

	}
	public function testimonial_content($column_name, $post_id){

		switch ( $column_name ) {
			case 'cpteston':
			echo '[CPTESTIMONIAL id="'.$post_id.'"]';
				break;

			default:
				break;
		}
	}
	private function get_image_sizes(){
	 global $_wp_additional_image_sizes;
        $sizes = array();
   $get_intermediate_image_sizes = get_intermediate_image_sizes();    // Create the full array with sizes and crop info
   foreach( $get_intermediate_image_sizes as $_size ) {      if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {        $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
       $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
       $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );      } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {        $sizes[ $_size ] = array(
               'width' => $_wp_additional_image_sizes[ $_size ]['width'],
               'height' => $_wp_additional_image_sizes[ $_size ]['height'],
               'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
       );      }    }        return $sizes;
    }

	public function shortcode_callback($atts, $content = "" ){

		 $atts = shortcode_atts( array(
        'id' => '',
    ), $atts, 'CPTESTIMONIAL' );

    $atts['id'] = absint($atts['id']);

	//print_r($atts);
	$testdata=get_post_meta($atts['id'], 'testtimonial', true);
	//echo "<pre>";
	//print_r($testdata);
	$testimonials_settings=get_option('testimonials_settings');
	$testimonials_width=$testimonials_settings['aiwidth'];
	$testimonials_height=$testimonials_settings['aiheight'];
	$testimonials_aimgstyle=$testimonials_settings['aimgstyle'];
	$testimonials_starcolor=$testimonials_settings['starcolor'];
	$testimonials_tcolor=$testimonials_settings['tcolor'];
	$testimonials_bcolor=$testimonials_settings['bcolor'];
	$testimonials_iconcolor=$testimonials_settings['iconcolor'];
	$testimonials_pagicolor=$testimonials_settings['pagicolor'];
	$testimonials_pagiactivecolor=$testimonials_settings['pagiactivecolor'];
    $testimonials_ffamily=$testimonials_settings['ffamily'];
	$testimonials_fsize=$testimonials_settings['fsize'];
	$testimonials_sbstyle=$testimonials_settings['sbstyle'];
	$testimonials_bopacity=$testimonials_settings['bopacity'];

	$output .=' <style type="text/css">

	.pcolor, .hcolor > a, .f_designation{font-family:"'.$testimonials_ffamily.'";font-style:italic;font-size:'.$testimonials_fsize.'px;}
	.rating_on_off{color:'.$testimonials_starcolor.';}
	.owl-wrapper-outer{opacity:'.$testimonials_bopacity.';}
	.owl-buttons div.testimonial_prev::before, .owl-buttons div.testimonial_next::before{color:'.$testimonials_iconcolor.';}
	.owl-controls .owl-page span{background:'.$testimonials_pagicolor.';opacity:1;}
	.owl-pagination .owl-page:hover span, .owl-pagination .owl-page:focus span, .owl-pagination .owl-page.active span{background:'.$testimonials_pagiactivecolor.';}
	</style>';

	if($testimonials_settings['authorimg_style']=='circle'){
		$img_style="img-circle";

	}else{
		$img_style=" ";
	}

	if($testimonials_aimgstyle=='top'){
		$style='';

	}elseif($testimonials_aimgstyle=='bottom'){
		$style='';
	}
	elseif($testimonials_aimgstyle=='right'){
		$style='rightfigure';
	}
	elseif($testimonials_aimgstyle=='left'){
		$style='leftfigure';
	}
	$output .=' <style type="text/css">

	.item > figure{width:'.$testimonials_width.'vw !important;height:'.$testimonials_height.'vw !important;}

	</style>';

	if($testimonials_settings['aimage']=='off'){
				$output .=' <style type="text/css">

	.item > figure{display:none;}

	</style>';
			}

	if($testimonials_settings['astar']=='deactive'){
				$output .=' <style type="text/css">

	.rating_on_off{display:none;}

	</style>';
			}


	if($testimonials_settings['aname']=='off'){
				$output .=' <style type="text/css">

	.item > h5{display:none;}

	</style>';
			}
	if($testimonials_tcolor){
				$output .=' <style type="text/css">

	.pcolor, .hcolor > a, .hcolor > i, .hcolor > span, .cp_designation{color:'.$testimonials_tcolor.';}

	</style>';
			}
	if($testimonials_bcolor){
				$output .=' <style type="text/css">

	.testimonial-sect::before{background:none;}
	.testimonial-sect{background:'.$testimonials_bcolor.';}
	</style>';
			}
	?>
    <?php
    if($testimonials_settings['sbstyle']=='style1'){
		?>
        <style>
		.owl-buttons div.testimonial_prev:before{content:'\f191 ';}

.owl-buttons div.testimonial_next:before{content:'\f152   ';}
</style>
        <?php
	}elseif($testimonials_settings['sbstyle']== 'style2'){
		?>
        <style>
		.owl-buttons div.testimonial_prev:before{content:'\f104  ';}

.owl-buttons div.testimonial_next:before{content:'\f105   ';}
</style>
        <?php
	}elseif($testimonials_settings['sbstyle']== 'style3'){
		?>
        <style>
		.owl-buttons div.testimonial_prev:before{content:'\f177  ';}

.owl-buttons div.testimonial_next:before{content:'\f178   ';}
</style>
        <?php
	}elseif($testimonials_settings['sbstyle']== 'style4'){
		?>
        <style>
		.owl-buttons div.testimonial_prev:before{content:'\f137   ';}

.owl-buttons div.testimonial_next:before{content:'\f138    ';}
</style>
        <?php
	}
     ?>
    <style type="text/css">
	a{box-shadow:none !important;color:#3F3F3F;}
	.wmax{height:100%;}
	.hcolor > i {

    padding: 0 10px;
}
	.testimonial{background:none !important; border:none !important;}
	.testimonial1 .owl-buttons .owl-prev::before, .testimonial1 .owl-buttons .owl-next::before{background:none !important;}
	.owl-theme{opacity:1;}
	.pcolor{padding:0 15px;}
	.pcolor::before{}
	.pcolor::after{}
	.cp_designation{padding-left:5px;}
	.testimonial1 .owl-pagination{bottom:0px;}
	.testimonial1 .testimonial-sect{padding: 0 55px;}
	</style>
	 <script type="text/javascript">
	  jQuery(document).ready(function($){
		  //alert(121);
jQuery(".testimonial-sect").owlCarousel({
		items:<?php echo esc_attr( $testimonials_settings['nof'] ); ?>,
		autoPlay: <?php echo $testimonials_settings['son']; ?>,
		navigation : true,
		 pagination : <?php echo $testimonials_settings['tepagination']; ?>,
		slideSpeed : 300,
		paginationSpeed : 400,
	   itemsDesktop : [1199, 1],
        itemsDesktopSmall : [979, 1],
		 itemsTablet : [768, 1],

});

	  });
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	//alert(121);
   jQuery('body').find('.owl-prev').addClass('dashicons dashicons-arrow-left-alt2');
   jQuery('body').find('.owl-next').addClass('dashicons dashicons-arrow-right-alt2');

   // jQuery('body').find('.aurl').removeAttr('href');

});
</script>
<?php

	$output .='<section class="wrapper testimonial1">

<div class="text-center">





    <div class="owl-carousel testimonial-sect">';
	$j=1;
	foreach($testdata as $authordata){
	 $attachment = get_post($authordata['auth_image_id']);
	 $author_settings['random_id'] = uniqid(esc_attr($atts['id']).'-');
	 $image_info = wp_get_attachment_image_src( $attachment->ID, $author_settings['image_size'] );
     $image_url  = array_shift($image_info);

      $output .='<div class="item testimonial">';
	 if($testimonials_aimgstyle=="bottom"){
	  $output .='<p class="pcolor">'. $authordata['author_content'] .'</p>
            <h5 class="hcolor"><i class="fa fa-user"></i><span>&mdash;</span><a href="'.esc_url ($authordata['author_url']).'" class="aurl">'. $authordata['author_name'].'</a><span class="cp_designation'.$j.' f_designation">'. $authordata['designation'] .' </span></h5>';

	  }else{
		  $output .='';

	  }
	  if( !empty($authordata['designation'])){
		$output .=' <style type="text/css">
		.cp_designation'.$j.'::before {content: "/";padding:0 5px;}

	</style>';

	}else{
		$output .='';
	}

            $output .=' <figure class="'.$style.'">
			<img src="'.esc_url( $image_url ).'" class="wmax '.$img_style.'">';

            $output .='</figure><div claa="rating_wrapper">';
			$sa=$authordata['starrating'];
             for($i = 1; $i <= 5; $i++ ) {
					if($i <= $sa) {
						$output .='<div dt="'.$i.'" class="rating_on_off dashicons dashicons-star-filled rt-star rt-'.$i.'"></div>';
					} else {
						$output .='<div dt="'.$i.'" class="rating_on_off dashicons dashicons-star-empty rt-star rt-'.$i.'"></div>';
				 }
				}
				$output .=' </div>';
          if($testimonials_aimgstyle=="top" || $testimonials_aimgstyle=="left" || $testimonials_aimgstyle=="right"){
             $output .='<p class="pcolor">'. $authordata['author_content'] .'</p>
            <h5 class="hcolor"><i class="fa fa-user"></i><span>&mdash;</span><a href="'.esc_url ($authordata['author_url']).'" class="aurl">'. $authordata['author_name'].'</a><span class="cp_designation'.$j.' f_designation">'. $authordata['designation'] .' </span></h5>';
		  }
		  else{
		  $output .='';

	  }
      $output .=' </div>';
      $j++;

	}

    $output .='</div>


</div>


</section>';

	return $output;
	?>

    <?php

	}


}

$Creative_Testimonial = new Creative_Testimonial();


?>
