@props([
    'tag' => 'a',
    'color' => 'primary',
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

  $wireTarget = $attributes->has('wire:target') ? 'wire:target=' . $attributes->get('wire:target') : '';

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
  @if ($icon)
    <span @if ($loading) {!! $wireTarget !!} wire:loading.class="opacity-0" @endif
      class="inline-flex h-5 w-5 items-center justify-center transition-opacity duration-200"
    >
      @svg($icon, ['class' => 'size-[1.2em]'])
    </span>
  @endif

  @if (!$square && !$circle)
    @if ($loading)
      <span
        {!! $wireTarget !!}
        wire:loading.class="opacity-0"
        class="transition-opacity duration-200"
      >
        {{ $slot }}
      </span>
    @else
      {{ $slot }}
    @endif
  @endif

  @if ($loading)
    <span
      {!! $wireTarget !!}
      class="absolute top-1/2 -translate-y-1/2 transform"
      wire:loading.class="loading"
    >
    </span>
  @endif
</{{ $tag }}>
