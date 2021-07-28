<?php 
use Carbon_Fields\Block;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();

// Default options page
$basic_options_container = Container::make( 'theme_options', __( 'Basic Options' ) )
    ->add_fields( array(
        Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script' ) ),
        Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script' ) ),
    ) );

// Add second options page under 'Basic Options'
Container::make( 'theme_options', __( 'Contact Information' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'text', 'crb_phone_number', __( 'Phone' ) ),
        Field::make( 'icon', 'crb_phone_icon', __( 'Phone Icon' ) ),
        Field::make( 'text', 'crb_email', __( 'Email' ) ),
        Field::make( 'icon', 'crb_email_icon', __( 'Email Icon' ) ),
        Field::make( 'text', 'crb_address', __( 'Address' ) ),
        Field::make( 'icon', 'crb_address_icon', __( 'Address Icon' ) ),
        Field::make( 'text', 'crb_post_code', __( 'Post Code/ZIP' ) ),
        Field::make( 'text', 'crb_map_link', __( 'Map Link' ) ),
    ) );

// Add second options page under 'Basic Options'
Container::make( 'theme_options', __( 'Social Links' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
      Field::make( 'complex', 'crb_socialmedia', 'Social Media' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'title', 'Title' ),
                    Field::make( 'text', 'url', 'Your Social Url' ),
                    Field::make( 'icon', 'smicon', 'Icon' ),
                ) ),
        
    ) );

// Add third options page under "Appearance"
Container::make( 'theme_options', __( 'Customize Background' ) )
    ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
    ->add_fields( array(
        Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
        Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
    ) );

    // Slider blocks 
	Block::make( __( 'My Slider' ) )
	->add_fields( array(
            Field::make( 'complex', 'crb_slides', 'Slides' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'title', 'Title' ),  
                    Field::make( 'text', 'subtitle', 'Sub Title' ),                    
                    Field::make( 'image', 'image', 'Image' ),                   
                ) ),
        ) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {       
            echo '<div class="slideshow-container">';            
            foreach ( $fields as $slide ) {
                 foreach ( $slide as $item ) {                
                ?> 
                <div class="mySlides fadeeffect">   
                    <div class="overlayer"></div>                
                    <img src="<?php echo wp_get_attachment_url( $item['image'] ); ?>" style="width:100%">
                    <div class="text">
                    <h2><?php echo $item['title']; ?></h2>
                    <h3><?php echo $item['subtitle']; ?></h3>
                    </div>
                </div>
                <?php
                 }               
            }
            ?>
           <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
           <a class="next" onclick="plusSlides(1)">&#10095;</a>
           </div>
           <?php
	} );



    // Icon blocks here...
Block::make( __( 'My Icon Block' ) )
	->add_fields( array(
		Field::make( 'icon', 'social_site_icon', __( 'Icon', 'crb' ) )      
	    ->add_fontawesome_options(),
    Field::make( 'text', 'icon_title', 'Title' ),  
    Field::make( 'text', 'icon_subtitle', 'Sub Title' ),
     Field::make( 'color', 'crb_color', __( 'Color' ) ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        
		?>

			<div class="icon__sec" style="color:<?php echo $fields['crb_color']; ?>">
			<div class="icon"><i  class="fa fa-<?php echo  $fields['social_site_icon']['icon']; ?>"></i></div>
			
      <div class="icon_title"><h2><?php echo $fields['icon_title']; ?></h2></div>
      <div class="icon_subtitle"><h3><?php echo $fields['icon_subtitle']; ?></h3></div>
	
</div>
		<?php
	} );

}
add_action( 'after_setup_theme', 'crb_load' );