@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Add a ticket
@endsection

@section ('content')
    <div class="box">
        <form action = "/add/" method="POST">
            <fieldset>
                @csrf

                <div class="field">
                    <label class="label">Assign to</label>
                    <div class="select">
                        <select name="assignee_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @error ('assignee_id')
                    <div class="notification is-warning">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                

                <div class="field">
                    <label class="label">Ticket</label>
                    <input class="input" type="text" name="ticket" placeholder="Enter the Ticket">
                </div>

                @error ('ticket')
                    <div class="notification is-warning">
                        <p>{{ $message }}</p>
                    </div>
                @enderror                


                <div class="field">
                    <label class="label">Status</label>
                    <div class="control">
                        <div class="select">
                            <select class="control" name="status">
                                <option value="new">new</option>
                                <option value="open">open</option>
                                <option value="closed">closed</option>
                            </select>
                        </div>
                    </div>
                </div>

                @error ('status')
                    <div class="notification is-warning">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                

                <button class="button is-primary" type="submit">Add Ticket</button>

            </fieldset>
        </form>
    </div>

    <a class="button is-link is-light" href="/">Back</a>

@endsection