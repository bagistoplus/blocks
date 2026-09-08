<div
  {{ $section->editor_attributes }}
  {{ $section->settings->color_scheme?->attributes() }}
  class="{{ $outerClasses }} relative"
  @if ($outerStyles) style="{{ $outerStyles }}" @endif
>
  @if ($section->settings->toggle_overlay)
    <div class="absolute inset-0 z-0 pointer-events-none" @if ($overlayStyles) style="{{ $overlayStyles }}" @endif></div>
  @endif

  <div class="{{ $contentWidthClasses }} relative z-10">
    <div class="{{ $sectionHeightClasses }} {{ $flexClasses }} {{ $paddingClasses }} flex" @if ($sectionHeightStyles) style="{{ $sectionHeightStyles }}" @endif>
      @children
    </div>
  </div>
</div>
