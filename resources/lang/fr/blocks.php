<?php

return [
    'common' => [
        'product_label' => 'Produit',
        'product_preview_info' => 'Sélectionnez un produit à des fins de prévisualisation uniquement',
        'color_scheme_label' => 'Schéma de couleurs',
        'color_scheme_info' => 'Remplacer le schéma de couleurs de la section pour ce bloc',

        // Spacing
        'spacing_header' => 'Espacement',
        'padding_header' => 'Marge intérieure',
        'padding_label' => 'Marge intérieure',
        'margin_label' => 'Marge extérieure',
    ],

    'divider' => [
        'description' => 'Une ligne horizontale pour séparer le contenu',
        'settings' => [
            'thickness_label' => 'Épaisseur',
            'thickness_info' => 'Définir l\'épaisseur de la ligne de séparation',

            'corner_radius_label' => 'Rayon des coins',
            'corner_radius_options' => [
                'square' => 'Carré',
                'rounded' => 'Arrondi',
            ],

            'width_percent_label' => 'Longueur',
            'width_percent_info' => 'Définir la largeur du séparateur en pourcentage',

            'alignment_label' => 'Alignement',
            'alignment_info' => 'Alignement horizontal du séparateur',
            'alignment_options' => [
                'left' => 'Gauche',
                'center' => 'Centre',
                'right' => 'Droite',
            ],
        ],
    ],

    'richtext' => [
        'description' => 'Contenu texte riche avec mise en forme',
        'settings' => [
            'content_label' => 'Contenu',
        ],
    ],

    'text' => [
        'description' => 'Texte brut avec options de typographie et de couleur',
        'settings' => [
            'text_label' => 'Contenu du texte',

            'layout_header' => 'Disposition',

            'width_label' => 'Largeur',
            'width_options' => [
                'fit' => 'Ajuster au contenu',
                'fill' => 'Remplir',
            ],

            'max_width_label' => 'Largeur maximale',
            'max_width_options' => [
                'narrow' => 'Étroit',
                'normal' => 'Normal',
                'none' => 'Aucune',
            ],

            'alignment_label' => 'Alignement',
            'alignment_options' => [
                'left' => 'Gauche',
                'center' => 'Centre',
                'right' => 'Droite',
            ],

            'typography_header' => 'Typographie',

            'typography_label' => 'Typographie',
            'typography_info' => 'Sélectionner le style de typographie',

            'color_label' => 'Couleur du texte',
            'color_options' => [
                'default' => 'Par défaut',
                'primary' => 'Primaire',
                'secondary' => 'Secondaire',
                'accent' => 'Accent',
                'info' => 'Info',
                'success' => 'Succès',
                'warning' => 'Avertissement',
                'danger' => 'Danger',
                'custom' => 'Personnalisé',
            ],

            'text_color_label' => 'Couleur personnalisée',

            'appearance_header' => 'Apparence',
        ],

        'presets' => [
            'text' => [
                'name' => 'Texte',
                'category' => 'Texte',
            ],
            'category-name' => [
                'name' => 'Nom de catégorie',
            ],
            'heading' => [
                'name' => 'Titre',
                'category' => 'Texte',
            ],
        ],
    ],

    'icon' => [
        'description' => 'Afficher une icône avec taille et couleur personnalisables',
        'settings' => [
            'icon_label' => 'Icône',

            'size_label' => 'Taille',

            'color_label' => 'Couleur',
            'color_options' => [
                'default' => 'Par défaut',
                'primary' => 'Primaire',
                'secondary' => 'Secondaire',
                'accent' => 'Accent',
                'info' => 'Info',
                'success' => 'Succès',
                'warning' => 'Avertissement',
                'danger' => 'Danger',
                'custom' => 'Personnalisé',
            ],

            'custom_color_label' => 'Couleur personnalisée',
        ],
    ],

    'link' => [
        'description' => 'Un lien cliquable avec options de typographie',
        'settings' => [
            'text_label' => 'Texte du lien',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'Ouvrir dans un nouvel onglet',

            'typography_header' => 'Typographie',

            'typography_label' => 'Typographie',
            'typography_info' => 'Sélectionner le style de typographie',

            'appearance_header' => 'Apparence',

            'underline_label' => 'Soulignement',
            'underline_options' => [
                'none' => 'Aucun',
                'hover' => 'Au survol',
                'always' => 'Toujours',
            ],
        ],

        'presets' => [
            'link' => [
                'name' => 'Lien',
                'category' => 'Basique',
            ],
        ],
    ],

    'heading' => [
        'description' => 'Un texte de titre avec niveau configurable',
        'text_label' => 'Texte du titre',
        'default_text' => 'Bienvenue dans notre boutique',
        'heading_level_label' => 'Niveau de titre',
    ],

    'category-image' => [
        'description' => 'Afficher une image de bannière ou de logo de catégorie',
        'settings' => [
            'category_label' => 'Catégorie',
            'image_source_label' => 'Source de l\'image',
            'image_source_options' => [
                'banner' => 'Image de bannière',
                'logo' => 'Image de logo',
            ],
            'image_source_info' => 'Choisissez quelle image de catégorie afficher',
            'aspect_ratio_label' => 'Ratio d\'aspect',
            'aspect_ratio_options' => [
                'adapt' => 'Adapter à l\'image',
                'square' => 'Carré (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Paysage (4:3)',
            ],
            'object_fit_label' => 'Ajustement de l\'objet',
            'object_fit_options' => [
                'cover' => 'Couvrir',
                'contain' => 'Contenir',
            ],
        ],
    ],

    'category-name' => [
        'description' => 'Afficher le nom de la catégorie',
        'settings' => [
            'category_label' => 'Catégorie',
            'tag_label' => 'Balise HTML',
            'alignment_label' => 'Alignement',
            'alignment_options' => [
                'left' => 'Gauche',
                'center' => 'Centre',
                'right' => 'Droite',
            ],
            'text_color_label' => 'Couleur du texte',
        ],
    ],

    'image' => [
        'description' => 'Une image avec dimensionnement, bordures et effets de survol',
        'settings' => [
            'image_label' => 'Image',
            'link_label' => 'Lien',
            'alt_label' => 'Texte alternatif',
            'alt_info' => 'Texte descriptif pour l\'accessibilité et le référencement',

            'size_header' => 'Taille',
            'sizing_header' => 'Dimensionnement',

            'image_ratio_label' => 'Ratio d\'image',
            'image_ratio_options' => [
                'adapt' => 'Adapter à l\'image',
                'portrait' => 'Portrait (3:4)',
                'square' => 'Carré (1:1)',
                'landscape' => 'Paysage (4:3)',
            ],

            'aspect_ratio_label' => 'Ratio d\'aspect',
            'aspect_ratio_options' => [
                'adapt' => 'Adapter à l\'image',
                'square' => 'Carré (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Paysage (4:3)',
            ],

            'object_fit_label' => 'Ajustement de l\'objet',
            'object_fit_options' => [
                'cover' => 'Couvrir',
                'contain' => 'Contenir',
                'fill' => 'Remplir',
            ],

            'width_label' => 'Largeur',
            'width_options' => [
                'fit_content' => 'Ajuster au contenu',
                'fill' => 'Remplir',
                'custom' => 'Personnalisé',
            ],

            'custom_width_label' => 'Largeur personnalisée (%)',

            'width_mobile_label' => 'Largeur (Mobile)',
            'width_mobile_options' => [
                'fit_content' => 'Ajuster au contenu',
                'fill' => 'Remplir',
                'custom' => 'Personnalisé',
            ],

            'custom_width_mobile_label' => 'Largeur mobile personnalisée (%)',

            'height_label' => 'Hauteur',
            'height_options' => [
                'fit' => 'Ajuster au contenu',
                'fill' => 'Remplir',
            ],

            'hover_zoom_label' => 'Agrandir l\'image au survol',
            'hover_zoom_info' => 'Zoomer sur l\'image lors du survol',
            'hover_zoom_scale_label' => 'Niveau d\'agrandissement',

            'borders_header' => 'Bordures',

            'border_label' => 'Bordure',
            'border_options' => [
                'none' => 'Aucune',
                'solid' => 'Pleine',
            ],
            'border_width_label' => 'Largeur de bordure',
            'border_opacity_label' => 'Opacité de bordure',
            'border_radius_label' => 'Rayon de bordure',
            'border_radius_options' => [
                'none' => 'Aucun',
                'sm' => 'Petit',
                'md' => 'Moyen',
                'lg' => 'Grand',
                'xl' => 'Très grand',
                '2xl' => '2x grand',
                '3xl' => '3x grand',
                '4xl' => '4x grand',
                'full' => 'Complet',
            ],
        ],

        'presets' => [
            'image' => [
                'name' => 'Image',
                'category' => 'Média',
            ],
        ],
    ],

    'product-image' => [
        'description' => 'Afficher l\'image du produit',
        'settings' => [
            'size_label' => 'Taille de l\'image',
            'size_options' => [
                'small' => 'Petite',
                'medium' => 'Moyenne',
                'large' => 'Grande',
                'original' => 'Originale',
            ],
            'size_info' => 'Sélectionnez la taille de l\'image du produit à afficher',

            'image_source_label' => 'Source de l\'image',
            'image_source_options' => [
                'main' => 'Image principale',
                'second' => 'Deuxième image',
            ],

            'aspect_ratio_label' => 'Ratio d\'aspect',
            'aspect_ratio_options' => [
                'square' => 'Carré (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Paysage (4:3)',
                'auto' => 'Auto',
            ],
            'aspect_ratio_info' => 'Définir le ratio d\'aspect de l\'image',

            'object_fit_label' => 'Ajustement de l\'objet',
            'object_fit_options' => [
                'cover' => 'Couvrir',
                'contain' => 'Contenir',
                'fill' => 'Remplir',
            ],
            'object_fit_info' => 'Comment l\'image doit s\'adapter à ses limites',
        ],
    ],

    'product-labels' => [
        'description' => 'Afficher les badges de vente et de nouveauté du produit',
        'settings' => [
            'layout_label' => 'Disposition',
            'layout_options' => [
                'inline' => 'En ligne',
                'stack' => 'Empilé',
            ],
            'gap_label' => 'Écart',
            'alignment_label' => 'Alignement',
            'alignment_options' => [
                'start' => 'Début',
                'center' => 'Centre',
                'end' => 'Fin',
            ],
            'size_label' => 'Taille',
            'size_options' => [
                'xs' => 'Très petit',
                'sm' => 'Petit',
                'md' => 'Moyen',
                'lg' => 'Grand',
            ],
            'variant_label' => 'Variante',
            'variant_options' => [
                'solid' => 'Plein',
                'outline' => 'Contour',
                'soft' => 'Doux',
            ],
            'corner_radius_label' => 'Rayon des coins',
            'corner_radius_options' => [
                'none' => 'Aucun',
                'sm' => 'Petit',
                'md' => 'Moyen',
                'lg' => 'Grand',
                'full' => 'Complet',
            ],
        ],
        'placeholder' => 'Aucune étiquette disponible',
    ],

    'product-title' => [
        'name' => 'Titre du produit',
        'description' => 'Afficher le titre du produit',
    ],

    'product-description' => [
        'description' => 'Afficher la description complète du produit',
    ],

    'product-short-description' => [
        'description' => 'Afficher la description courte du produit',
    ],

    'group' => [
        'name' => 'Groupe',
        'description' => 'Groupe polyvalent pour la composition de mise en page avec flex, grille, espacement, dimensionnement et bordures',
        'settings' => [
            // Layout
            'layout_header' => 'Disposition',
            'layout_type_label' => 'Type de disposition',
            'layout_type_info' => 'Choisissez comment les blocs enfants sont disposés',
            'layout_type_options' => [
                'block' => 'Bloc',
                'flex' => 'Flexbox',
                'grid' => 'Grille',
            ],

            // Flex Settings
            'flex_direction_label' => 'Direction',
            'flex_direction_options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],
            'flex_reverse_items_label' => 'Inverser les éléments',

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

            'flex_wrap_label' => 'Retour à la ligne flex',
            'flex_wrap_options' => [
                'nowrap' => 'Pas de retour',
                'wrap' => 'Retour',
                'wrap_reverse' => 'Retour inversé',
            ],
            'justify_content_label' => 'Justifier le contenu',
            'justify_content_options' => [
                'start' => 'Début',
                'center' => 'Centre',
                'end' => 'Fin',
                'between' => 'Espace entre',
                'around' => 'Espace autour',
                'evenly' => 'Espace uniforme',
            ],
            'align_items_label' => 'Aligner les éléments',
            'align_items_options' => [
                'start' => 'Début',
                'center' => 'Centre',
                'end' => 'Fin',
                'stretch' => 'Étirer',
                'baseline' => 'Ligne de base',
            ],

            // Grid Settings
            'grid_columns_label' => 'Colonnes de la grille',
            'grid_rows_label' => 'Lignes de la grille',
            'grid_rows_options' => [
                'auto' => 'Auto',
            ],
            'gap_label' => 'Écart',

            // Sizing
            'sizing_header' => 'Dimensionnement',
            'width_label' => 'Largeur',
            'width_options' => [
                'auto' => 'Auto',
                'full' => 'Complet (100%)',
                'fit' => 'Ajuster au contenu',
                'screen' => 'Largeur d\'écran',
                'custom' => 'Personnalisé',
            ],
            'custom_width_label' => 'Largeur personnalisée',
            'min_width_label' => 'Largeur minimale',
            'max_width_label' => 'Largeur maximale',
            'max_width_options' => [
                'none' => 'Aucune',
                'full' => 'Complet',
                'screen' => 'Écran',
            ],
            'height_label' => 'Hauteur',
            'height_options' => [
                'auto' => 'Auto',
                'full' => 'Complet (100%)',
                'fit' => 'Ajuster au contenu',
                'screen' => 'Hauteur d\'écran',
                'custom' => 'Personnalisé',
            ],
            'custom_height_label' => 'Hauteur personnalisée',
            'min_height_label' => 'Hauteur minimale',

            // Borders
            'borders_header' => 'Bordures',
            'border_label' => 'Activer la bordure',
            'border_width_label' => 'Largeur de bordure',
            'border_style_label' => 'Style de bordure',
            'border_style_options' => [
                'solid' => 'Pleine',
                'dashed' => 'Tirets',
                'dotted' => 'Points',
            ],
            'border_color_label' => 'Couleur de bordure',
            'border_opacity_label' => 'Opacité de bordure',
            'border_radius_label' => 'Rayon de bordure',
            'border_radius_options' => [
                'none' => 'Aucun',
                'full' => 'Complet (Pilule)',
            ],

            // Background
            'background_header' => 'Arrière-plan',
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
            'background_position_label' => 'Position d\'arrière-plan',
            'background_position_options' => [
                'center' => 'Centre',
                'top' => 'Haut',
                'bottom' => 'Bas',
                'left' => 'Gauche',
                'right' => 'Droite',
            ],
            'background_size_label' => 'Taille d\'arrière-plan',
            'background_size_options' => [
                'cover' => 'Couvrir',
                'contain' => 'Contenir',
                'auto' => 'Auto',
            ],
            'background_repeat_label' => 'Répétition d\'arrière-plan',
            'background_repeat_options' => [
                'no_repeat' => 'Pas de répétition',
                'repeat' => 'Répéter',
                'repeat_x' => 'Répéter X',
                'repeat_y' => 'Répéter Y',
            ],

            // Overlay
            'overlay_header' => 'Superposition',
            'is_overlay_label' => 'Positionner en superposition',
            'is_overlay_info' => 'Lorsqu\'activé, ce groupe sera positionné de manière absolue sur son parent',
            'overlay_position_label' => 'Position de la superposition',
            'overlay_position_options' => [
                'full' => 'Couverture complète',
                'top_left' => 'Haut gauche',
                'top_center' => 'Haut centre',
                'top_right' => 'Haut droite',
                'middle_left' => 'Milieu gauche',
                'middle_center' => 'Milieu centre',
                'middle_right' => 'Milieu droite',
                'bottom_left' => 'Bas gauche',
                'bottom_center' => 'Bas centre',
                'bottom_right' => 'Bas droite',
                'top' => 'Haut (pleine largeur)',
                'bottom' => 'Bas (pleine largeur)',
            ],
            'overlay_visibility_label' => 'Visibilité de la superposition',
            'overlay_visibility_info' => 'Contrôler quand la superposition est visible',
            'overlay_visibility_options' => [
                'always' => 'Toujours visible',
                'hover' => 'Afficher au survol du parent',
            ],
            'overlay_hover_target_label' => 'Cible du survol',
            'overlay_hover_target_info' => 'Choisissez quel élément déclenche la visibilité de la superposition au survol',
            'overlay_hover_target_options' => [
                'parent' => 'Parent immédiat',
                'group' => 'N\'importe quel ancêtre',
                'product_card' => 'Carte produit',
            ],
            'z_index_label' => 'Index Z',
            'position_label' => 'Position',
            'position_options' => [
                'static' => 'Statique',
                'relative' => 'Relative',
                'absolute' => 'Absolue',
                'fixed' => 'Fixe',
            ],
            'link_header' => 'Lien',
            'link_label' => 'Lien',
            'open_in_new_tab_label' => 'Ouvrir dans un nouvel onglet',
        ],
        'presets' => [
            'basic' => [
                'name' => 'Groupe',
                'category' => 'Disposition',
            ],
            'centered' => [
                'name' => 'Groupe centré',
                'category' => 'Disposition',
            ],
            'card' => [
                'name' => 'Carte',
                'category' => 'Disposition',
            ],
            'flex_row' => [
                'name' => 'Ligne flex',
                'category' => 'Disposition',
            ],
            'grid' => [
                'name' => 'Groupe en grille',
                'category' => 'Disposition',
            ],
            'overlay' => [
                'name' => 'Groupe en superposition',
                'category' => 'Disposition',
            ],
            'feature_icon' => [
                'name' => 'Icône de fonctionnalité',
            ],
        ],
    ],

    'button' => [
        'description' => 'Un bouton personnalisable avec des options de couleur, style et taille',
        'settings' => [
            'text_label' => 'Texte',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'Ouvrir dans un nouvel onglet',

            'appearance_header' => 'Apparence',
            'color_label' => 'Couleur',
            'color_options' => [
                'primary' => 'Primaire',
                'secondary' => 'Secondaire',
                'accent' => 'Accent',
                'neutral' => 'Neutre',
            ],
            'style_label' => 'Style',
            'style_options' => [
                'filled' => 'Plein',
                'soft' => 'Doux',
                'outline' => 'Contour',
                'ghost' => 'Fantôme',
                'link' => 'Lien',
            ],
            'size_label' => 'Taille',
            'size_options' => [
                'xs' => 'Très petit',
                'sm' => 'Petit',
                'md' => 'Moyen',
                'lg' => 'Grand',
                'xl' => 'Très grand',
            ],
            'full_width_label' => 'Pleine largeur',
            'circle_label' => 'Cercle',
            'square_label' => 'Carré',

            'icon_header' => 'Icône',
            'icon_label' => 'Icône',
            'icon_position_label' => 'Position de l\'icône',
            'icon_position_options' => [
                'left' => 'Gauche',
                'right' => 'Droite',
            ],
        ],
        'presets' => [
            'primary' => [
                'name' => 'Bouton primaire',
                'category' => 'Basique',
            ],
            'outline' => [
                'name' => 'Bouton contour',
                'category' => 'Basique',
            ],
            'ghost' => [
                'name' => 'Bouton fantôme',
                'category' => 'Basique',
            ],
            'large_cta' => [
                'name' => 'Grand CTA',
                'category' => 'Basique',
            ],
            'small_soft' => [
                'name' => 'Petit doux',
                'category' => 'Basique',
            ],
        ],
    ],
];
