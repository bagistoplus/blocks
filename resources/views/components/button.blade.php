@props([
    'tag' => 'a',
    'color' => 'default',
    'variant' => 'filled',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'circle' => false,
    'square' => false,
    'block' => false,
    'loading' => null,
    'rawAttributes' => '',
])

@php
  $classes = ['relative', 'btn', "btn-{$color}", "btn-{$size}"];

  if ($variant !== 'filled') {
      $classes[] = "btn-{$variant}";
  }

  if ($block) {
      $classes[] = 'btn-block';
  }

  if ($circle) {
      $classes[] = 'btn-circle';
  }

  if ($square) {
      $classes[] = 'btn-square';
  }

  $type = $attributes->get('type');
  $wireClick = $attributes->whereStartsWith('wire:click')->first();
  $loading ??= $type === 'submit' || $wireClick || $attributes->has('wire:target');

  if ($wireClick && !$attributes->has('wire:target')) {
      $attributes = $attributes->merge(['wire:target' => $wireClick], escape: false);
  }

  if ($loading) {
      $tag = $attributes->has('href') ? 'a' : 'button';
  } else {
      $tag = $attributes->has('href') ? 'a' : $tag;
  }

  $btnClass = implode(' ', $classes);
@endphp

<{{ $tag }}
  {{ $attributes->merge(['class' => $btnClass]) }}
  {!! $rawAttributes !!}
  @if ($loading) wire:loading.attr="loading" @endif
>
  @if ($icon && $iconPosition === 'left')
    <span class="btn-icon inline-flex items-center justify-center transition-opacity duration-200">
      @svg($icon, ['class' => 'size-full'])
    </span>
  @endif

  @if (!$square && !$circle)
    <span class="btn-label transition-opacity duration-200">{{ $slot }}</span>
  @endif

  @if ($icon && $iconPosition === 'right')
    <span class="btn-icon inline-flex items-center justify-center transition-opacity duration-200">
      @svg($icon, ['class' => 'size-full'])
    </span>
  @endif

  <span class="loading absolute top-1/2 -translate-y-1/2 transform"></span>
</{{ $tag }}>
