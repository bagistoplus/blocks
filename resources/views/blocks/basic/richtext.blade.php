<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="$classes"
  :styles="$styles"
  :raw-attributes="$block->liveUpdate()->html('content')"
>
  {!! $block->settings->content !!}
</x-basic-blocks::text-block>
