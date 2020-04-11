@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Ticket assigned to {{ $ticket->assignee->name }}
@endsection

@section ('page_heading')
    Ticket assigned to {{ $ticket->assignee->name }}
@endsection

@section ('content')   
    <div class="box">
        <form action = "/ticket/{{ $ticket->id }}/edit/" method="POST">
            <fieldset>
                @csrf

                <div class="field">
                    <label class="label">Assigned to</label>
                    <div class="select">
                        <select name="assignee_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"{{ $ticket->assignee->id === $user->id ? ' selected' : '' }}>
                                    {{ $user->name }}, {{ $user->email }}
                                </option>
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
                    <input class="input" type="text" name="ticket" value="{{ $ticket->ticket }}" autofocus>
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
                            <select name="status">
                                <option
                                value="{{$ticket->status}}"
                                selected hidden>{{$ticket->status}}</option>
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
                

                <button class="button is-primary" type="submit">Save Changes</button>

            </fieldset>
        </form>
    </div>

    <a class="button is-link is-light" href="/">Back</a>

@endsection