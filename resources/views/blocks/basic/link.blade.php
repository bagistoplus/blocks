<a
  {{ $block->editor_attributes }}
  {{ $block->settings->color_scheme?->attributes() }}
  {{ $block->settings->typography?->attributes() }}
  href="{{ $url }}"
  @if($target) target="{{ $target }}" @endif
  @if($rel) rel="{{ $rel }}" @endif
  class="{{ $classes }}"
  @if($styles) style="{{ $styles }}" @endif
  {!! $block->liveUpdate('text') !!}
>
  {{ $block->settings->text }}
</a>
