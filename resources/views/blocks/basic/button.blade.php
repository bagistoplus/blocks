<x-basic-blocks::button
  :color="$color"
  :variant="$variant"
  :size="$size"
  :block="$fullWidth"
  :circle="$circle"
  :square="$square"
  :icon="$icon"
  :icon-position="$iconPosition"
  :raw-attributes="$block->editor_attributes . ' ' . $block->liveUpdate('text')"
  href="{{ $url }}"
  :target="$target"
  :rel="$rel"
  :aria-label="$ariaLabel"
>
  <span>{{ $block->settings->text }}</span>
</x-basic-blocks::button>
