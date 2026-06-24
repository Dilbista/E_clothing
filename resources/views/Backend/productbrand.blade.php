<!-- Inside your table body -->
<tbody>
    @if(isset($brands) && $brands->count() > 0)
        @foreach($brands as $brand)
        <tr>
            <td><div class="brand-logo-preview">{{ substr($brand->name, 0, 1) }}</div></td>
            <td><strong>{{ $brand->name }}</strong><br><small>{{ $brand->description }}</small></td>
            <td>{{ $brand->origin }}</td>
            <td>
                <!-- Actions -->
                <button class="btn-outline btn-sm" onclick="editBrand({{ json_encode($brand) }})">Edit</button>
            </td>
        </tr>
        @endforeach
    @else
        <tr><td colspan="4">No brands found in the database.</td></tr>
    @endif
</tbody>