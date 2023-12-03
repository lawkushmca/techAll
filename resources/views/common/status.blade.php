<div id="id-flash-messages" class="flash-messages">
    @if(session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        </div>
    @endif
</div>