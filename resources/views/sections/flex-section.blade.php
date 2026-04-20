<div
  {{ $section->editor_attributes }}
  {{ $section->settings->color_scheme?->attributes() }}
  class="{{ $outerClass }} relative"
  style="{{ $outerStyle }}"
>
  @if ($section->settings->toggle_overlay)
    <div class="absolute inset-0" style="{{ $overlayStyle }}"></div>
  @endif

  <div class="{{ $contentWidth }} {{ $sectionHeight }} {{ $flexClass }} relative z-10 flex" style="{{ $flexStyle }}">
    @children
  </div>
</div>
