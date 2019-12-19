<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 02.12.2016
 * Time: 12:26
 */

//erstellt a VC Element, wobei der Nutzer ein Product anglegen kann


class vcProductElement extends WPBakeryShortCode
{

	function __construct()
	{
		add_action('init', array($this, 'vc_infobox_mapping'));
		add_shortcode('vc_infobox', array($this, 'vc_infobox_html'));

	}


	public function vc_infobox_mapping()
	{

		if (!defined('WPB_VC_VERSION')) {
			return;
		}

		$beschreibungVorlage = "
			<ul>
			<li>Erste Zeile</li>
			<li>Zweite Zeile</li>
			</ul>
			";

		//map the block
		vc_map(
			array(
				'name' => __('Neues Product Element', 'text-domain'),
				'base' => 'vc_infobox',
				'description' => 'Lässt den Nutzer ein neues Produkt anlegen',
				'category' => __('My Custom Elements', 'text-domain'),

				'params' => array(

					array(
						'type' => 'textfield',
						'holder' => 'h3',
						'class' => 'title-class',
						'heading' => __('Title', 'text-domain'),
						'param_name' => 'title',
						'value' => __('Title Text', 'text-domain'),
						'description' => __('Box Title', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),
					array(
						'type' => 'textarea',
						'holder' => 'div',
						'class' => 'text-class',
						'heading' => __('Produkt Beschreibung', 'text-domain'),
						'param_name' => 'beschreibung',
						'value' => __($beschreibungVorlage, 'text-domain'),
						'description' => __('Box Text', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

					//Die 4 Bilder wie auf https://www.bachelorprint.de/studienarbeiten/bachelorarbeit-drucken-binden/

					array(
						'type' => 'attach_image',
						'holder' => 'img',
						'class' => '',
						'heading' => __('Product Image', 'text-domain'),
						'param_name' => 'image_url_1',
						'description' => __('Custom Image', 'text-domain'),
						'group' => 'Custom Group',
					),
					array(
						'type' => 'attach_image',
						'holder' => 'img',
						'class' => '',
						'heading' => __('Product Image', 'text-domain'),
						'param_name' => 'image_url_2',
						'description' => __('Custom Image', 'text-domain'),
						'group' => 'Custom Group',
					),
					array(
						'type' => 'attach_image',
						'holder' => 'img',
						'class' => '',
						'heading' => __('Product Image', 'text-domain'),
						'param_name' => 'image_url_3',
						'description' => __('Custom Image', 'text-domain'),
						'group' => 'Custom Group',
					),
					array(
						'type' => 'attach_image',
						'holder' => 'img',
						'class' => '',
						'heading' => __('Product Image', 'text-domain'),
						'param_name' => 'image_url_4',
						'description' => __('Custom Image', 'text-domain'),
						'group' => 'Custom Group',
					),

					//END BILDER SECTION

					array(
						'type' => 'textarea',
						'holder' => 'div',
						'class' => 'text-class',
						'heading' => __('Bookmark Text', 'text-domain'),
						'param_name' => 'bookmark_text',
						'value' => __('Bookmark Text', 'text-domain'),
						'description' => __('Box Text', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

					array(
						'type' => 'checkbox',
						'class' => 'text-class',
						'heading' => __('Bookmark zeigen', 'text-domain'),
						'param_name' => 'bookmark_active',
						'value' => array(
							'Bookmark Zeigen' => 'checkbox_option',
						),
						'description' => __('Wenn gekreuzt, wird das Bookmark gezeigt', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

					array(
						'type' => 'textfield',
						'holder' => 'h4',
						'class' => 'text-class',
						'heading' => __('Preis', 'text-domain'),
						'param_name' => 'preis',
						'value' => __('preis', 'text-domain'),
						'description' => __('Box Text', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => 'text-class',
						'heading' => __('Button Text', 'text-domain'),
						'param_name' => 'button_text',
						'value' => __('Your Text Here', 'text-domain'),
						'description' => __('Box Text', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => 'text-class',
						'heading' => __('Button URL', 'text-domain'),
						'param_name' => 'button_url',
						'value' => __('http://www.beispiel.be', 'text-domain'),
						'description' => __('Custom Link', 'text-domain'),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'Custom Group',
					),

				)

			)
		);

	}

	public function vc_infobox_html($atts)
	{
        ob_start();
		$title = null;
		$beschreibung = null;
		$image_url_1 = null;
		$image_url_2 = null;
		$image_url_3 = null;
		$image_url_4 = null;
		$bookmark_text = null;
		$bookmark_active = null;
		$preis = 0;
		$button_text = null;
		$button_url = null;
		$images = array();

		extract(
			shortcode_atts(
				array(
					'title' => '',
					'beschreibung' => '',
					'image_url_1' => '',
					'image_url_2' => '',
					'image_url_3' => '',
					'image_url_4' => '',
					'bookmark_text' => '',
					'bookmark_active' => '',
					'preis' => '',
					'button_text' => '',
					'button_url' => '',
				),
				$atts
			)
		);

		for ($i = 1; $i <= 4; $i++) {
			$images[$i] = array(
				'url' => wp_get_attachment_image_src($atts['image_url_' . $i], 'full')[0],
				'alt' => get_post_meta($atts['image_url_' . $i], '_wp_attachment_image_alt', true),
				'title' => get_the_title($atts['image_url_' . $i])
			);
		}

		/*
		*   If Checkbox ist gechecked, wird das Bookmark gezeigt. Und nur während eine Bookmark Text ist nicht gleich null.
		*/
		if (strlen($bookmark_active) == 0) {
			$bookmark_active = "unchecked";
		} elseif (strlen($bookmark_active) == 15) {
			$bookmark_active = "checked";
		}

		if ($bookmark_active == "checked") {
			if (!empty($bookmark_text) && (strlen($bookmark_text) < 30)) {
				$flag = "<div class=\"recommended_item\"><div class=\"bookmark-img\" style=\"background-image: url(https://www.bachelorprint.de/woocommerce_calculator/wp-content/themes/bachelorprint-theme/images/bookmark-empfehlung.png);\">
	                    <div class=\"bookmark-text\"> $bookmark_text  </div>
	                    </div></div>";
			} else {
				$flag = "";
			}
		}
		echo '
<section class="vc_rows wpb_rows vc_rows-fluid">
	<div class="container">
		<div class="wpb_column vc_column_container twelve columns">
			<div class="wpb_wrapper">
				<div class="wpb_text_column wpb_content_element ">
					<div class="wpb_wrapper">
						<div class="container">
							<div class="gtec-item has-post-thumbnail">
								<div class="images col-md-4 col-xs-12">
									' . $flag . '
									    <a href="javascript:;" itemprop="image" srcex="' . $images[1]['url'] . '" class="zoom" title="">
                                            <img width="500" height="500" src="' . $images[1]['url'] . '" class="thumbnail-enlarged attachment-shop_single size-shop_single wp-post-image" alt="' . $images[1]['alt'] . '" title="' . $images[1]['title'] . '"  sizes="(max-width: 500px) 100vw, 500px">
                                        </a>
									<div id="thumbs-gallery" class="thumbnails columns-3">
										<a href="javascript:;" class="zoom " title="">
											<img width="180" height="180" src="' . $images[2]['url'] . '" class="attachment-thumbnail" alt="' . $images[2]['alt'] . '" title="' . $images[2]['title'] . '" srcset="' . $images[2]['url'] . '" sizes="(max-width: 180px) 100vw, 180px">
										</a>
										<a href="javascript:;" class="zoom" title="">
											<img width="180" height="180" src="' . $images[3]['url'] . '" class="attachment-thumbnail" alt="' . $images[3]['alt'] . '" title="' . $images[3]['title'] . '" srcset="' . $images[3]['url'] . '" sizes="(max-width: 180px) 100vw, 180px">
										</a>
										<a href="javascript:;" class="zoom last" title="">
											<img width="180" height="180" src="' . $images[4]['url'] . '" class="attachment-thumbnail" alt="' . $images[4]['alt'] . '" title="' . $images[4]['title'] . '" srcset="' . $images[4]['url'] . '" sizes="(max-width: 180px) 100vw, 180px">
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
								<div class="summary entry-summary">
									<h3 itemprop="name" class="entry-title">' . $title . '</h3>
									<div itemprop="description" class="description">
										' . $beschreibung . '
									</div>
								</div>
								<div class="item-information">
									<p class="item-custom">' . __('Preis:', 'bachelorprint'). ' ' . $preis . '</p>
									<form action="https://www.bachelorprint.de/24h-online-shop" method="get">
										<input type="hidden" name="item_id" value="90">
										<a href=" ' . $button_url . ' ">
											<button type="button" class="btn-sm shop-button blue single-product-btn" value="">' . $button_text . '</button>
										</a>
									</form>
								</div>
								<div class="item-display">
									<span class="green"></span><span>'. __('Sofort lieferbar.', 'bachelorprint') . '</span>
								</div>
								<div class="product_meta"></div>
							</div> <!-- end "itemscope" -->
						</div> <!-- end "container" -->
					</div> <!-- end "wpb_wrapper" -->
				</div> <!-- end "wpb_text_column wpb_content_element " -->
			</div> <!-- end "wpb_wrapper" -->
		</div> <!-- end "wpb_column vc_column_container twelve columns"-->
	</div> <!-- end "container"-->
</section> <!-- -->
';
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
	}
} //end Class

new vcProductElement();
