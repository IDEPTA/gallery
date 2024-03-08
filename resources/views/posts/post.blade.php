<div  class="postCard">
    <a href={{route("moreinfo",["id" =>$item->id])}}>
            
            <img src={{ asset("storage/img/".$item->img)}} alt="картинка">
            <p>{{$item->title}} </p>
            <p>Дата: {{$item->date}} </p>
            <p>Автор: <br> {{$item->user->email}}</p>
    </a>
    @if ($item->user->id == Auth::id() || Auth::guard("admin")->user())
        <a class="deleteLink" href={{route("deletePost",["post_id" =>$item->id])}}>&#10006</a>
    @endif
</div>
