@if(isset($articleHot))
    @foreach($articleHot as $aHot)
    <div class="article_hot_item">
        <div class="article_img">
            <a href="">
                <img src="{{asset(pare_url_file($aHot->a_avatar))}}">
            </a>
        </div>
        <div class="article_info">
            <h3 style="margin-top: 10px;margin-bottom: 10px">{{$aHot->a_name}}</h3>
            <p>{{$aHot->a_description}}</p>
        </div>
    </div>
    @endforeach
@endif
