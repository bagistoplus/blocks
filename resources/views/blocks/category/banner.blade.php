<div
  {{ $block->editor_attributes }}
  {{ $block->settings->color_scheme?->attributes() }}
  class="{{ $bannerClasses }}"
>
  @if ($image)
    <img
      src="{{ $image }}"
      alt="{{ $alt }}"
      class="absolute inset-0 h-full w-full object-cover"
      @if ($imageStyles) style="{{ $imageStyles }}" @endif
    >
  @elseif ($showImage)
    @visual_design_mode
    <img
      src="@bb_image_to_base64('resources/assets/images/category-placeholder.svg')"
      alt=""
      class="absolute inset-0 h-full w-full object-cover opacity-50"
    >
    @end_visual_design_mode
  @endif

  @if ($overlayStyles)
    <div class="absolute inset-0" style="{{ $overlayStyles }}"></div>
  @endif

  <div class="{{ $contentWrapperClasses }}">
    <div class="{{ $contentClasses }}">
      @if ($showHeading)
        @if ($headingText)
          <{{ $headingTag }} {{ $block->settings->heading_typography?->attributes() }}>
            {{ $headingText }}
            </{{ $headingTag }}>
          @else
            @visual_design_mode
            <{{ $headingTag }} {{ $block->settings->heading_typography?->attributes() }}>
              Category Name
              </{{ $headingTag }}>
              @end_visual_design_mode
        @endif
      @endif

      @if ($showDescription)
        @if ($hasDescription)
          <div
            {{ $block->settings->description_typography?->attributes() }}
            class="{{ $descriptionClasses }}"
            @if ($descriptionStyles) style="{{ $descriptionStyles }}" @endif
          >
            {!! visual_clear_inline_styles($description) !!}
          </div>
        @else
          @visual_design_mode
          <div
            {{ $block->settings->description_typography?->attributes() }}
            class="{{ $descriptionClasses }}"
            @if ($descriptionStyles) style="{{ $descriptionStyles }}" @endif
          >
            <p>This is where the category description will appear. It usually introduces the category and helps visitors decide where to browse next.</p>
          </div>
          @end_visual_design_mode
        @endif
      @endif
    </div>
  </div>
</div>
