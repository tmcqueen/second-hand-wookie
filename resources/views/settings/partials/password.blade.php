<div class="panel-body">

    {{Form::open([
        'route' => ['me.update'],
        'files'=> false,
        'method' => 'patch'])}}

        <input type="hidden" name="update" value="password">

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="name" id="inputPassword" name="password">
        </div>

        <div class="form-group">
            <label for="inputPasswordConfirm">Password (again)</label>
            <input type="password" class="form-control" name="name" id="inputPasswordConfirm" name="password_confirmed">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>