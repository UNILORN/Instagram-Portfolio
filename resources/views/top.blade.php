@extends('temp/temp')

@section('css','top')
@section('js','top')
@section('title','UNILORN')


@section('content')
    <main>
        <div class="container">
            <div class="main">
                <div class="mainContents">
                    <div class="mainContentsTitle">
                        <h1>Images - Kanimiso</h1>
                    </div>
                    {{ $images->links() }}
                    <div class="instView">
                        <ul>
                            @foreach($images as $image)
                                <li style="background-image: url('{{$image->url}}')"><a href="#"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mainSlider">
                    <div class="sliderContents">
                        <div class="profile">
                            <h2> Profile </h2>
                            <div class="profileImage">
                                <img src="/img/profile.png" width="200px" alt="">
                            </div>
                            <h2 class="profileName">UNILORN</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
