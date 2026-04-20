<?php

return [
    'flex-section' => [
        'name' => 'قسم مرن',
        'description' => 'قسم عالمي يقبل أي نوع من الكتل مع عناصر تحكم شاملة للتخطيط والحجم والتنسيق.',

        'presets' => [
            'custom_section' => [
                'name' => 'قسم مخصص',
                'category' => 'التخطيط',
            ],
        ],

        'settings' => [
            'layout_header' => 'التخطيط',

            'direction_label' => 'الاتجاه',
            'direction_options' => [
                'horizontal' => 'أفقي',
                'vertical' => 'عمودي',
            ],

            'flex_justify_label' => 'موضع المحتوى',
            'flex_justify_options' => [
                'start' => 'بداية',
                'center' => 'وسط',
                'space_between' => 'مسافة بين',
                'end' => 'نهاية',
            ],

            'flex_align_label' => 'محاذاة المحتوى',
            'flex_align_options' => [
                'start' => 'بداية',
                'center' => 'وسط',
                'end' => 'نهاية',
            ],

            'gap_label' => 'المسافة بين العناصر',
            'gap_info' => 'المسافة بين الكتل الفرعية',

            'size_header' => 'الحجم',

            'section_width_label' => 'عرض المحتوى',
            'section_width_options' => [
                'full' => 'عرض كامل',
                'container' => 'حاوية',
            ],
            'section_width_info' => 'الحاوية تقيد العرض الأقصى وتوسط المحتوى',

            'section_height_label' => 'ارتفاع القسم',
            'section_height_options' => [
                'auto' => 'تلقائي',
                'xs' => 'صغير جداً',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
                'screen' => 'ملء الشاشة',
                'custom' => 'مخصص',
            ],

            'section_height_custom_label' => 'ارتفاع مخصص',

            'appearance_header' => 'المظهر',

            'background_type_label' => 'نوع الخلفية',
            'background_type_options' => [
                'none' => 'بدون',
                'color' => 'لون',
                'gradient' => 'تدرج',
                'image' => 'صورة',
            ],

            'background_color_label' => 'لون الخلفية',
            'background_gradient_label' => 'تدرج الخلفية',
            'background_image_label' => 'صورة الخلفية',

            'background_position_label' => 'موضع الخلفية',
            'background_position_options' => [
                'center' => 'وسط',
                'top' => 'أعلى',
                'bottom' => 'أسفل',
                'left' => 'يسار',
                'right' => 'يمين',
            ],

            'background_size_label' => 'حجم الخلفية',
            'background_size_options' => [
                'cover' => 'تغطية',
                'contain' => 'احتواء',
                'auto' => 'تلقائي',
            ],

            'background_repeat_label' => 'تكرار الخلفية',
            'background_repeat_options' => [
                'no_repeat' => 'بدون تكرار',
                'repeat' => 'تكرار',
                'repeat_x' => 'تكرار أفقي',
                'repeat_y' => 'تكرار عمودي',
            ],

            'border_label' => 'إظهار الحدود',
            'border_width_label' => 'عرض الحدود',
            'border_opacity_label' => 'شفافية الحدود',

            'border_radius_label' => 'نصف قطر الحدود',
            'border_radius_options' => [
                'none' => 'بدون',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
                'xl' => 'كبير جداً',
                'full' => 'كامل',
            ],

            'toggle_overlay_label' => 'إظهار الطبقة',
            'toggle_overlay_info' => 'إضافة طبقة فوق وسائط الخلفية',

            'overlay_style_label' => 'نمط الطبقة',
            'overlay_style_options' => [
                'solid' => 'صلب',
                'gradient' => 'تدرج',
            ],

            'overlay_color_label' => 'لون الطبقة',
            'overlay_gradient_label' => 'تدرج الطبقة',
        ],
    ],
];
