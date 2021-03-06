<tr>
    <td>{{ link_to_route('inventory.show', $asset->name, ['asset' => $asset->tag]) }}</td>
    <td>{{ $asset->make }}</td>
    <td>{{ $asset->model }}</td>
    <td>${{ money_format('%i', $asset->cost / 100) }}</td>
    <td>{{ $asset->description }}</td>
    <td>
        @if(Auth::check())
        {{ link_to_route('inventory.edit', 'edit', ['asset' => $asset->tag], ['class' => 'btn btn-small btn-primary'])}}
        @endif
    </td>
</tr>