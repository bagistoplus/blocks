@props([
    'block',
    'image' => null,
    'link' => null,
    'alt' => '',
    'containerClasses' => '',
    'linkClasses' => '',
    'containerStyles' => '',
    'imageClasses' => '',
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
      style="@if ($containerStyles) {{ $containerStyles }} @endif"
      {{ $attributes }}
    >
    @else
      <div
        {{ $block->editor_attributes }}
        class="{{ $containerClasses }}"
        style="@if ($containerStyles) {{ $containerStyles }} @endif"
        {{ $attributes }}
      >
  @endif
  @bb_svg($placeholder)
  @if ($link)
    </a>
  @else
    </div>
  @endif
@endif
