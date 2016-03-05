@extends('layouts.donation')

@section('content')

<div class="container" style="padding-top: 50px">
    <form action="/donate" class="form" method="POST">

        {{ csrf_field() }}

        <div class="row">
            <div class="form-group">
                <label for="instructions">Special Instructions</label>

                <textarea name="instructions" id="instructions" class="form-control" rows="4" required="required"></textarea>

            </div>
        </div>

        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th></th>
                </tr>
                <tr v-for="item in items">
                    <input type="hidden" name="items[]" value="@{{item.description}}">
                    <input type="hidden" name="costs[]" value="@{{item.cost}}">
                    <td>@{{$index + 1}}</td>
                    <td>@{{item.description}}</td>
                    <td>@{{item.cost}}</td>
                    <td><a class="btn btn-sm btn-danger" v-on:click="removeItem(item)">remove</a></td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label class="sr-only" for="item1">Item 1</label>
                    <input type="text" class="form-control" v-model="newItem.description"
                        id="item1" placeholder="Item Description">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" v-model="newItem.cost"
                            id="cost1" placeholder="Approx Cost">
                        <div class="input-group-addon">.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a  class="btn btn-sm btn-primary" v-on:click="addItem">Add Another</a>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Submit">

    </form>

    <!--<pre>@{{ items | json }}</pre>-->
</div>

@endsection

@push('scripts-after')

<script>

    new Vue({
       el: "body",

       data: {
           items: [],
           newItem: ''
       },

       methods: {
           addItem: function(e) {
               if (! this.newItem.description ) return;

               this.items.push({
                   description: this.newItem.description,
                   cost: this.newItem.cost
               });

               this.newItem = {}
           },

           removeItem: function(item) {
               this.newItem = item;
               this.items.$remove(item);
           }
       },


    });

</script>

@endpush