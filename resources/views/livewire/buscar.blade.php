<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>
 
    <ul>
        @foreach($users as $user)
            <li>{{ $user->nombre }}</li>
        @endforeach
    </ul>
</div>