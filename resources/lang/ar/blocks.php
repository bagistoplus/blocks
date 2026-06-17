<?php

return [
    'common' => [
        'product_label' => 'المنتج',
        'product_preview_info' => 'اختر منتجاً لأغراض المعاينة فقط',
        'color_scheme_label' => 'نظام الألوان',
        'color_scheme_info' => 'تجاوز نظام ألوان القسم لهذا البلوك',

        // Spacing
        'spacing_header' => 'التباعد',
        'padding_header' => 'الحشوة',
        'padding_label' => 'الحشوة',
        'margin_label' => 'الهامش',
    ],

    'divider' => [
        'name' => 'فاصل',
        'description' => 'خط أفقي لفصل المحتوى',
        'settings' => [
            'thickness_label' => 'السماكة',
            'thickness_info' => 'حدد سماكة خط الفاصل',

            'corner_radius_label' => 'نصف قطر الزاوية',
            'corner_radius_options' => [
                'square' => 'مربع',
                'rounded' => 'مستدير',
            ],

            'width_percent_label' => 'الطول',
            'width_percent_info' => 'حدد عرض الفاصل كنسبة مئوية',

            'alignment_label' => 'المحاذاة',
            'alignment_info' => 'المحاذاة الأفقية للفاصل',
            'alignment_options' => [
                'left' => 'يسار',
                'center' => 'وسط',
                'right' => 'يمين',
            ],
        ],
    ],

    'richtext' => [
        'name' => 'نص منسق',
        'description' => 'محتوى نصي غني مع التنسيق',
        'settings' => [
            'content_label' => 'المحتوى',
        ],
    ],

    'text' => [
        'name' => 'نص',
        'description' => 'نص عادي مع خيارات الطباعة والألوان',
        'settings' => [
            'text_label' => 'محتوى النص',

            'layout_header' => 'التخطيط',

            'width_label' => 'العرض',
            'width_options' => [
                'fit' => 'ملائمة المحتوى',
                'fill' => 'ملء',
            ],

            'max_width_label' => 'الحد الأقصى للعرض',
            'max_width_options' => [
                'narrow' => 'ضيق',
                'normal' => 'عادي',
                'none' => 'بدون',
            ],

            'alignment_label' => 'المحاذاة',
            'alignment_options' => [
                'left' => 'يسار',
                'center' => 'وسط',
                'right' => 'يمين',
            ],

            'typography_header' => 'الطباعة',

            'typography_label' => 'الطباعة',
            'typography_info' => 'اختر نمط الطباعة',

            'color_label' => 'لون النص',
            'color_options' => [
                'default' => 'افتراضي',
                'primary' => 'أساسي',
                'secondary' => 'ثانوي',
                'accent' => 'تمييز',
                'info' => 'معلومات',
                'success' => 'نجاح',
                'warning' => 'تحذير',
                'danger' => 'خطر',
                'custom' => 'مخصص',
            ],

            'text_color_label' => 'لون مخصص',

            'appearance_header' => 'المظهر',
        ],

        'presets' => [
            'text' => [
                'name' => 'نص',
                'category' => 'نص',
            ],
            'category-name' => [
                'name' => 'اسم الفئة',
            ],
            'heading' => [
                'name' => 'عنوان',
                'category' => 'نص',
            ],
        ],
    ],

    'icon' => [
        'name' => 'أيقونة',
        'description' => 'عرض أيقونة بحجم ولون قابلين للتخصيص',
        'settings' => [
            'icon_label' => 'أيقونة',

            'size_label' => 'الحجم',

            'color_label' => 'اللون',
            'color_options' => [
                'default' => 'افتراضي',
                'primary' => 'أساسي',
                'secondary' => 'ثانوي',
                'accent' => 'تمييز',
                'info' => 'معلومات',
                'success' => 'نجاح',
                'warning' => 'تحذير',
                'danger' => 'خطر',
                'custom' => 'مخصص',
            ],

            'custom_color_label' => 'لون مخصص',
        ],
    ],

    'link' => [
        'name' => 'رابط',
        'description' => 'رابط قابل للنقر مع خيارات الطباعة',
        'settings' => [
            'text_label' => 'نص الرابط',
            'url_label' => 'رابط URL',
            'open_in_new_tab_label' => 'فتح في تبويب جديد',

            'typography_header' => 'الطباعة',

            'typography_label' => 'الطباعة',
            'typography_info' => 'اختر نمط الطباعة',

            'appearance_header' => 'المظهر',

            'underline_label' => 'تسطير',
            'underline_options' => [
                'none' => 'بدون',
                'hover' => 'عند التمرير',
                'always' => 'دائماً',
            ],
        ],

        'presets' => [
            'link' => [
                'name' => 'رابط',
                'category' => 'أساسي',
            ],
        ],
    ],

    'heading' => [
        'name' => 'عنوان',
        'description' => 'نص عنوان بمستوى قابل للتكوين',
        'text_label' => 'نص العنوان',
        'default_text' => 'مرحباً بكم في متجرنا',
        'heading_level_label' => 'مستوى العنوان',
    ],

    'category-image' => [
        'name' => 'صورة الفئة',
        'description' => 'عرض صورة بانر أو شعار الفئة',
        'settings' => [
            'category_label' => 'الفئة',
            'image_source_label' => 'مصدر الصورة',
            'image_source_options' => [
                'banner' => 'صورة البانر',
                'logo' => 'صورة الشعار',
            ],
            'image_source_info' => 'اختر أي صورة فئة لعرضها',
            'aspect_ratio_label' => 'نسبة العرض إلى الارتفاع',
            'aspect_ratio_options' => [
                'adapt' => 'التكيف مع الصورة',
                'square' => 'مربع (1:1)',
                'portrait' => 'عمودي (3:4)',
                'landscape' => 'أفقي (4:3)',
            ],
            'object_fit_label' => 'ملاءمة الكائن',
            'object_fit_options' => [
                'cover' => 'تغطية',
                'contain' => 'احتواء',
            ],
        ],
    ],

    'category-name' => [
        'name' => 'اسم الفئة',
        'description' => 'عرض اسم الفئة',
        'settings' => [
            'category_label' => 'الفئة',
            'tag_label' => 'وسم HTML',
            'alignment_label' => 'المحاذاة',
            'alignment_options' => [
                'left' => 'يسار',
                'center' => 'وسط',
                'right' => 'يمين',
            ],
            'text_color_label' => 'لون النص',
        ],
    ],

    'image' => [
        'name' => 'صورة',
        'description' => 'صورة مع خيارات الحجم والحدود وتأثيرات التمرير',
        'settings' => [
            'image_label' => 'صورة',
            'link_label' => 'رابط',
            'alt_label' => 'نص بديل',
            'alt_info' => 'نص وصفي لإمكانية الوصول وتحسين محركات البحث',

            'size_header' => 'الحجم',
            'sizing_header' => 'الحجم',

            'image_ratio_label' => 'نسبة الصورة',
            'image_ratio_options' => [
                'adapt' => 'التكيف مع الصورة',
                'portrait' => 'عمودي (3:4)',
                'square' => 'مربع (1:1)',
                'landscape' => 'أفقي (4:3)',
            ],

            'aspect_ratio_label' => 'نسبة العرض إلى الارتفاع',
            'aspect_ratio_options' => [
                'adapt' => 'التكيف مع الصورة',
                'square' => 'مربع (1:1)',
                'portrait' => 'عمودي (3:4)',
                'landscape' => 'أفقي (4:3)',
            ],

            'object_fit_label' => 'ملاءمة الكائن',
            'object_fit_options' => [
                'cover' => 'تغطية',
                'contain' => 'احتواء',
                'fill' => 'ملء',
            ],

            'width_label' => 'العرض',
            'width_options' => [
                'fit_content' => 'ملائمة المحتوى',
                'fill' => 'ملء',
                'custom' => 'مخصص',
            ],

            'custom_width_label' => 'عرض مخصص (%)',

            'width_mobile_label' => 'العرض (الجوال)',
            'width_mobile_options' => [
                'fit_content' => 'ملائمة المحتوى',
                'fill' => 'ملء',
                'custom' => 'مخصص',
            ],

            'custom_width_mobile_label' => 'عرض مخصص للجوال (%)',

            'height_label' => 'الارتفاع',
            'height_options' => [
                'fit' => 'ملائمة المحتوى',
                'fill' => 'ملء',
            ],

            'hover_zoom_label' => 'تكبير الصورة عند التمرير',
            'hover_zoom_info' => 'تكبير الصورة عند التمرير عليها',
            'hover_zoom_scale_label' => 'مقدار التكبير',

            'borders_header' => 'الحدود',

            'border_label' => 'الحدود',
            'border_options' => [
                'none' => 'بدون',
                'solid' => 'صلب',
            ],
            'border_width_label' => 'عرض الحدود',
            'border_opacity_label' => 'شفافية الحدود',
            'border_radius_label' => 'نصف قطر الحدود',
            'border_radius_options' => [
                'none' => 'بدون',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
                'xl' => 'كبير جداً',
                '2xl' => '2X كبير',
                '3xl' => '3X كبير',
                '4xl' => '4X كبير',
                'full' => 'كامل',
            ],
        ],

        'presets' => [
            'image' => [
                'name' => 'صورة',
                'category' => 'الوسائط',
            ],
        ],
    ],

    'product-image' => [
        'name' => 'صورة المنتج',
        'description' => 'عرض صورة المنتج',
        'settings' => [
            'size_label' => 'حجم الصورة',
            'size_options' => [
                'small' => 'صغير',
                'medium' => 'متوسط',
                'large' => 'كبير',
                'original' => 'أصلي',
            ],
            'size_info' => 'اختر حجم صورة المنتج لعرضها',

            'image_source_label' => 'مصدر الصورة',
            'image_source_options' => [
                'main' => 'الصورة الرئيسية',
                'second' => 'الصورة الثانية',
            ],

            'aspect_ratio_label' => 'نسبة العرض إلى الارتفاع',
            'aspect_ratio_options' => [
                'square' => 'مربع (1:1)',
                'portrait' => 'عمودي (3:4)',
                'landscape' => 'أفقي (4:3)',
                'auto' => 'تلقائي',
            ],
            'aspect_ratio_info' => 'تعيين نسبة العرض إلى الارتفاع للصورة',

            'object_fit_label' => 'ملاءمة الكائن',
            'object_fit_options' => [
                'cover' => 'تغطية',
                'contain' => 'احتواء',
                'fill' => 'ملء',
            ],
            'object_fit_info' => 'كيفية ملاءمة الصورة ضمن حدودها',
        ],
    ],

    'product-labels' => [
        'name' => 'تسميات المنتج',
        'description' => 'عرض شارات التخفيض والمنتج الجديد',
        'settings' => [
            'layout_label' => 'التخطيط',
            'layout_options' => [
                'inline' => 'في السطر',
                'stack' => 'مكدس',
            ],
            'gap_label' => 'الفجوة',
            'alignment_label' => 'المحاذاة',
            'alignment_options' => [
                'start' => 'بداية',
                'center' => 'وسط',
                'end' => 'نهاية',
            ],
            'size_label' => 'الحجم',
            'size_options' => [
                'xs' => 'صغير جداً',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
            ],
            'variant_label' => 'النوع',
            'variant_options' => [
                'solid' => 'صلب',
                'outline' => 'محدد',
                'soft' => 'ناعم',
            ],
            'corner_radius_label' => 'نصف قطر الزاوية',
            'corner_radius_options' => [
                'none' => 'بدون',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
                'full' => 'كامل',
            ],
        ],
        'placeholder' => 'لا توجد تسميات متاحة',
    ],

    'product-title' => [
        'name' => 'عنوان المنتج',
        'description' => 'عرض عنوان المنتج',
    ],

    'product-description' => [
        'name' => 'وصف المنتج',
        'description' => 'عرض الوصف الكامل للمنتج',
    ],

    'product-short-description' => [
        'name' => 'الوصف المختصر للمنتج',
        'description' => 'عرض الوصف المختصر للمنتج',
    ],

    'group' => [
        'name' => 'مجموعة',
        'description' => 'مجموعة متعددة الاستخدامات لتكوين التخطيط مع فلكسبوكس، الشبكة، التباعد، الحجم، والحدود',
        'settings' => [
            // Layout
            'layout_header' => 'التخطيط',
            'layout_type_label' => 'نوع التخطيط',
            'layout_type_info' => 'اختر كيفية ترتيب البلوكات الفرعية',
            'layout_type_options' => [
                'block' => 'بلوك',
                'flex' => 'فلكسبوكس',
                'grid' => 'شبكة',
            ],

            // Flex Settings
            'flex_direction_label' => 'الاتجاه',
            'flex_direction_options' => [
                'horizontal' => 'أفقي',
                'vertical' => 'عمودي',
            ],
            'flex_reverse_items_label' => 'عكس العناصر',

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
                'stretch' => 'تمدد',
            ],

            'flex_wrap_label' => 'التفاف Flex',
            'flex_wrap_options' => [
                'nowrap' => 'بدون التفاف',
                'wrap' => 'التفاف',
                'wrap_reverse' => 'التفاف عكسي',
            ],
            'justify_content_label' => 'توزيع المحتوى',
            'justify_content_options' => [
                'start' => 'بداية',
                'center' => 'وسط',
                'end' => 'نهاية',
                'between' => 'مسافة بين',
                'around' => 'مسافة حول',
                'evenly' => 'مسافة متساوية',
            ],
            'align_items_label' => 'محاذاة العناصر',
            'align_items_options' => [
                'start' => 'بداية',
                'center' => 'وسط',
                'end' => 'نهاية',
                'stretch' => 'تمدد',
                'baseline' => 'خط الأساس',
            ],

            // Grid Settings
            'grid_columns_label' => 'أعمدة الشبكة',
            'grid_rows_label' => 'صفوف الشبكة',
            'grid_rows_options' => [
                'auto' => 'تلقائي',
            ],
            'gap_label' => 'الفجوة',

            // Sizing
            'sizing_header' => 'الحجم',
            'width_label' => 'العرض',
            'width_options' => [
                'auto' => 'تلقائي',
                'full' => 'كامل (100%)',
                'fit' => 'ملائمة المحتوى',
                'screen' => 'عرض الشاشة',
                'custom' => 'مخصص',
            ],
            'custom_width_label' => 'عرض مخصص',
            'min_width_label' => 'الحد الأدنى للعرض',
            'max_width_label' => 'الحد الأقصى للعرض',
            'max_width_options' => [
                'none' => 'بدون',
                'full' => 'كامل',
                'screen' => 'شاشة',
            ],
            'height_label' => 'الارتفاع',
            'height_options' => [
                'auto' => 'تلقائي',
                'full' => 'كامل (100%)',
                'fit' => 'ملائمة المحتوى',
                'screen' => 'ارتفاع الشاشة',
                'custom' => 'مخصص',
            ],
            'custom_height_label' => 'ارتفاع مخصص',
            'min_height_label' => 'الحد الأدنى للارتفاع',

            // Borders
            'borders_header' => 'الحدود',
            'border_label' => 'تمكين الحدود',
            'border_width_label' => 'عرض الحدود',
            'border_style_label' => 'نمط الحدود',
            'border_style_options' => [
                'solid' => 'صلب',
                'dashed' => 'متقطع',
                'dotted' => 'منقط',
            ],
            'border_color_label' => 'لون الحدود',
            'border_opacity_label' => 'شفافية الحدود',
            'border_radius_label' => 'نصف قطر الحدود',
            'border_radius_options' => [
                'none' => 'بدون',
                'full' => 'كامل (حبة)',
            ],

            // Background
            'background_header' => 'الخلفية',
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

            // Overlay
            'overlay_header' => 'التراكب',
            'is_overlay_label' => 'الموضع كتراكب',
            'is_overlay_info' => 'عند التمكين، سيتم وضع هذه المجموعة بشكل مطلق فوق الحاوية الأم',
            'overlay_position_label' => 'موضع التراكب',
            'overlay_position_options' => [
                'full' => 'تغطية كاملة',
                'top_left' => 'أعلى يسار',
                'top_center' => 'أعلى وسط',
                'top_right' => 'أعلى يمين',
                'middle_left' => 'وسط يسار',
                'middle_center' => 'وسط',
                'middle_right' => 'وسط يمين',
                'bottom_left' => 'أسفل يسار',
                'bottom_center' => 'أسفل وسط',
                'bottom_right' => 'أسفل يمين',
                'top' => 'أعلى (عرض كامل)',
                'bottom' => 'أسفل (عرض كامل)',
            ],
            'overlay_visibility_label' => 'رؤية التراكب',
            'overlay_visibility_info' => 'التحكم في متى يكون التراكب مرئياً',
            'overlay_visibility_options' => [
                'always' => 'مرئي دائماً',
                'hover' => 'إظهار عند تمرير الأم',
            ],
            'overlay_hover_target_label' => 'هدف التمرير',
            'overlay_hover_target_info' => 'اختر أي عنصر عند التمرير عليه يؤدي إلى إظهار التراكب',
            'overlay_hover_target_options' => [
                'parent' => 'الأم المباشرة',
                'group' => 'أي سلف',
                'product_card' => 'بطاقة المنتج',
            ],
            'z_index_label' => 'Z-Index',
            'position_label' => 'الموضع',
            'position_options' => [
                'static' => 'ثابت',
                'relative' => 'نسبي',
                'absolute' => 'مطلق',
                'fixed' => 'ثابت',
            ],
            'link_header' => 'الرابط',
            'link_label' => 'الرابط',
            'open_in_new_tab_label' => 'فتح في علامة تبويب جديدة',
        ],
        'presets' => [
            'basic' => [
                'name' => 'مجموعة',
                'category' => 'التخطيط',
            ],
            'centered' => [
                'name' => 'مجموعة متمركزة',
                'category' => 'التخطيط',
            ],
            'card' => [
                'name' => 'بطاقة',
                'category' => 'التخطيط',
            ],
            'flex_row' => [
                'name' => 'صف Flex',
                'category' => 'التخطيط',
            ],
            'grid' => [
                'name' => 'مجموعة شبكة',
                'category' => 'التخطيط',
            ],
            'overlay' => [
                'name' => 'مجموعة تراكب',
                'category' => 'التخطيط',
            ],
            'feature_icon' => [
                'name' => 'أيقونة الميزة',
            ],
        ],
    ],

    'button' => [
        'name' => 'زر',
        'description' => 'زر قابل للتخصيص مع خيارات اللون والنمط والحجم',
        'settings' => [
            'text_label' => 'النص',
            'url_label' => 'الرابط',
            'open_in_new_tab_label' => 'فتح في علامة تبويب جديدة',

            'appearance_header' => 'المظهر',
            'color_label' => 'اللون',
            'color_options' => [
                'primary' => 'أساسي',
                'secondary' => 'ثانوي',
                'accent' => 'مميز',
                'neutral' => 'محايد',
            ],
            'style_label' => 'النمط',
            'style_options' => [
                'filled' => 'مملوء',
                'soft' => 'ناعم',
                'outline' => 'محيط',
                'ghost' => 'شبح',
                'link' => 'رابط',
            ],
            'size_label' => 'الحجم',
            'size_options' => [
                'xs' => 'صغير جداً',
                'sm' => 'صغير',
                'md' => 'متوسط',
                'lg' => 'كبير',
                'xl' => 'كبير جداً',
            ],
            'full_width_label' => 'عرض كامل',
            'circle_label' => 'دائري',
            'square_label' => 'مربع',

            'icon_header' => 'الأيقونة',
            'icon_label' => 'الأيقونة',
            'icon_position_label' => 'موضع الأيقونة',
            'icon_position_options' => [
                'left' => 'يسار',
                'right' => 'يمين',
            ],
        ],
        'presets' => [
            'primary' => [
                'name' => 'زر أساسي',
                'category' => 'أساسي',
            ],
            'outline' => [
                'name' => 'زر محيط',
                'category' => 'أساسي',
            ],
            'ghost' => [
                'name' => 'زر شبح',
                'category' => 'أساسي',
            ],
            'large_cta' => [
                'name' => 'زر كبير',
                'category' => 'أساسي',
            ],
            'small_soft' => [
                'name' => 'زر صغير ناعم',
                'category' => 'أساسي',
            ],
        ],
    ],
];
