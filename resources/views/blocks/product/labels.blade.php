<div
  {{ $block->editor_attributes }}
  {!! $block->settings->color_scheme?->attributes() !!}
  class="{{ $containerClasses }}"
>
  @forelse($labels as $label)
    <span class="{{ $labelClasses }} {{ $getVariantClass($label['color']) }}">
      {{ $label['text'] }}
    </span>
  @empty
    @visual_design_mode
      <span class="{{ $labelClasses }} {{ $getVariantClass('primary') }}">
        New
      </span>
    @end_visual_design_mode
  @endforelse
</div>
