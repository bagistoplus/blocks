<?php

return [
    'flex-section' => [
        'name' => 'लचीला अनुभाग',
        'description' => 'एक सार्वभौमिक अनुभाग जो व्यापक लेआउट, आकार और स्टाइलिंग नियंत्रणों के साथ किसी भी ब्लॉक प्रकार को स्वीकार करता है।',

        'presets' => [
            'custom_section' => [
                'name' => 'कस्टम अनुभाग',
                'category' => 'लेआउट',
            ],
        ],

        'settings' => [
            'layout_header' => 'लेआउट',

            'direction_label' => 'दिशा',
            'direction_options' => [
                'horizontal' => 'क्षैतिज',
                'vertical' => 'लंबवत',
            ],

            'flex_justify_label' => 'सामग्री स्थिति',
            'flex_justify_options' => [
                'start' => 'शुरुआत',
                'center' => 'केंद्र',
                'space_between' => 'बीच में स्थान',
                'end' => 'अंत',
            ],

            'flex_align_label' => 'सामग्री संरेखण',
            'flex_align_options' => [
                'start' => 'शुरुआत',
                'center' => 'केंद्र',
                'end' => 'अंत',
            ],

            'gap_label' => 'आइटम के बीच अंतर',
            'gap_info' => 'चाइल्ड ब्लॉक के बीच स्थान',

            'size_header' => 'आकार',

            'section_width_label' => 'सामग्री चौड़ाई',
            'section_width_options' => [
                'full' => 'पूरी चौड़ाई',
                'container' => 'कंटेनर',
            ],
            'section_width_info' => 'कंटेनर अधिकतम चौड़ाई सीमित करता है और सामग्री को केंद्रित करता है',

            'section_height_label' => 'अनुभाग ऊंचाई',
            'section_height_options' => [
                'auto' => 'ऑटो',
                'xs' => 'बहुत छोटा',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
                'screen' => 'पूर्ण स्क्रीन',
                'custom' => 'कस्टम',
            ],

            'section_height_custom_label' => 'कस्टम ऊंचाई',

            'appearance_header' => 'दिखावट',

            'background_type_label' => 'पृष्ठभूमि प्रकार',
            'background_type_options' => [
                'none' => 'कोई नहीं',
                'color' => 'रंग',
                'gradient' => 'ग्रेडिएंट',
                'image' => 'छवि',
            ],

            'background_color_label' => 'पृष्ठभूमि रंग',
            'background_gradient_label' => 'पृष्ठभूमि ग्रेडिएंट',
            'background_image_label' => 'पृष्ठभूमि छवि',

            'background_position_label' => 'पृष्ठभूमि स्थिति',
            'background_position_options' => [
                'center' => 'केंद्र',
                'top' => 'शीर्ष',
                'bottom' => 'तल',
                'left' => 'बाएं',
                'right' => 'दाएं',
            ],

            'background_size_label' => 'पृष्ठभूमि आकार',
            'background_size_options' => [
                'cover' => 'कवर',
                'contain' => 'समाहित',
                'auto' => 'ऑटो',
            ],

            'background_repeat_label' => 'पृष्ठभूमि दोहराव',
            'background_repeat_options' => [
                'no_repeat' => 'कोई दोहराव नहीं',
                'repeat' => 'दोहराएं',
                'repeat_x' => 'क्षैतिज दोहराव',
                'repeat_y' => 'लंबवत दोहराव',
            ],

            'border_label' => 'बॉर्डर दिखाएं',
            'border_width_label' => 'बॉर्डर चौड़ाई',
            'border_style_label' => 'बॉर्डर शैली',
            'border_style_options' => [
                'solid' => 'ठोस',
                'dashed' => 'डैश',
                'dotted' => 'बिंदु',
            ],
            'border_color_label' => 'बॉर्डर रंग',

            'border_radius_label' => 'बॉर्डर त्रिज्या',
            'border_radius_options' => [
                'none' => 'कोई नहीं',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
                'xl' => 'बहुत बड़ा',
                '2xl' => '2X बहुत बड़ा',
                '3xl' => '3X बहुत बड़ा',
                'full' => 'पूर्ण',
            ],

            'toggle_overlay_label' => 'ओवरले दिखाएं',
            'toggle_overlay_info' => 'पृष्ठभूमि मीडिया के ऊपर एक ओवरले जोड़ें',

            'overlay_style_label' => 'ओवरले शैली',
            'overlay_style_options' => [
                'solid' => 'ठोस',
                'gradient' => 'ग्रेडिएंट',
            ],

            'overlay_color_label' => 'ओवरले रंग',
            'overlay_gradient_label' => 'ओवरले ग्रेडिएंट',
        ],
    ],
];
