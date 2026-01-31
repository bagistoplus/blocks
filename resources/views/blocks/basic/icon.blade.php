<div {{ $block->editor_attributes }} class="inline-flex items-center justify-center {{ $colorClass }} {{ $sizeClasses }}" @if($colorStyle) style="{{ $colorStyle }}" @endif>
  @svg($icon)
</div>
