<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="'prose max-w-none ' . $classes"
  :styles="$styles"
>
  @if ($product)
    {!! visual_clear_inline_styles($product->description) !!}
  @else
    @visual_design_mode
    <h3>Product Description</h3>
    <p class="text-muted">This is where the full product description will appear. It includes detailed information about the product's features, specifications, materials, and usage
      instructions.</p>
    <ul class="text-muted">
      <li>Feature highlight 1</li>
      <li>Feature highlight 2</li>
      <li>Feature highlight 3</li>
    </ul>
    @end_visual_design_mode
  @endif
</x-basic-blocks::text-block>
