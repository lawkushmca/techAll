<div class="form-group row">
    <label for="name" class="col-md-3 col-form-label text-right pr-0">Name</label>
    <div class="col-md-9">
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter member's name" required value="{{ old('name', $member->name ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-md-3 col-form-label text-right pr-0">Email</label>
    <div class="col-md-9">
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter member's email" required value="{{ old('email', $member->user->email ?? '') }}">
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-3 col-form-label text-right pr-0">Password</label>
    <div class="col-md-9">
        @if($editMode)
            <input type="password" name="password" id="password" class="form-control" placeholder="Leave blank to keep the current password">
        @else
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter member's password" required>
        @endif
    </div>
</div>

<!-- Add more fields as needed -->
