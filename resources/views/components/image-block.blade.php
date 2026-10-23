@props([
    'block',
    'image' => null,
    'link' => null,
    'alt' => '',
    'priority' => false,
    'sizes' => null,
    'containerClasses' => '',
    'linkClasses' => '',
    'containerStyles' => '',
    'imageClasses' => '',
    'imageStyles' => '',
    'placeholderClasses' => '',
    'placeholder' => 'resources/assets/images/image-placeholder.svg',
])

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

{{-- An upload comes with its WebP copies; a product or category image is a plain URL --}}
@if ($image instanceof \BagistoPlus\Visual\Settings\Support\ImageValue)
  <x-visual::image
    :image="$image"
    :alt="$alt !== '' ? $alt : null"
    :priority="$priority"
    :sizes="$sizes"
    class="{{ $imageClasses }}"
    :style="$imageStyles ?: null"
  />
@elseif ($image)
  <img
    src="{{ $image }}"
    alt="{{ $alt }}"
    class="{{ $imageClasses }}"
    @if ($imageStyles) style="{{ $imageStyles }}" @endif
    @if ($priority) fetchpriority="high" @else loading="lazy" @endif
    decoding="async"
  >
@else
  <img
    src="{{ \BagistoPlus\BasicBlocks\image_to_base64($placeholder) }}"
    alt="{{ $alt }}"
    class="{{ $imageClasses }}"
    @if ($imageStyles) style="{{ $imageStyles }}" @endif
  >
@endif

@if ($link)
  </a>
@else
  </div>
@endif
