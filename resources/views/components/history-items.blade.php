<div class="col-sm-4 py-2 px-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">
                {{ $order->order_date }}
            </h4>
        </div>
        <a href = "{{ route('order.show', ['order' => $order->id]) }}" class="stretched-link"></a>
    </div>
</div>
