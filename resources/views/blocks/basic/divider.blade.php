<div
  {{ $block->editor_attributes }}
  {{ $block->settings->color_scheme?->attributes() }}
  class="flex items-center justify-center self-stretch"
>
  <span class="border-border {{ $isRounded ? 'rounded-full' : '' }}"
    style="border-bottom-width: {{ $thickness }}px; border-right-width: {{ $thickness }}px; flex-basis: {{ $length }}%; min-height: {{ $length }}%;"
  ></span>
</div>
