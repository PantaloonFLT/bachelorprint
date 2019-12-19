<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'Options mega menu', 'Header settings' )
->add_tab( 'Site url for default menu', array(
    Field::make( 'complex', 'crb_site_url', 'Site url' )
    ->setup_labels( array(
        'plural_name' => 'url',
        'singular_name' => 'url'
    ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_url', 'Link' )->set_width( 100 )
    ) )
) )
->add_tab( 'Header without elements shop', array(
    Field::make( 'complex', 'crb_relative_links_without_el_shop', 'Relative links' )
    ->setup_labels( array(
        'plural_name' => 'links',
        'singular_name' => 'link'
    ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_link', 'Link' )->set_width( 100 )
    ) )
) )
->add_tab( 'Custom sticky navigation', array(
    Field::make( 'complex', 'crb_relative_links', 'Relative links' )
    ->setup_labels( array(
        'plural_name' => 'links',
        'singular_name' => 'link'
    ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_link', 'Link' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_de', 'Sticky navigation (de)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_en', 'Sticky navigation (en)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_pl', 'Sticky navigation (pl)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_at', 'Sticky navigation (at)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_ch', 'Sticky navigation (ch)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_tr', 'Sticky navigation (tr)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_nl', 'Sticky navigation (nl)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_fr', 'Sticky navigation (fr)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_it', 'Sticky navigation (it)' )->set_width( 100 ),
        Field::make( 'rich_text', 'crb_sticky_es', 'Sticky navigation (es)' )->set_width( 100 )
    ) )
) )
->add_tab( 'Sticky navigation for shop', array(
    Field::make( 'complex', 'crb_relative_links_shop', 'Relative links' )
    ->setup_labels( array(
        'plural_name' => 'links',
        'singular_name' => 'link'
    ) )
    ->add_fields( array(
        Field::make( 'text', 'crb_link', 'Link' )->set_width( 100 )
    ) )
) )
->add_tab( 'Menu settings', array(
    Field::make( 'radio', 'crb_menu_thumbnail', 'Menu thumbnail' )->set_width( 100 )
    ->add_options( array(
        'on'  => 'On',
        'off' => 'Off'
    ) )
    ->set_default_value( 'off' )
    ->set_required( true ),
    Field::make( 'text', 'crb_phone_de', 'Phone (de)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_en', 'Phone (en)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_pl', 'Phone (pl)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_at', 'Phone (at)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_ch', 'Phone (ch)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_tr', 'Phone (tr)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_nl', 'Phone (nl)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_fr', 'Phone (fr)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_it', 'Phone (it)' )->set_width( 100 ),
    Field::make( 'text', 'crb_phone_es', 'Phone (es)' )->set_width( 100 )
) );
Container::make( 'nav_menu_item', 'Menu options', 'Menu settings' )
->add_fields( array(
    Field::make( 'radio', 'crb_show_thumbnail', 'Show thumbnail' )
    ->add_options( array(
        'off' => 'show menu',
        'on'  => 'show thumbanail'
    ) )
    ->set_default_value( 'off' )
    ,
    Field::make( 'text', 'crb_thumbnail', 'Image' ),
    Field::make( 'text', 'crb_thumbnail_link', 'Link' ),
    Field::make( 'complex', 'crb_sub_menu', 'Sub menu' )
    ->setup_labels( array(
        'plural_name' => 'sub menus',
        'singular_name' => 'sub menu'
    ) )
    ->add_fields( array(
        Field::make( 'select', 'sub_menu', 'Sub menu' )->set_width( 100 )
        ->add_options( bp_get_menu_names() )
    ) )
) );