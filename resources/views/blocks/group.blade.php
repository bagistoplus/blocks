@if ($isLinkable)
  <a
    {{ $block->editor_attributes }}
    {{ $block->settings->color_scheme?->attributes() }}
    href="{{ $link }}"
    class="{{ $class }}"
    @if ($linkTarget) target="{{ $linkTarget }}" @endif
    @if ($linkRel) rel="{{ $linkRel }}" @endif
    @if ($style) style="{{ $style }}" @endif
  >
    @children
  </a>
@else
  <div
    {{ $block->editor_attributes }}
    {{ $block->settings->color_scheme?->attributes() }}
    class="{{ $class }}"
    @if ($style) style="{{ $style }}" @endif
  >
    @children
  </div>
@endif
