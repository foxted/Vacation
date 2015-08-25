<span class="label
    @if($status == 'pending') label-warning
    @elseif($status == 'approved') label-success
    @else label-danger
    @endif
">
    {{ ucwords($status) }}
</span>