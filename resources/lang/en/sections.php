<?php

return [
    'flex-section' => [
        'name' => 'Flexible Section',
        'description' => 'A universal section that accepts any block type with comprehensive layout, sizing, and styling controls.',

        'presets' => [
            'custom_section' => [
                'name' => 'Custom Section',
                'category' => 'Layout',
            ],
        ],

        'settings' => [
            'layout_header' => 'Layout',

            'direction_label' => 'Direction',
            'direction_options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],

            'flex_justify_label' => 'Content Position',
            'flex_justify_options' => [
                'start' => 'Start',
                'center' => 'Center',
                'space_between' => 'Space Between',
                'end' => 'End',
            ],

            'flex_align_label' => 'Content Alignment',
            'flex_align_options' => [
                'start' => 'Start',
                'center' => 'Center',
                'end' => 'End',
            ],

            'gap_label' => 'Gap Between Items',
            'gap_info' => 'Space between child blocks',

            'size_header' => 'Size',

            'section_width_label' => 'Content Width',
            'section_width_options' => [
                'full' => 'Full Width',
                'container' => 'Container',
            ],
            'section_width_info' => 'Container constrains maximum width and centers content',

            'section_height_label' => 'Section Height',
            'section_height_options' => [
                'auto' => 'Auto',
                'xs' => 'Extra Small',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
                'screen' => 'Full Screen',
                'custom' => 'Custom',
            ],

            'section_height_custom_label' => 'Custom Height',

            'appearance_header' => 'Appearance',

            'background_type_label' => 'Background Type',
            'background_type_options' => [
                'none' => 'None',
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
            ],

            'background_color_label' => 'Background Color',
            'background_gradient_label' => 'Background Gradient',
            'background_image_label' => 'Background Image',

            'background_position_label' => 'Background Position',
            'background_position_options' => [
                'center' => 'Center',
                'top' => 'Top',
                'bottom' => 'Bottom',
                'left' => 'Left',
                'right' => 'Right',
            ],

            'background_size_label' => 'Background Size',
            'background_size_options' => [
                'cover' => 'Cover',
                'contain' => 'Contain',
                'auto' => 'Auto',
            ],

            'background_repeat_label' => 'Background Repeat',
            'background_repeat_options' => [
                'no_repeat' => 'No Repeat',
                'repeat' => 'Repeat',
                'repeat_x' => 'Repeat Horizontally',
                'repeat_y' => 'Repeat Vertically',
            ],

            'border_label' => 'Show Border',
            'border_width_label' => 'Border Width',
            'border_style_label' => 'Border Style',
            'border_style_options' => [
                'solid' => 'Solid',
                'dashed' => 'Dashed',
                'dotted' => 'Dotted',
            ],
            'border_color_label' => 'Border Color',

            'border_radius_label' => 'Border Radius',
            'border_radius_options' => [
                'none' => 'None',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
                'xl' => 'Extra Large',
                '2xl' => '2X Large',
                '3xl' => '3X Large',
                'full' => 'Full',
            ],

            'toggle_overlay_label' => 'Show Overlay',
            'toggle_overlay_info' => 'Add an overlay on top of background media',

            'overlay_style_label' => 'Overlay Style',
            'overlay_style_options' => [
                'solid' => 'Solid',
                'gradient' => 'Gradient',
            ],

            'overlay_color_label' => 'Overlay Color',
            'overlay_gradient_label' => 'Overlay Gradient',
        ],
    ],
];
