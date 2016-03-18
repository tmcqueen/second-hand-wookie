@extends('admin.layouts.master')


@section('content')
<div class="container">

    <div class="row" style="padding-top: 50px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Cost</th>
                    <th>In Inventory</th>
                    <th>Aquired On</th>
                    <th>Last Updated On</th>
                </tr>
            </thead>

            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <th>{{$asset->name}}</th>
                    <th>{{$asset->make}}</th>
                    <th>{{$asset->model}}</th>
                    <th>{{$asset->cost}}</th>
                    <th>
                        @if ($asset->in_inventory)
                        <i class="fa fa-check-circle text-success"></i>
                        @else
                        <i class="fa fa-times-circle text-danger"></i>
                        @endif
                        @if ($asset->trashed())
                        <i class="fa fa-trashed text-info"></i>
                        @endif
                    </th>
                    <th>{{$asset->created_at->format('Y-m-d')}}</th>
                    <th>{{$asset->updated_at->format('Y-m-d')}}</th>
                    <td>
                        @if ($asset->trashed())
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}?action=undelete"
                            data-toggle="tooltip" title="Undelete"
                            class="btn btn-sm btn-success">
                            <i class="fa fa-recycle"></i>
                        </a>
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}?action=force-delete"
                            data-toggle="tooltip" title="Delete"
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        @else
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}"
                            data-toggle="tooltip" title="Edit"
                            class="btn btn-sm btn-primary text-primary">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        @if ($asset->in_inventory)
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}?action=disable"
                            data-toggle="tooltip" title="Disable"
                            class="btn btn-sm btn-warning">
                            <i class="fa fa-ban"></i>
                        </a>
                        @else
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}?action=enable"
                            data-toggle="tooltip" title="Add to Inventory"
                            class="btn btn-sm btn-success">
                            <i class="fa fa-thumbs-up"></i>
                        </a>
                        @endif
                        <a href="http://localhost:8000/admin/inventory/{{$asset->tag}}?action=delete"
                            data-toggle="tooltip" title="Delete"
                            class="btn btn-sm btn-danger">
                            <i class="fa fa-recycle"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{$assets->links()}}
        </div>
    </div>

</div>
@endsection