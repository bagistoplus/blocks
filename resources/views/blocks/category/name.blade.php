@php
  $category = $block->settings->category ?? ($category ?? null);
@endphp

<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="$classes"
  :styles="$styles"
>
  @if ($category)
    {{ $category->name }}
  @else
    <span class="text-muted">Category Name</span>
  @endif
</x-basic-blocks::text-block>
