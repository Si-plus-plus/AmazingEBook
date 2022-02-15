<div class="card w-100 mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <h4>
                    {{ $cart_item->e_book->title }}
                </h4>
                <h5 >
                    {{ $cart_item->e_book->author }}
                </h5>
            </div>
            <div class="col-2">
                <form method="post" action="{{ route('order.delete') }}" class="d-flex justify-content-end">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $cart_item->id }}">
                    <button type="submit" class="btn btn-danger m-2">
                        {{ __('messages.delete' )}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
