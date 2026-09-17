<x-basic-blocks::text-block
  :block="$block"
  :tag="$tag"
  :classes="$classes"
  :styles="$styles"
>
  @if ($hasDescription)
    {!! visual_clear_inline_styles($description) !!}
  @else
    @visual_design_mode
      <h3>Category Description</h3>
      <p class="text-muted">This is where the category description will appear. It usually introduces the category, explains what it contains, and helps visitors decide where to browse
        next.</p>
    @end_visual_design_mode
  @endif
</x-basic-blocks::text-block>
