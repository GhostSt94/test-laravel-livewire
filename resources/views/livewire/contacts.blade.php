{{-- <div>
    <h1>Hello World {{$name}}</h1>
    <button class="btn btn-primary" wire:click="changeName">Changer nom</button>
    <button class="btn btn-danger" wire:click="refreshName">x</button>
</div> --}}
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 mx-auto pt-5">
            <div class="m-2">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="my-3"><input wire:model='name' type="text" autocomplete="off" placeholder="Name" name="name" class="form-control">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror</div>
            <div class="my-3"><input wire:model='tel' type="text" placeholder="Phone" name="tel" class="form-control">@error('tel') <span class="error text-danger">{{ $message }}</span> @enderror</div>
            <div class="my-3"><input wire:model='ville' type="text" placeholder="Ville" name="ville" class="form-control">@error('ville') <span class="error text-danger">{{ $message }}</span> @enderror</div>
            <div class="my-3"><input type="file" wire:model="photo" class="form-control">@error('photo') <span class="error">{{ $message }}</span> @enderror
                <div wire:loading wire:target="photo" class="m-5">Uploading...</div>
                @if ($photo)
                    {{-- Photo Preview: --}}
                    <img src="{{ $photo->temporaryUrl() }}" class="w-75 h-75 m-2">
                @endif
            </div>
            @if (!$editing)
                <button class="btn btn-primary m-3" wire:click="addContact">Submit</button>
            @else
                <button class="btn btn-warning m-3" wire:click="updateContact">Update</button>
            @endif
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead><th></th><th>Name</th><th>Tel</th><th>Ville</th><th></th></thead>
                <tbody>
                    @foreach ($contactsList as $c)
                        <tr><td>@if ($c['photo']!==null)
                            <img src="storage/photos/{{$c['photo']}}" width="100">
                        @endif</td><td>{{$c['name']}}</td><td>{{$c['tel']}}</td><td>{{$c['ville']}}</td><td><button class="btn btn-warning" wire:click="getContact({{$c['id']}})"><i class="fas fa-edit m-1"></i></button><button class="btn btn-danger m-1" wire:click="deleteContact({{$c['id']}})"><i class="fas fa-trash"></i></button></td></tr>
                    @endforeach
                </tbody>
            </table>
            <div class="justify-content-center m-2">{{ $contactsList->links() }}</div>
        </div>
    </div>
</div>
