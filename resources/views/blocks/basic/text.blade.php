<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="$classes"
  :styles="$styles"
  :raw-attributes="$block->liveUpdate('text')"
>
  {{ $block->settings->text }}
</x-basic-blocks::text-block>
