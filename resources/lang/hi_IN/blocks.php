<?php

return [
    'common' => [
        'product_label' => 'उत्पाद',
        'product_preview_info' => 'केवल पूर्वावलोकन उद्देश्य के लिए एक उत्पाद चुनें',
        'color_scheme_label' => 'रंग योजना',
        'color_scheme_info' => 'इस ब्लॉक के लिए अनुभाग रंग योजना को ओवरराइड करें',

        // Spacing
        'spacing_header' => 'स्पेसिंग',
        'padding_header' => 'पैडिंग',
        'padding_label' => 'पैडिंग',
        'margin_label' => 'मार्जिन',
    ],

    'divider' => [
        'description' => 'सामग्री को अलग करने के लिए एक क्षैतिज रेखा',
        'settings' => [
            'thickness_label' => 'मोटाई',
            'thickness_info' => 'विभाजक रेखा की मोटाई सेट करें',

            'corner_radius_label' => 'कोना त्रिज्या',
            'corner_radius_options' => [
                'square' => 'वर्ग',
                'rounded' => 'गोलाकार',
            ],

            'width_percent_label' => 'लंबाई',
            'width_percent_info' => 'प्रतिशत के रूप में विभाजक की चौड़ाई सेट करें',

            'alignment_label' => 'संरेखण',
            'alignment_info' => 'विभाजक का क्षैतिज संरेखण',
            'alignment_options' => [
                'left' => 'बाएं',
                'center' => 'केंद्र',
                'right' => 'दाएं',
            ],
        ],
    ],

    'richtext' => [
        'description' => 'स्वरूपण के साथ समृद्ध पाठ सामग्री',
        'settings' => [
            'content_label' => 'सामग्री',
        ],
    ],

    'text' => [
        'description' => 'टाइपोग्राफी और रंग विकल्पों के साथ सादा पाठ',
        'settings' => [
            'text_label' => 'पाठ सामग्री',

            'layout_header' => 'लेआउट',

            'width_label' => 'चौड़ाई',
            'width_options' => [
                'fit' => 'सामग्री के अनुसार फिट',
                'fill' => 'भरें',
            ],

            'max_width_label' => 'अधिकतम चौड़ाई',
            'max_width_options' => [
                'narrow' => 'संकीर्ण',
                'normal' => 'सामान्य',
                'none' => 'कोई नहीं',
            ],

            'alignment_label' => 'संरेखण',
            'alignment_options' => [
                'left' => 'बाएं',
                'center' => 'केंद्र',
                'right' => 'दाएं',
            ],

            'typography_header' => 'टाइपोग्राफी',

            'typography_label' => 'टाइपोग्राफी',
            'typography_info' => 'टाइपोग्राफी शैली चुनें',

            'color_label' => 'पाठ रंग',
            'color_options' => [
                'default' => 'डिफ़ॉल्ट',
                'primary' => 'प्राथमिक',
                'secondary' => 'द्वितीयक',
                'accent' => 'उच्चारण',
                'info' => 'सूचना',
                'success' => 'सफलता',
                'warning' => 'चेतावनी',
                'danger' => 'खतरा',
                'custom' => 'कस्टम',
            ],

            'text_color_label' => 'कस्टम रंग',

            'appearance_header' => 'रूप',
        ],

        'presets' => [
            'text' => [
                'name' => 'पाठ',
                'category' => 'पाठ',
            ],
            'category-name' => [
                'name' => 'श्रेणी नाम',
            ],
            'heading' => [
                'name' => 'शीर्षक',
                'category' => 'पाठ',
            ],
        ],
    ],

    'icon' => [
        'description' => 'अनुकूलन योग्य आकार और रंग के साथ एक आइकन प्रदर्शित करें',
        'settings' => [
            'icon_label' => 'आइकन',

            'size_label' => 'आकार',

            'color_label' => 'रंग',
            'color_options' => [
                'default' => 'डिफ़ॉल्ट',
                'primary' => 'प्राथमिक',
                'secondary' => 'द्वितीयक',
                'accent' => 'उच्चारण',
                'info' => 'सूचना',
                'success' => 'सफलता',
                'warning' => 'चेतावनी',
                'danger' => 'खतरा',
                'custom' => 'कस्टम',
            ],

            'custom_color_label' => 'कस्टम रंग',
        ],
    ],

    'link' => [
        'description' => 'टाइपोग्राफी विकल्पों के साथ एक क्लिक करने योग्य लिंक',
        'settings' => [
            'text_label' => 'लिंक पाठ',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'नए टैब में खोलें',

            'typography_header' => 'टाइपोग्राफी',

            'typography_label' => 'टाइपोग्राफी',
            'typography_info' => 'टाइपोग्राफी शैली चुनें',

            'appearance_header' => 'रूप',

            'underline_label' => 'रेखांकन',
            'underline_options' => [
                'none' => 'कोई नहीं',
                'hover' => 'होवर पर',
                'always' => 'हमेशा',
            ],
        ],

        'presets' => [
            'link' => [
                'name' => 'लिंक',
                'category' => 'मूलभूत',
            ],
        ],
    ],

    'heading' => [
        'description' => 'कॉन्फ़िगर करने योग्य स्तर के साथ शीर्षक पाठ',
        'text_label' => 'शीर्षक पाठ',
        'default_text' => 'हमारे स्टोर में आपका स्वागत है',
        'heading_level_label' => 'शीर्षक स्तर',
    ],

    'category-image' => [
        'description' => 'श्रेणी बैनर या लोगो छवि प्रदर्शित करें',
        'settings' => [
            'category_label' => 'श्रेणी',
            'image_source_label' => 'छवि स्रोत',
            'image_source_options' => [
                'banner' => 'बैनर छवि',
                'logo' => 'लोगो छवि',
            ],
            'image_source_info' => 'प्रदर्शित करने के लिए कौन सी श्रेणी छवि चुनें',
            'aspect_ratio_label' => 'पक्ष अनुपात',
            'aspect_ratio_options' => [
                'adapt' => 'छवि के अनुकूल',
                'square' => 'वर्ग (1:1)',
                'portrait' => 'पोर्ट्रेट (3:4)',
                'landscape' => 'लैंडस्केप (4:3)',
            ],
            'object_fit_label' => 'ऑब्जेक्ट फिट',
            'object_fit_options' => [
                'cover' => 'कवर',
                'contain' => 'समाहित',
            ],
        ],
    ],

    'category-name' => [
        'description' => 'श्रेणी का नाम प्रदर्शित करें',
        'settings' => [
            'category_label' => 'श्रेणी',
            'tag_label' => 'HTML टैग',
            'alignment_label' => 'संरेखण',
            'alignment_options' => [
                'left' => 'बाएं',
                'center' => 'केंद्र',
                'right' => 'दाएं',
            ],
            'text_color_label' => 'पाठ रंग',
        ],
    ],

    'image' => [
        'description' => 'आकार, बॉर्डर और होवर प्रभावों के साथ एक छवि',
        'settings' => [
            'image_label' => 'छवि',
            'link_label' => 'लिंक',
            'alt_label' => 'Alt पाठ',
            'alt_info' => 'एक्सेसिबिलिटी और SEO के लिए विवरणात्मक पाठ',

            'size_header' => 'आकार',
            'sizing_header' => 'आकार निर्धारण',

            'image_ratio_label' => 'छवि अनुपात',
            'image_ratio_options' => [
                'adapt' => 'छवि के अनुकूल',
                'portrait' => 'पोर्ट्रेट (3:4)',
                'square' => 'वर्ग (1:1)',
                'landscape' => 'लैंडस्केप (4:3)',
            ],

            'aspect_ratio_label' => 'पक्ष अनुपात',
            'aspect_ratio_options' => [
                'adapt' => 'छवि के अनुकूल',
                'square' => 'वर्ग (1:1)',
                'portrait' => 'पोर्ट्रेट (3:4)',
                'landscape' => 'लैंडस्केप (4:3)',
            ],

            'object_fit_label' => 'ऑब्जेक्ट फिट',
            'object_fit_options' => [
                'cover' => 'कवर',
                'contain' => 'समाहित',
                'fill' => 'भरें',
            ],

            'width_label' => 'चौड़ाई',
            'width_options' => [
                'fit_content' => 'सामग्री के अनुसार फिट',
                'fill' => 'भरें',
                'custom' => 'कस्टम',
            ],

            'custom_width_label' => 'कस्टम चौड़ाई (%)',

            'width_mobile_label' => 'चौड़ाई (मोबाइल)',
            'width_mobile_options' => [
                'fit_content' => 'सामग्री के अनुसार फिट',
                'fill' => 'भरें',
                'custom' => 'कस्टम',
            ],

            'custom_width_mobile_label' => 'कस्टम चौड़ाई मोबाइल (%)',

            'height_label' => 'ऊँचाई',
            'height_options' => [
                'fit' => 'सामग्री के अनुसार फिट',
                'fill' => 'भरें',
            ],

            'hover_zoom_label' => 'होवर पर छवि स्केल करें',
            'hover_zoom_info' => 'होवर करने पर छवि को ज़ूम करें',
            'hover_zoom_scale_label' => 'स्केल राशि',

            'borders_header' => 'बॉर्डर',

            'border_label' => 'बॉर्डर',
            'border_options' => [
                'none' => 'कोई नहीं',
                'solid' => 'ठोस',
            ],
            'border_width_label' => 'बॉर्डर चौड़ाई',
            'border_opacity_label' => 'बॉर्डर अपारदर्शिता',
            'border_radius_label' => 'बॉर्डर त्रिज्या',
            'border_radius_options' => [
                'none' => 'कोई नहीं',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
                'xl' => 'अतिरिक्त बड़ा',
                '2xl' => '2X बड़ा',
                '3xl' => '3X बड़ा',
                '4xl' => '4X बड़ा',
                'full' => 'पूर्ण',
            ],
        ],

        'presets' => [
            'image' => [
                'name' => 'छवि',
                'category' => 'मीडिया',
            ],
        ],
    ],

    'product-image' => [
        'description' => 'उत्पाद छवि प्रदर्शित करें',
        'settings' => [
            'size_label' => 'छवि आकार',
            'size_options' => [
                'small' => 'छोटा',
                'medium' => 'मध्यम',
                'large' => 'बड़ा',
                'original' => 'मूल',
            ],
            'size_info' => 'प्रदर्शित करने के लिए उत्पाद छवि का आकार चुनें',

            'image_source_label' => 'छवि स्रोत',
            'image_source_options' => [
                'main' => 'मुख्य छवि',
                'second' => 'दूसरी छवि',
            ],

            'aspect_ratio_label' => 'पक्ष अनुपात',
            'aspect_ratio_options' => [
                'square' => 'वर्ग (1:1)',
                'portrait' => 'पोर्ट्रेट (3:4)',
                'landscape' => 'लैंडस्केप (4:3)',
                'auto' => 'ऑटो',
            ],
            'aspect_ratio_info' => 'छवि का पक्ष अनुपात सेट करें',

            'object_fit_label' => 'ऑब्जेक्ट फिट',
            'object_fit_options' => [
                'cover' => 'कवर',
                'contain' => 'समाहित',
                'fill' => 'भरें',
            ],
            'object_fit_info' => 'छवि को इसकी सीमाओं के भीतर कैसे फिट होना चाहिए',
        ],
    ],

    'product-labels' => [
        'description' => 'उत्पाद बिक्री और नए बैज प्रदर्शित करें',
        'settings' => [
            'layout_label' => 'लेआउट',
            'layout_options' => [
                'inline' => 'इनलाइन',
                'stack' => 'स्टैक',
            ],
            'gap_label' => 'अंतर',
            'alignment_label' => 'संरेखण',
            'alignment_options' => [
                'start' => 'शुरुआत',
                'center' => 'केंद्र',
                'end' => 'अंत',
            ],
            'size_label' => 'आकार',
            'size_options' => [
                'xs' => 'अतिरिक्त छोटा',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
            ],
            'variant_label' => 'प्रकार',
            'variant_options' => [
                'solid' => 'ठोस',
                'outline' => 'आउटलाइन',
                'soft' => 'मुलायम',
            ],
            'corner_radius_label' => 'कोना त्रिज्या',
            'corner_radius_options' => [
                'none' => 'कोई नहीं',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
                'full' => 'पूर्ण',
            ],
        ],
        'placeholder' => 'कोई लेबल उपलब्ध नहीं',
    ],

    'product-title' => [
        'name' => 'उत्पाद शीर्षक',
        'description' => 'उत्पाद का शीर्षक प्रदर्शित करें',
    ],

    'product-description' => [
        'description' => 'उत्पाद का पूर्ण विवरण प्रदर्शित करें',
    ],

    'product-short-description' => [
        'description' => 'उत्पाद का संक्षिप्त विवरण प्रदर्शित करें',
    ],

    'group' => [
        'name' => 'समूह',
        'description' => 'फ्लेक्स, ग्रिड, स्पेसिंग, आकार और बॉर्डर के साथ लेआउट कंपोजिशन के लिए बहुमुखी समूह',
        'settings' => [
            // Layout
            'layout_header' => 'लेआउट',
            'layout_type_label' => 'लेआउट प्रकार',
            'layout_type_info' => 'चुनें कि चाइल्ड ब्लॉक कैसे व्यवस्थित हैं',
            'layout_type_options' => [
                'block' => 'ब्लॉक',
                'flex' => 'फ्लेक्सबॉक्स',
                'grid' => 'ग्रिड',
            ],

            // Flex Settings
            'flex_direction_label' => 'दिशा',
            'flex_direction_options' => [
                'horizontal' => 'क्षैतिज',
                'vertical' => 'लंबवत',
            ],
            'flex_reverse_items_label' => 'आइटम उलटें',

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

            'flex_wrap_label' => 'फ्लेक्स रैप',
            'flex_wrap_options' => [
                'nowrap' => 'रैप नहीं',
                'wrap' => 'रैप',
                'wrap_reverse' => 'रैप रिवर्स',
            ],
            'justify_content_label' => 'Justify Content',
            'justify_content_options' => [
                'start' => 'शुरुआत',
                'center' => 'केंद्र',
                'end' => 'अंत',
                'between' => 'बीच में स्थान',
                'around' => 'चारों ओर स्थान',
                'evenly' => 'समान रूप से स्थान',
            ],
            'align_items_label' => 'Align Items',
            'align_items_options' => [
                'start' => 'शुरुआत',
                'center' => 'केंद्र',
                'end' => 'अंत',
                'stretch' => 'खिंचाव',
                'baseline' => 'बेसलाइन',
            ],

            // Grid Settings
            'grid_columns_label' => 'ग्रिड स्तंभ',
            'grid_rows_label' => 'ग्रिड पंक्तियां',
            'grid_rows_options' => [
                'auto' => 'ऑटो',
            ],
            'gap_label' => 'अंतर',

            // Sizing
            'sizing_header' => 'आकार निर्धारण',
            'width_label' => 'चौड़ाई',
            'width_options' => [
                'auto' => 'ऑटो',
                'full' => 'पूर्ण (100%)',
                'fit' => 'सामग्री के अनुसार फिट',
                'screen' => 'स्क्रीन चौड़ाई',
                'custom' => 'कस्टम',
            ],
            'custom_width_label' => 'कस्टम चौड़ाई',
            'min_width_label' => 'न्यूनतम चौड़ाई',
            'max_width_label' => 'अधिकतम चौड़ाई',
            'max_width_options' => [
                'none' => 'कोई नहीं',
                'full' => 'पूर्ण',
                'screen' => 'स्क्रीन',
            ],
            'height_label' => 'ऊँचाई',
            'height_options' => [
                'auto' => 'ऑटो',
                'full' => 'पूर्ण (100%)',
                'fit' => 'सामग्री के अनुसार फिट',
                'screen' => 'स्क्रीन ऊँचाई',
                'custom' => 'कस्टम',
            ],
            'custom_height_label' => 'कस्टम ऊँचाई',
            'min_height_label' => 'न्यूनतम ऊँचाई',

            // Borders
            'borders_header' => 'बॉर्डर',
            'border_label' => 'बॉर्डर सक्षम करें',
            'border_width_label' => 'बॉर्डर चौड़ाई',
            'border_style_label' => 'बॉर्डर शैली',
            'border_style_options' => [
                'solid' => 'ठोस',
                'dashed' => 'डैश्ड',
                'dotted' => 'डॉटेड',
            ],
            'border_color_label' => 'बॉर्डर रंग',
            'border_opacity_label' => 'बॉर्डर अपारदर्शिता',
            'border_radius_label' => 'बॉर्डर त्रिज्या',
            'border_radius_options' => [
                'none' => 'कोई नहीं',
                'full' => 'पूर्ण (गोली)',
            ],

            // Background
            'background_header' => 'पृष्ठभूमि',
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
                'no_repeat' => 'दोहराव नहीं',
                'repeat' => 'दोहराव',
                'repeat_x' => 'X दोहराव',
                'repeat_y' => 'Y दोहराव',
            ],

            // Overlay
            'overlay_header' => 'ओवरले',
            'is_overlay_label' => 'ओवरले के रूप में स्थिति',
            'is_overlay_info' => 'सक्षम होने पर, यह समूह अपने पैरेंट के ऊपर पूर्ण रूप से स्थित होगा',
            'overlay_position_label' => 'ओवरले स्थिति',
            'overlay_position_options' => [
                'full' => 'पूर्ण कवरेज',
                'top_left' => 'ऊपर बाएँ',
                'top_center' => 'ऊपर केंद्र',
                'top_right' => 'ऊपर दाएँ',
                'middle_left' => 'मध्य बाएँ',
                'middle_center' => 'मध्य केंद्र',
                'middle_right' => 'मध्य दाएँ',
                'bottom_left' => 'नीचे बाएँ',
                'bottom_center' => 'नीचे केंद्र',
                'bottom_right' => 'नीचे दाएँ',
                'top' => 'ऊपर (पूरी चौड़ाई)',
                'bottom' => 'नीचे (पूरी चौड़ाई)',
            ],
            'overlay_visibility_label' => 'ओवरले दृश्यता',
            'overlay_visibility_info' => 'नियंत्रित करें कि ओवरले कब दृश्यमान है',
            'overlay_visibility_options' => [
                'always' => 'हमेशा दृश्यमान',
                'hover' => 'पैरेंट होवर पर दिखाएं',
            ],
            'overlay_hover_target_label' => 'होवर लक्ष्य',
            'overlay_hover_target_info' => 'चुनें कि किस तत्व का होवर ओवरले दृश्यता को ट्रिगर करता है',
            'overlay_hover_target_options' => [
                'parent' => 'तत्काल पैरेंट',
                'group' => 'कोई भी पूर्वज',
                'product_card' => 'उत्पाद कार्ड',
            ],
            'z_index_label' => 'Z-Index',
            'position_label' => 'स्थिति',
            'position_options' => [
                'static' => 'स्थिर',
                'relative' => 'सापेक्ष',
                'absolute' => 'पूर्ण',
                'fixed' => 'स्थिर',
            ],
            'link_header' => 'लिंक',
            'link_label' => 'लिंक',
            'open_in_new_tab_label' => 'नई टैब में खोलें',
        ],
        'presets' => [
            'basic' => [
                'name' => 'समूह',
                'category' => 'लेआउट',
            ],
            'centered' => [
                'name' => 'केंद्रित समूह',
                'category' => 'लेआउट',
            ],
            'card' => [
                'name' => 'कार्ड',
                'category' => 'लेआउट',
            ],
            'flex_row' => [
                'name' => 'फ्लेक्स पंक्ति',
                'category' => 'लेआउट',
            ],
            'grid' => [
                'name' => 'ग्रिड समूह',
                'category' => 'लेआउट',
            ],
            'overlay' => [
                'name' => 'ओवरले समूह',
                'category' => 'लेआउट',
            ],
            'feature_icon' => [
                'name' => 'फ़ीचर आइकन',
            ],
        ],
    ],

    'button' => [
        'description' => 'रंग, शैली और आकार विकल्पों के साथ एक अनुकूलन योग्य बटन',
        'settings' => [
            'text_label' => 'टेक्स्ट',
            'url_label' => 'URL',
            'open_in_new_tab_label' => 'नई टैब में खोलें',

            'appearance_header' => 'दिखावट',
            'color_label' => 'रंग',
            'color_options' => [
                'primary' => 'प्राथमिक',
                'secondary' => 'द्वितीयक',
                'accent' => 'एक्सेंट',
                'neutral' => 'तटस्थ',
            ],
            'style_label' => 'शैली',
            'style_options' => [
                'filled' => 'भरा हुआ',
                'soft' => 'सॉफ्ट',
                'outline' => 'आउटलाइन',
                'ghost' => 'घोस्ट',
                'link' => 'लिंक',
            ],
            'size_label' => 'आकार',
            'size_options' => [
                'xs' => 'बहुत छोटा',
                'sm' => 'छोटा',
                'md' => 'मध्यम',
                'lg' => 'बड़ा',
                'xl' => 'बहुत बड़ा',
            ],
            'full_width_label' => 'पूर्ण चौड़ाई',
            'circle_label' => 'वृत्त',
            'square_label' => 'वर्ग',

            'icon_header' => 'आइकन',
            'icon_label' => 'आइकन',
            'icon_position_label' => 'आइकन स्थिति',
            'icon_position_options' => [
                'left' => 'बाएं',
                'right' => 'दाएं',
            ],
        ],
        'presets' => [
            'primary' => [
                'name' => 'प्राथमिक बटन',
                'category' => 'बेसिक',
            ],
            'outline' => [
                'name' => 'आउटलाइन बटन',
                'category' => 'बेसिक',
            ],
            'ghost' => [
                'name' => 'घोस्ट बटन',
                'category' => 'बेसिक',
            ],
            'large_cta' => [
                'name' => 'बड़ा CTA',
                'category' => 'बेसिक',
            ],
            'small_soft' => [
                'name' => 'छोटा सॉफ्ट',
                'category' => 'बेसिक',
            ],
        ],
    ],
];
