<select placeholder="Model" id="model" name="model" class="select">
    <option value="">all</option>
    @foreach($brand->carModels as $item)
        <option @if(request('model') == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>