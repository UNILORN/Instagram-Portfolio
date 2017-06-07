@extends('temp/temp')

@section('css','top')
@section('js','top')
@section('title','Instagram')


@section('content')
    <main>
        <div class="container">
            <div class="main">
                <div class="mainContents">
                    <div class="mainContentsTitle">
                        <h1>〜〜の写真集</h1>
                    </div>
                    <div class="instView">
                        <ul>
                            @foreach($images as $image)
                                <li style="background-image: url('{{$image->url}}')"><a href="#"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mainSlider"></div>
            </div>
        </div>
    </main>
@endsection
