@props([
    'block',
    'image' => null,
    'link' => null,
    'alt' => '',
    'containerClasses' => '',
    'linkClasses' => '',
    'containerStyles' => '',
    'imageClasses' => '',
    'imageStyles' => '',
    'placeholderClasses' => '',
    'placeholder' => 'resources/assets/images/image-placeholder.svg',
])

@php
    $imageSource = $image ?: \BagistoPlus\BasicBlocks\image_to_base64($placeholder);
@endphp

@if ($link)
  <a
    {{ $block->editor_attributes }}
    href="{{ $link }}"
    class="{{ $linkClasses }}"
    @if ($containerStyles) style="{{ $containerStyles }}" @endif
    {{ $attributes }}
  >
  @else
  <div
    {{ $block->editor_attributes }}
    class="{{ $containerClasses }}"
    @if ($containerStyles) style="{{ $containerStyles }}" @endif
    {{ $attributes }}
  >
@endif

<img
  src="{{ $imageSource }}"
  alt="{{ $alt }}"
  class="{{ $imageClasses }}"
  @if ($imageStyles) style="{{ $imageStyles }}" @endif
>

@if ($link)
  </a>
@else
  </div>
@endif
