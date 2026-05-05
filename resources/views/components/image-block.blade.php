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

@if ($image)
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
    src="{{ $image }}"
    alt="{{ $alt }}"
    class="{{ $imageClasses }}"
    @if ($imageStyles) style="{{ $imageStyles }}" @endif
  />
  @if ($link)
    </a>
  @else
    </div>
  @endif
@else
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
  <div class="{{ $placeholderClasses }}">
    @bb_svg($placeholder)
  </div>
  @if ($link)
    </a>
  @else
    </div>
  @endif
@endif
