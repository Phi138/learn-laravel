@extends('clients.layout')

@section('title', $title)

@section('content')
<section>
  <div class="container">
    <p class="text-center mb-30">Vui lòng gọi theo số <span class="font-bold">19003060</span> (miễn phí) để đặt đơn hàng nhanh chóng</p>
    <form action="{{route('success')}}" method="post">
        @csrf
        <div class="row">
            <div class="col w-60p">
                <h1 class="text-3xl">{{$title}}</h1>
                <p>{{$items[0]->ho_ten}}</p>
                <input type="text" name="dia_chi_giao_hang" value="{{$items[0]->dia_chi}}">
                <p>{{$items[0]->sdt}}</p>
                <div class="grid">
                    <label for="ghi_chu">Ghi chú:</label>
                    <textarea class="border-1 border-black max-w-[500px]" name="ghi_chu" id="ghi_chu"></textarea>
                </div>
                <h2 class="text-3xl">Phương thức giao hàng</h2>
                <p class="text-base">GIAO HÀNG TIẾT KIỆM</p>
                <div class="row text-xl mb-30">
                    <div class="col">Đồng Giá Vận Chuyển</div>
                    <div class="col">30.000 VND</div>
                </div>
                <h2 class="text-3xl">Phương thức thanh toán</h2>
                <div class="flex">
                    <input class="mr-10" type="radio" id="vnpay" name="pttt" value="VNPay" required>
                    <label class="w-full" for="vnpay">
                        <div class="row items-center text-h3">
                            <div class="col w-12p"><img src="/images/thanh-toan/vnpay.png" alt=""></div>
                            <div class="col w-88p"><p class="mb-0">CỔNG THANH TOÁN VNPAY</p></div>
                        </div>
                    </label>
                </div>
                <div class="flex">
                    <input class="mr-10" type="radio" id="bank" name="pttt" value="Chuyển khoản" required>
                    <label class="w-full" for="bank">
                        <div class="row items-center text-h3">
                            <div class="col w-12p"><img src="/images/thanh-toan/bank.png" alt=""></div>
                            <div class="col w-88p"><p class="mb-0">CHUYỂN KHOẢN</p></div>
                        </div>
                    </label>
                </div>
                <div class="flex mb-10">
                    <input class="mr-10" type="radio" id="ttgiaohang" name="pttt" value="Thanh toán khi nhận hàng" required>
                    <label class="w-full" for="ttgiaohang">
                        <div class="row items-center text-h3">
                            <div class="col w-12p"><img src="/images/thanh-toan/ttgiaohang.png" alt=""></div>
                            <div class="col w-88p"><p class="mb-0">THANH TOÁN KHI NHẬN HÀNG (COD)</p></div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col w-35p border-black px-15 py-16 h-fit border-1">
                <h2 class="text-3xl">GIỎ HÀNG</h2>
                {{-- <form class="form form-discount flex" id="discount-form">
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
                </form> --}}
                <p>Bạn có {{$tongSoLuong}} sản phẩm trong giỏ hàng</p>
                <div>
                    @foreach($items as $item)
                    <div class="row">
                        <div class="col w-22p">
                            <img src="{{$item->ds_hinh_anh}}" alt="">
                        </div>
                        <div class="col w-78p text-base">
                            <p class="font-semibold mb-1">{{$item->ten_sp}}</p>
                            <p class="mb-1">{{number_format($item->gia_km, 0, ',', '.')}} VND</p>
                            <p class="mb-1">Kích cỡ: {{$item->kich_thuoc}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex">
                    <p>{{$tongSoLuong}} sản phẩm</p>
                    <p class="ml-auto">{{number_format($tongTien, 0, ',', '.')}} VND</p>
                </div>
                <div class="flex">
                    <p>Vận chuyển</p>
                    <p class="ml-auto">30.000 VND</p>
                </div>
                <p>GIAO HÀNG TIẾT KIỆM</p>
                <div class="flex font-semibold justify-between">
                    <label for="tong_tien">Tổng đơn đặt hàng:</label>
                    <input type="text" id="tong_tien" name="tong_tien" value="{{number_format($tongTien + 30000, 0, ',', '.')}} VND">
                </div>
                <p class="float-right">Đã bao gồm thuế VAT</p>
            </div>
        </div>
        <button class="btn btn-primary text-base" type="submit">TIẾP TỤC</button>
    </form>
  </div>
</section>
@endsection