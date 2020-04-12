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
                    <div class="control is-expanded has-icons-left">
                        <div class="select is-fullwidth @error('assignee_id') is-danger @enderror">
                            <select name="assignee_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
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
                        placeholder="Enter the Ticket"
                        rows="8"></textarea>
                    </div>
                    @error('ticket')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror  
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary" type="submit">Add Ticket</button>
                    </div>
                    <div class="control">
                        <a class="button is-light" href="/">Cancel</a>
                    </div>
                </div>
                
            </fieldset>
        </form>
    </div>

    

@endsection