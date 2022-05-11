<?php
$counter=1;
?>
@foreach ($carts as $index=>$cart)
<tr>
    <td>
        <div class="product-img">
            <div class="img-prdct"><img src="{{ asset('uploads/items') }}/{{ $cart->item->image ?? '' }}"></div>
        </div>
    </td>
    <td>
        <p>{{ $cart->item->name ?? '' }}</p>
    </td>
    <td>
        <input type="hidden" id="cart{{$counter}}" value="{{$cart->id}}">
        <div class="button-container" style="margin: auto;width:70%">
            <button class="cart-qty-plus" onclick="plusing({{$counter}})" type="button" value="+">+</button>
            <input id="qty{{$counter}}" type="text" name="qty" min="0" class="qty form-control" value="{{ $cart->quantity}}" />
            <button class="cart-qty-minus" onclick="minsing({{$counter}})" type="button" value="-">-</button>
        </div>
    </td>

      <td>  <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-danger"  onclick="del({{$counter}})" title="delete"><i class="fa-solid fa-trash"></i> Remove</button>
        </div>
    </td>
</tr>
<?php
$counter++;
?>
@endforeach


