
<div>
    <select  class="js-example-basic-single">
        
        @foreach ($users as $user)
            <option value="{{ $user['id'] }}">{{ $user['nombre'] }}</option>
        @endforeach
    </select>
</div>
