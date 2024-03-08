<table class="usersTable">
    <tr>
        <th>id</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Email</th>
        <th>Номер телефона</th>
        <th>Дата создания</th>
        <th>Дата обновления</th>
        <th>Изменить</th>
        <th>Удалить</th>
        
    </tr>
    @foreach ($data as $item)
       <tr>
            <td>{{$item->id}}</td>
            <td><a href={{ route('userpage', ['id'=>$item->id]) }}>{{$item->name}}</a></td>
            <td>{{$item->lastname}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->created_at->format("d.m.Y H:m:s")}}</td>
            <td>{{$item->updated_at->format("d.m.Y H:m:s")}}</td>
            <td><a href={{route("users.edit",["user" => $item])}}>&#9997</a></td>
            <form action={{route("users.destroy",["user" => $item])}} method = "post">
                @csrf
                @method("DELETE")
                <td>
                    <button type="submit">Х</button>
                </td>
            </form>
            
       </tr>
    @endforeach
</table>
{{$data->links()}}