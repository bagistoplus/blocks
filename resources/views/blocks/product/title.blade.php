<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="$classes"
  :styles="$styles"
>
  @if ($product)
    {{ $product->name }}
  @else
    <span class="text-muted">Product Title</span>
  @endif
</x-basic-blocks::text-block>
