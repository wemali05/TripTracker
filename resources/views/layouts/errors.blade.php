@if(count($errors))

    <div class="alert alert-danger" style="text-align:center;">

        <ul class="errors_holder" style="list-style:none;">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif