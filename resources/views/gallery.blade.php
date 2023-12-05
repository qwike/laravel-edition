@extends('layout.app')

@section('title', 'Галерея')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/page_header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/section.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/gallery.css') }}">
@endsection

@section('content')
    <div class="page_header" id="page_header_gallery">
        <div class="container">
            <div class="page_header_title">@lang('pages.gallery.header.title')</div>
            <div class="page_header_text">@lang('pages.gallery.header.description')</div>
            <div class="page_header_buttons">
                <a href="#gallery_catalog" class="page_header_button">@lang('pages.gallery.header.button')</a>
            </div>
        </div>
    </div>
    <section id="gallery_catalog">
        <div class="container">
            <div class="catalog">
                @if($gallery->isEmpty())
                    <div>@lang('pages.gallery.empty')</div>
                @else
                    @foreach($gallery as $image)
                        <div class="img_box">
                            <img src="{{ $image->getGalleryImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Изображение{{ $image->id }}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div id="modal" class="modal">
            <img src="" alt="Изображение" class="modal_content" id="modalImg">
        </div>
    </section>
    <script>
        $(document).ready(() => {
            $('.gallery_button').addClass('active_header_button');

            $('.catalog img').each(function () {
                const ratio = this.naturalWidth / this.naturalHeight;

                if (ratio <= 0.75) $(this).parent().addClass('tall');
                else if (ratio >= 1.7) $(this).parent().addClass('wide');
                else if (this.naturalWidth >= 1200) $(this).parent().addClass('big');
            });

            const modal = $('#modal');

            const modalImg = $('#modalImg');

            $('.img_box img').click(function() {
                modal.css('display', 'block');
                modalImg.attr('src', this.src)
                modalImg.attr('alt', this.alt)
            });

            modal.click(function() {
                modalImg.addClass('out');
                setTimeout(function() {
                    modal.css('display', 'none');
                    modalImg.removeClass('out');
                }, 400);
            });

            new WOW().init();
        });
    </script>
@endsection
