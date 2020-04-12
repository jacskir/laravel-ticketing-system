@extends ('layouts.app')

@section ('page_title')
    Ticketing System | Ticket assigned to {{ $ticket->assignee->name }}
@endsection

@section ('content')   
    <div class="box">
        <form action = "/ticket/{{ $ticket->id }}/edit/" method="POST">
            <fieldset>
                @csrf

                <div class="field">
                    <label class="label">Assign to</label>
                    <div class="control is-expanded has-icons-left">
                        <div class="select is-fullwidth @error('assignee_id') is-danger @enderror">
                            <select name="assignee_id">
                                @foreach ($users as $user)
                                    <option
                                    value="{{ $user->id }}"{{ $ticket->assignee->id === $user->id ? ' selected' : '' }}>
                                        {{ $user->name }}, {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <ion-icon name="person"></ion-icon>
                        </div>
                    </div>
                    @error('assignee_id')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Ticket</label>
                    <div class="control">
                        <textarea class="textarea @error('ticket') is-danger @enderror"
                        name="ticket"
                        rows="8">{{ $ticket->ticket }}</textarea>
                    </div>
                    @error('ticket')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Assignee notes</label>
                    <div class="control">
                        <textarea class="textarea @error('assignee_notes') is-danger @enderror"
                        name="assignee notes"
                        rows="8">{{ $ticket->assignee_notes }}</textarea>
                    </div>
                    @error('assignee_notes')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Status</label>
                    <div class="control has-icons-left">
                        <div class="select @error('status') is-danger @enderror">
                            <select name="status">
                                <option value="new"{{ $ticket->status === 'new' ? ' selected' : '' }}>
                                    new
                                </option>
                                <option value="open"{{ $ticket->status === 'open' ? ' selected' : '' }}>
                                    open
                                </option>
                                <option value="closed"{{ $ticket->status === 'closed' ? ' selected' : '' }}>
                                    closed
                                </option>
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <ion-icon name="list"></ion-icon>
                        </div>
                    </div>
                    @error('status')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary" type="submit">Save Changes</button>
                    </div>
                    <div class="control">
                        <a class="button is-light" href="/">Cancel</a>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
@endsection