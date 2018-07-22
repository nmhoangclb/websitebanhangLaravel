@extends('layout.index')
@section('content')
<div class="col-lg-10" style="padding-top: 15px;">
                <form action="{{ route('checkout') }}" method="POST" onsubmit="setOrder();">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name" >Tên</label>
                        <input type="text" class="form-control" id="name" name="name" checked>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address" >Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" checked>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber" >Số điện thoại</label>
                        <input type="number" class="form-control" id="phonenumber" name="phonenumber" checked>
                    </div>
                    <div class="form-group">
                        <label for="address">Ghi chú</label>
                        <input type="text" class="form-control" id="note" name="note">
                    </div>
                    <div class="form-group" style="display: none;">
                        <input type="text" class="form-control" id="order" name="order">
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </form>
            </div> <!-- end right column -->
@endsection