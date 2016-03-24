<div class="panel-body">

    {{Form::open([
        'route' => ['me.update'],
        'files'=> false,
        'method' => 'patch'])}}

        <div class="form-group">
            <labinputUsername>Name</label>
            <input type="text" class="form-control" name="name" id="inputUsername" placeholder="Input field" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="inputUsername">Make</label>
            <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Manufacturer" value="{{$user->username}}">
        </div>

        <div class="form-group">
            <label for="inputEmail">Model</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Model" value="{{$user->email}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        {{link_to(URL::previous(),'Cancel', ['class' => 'btn btn-warning'])}}
    </form>

</div>