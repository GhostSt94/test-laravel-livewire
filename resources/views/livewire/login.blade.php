<div class="col-md-6">
    <div class="col-md-6">
        <form wire:submit.prevent='login'>
            <h3>Login</h3>
            <hr>
            <div class="m-2">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('message_error'))
                    <div class="alert alert-danger">
                        {{ session('message_error') }}
                    </div>
                @endif
            </div>
            </div>
            <div class="my-3"><input wire:model='email' type="email" placeholder="Email" name="email" class="form-control">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror</div>
            <div class="my-3"><input wire:model='password' type="password" placeholder="Password" name="password" class="form-control">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror</div>
            <div class="mt-3 align-right">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
