@extends('temp/temp')

@section('css','top')
@section('js','top')
@section('title','UNILORN')


@section('content')
    <main>
        <div class="container">
            <div class="contents">
                <div class="main">

                    <div class="mainContents">
                        <div class="mainContentsTitle">
                            <h1>Welcome</h1>
                        </div>
                        <p><center>ここは○○のページです</center></p>
                    </div>

                    <div class="mainContents">
                        <div class="mainContentsTitle">
                            <h1>News</h1>
                        </div>
                        <table class="newsView">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                    <tr>
                                        <td>{{date("Y年 m月 d日　- H:m",strtotime($new->created))}}</td>
                                        <td>画像を追加しました　： <a href="{{$new->link}}">Instagram</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mainContents">
                        <div class="mainContentsTitle">
                            <h1>Images</h1>
                        </div>
                        {{ $images->links() }}
                        <div class="instView">
                            <ul>
                                @foreach($images as $image)
                                    <li style="background-image: url('{{$image->url}}')"><a href="{{$image->link}}"></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="slider">
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
