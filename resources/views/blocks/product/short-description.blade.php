<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="'prose ' . $classes"
  :styles="$styles"
>
  @if ($product)
    {!! visual_clear_inline_styles($product->short_description) !!}
  @else
    @visual_design_mode
      <p class="text-muted">Short product description will appear here. This is a brief summary of the product's key features and benefits.</p>
    @end_visual_design_mode
  @endif
</x-basic-blocks::text-block>
