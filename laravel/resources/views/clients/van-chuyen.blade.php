@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    <p class="text-center mb-30">Vui lòng gọi theo số <span class="font-bold">19003060</span> (miễn phí) để đặt đơn hàng nhanh chóng</p>
    <div class="row">
        <div class="col w-60p">
            <h1 class="text-3xl">{{$title}}</h1>
            <p>Phi Tran</p>
            <p>40 Hòa Trung</p>
            <p>Tỉnh Khánh Hòa, Nha Trang</p>
            <p>Việt Nam</p>
            <p class="mb-30">389254720</p>
            <h2 class="text-3xl">Phương thức giao hàng</h2>
            <p class="text-base">GIAO HÀNG TIẾT KIỆM</p>
            <div class="row text-xl mb-30">
                <div class="col">Đồng Giá Vận Chuyển</div>
                <div class="col">30.000 VND</div>
            </div>
            <h2 class="text-3xl">Phương thức thanh toán</h2>
            <div class="flex">
                <input class="mr-10" type="radio" id="vnpay" name="options" value="vnpay">
                <label class="w-full" for="vnpay">
                    <div class="row items-center text-h3">
                        <div class="col w-12p"><img src="/images/thanh-toan/vnpay.png" alt=""></div>
                        <div class="col w-88p"><p class="mb-0">CỔNG THANH TOÁN VNPAY</p></div>
                    </div>
                </label>
            </div>
            <div class="flex">
                <input class="mr-10" type="radio" id="bank" name="options" value="bank">
                <label class="w-full" for="bank">
                    <div class="row items-center text-h3">
                        <div class="col w-12p"><img src="/images/thanh-toan/bank.png" alt=""></div>
                        <div class="col w-88p"><p class="mb-0">CHUYỂN KHOẢN</p></div>
                    </div>
                </label>
            </div>
            <div class="flex mb-10">
                <input class="mr-10" type="radio" id="ttgiaohang" name="options" value="ttgiaohang">
                <label class="w-full" for="ttgiaohang">
                    <div class="row items-center text-h3">
                        <div class="col w-12p"><img src="/images/thanh-toan/ttgiaohang.png" alt=""></div>
                        <div class="col w-88p"><p class="mb-0">THANH TOÁN KHI NHẬN HÀNG (COD)</p></div>
                    </div>
                </label>
            </div>
            <p>
                <a class="btn btn-primary text-base" href="#">TIẾP TỤC</a>
            </p>
        </div>
        <div class="col w-35p border-black px-15 py-16 h-fit border-1">
            <h2 class="text-3xl">GIỎ HÀNG</h2>
            <form class="form form-discount flex" id="discount-form">
                <div class="payment-option-inner">
                    <div class="field">
                        <div class="control">
                            <input class="input-text" type="text" id="discount-code" name="discount_code" data-validate="{'required-entry':true}" data-bind="value: couponCode, attr:{disabled:isApplied() , placeholder: $t('Enter discount code')} " placeholder="Nhập mã giảm giá">
                        </div>
                    </div>
                </div>
                <div class="actions-toolbar">
                    <div class="primary">
                        <button class="action action-apply" type="submit" data-bind="'value': $t('Apply Discount'), click: apply" value="Sử dụng mã giảm giá">
                            <span>Áp dụng</span>
                        </button>
                    </div>
                </div>
                <input name="captcha_form_id" type="hidden" data-bind="value: formId,  attr: {'data-scope': dataScope}" value="sales_rule_coupon_request" data-scope="">
            </form>
            <p>Bạn có 3 sản phẩm trong giỏ hàng</p>
            <div>
                <div class="row">
                    <div class="col w-22p">
                        <img src="/images/item/item-2.jpg" alt="">
                    </div>
                    <div class="col w-78p text-base">
                        <p class="font-semibold mb-1">QUẦN SUÔNG LOE VÂN HẠT ĐEN</p>
                        <p class="mb-1">1.038.400 VND</p>
                        <p class="mb-1">Kích cỡ: L</p>
                    </div>
                </div>
            </div>
            <div class="flex">
                <p>5 sản phẩm</p>
                <p class="ml-auto">7.752.000 VND</p>
            </div>
            <div class="flex">
                <p>Vận chuyển</p>
                <p class="ml-auto">30.000 VND</p>
            </div>
            <p>GIAO HÀNG TIẾT KIỆM</p>
            <div class="flex font-semibold">
                <p>Tổng đơn đặt hàng</p>
                <p class="ml-auto">7.782.000 VND</p>
            </div>
            <p class="float-right">Đã bao gồm thuế VAT</p>
        </div>
    </div>
    
  </div>
</section>
@endsection