<?php

return [
    'flex-section' => [
        'name' => 'Section flexible',
        'description' => 'Une section universelle qui accepte tout type de bloc avec des contrôles complets de mise en page, dimensionnement et style.',

        'presets' => [
            'custom_section' => [
                'name' => 'Section personnalisée',
                'category' => 'Mise en page',
            ],
        ],

        'settings' => [
            'layout_header' => 'Mise en page',

            'direction_label' => 'Direction',
            'direction_options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],

            'flex_justify_label' => 'Position du contenu',
            'flex_justify_options' => [
                'start' => 'Début',
                'center' => 'Centre',
                'space_between' => 'Espace entre',
                'end' => 'Fin',
            ],

            'flex_align_label' => 'Alignement du contenu',
            'flex_align_options' => [
                'start' => 'Début',
                'center' => 'Centre',
                'end' => 'Fin',
            ],

            'gap_label' => 'Espacement entre les éléments',
            'gap_info' => 'Espace entre les blocs enfants',

            'size_header' => 'Taille',

            'section_width_label' => 'Largeur du contenu',
            'section_width_options' => [
                'full' => 'Pleine largeur',
                'container' => 'Conteneur',
            ],
            'section_width_info' => 'Le conteneur limite la largeur maximale et centre le contenu',

            'section_height_label' => 'Hauteur de la section',
            'section_height_options' => [
                'auto' => 'Auto',
                'xs' => 'Très petite',
                'sm' => 'Petite',
                'md' => 'Moyenne',
                'lg' => 'Grande',
                'screen' => 'Plein écran',
                'custom' => 'Personnalisée',
            ],

            'section_height_custom_label' => 'Hauteur personnalisée',

            'appearance_header' => 'Apparence',

            'background_type_label' => 'Type d\'arrière-plan',
            'background_type_options' => [
                'none' => 'Aucun',
                'color' => 'Couleur',
                'gradient' => 'Dégradé',
                'image' => 'Image',
            ],

            'background_color_label' => 'Couleur d\'arrière-plan',
            'background_gradient_label' => 'Dégradé d\'arrière-plan',
            'background_image_label' => 'Image d\'arrière-plan',

            'background_position_label' => 'Position de l\'arrière-plan',
            'background_position_options' => [
                'center' => 'Centre',
                'top' => 'Haut',
                'bottom' => 'Bas',
                'left' => 'Gauche',
                'right' => 'Droite',
            ],

            'background_size_label' => 'Taille de l\'arrière-plan',
            'background_size_options' => [
                'cover' => 'Couvrir',
                'contain' => 'Contenir',
                'auto' => 'Auto',
            ],

            'background_repeat_label' => 'Répétition de l\'arrière-plan',
            'background_repeat_options' => [
                'no_repeat' => 'Pas de répétition',
                'repeat' => 'Répéter',
                'repeat_x' => 'Répéter horizontalement',
                'repeat_y' => 'Répéter verticalement',
            ],

            'border_label' => 'Afficher la bordure',
            'border_width_label' => 'Largeur de la bordure',
            'border_opacity_label' => 'Opacité de la bordure',

            'border_radius_label' => 'Rayon de bordure',
            'border_radius_options' => [
                'none' => 'Aucun',
                'sm' => 'Petit',
                'md' => 'Moyen',
                'lg' => 'Grand',
                'xl' => 'Très grand',
                'full' => 'Complet',
            ],

            'toggle_overlay_label' => 'Afficher la superposition',
            'toggle_overlay_info' => 'Ajouter une superposition sur le média d\'arrière-plan',

            'overlay_style_label' => 'Style de superposition',
            'overlay_style_options' => [
                'solid' => 'Uni',
                'gradient' => 'Dégradé',
            ],

            'overlay_color_label' => 'Couleur de superposition',
            'overlay_gradient_label' => 'Dégradé de superposition',
        ],
    ],
];
