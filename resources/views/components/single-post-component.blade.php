{{-- @props(['title', 'sub_title']) --}}
<div>
    <!-- Post preview-->
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">{{ $title }}</h2>
            <h3 class="post-subtitle">{{ $sub_title }}</h3>
        </a>
       {{ $footer}}
    </div>
</div>