{{--
  A section or group's background image, drawn as an <img> behind its content so it
  gets the image's WebP copies and, with `priority`, loads before the rest of the page.
  It never takes clicks, even inside an overlay group that turns them on for its children.
--}}
@props(['image', 'fit' => 'object-cover', 'priority' => false])

<x-visual::image
  :image="$image"
  alt=""
  :priority="$priority"
  :sizes="$priority ? '100vw' : null"
  {{ $attributes->class(['pointer-events-none! absolute inset-0 h-full w-full', $fit]) }}
  style="object-position: {{ $image->objectPosition() }}"
/>
