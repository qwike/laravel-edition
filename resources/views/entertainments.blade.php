@extends('layout.app')

@section('title', 'Развлечения')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/catalog.css') }}">
@endsection

@section('content')
    <div class="container mt">
        <div class="page_content">
            <h2>Развлечения</h2>
            <div class="information_block">В деревне Мувыр можно наслаждаться природой, прогуляться по лесу до висячего моста, прокатиться на лодке, рыбачить, организовать барбекю, устроить пикник в беседке или под открытым небом и многое другое</div>
            <div class="catalog">
                @if($entertainments->isEmpty())
                    <div>В данный момент нет развлечений :(</div>
                @else
                    @foreach($entertainments as $entertainment)
                        <div class="item wow animate__animated animate__fadeInUp">
                            <div class="item_img_container">
                                <img src="{{ $entertainment->getEntertainmentImage()?->getUrl() ?? \App\Helpers\MediaHelper::defaultImage() }}" alt="Фото развлечения">
                            </div>
                            <div class="item_name">{{ $entertainment->name }}</div>
                            <div class="item_desc">{{ $entertainment->description }}</div>
                            <div class="item_priсe">{{ $entertainment->price }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        $("#entertainments").addClass("active_header_btn")
    </script>
    <script>
        $(document).ready(() => {
            new WOW().init();
        })
    </script>
@endsection
