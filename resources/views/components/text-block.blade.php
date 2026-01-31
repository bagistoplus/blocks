@props(['block', 'tag', 'classes', 'styles', 'rawAttributes' => ''])

<{{ $tag }}
  {{ $block->editor_attributes }}
  {{ $block->settings->color_scheme?->attributes() }}
  {{ $block->settings->typography?->attributes() }}
  class="{{ $classes }}"
  @if ($styles) style="{{ $styles }}" @endif
  {{ $attributes }}
  {!! $rawAttributes !!}
>
  {{ $slot }}
</{{ $tag }}>
