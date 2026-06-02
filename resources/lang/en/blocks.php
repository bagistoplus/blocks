<?php

return [
    'common' => [
        'product_label' => 'Product',
        'product_preview_info' => 'Select a product for preview purpose only',
        'color_scheme_label' => 'Color Scheme',
        'color_scheme_info' => 'Override section color scheme for this block',

        // Spacing
        'spacing_header' => 'Spacing',
        'padding_header' => 'Padding',
        'padding_label' => 'Padding',
        'margin_label' => 'Margin',
    ],

    'divider' => [
        'description' => 'A horizontal line to separate content',
        'settings' => [
            'thickness_label' => 'Thickness',
            'thickness_info' => 'Set the thickness of the divider line',

            'corner_radius_label' => 'Corner Radius',
            'corner_radius_options' => [
                'square' => 'Square',
                'rounded' => 'Rounded',
            ],

            'width_percent_label' => 'Length',
            'width_percent_info' => 'Set the width of the divider as a percentage',

            'alignment_label' => 'Alignment',
            'alignment_info' => 'Horizontal alignment of the divider',
            'alignment_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
        ],
    ],

    'richtext' => [
        'description' => 'Rich text content with formatting',
        'settings' => [
            'content_label' => 'Content',
        ],
    ],

    'text' => [
        'description' => 'Plain text with typography and color options',
        'settings' => [
            'text_label' => 'Text Content',

            'layout_header' => 'Layout',

            'width_label' => 'Width',
            'width_options' => [
                'fit' => 'Fit Content',
                'fill' => 'Fill',
            ],

            'max_width_label' => 'Max Width',
            'max_width_options' => [
                'narrow' => 'Narrow',
                'normal' => 'Normal',
                'none' => 'None',
            ],

            'alignment_label' => 'Alignment',
            'alignment_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],

            'typography_header' => 'Typography',

            'typography_label' => 'Typography',
            'typography_info' => 'Select typography style',

            'color_label' => 'Text Color',
            'color_options' => [
                'default' => 'Default',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'accent' => 'Accent',
                'info' => 'Info',
                'success' => 'Success',
                'warning' => 'Warning',
                'danger' => 'Danger',
                'custom' => 'Custom',
            ],

            'text_color_label' => 'Custom Color',

            'appearance_header' => 'Appearance',
        ],

        'presets' => [
            'text' => [
                'name' => 'Text',
                'category' => 'Text',
            ],
            'category-name' => [
                'name' => 'Category Name',
            ],
            'heading' => [
                'name' => 'Heading',
                'category' => 'Text',
            ],
        ],
    ],

    'icon' => [
        'description' => 'Display an icon with customizable size and color',
        'settings' => [
            'icon_label' => 'Icon',

            'size_label' => 'Size',

            'color_label' => 'Color',
            'color_options' => [
                'default' => 'Default',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'accent' => 'Accent',
                'info' => 'Info',
                'success' => 'Success',
                'warning' => 'Warning',
                'danger' => 'Danger',
                'custom' => 'Custom',
            ],

            'custom_color_label' => 'Custom Color',
        ],
    ],

    'link' => [
        'description' => 'A clickable link with typography options',
        'settings' => [
            'text_label' => 'Link Text',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'Open in New Tab',

            'typography_header' => 'Typography',

            'typography_label' => 'Typography',
            'typography_info' => 'Select typography style',

            'appearance_header' => 'Appearance',

            'underline_label' => 'Underline',
            'underline_options' => [
                'none' => 'None',
                'hover' => 'On Hover',
                'always' => 'Always',
            ],
        ],

        'presets' => [
            'link' => [
                'name' => 'Link',
                'category' => 'Basic',
            ],
        ],
    ],

    'heading' => [
        'description' => 'A heading text with configurable level',
        'text_label' => 'Heading Text',
        'default_text' => 'Welcome to our store',
        'heading_level_label' => 'Heading Level',
    ],

    'category-image' => [
        'description' => 'Display a category banner or logo image',
        'settings' => [
            'category_label' => 'Category',
            'image_source_label' => 'Image Source',
            'image_source_options' => [
                'banner' => 'Banner Image',
                'logo' => 'Logo Image',
            ],
            'image_source_info' => 'Choose which category image to display',
            'aspect_ratio_label' => 'Aspect Ratio',
            'aspect_ratio_options' => [
                'adapt' => 'Adapt to Image',
                'square' => 'Square (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Landscape (4:3)',
            ],
            'object_fit_label' => 'Object Fit',
            'object_fit_options' => [
                'cover' => 'Cover',
                'contain' => 'Contain',
            ],
        ],
    ],

    'category-name' => [
        'description' => 'Display the category name',
        'settings' => [
            'category_label' => 'Category',
            'tag_label' => 'HTML Tag',
            'alignment_label' => 'Alignment',
            'alignment_options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'text_color_label' => 'Text Color',
        ],
    ],

    'image' => [
        'description' => 'An image with sizing, borders, and hover effects',
        'settings' => [
            'image_label' => 'Image',
            'link_label' => 'Link',
            'alt_label' => 'Alt Text',
            'alt_info' => 'Descriptive text for accessibility and SEO',

            'size_header' => 'Size',
            'sizing_header' => 'Sizing',

            'image_ratio_label' => 'Image Ratio',
            'image_ratio_options' => [
                'adapt' => 'Adapt to Image',
                'portrait' => 'Portrait (3:4)',
                'square' => 'Square (1:1)',
                'landscape' => 'Landscape (4:3)',
            ],

            'aspect_ratio_label' => 'Aspect Ratio',
            'aspect_ratio_options' => [
                'adapt' => 'Adapt to Image',
                'square' => 'Square (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Landscape (4:3)',
            ],

            'object_fit_label' => 'Object Fit',
            'object_fit_options' => [
                'cover' => 'Cover',
                'contain' => 'Contain',
                'fill' => 'Fill',
            ],

            'width_label' => 'Width',
            'width_options' => [
                'fit_content' => 'Fit Content',
                'fill' => 'Fill',
                'custom' => 'Custom',
            ],

            'custom_width_label' => 'Custom Width (%)',

            'width_mobile_label' => 'Width (Mobile)',
            'width_mobile_options' => [
                'fit_content' => 'Fit Content',
                'fill' => 'Fill',
                'custom' => 'Custom',
            ],

            'custom_width_mobile_label' => 'Custom Width Mobile (%)',

            'height_label' => 'Height',
            'height_options' => [
                'fit' => 'Fit Content',
                'fill' => 'Fill',
            ],

            'hover_zoom_label' => 'Scale Image on Hover',
            'hover_zoom_info' => 'Zoom in the image when hovering over it',
            'hover_zoom_scale_label' => 'Scale Amount',

            'borders_header' => 'Borders',

            'border_label' => 'Border',
            'border_options' => [
                'none' => 'None',
                'solid' => 'Solid',
            ],
            'border_width_label' => 'Border Width',
            'border_opacity_label' => 'Border Opacity',
            'border_radius_label' => 'Border Radius',
            'border_radius_options' => [
                'none' => 'None',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
                'xl' => 'Extra Large',
                '2xl' => '2X Large',
                '3xl' => '3X Large',
                '4xl' => '4X Large',
                'full' => 'Full',
            ],
        ],

        'presets' => [
            'image' => [
                'name' => 'Image',
                'category' => 'Media',
            ],
        ],
    ],

    'product-image' => [
        'description' => 'Display the product image',
        'settings' => [
            'size_label' => 'Image Size',
            'size_options' => [
                'small' => 'Small',
                'medium' => 'Medium',
                'large' => 'Large',
                'original' => 'Original',
            ],
            'size_info' => 'Select the size of the product image to display',

            'image_source_label' => 'Image Source',
            'image_source_options' => [
                'main' => 'Main Image',
                'second' => 'Second Image',
            ],

            'aspect_ratio_label' => 'Aspect Ratio',
            'aspect_ratio_options' => [
                'square' => 'Square (1:1)',
                'portrait' => 'Portrait (3:4)',
                'landscape' => 'Landscape (4:3)',
                'auto' => 'Auto',
            ],
            'aspect_ratio_info' => 'Set the aspect ratio of the image',

            'object_fit_label' => 'Object Fit',
            'object_fit_options' => [
                'cover' => 'Cover',
                'contain' => 'Contain',
                'fill' => 'Fill',
            ],
            'object_fit_info' => 'How the image should fit within its bounds',
        ],
    ],

    'product-labels' => [
        'description' => 'Display product sale and new badges',
        'settings' => [
            'layout_label' => 'Layout',
            'layout_options' => [
                'inline' => 'Inline',
                'stack' => 'Stack',
            ],
            'gap_label' => 'Gap',
            'alignment_label' => 'Alignment',
            'alignment_options' => [
                'start' => 'Start',
                'center' => 'Center',
                'end' => 'End',
            ],
            'size_label' => 'Size',
            'size_options' => [
                'xs' => 'Extra Small',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
            ],
            'variant_label' => 'Variant',
            'variant_options' => [
                'solid' => 'Solid',
                'outline' => 'Outline',
                'soft' => 'Soft',
            ],
            'corner_radius_label' => 'Corner Radius',
            'corner_radius_options' => [
                'none' => 'None',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
                'full' => 'Full',
            ],
        ],
        'placeholder' => 'No labels available',
    ],

    'product-title' => [
        'name' => 'Product Title',
        'description' => 'Display the product title',
    ],

    'product-description' => [
        'description' => 'Display the full product description',
    ],

    'product-short-description' => [
        'description' => 'Display the product short description',
    ],

    'group' => [
        'name' => 'Group',
        'description' => 'Versatile group for layout composition with flex, grid, spacing, sizing, and borders',
        'settings' => [
            // Layout
            'layout_header' => 'Layout',
            'layout_type_label' => 'Layout Type',
            'layout_type_info' => 'Choose how child blocks are arranged',
            'layout_type_options' => [
                'block' => 'Block',
                'flex' => 'Flexbox',
                'grid' => 'Grid',
            ],

            // Flex Settings
            'flex_direction_label' => 'Direction',
            'flex_direction_options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],
            'reverse_items_label' => 'Reverse items',

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

            'flex_wrap_label' => 'Flex Wrap',
            'flex_wrap_options' => [
                'nowrap' => 'No Wrap',
                'wrap' => 'Wrap',
                'wrap_reverse' => 'Wrap Reverse',
            ],
            'justify_content_label' => 'Justify Content',
            'justify_content_options' => [
                'start' => 'Start',
                'center' => 'Center',
                'end' => 'End',
                'between' => 'Space Between',
                'around' => 'Space Around',
                'evenly' => 'Space Evenly',
            ],
            'align_items_label' => 'Align Items',
            'align_items_options' => [
                'start' => 'Start',
                'center' => 'Center',
                'end' => 'End',
                'stretch' => 'Stretch',
                'baseline' => 'Baseline',
            ],

            // Grid Settings
            'grid_columns_label' => 'Grid Columns',
            'grid_rows_label' => 'Grid Rows',
            'grid_rows_options' => [
                'auto' => 'Auto',
            ],
            'gap_label' => 'Gap',

            // Sizing
            'sizing_header' => 'Sizing',
            'width_label' => 'Width',
            'width_options' => [
                'auto' => 'Auto',
                'full' => 'Full (100%)',
                'fit' => 'Fit Content',
                'screen' => 'Screen Width',
                'custom' => 'Custom',
            ],
            'custom_width_label' => 'Custom Width',
            'min_width_label' => 'Min Width',
            'max_width_label' => 'Max Width',
            'max_width_options' => [
                'none' => 'None',
                'full' => 'Full',
                'screen' => 'Screen',
            ],
            'height_label' => 'Height',
            'height_options' => [
                'auto' => 'Auto',
                'full' => 'Full (100%)',
                'fit' => 'Fit Content',
                'screen' => 'Screen Height',
                'custom' => 'Custom',
            ],
            'custom_height_label' => 'Custom Height',
            'min_height_label' => 'Min Height',

            // Borders
            'borders_header' => 'Borders',
            'border_label' => 'Enable Border',
            'border_width_label' => 'Border Width',
            'border_style_label' => 'Border Style',
            'border_style_options' => [
                'solid' => 'Solid',
                'dashed' => 'Dashed',
                'dotted' => 'Dotted',
            ],
            'border_color_label' => 'Border Color',
            'border_opacity_label' => 'Border Opacity',
            'border_radius_label' => 'Border Radius',
            'border_radius_options' => [
                'none' => 'None',
                'full' => 'Full (Pill)',
            ],

            // Background
            'background_header' => 'Background',
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
                'repeat_x' => 'Repeat X',
                'repeat_y' => 'Repeat Y',
            ],

            // Overlay
            'overlay_header' => 'Overlay',
            'is_overlay_label' => 'Position as Overlay',
            'is_overlay_info' => 'When enabled, this group will be positioned absolutely over its parent',
            'overlay_position_label' => 'Overlay Position',
            'overlay_position_options' => [
                'full' => 'Full Coverage',
                'top_left' => 'Top Left',
                'top_center' => 'Top Center',
                'top_right' => 'Top Right',
                'middle_left' => 'Middle Left',
                'middle_center' => 'Middle Center',
                'middle_right' => 'Middle Right',
                'bottom_left' => 'Bottom Left',
                'bottom_center' => 'Bottom Center',
                'bottom_right' => 'Bottom Right',
                'top' => 'Top (Full Width)',
                'bottom' => 'Bottom (Full Width)',
            ],
            'overlay_visibility_label' => 'Overlay Visibility',
            'overlay_visibility_info' => 'Control when the overlay is visible',
            'overlay_visibility_options' => [
                'always' => 'Always Visible',
                'hover' => 'Show on Parent Hover',
            ],
            'overlay_hover_target_label' => 'Hover Target',
            'overlay_hover_target_info' => 'Choose which element\'s hover triggers the overlay visibility',
            'overlay_hover_target_options' => [
                'parent' => 'Immediate parent',
                'group' => 'Any ancestor',
                'product_card' => 'Product card',
            ],
            'z_index_label' => 'Z-Index',
            'position_label' => 'Position',
            'position_options' => [
                'static' => 'Static',
                'relative' => 'Relative',
                'absolute' => 'Absolute',
                'fixed' => 'Fixed',
            ],
            'link_header' => 'Link',
            'link_label' => 'Link',
            'open_in_new_tab_label' => 'Open in new tab',
        ],
        'presets' => [
            'basic' => [
                'name' => 'Group',
                'category' => 'Layout',
            ],
            'centered' => [
                'name' => 'Centered Group',
                'category' => 'Layout',
            ],
            'card' => [
                'name' => 'Card',
                'category' => 'Layout',
            ],
            'flex_row' => [
                'name' => 'Flex Row',
                'category' => 'Layout',
            ],
            'grid' => [
                'name' => 'Grid Group',
                'category' => 'Layout',
            ],
            'overlay' => [
                'name' => 'Overlay Group',
                'category' => 'Layout',
            ],
            'feature_icon' => [
                'name' => 'Feature Icon',
            ],
        ],
    ],

    'button' => [
        'description' => 'A customizable button with color, style, and size options',
        'settings' => [
            'text_label' => 'Text',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'Open in new tab',

            'appearance_header' => 'Appearance',
            'color_label' => 'Color',
            'color_options' => [
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'accent' => 'Accent',
                'neutral' => 'Neutral',
            ],
            'style_label' => 'Style',
            'style_options' => [
                'filled' => 'Filled',
                'soft' => 'Soft',
                'outline' => 'Outline',
                'ghost' => 'Ghost',
                'link' => 'Link',
            ],
            'size_label' => 'Size',
            'size_options' => [
                'xs' => 'Extra Small',
                'sm' => 'Small',
                'md' => 'Medium',
                'lg' => 'Large',
                'xl' => 'Extra Large',
            ],
            'full_width_label' => 'Full Width',
            'circle_label' => 'Circle',
            'square_label' => 'Square',

            'icon_header' => 'Icon',
            'icon_label' => 'Icon',
            'icon_position_label' => 'Icon Position',
            'icon_position_options' => [
                'left' => 'Left',
                'right' => 'Right',
            ],
        ],
        'presets' => [
            'primary' => [
                'name' => 'Primary Button',
                'category' => 'Basic',
            ],
            'outline' => [
                'name' => 'Outline Button',
                'category' => 'Basic',
            ],
            'ghost' => [
                'name' => 'Ghost Button',
                'category' => 'Basic',
            ],
            'large_cta' => [
                'name' => 'Large CTA',
                'category' => 'Basic',
            ],
            'small_soft' => [
                'name' => 'Small Soft',
                'category' => 'Basic',
            ],
        ],
    ],
];
