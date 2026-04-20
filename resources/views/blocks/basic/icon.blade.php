<div
  {{ $block->editor_attributes }}
  class="{{ $colorClass }} inline-flex items-center justify-center"
  @if ($colorStyle) style="{{ $colorStyle }}" @endif
>
  @svg($icon, [
      'class' => $sizeClasses,
  ])
</div>
