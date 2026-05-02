@props([
    'block',
    'image' => null,
    'alt' => '',
    'containerClasses' => '',
    'containerStyles' => '',
    'imageClasses' => '',
    'placeholder' => 'resources/assets/images/image-placeholder.svg',
])

@if ($image)
  <div
    {{ $block->editor_attributes }}
    class="{{ $containerClasses }}"
    @if ($containerStyles) style="{{ $containerStyles }}" @endif
    {{ $attributes }}
  >
    <img
      src="{{ $image }}"
      alt="{{ $alt }}"
      class="{{ $imageClasses }}"
    />
  </div>
@else
  <div
    {{ $block->editor_attributes }}
    class="{{ $containerClasses }}"
    style="background-color: #E8E8E8;@if ($containerStyles) {{ $containerStyles }} @endif"
    {{ $attributes }}
  >
    @bb_svg($placeholder)
  </div>
@endif
