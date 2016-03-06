@extends('layouts.home')

@section('content')
    <div class="jumbotron">
    <div class="container">
        <h1>Call to Action!</h1>
    </div>
    </div>

    <div class="container">

    <div class="row">
        <div class="col-md-4">
        <h2>Our Mission</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque praesentium necessitatibus assumenda, ex quod. Fugiat culpa pariatur cupiditate, quam, voluptatibus nam veniam illo eius aspernatur repellendus quidem minus consectetur quasi!</p>
        </div>
        <div class="col-md-4">
        <h2>What is a Makerspace?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque praesentium necessitatibus assumenda, ex quod. Fugiat culpa pariatur cupiditate, quam, voluptatibus nam veniam illo eius aspernatur repellendus quidem minus consectetur quasi!</p>
        </div>
        <div class="col-md-4">
        <h2>Get Involved</h2>
        {{link_to('/register', 'Join', ['class' => 'btn btn-lg btn-primary btn-block'])}}
        {{link_to_route('donate.index', 'Donate', [], ['class' => 'btn btn-lg btn-success btn-block'])}}
        {{link_to_route('inventory.index', 'Inventory', [], ['class' => 'btn btn-lg btn-warning btn-block'])}}

        </div>
    </div>
    </div>

    <div class="divider"></div>

    <!-- /.container -->
    <div class="container news">
    <div class="row">
        <div class="col-md-12">
        <h2>Maker News</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <img src="https://foomatic.org/wp-content/uploads/2015/11/1454994_10101807623295291_1499713025_n-e1447569959935.jpg" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-8">
        <h2>Maker of the year!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates laudantium, nam laboriosam ipsa consequuntur esse repellendus, tempora inventore amet, eum dolorum distinctio aut beatae soluta alias iusto nobis perspiciatis. Hic!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <img src="https://foomatic.org/wp-content/uploads/2015/11/12243893_10103593744439405_563631143_n.jpg" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-8">
        <h2>Private eye is on the case for the missing tools!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates laudantium, nam laboriosam ipsa consequuntur esse repellendus, tempora inventore amet, eum dolorum distinctio aut beatae soluta alias iusto nobis perspiciatis. Hic!</p>
        </div>
    </div>
    </div>
@endsection