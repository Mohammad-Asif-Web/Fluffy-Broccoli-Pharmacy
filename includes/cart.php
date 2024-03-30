<div class="place-order bg-white">
  <div class="container py-3 px-3">
    <!-- cart form -->
  <form action="action/manage-cart.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <!-- cart header -->
    <div class="row text-dark d-flex justify-content-between align-items-center">
      <div class="col-4 align-items-center">
        <!-- <h4 class="mb-0 font-weight-bold">Cart</h4> -->
        <p class="mt-2" id="back-1"><i class="fas fa-chevron-left"></i>Back</p>
        <p class="mt-2" id="back-2"><i class="fas fa-chevron-left"></i>Back</p>
      </div>
      <div class="col-4 mr-2  d-flex align-items-center trash">
        <p class="mr-4 mb-0"><i class="fas fa-archive mr-1"></i>Clear All</p>
        <span id="closeCart"> <i class="fas fa-times"></i> </span>
      </div>
    </div>
    <h4 class="mb-0 font-weight-bold">Cart</h4>
    <!-- cart menu -->
    <div class="card w-100 mt-3">
      <div class="card-body py-1">
        <div class="row text-dark place-menu">
          <div class="col-3 d-flex flex-column justify-content-center">
            <i class="fas fa-map-marked-alt map"></i>
            <span class="">Home</span>
          </div>
          <div class="col-5 d-flex flex-column justify-content-center">
            <h6 class="mb-0 font-weight-bold">Name</h6>
            <p class="mb-0">+880123 456 7890</p>
            <p class="mb-0">Location</p>
          </div>
          <div class="col-4 d-flex align-items-center">
            <select name="" id="">
              <option value="" selected disabled>Change</option>
              <option value="">Dhaka</option>
              <option value="">Chittagong</option>
              <option value="">Sylhet</option>
              <option value="">Khulna</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- cart-checkout -->
    <div class="cart-checkout" id="cart-checkout">
      <ul class="row order-item mb-5 p-1" id="buyItems">
        <h4 class="empty">Your shopping cart is empty</h4>
          
          <!-- <div class="col-3 item-img">
            <img src="dist/img/napa.png" alt="">
          </div>
          <div class="col-5 item-text">
            <h6 class="font-weight-bold">Napa 600</h6>
            <p class="text-muted mb-0">3 each X 2</p>
            <div class="count">
              <button onclick="increment()">+</button>  
              <span id="counting">0</span>
              <button onclick="decrement()">-</button> 
            </div>
          </div>
          <div class="col-4 item-cost text-right">
            <p class="mb-0 font-weight-bold">$ 20.60</p>
            <p class="text-muted"><del>$ 00.00</del></p>
          </div> -->

      </ul>
        <!-- total amount -->
      <div class="row amount px-2">
        <!-- Add Coupon -->
        <div class="row my-4 add-coupon px-2">
          <label for="coupon" class="">Have a Coupon? Apply here</label><i class="fas fa-level-down-alt"></i>
          <div class="coupon w-100 d-flex justify-content-between">
            <input type="text" id="discount-input" class="w-75">
            <p id="coupon-apply" class=" py-2 mb-0 btn btn-sm bg-blue2 w-25 text-white font-weight-bold">Apply</p>
          </div>
        </div>
        <!-- Coupon End -->
        <div class="col-6">
          <p>Subtotal</p>
          <p>Discount applied</p>
          <p>Delivery Charge</p>
          <p><small>Amount Payable</small></p>
        </div>
        <div class="col-6 text-right">
          <p class="sum-prices text-blue2 font-weight-bold"></p>
          <p>৳ <small class="discount">00.00</small></p>
          <p>৳ <small class="d-charge">50.00</small></p>
          <p>৳ <small class="pay-amount">100.00</small></p>
        </div>
        <hr class="w-100">
        <div class="row w-100 px-2">
          <div class="col-6">
            <p>Grand Total</p>
          </div>
          <div class="col-6 text-right">
            <p class="mr-n3 total text-blue2 font-weight-bold">$ 000.0</p>
          </div>
        </div>
      </div>
      <!-- total amount end -->
      <p class="text-uppercase btn text-center py-2 rounded bg-blue2 w-100 text-white mt-4 font-weight-bold checkout hidden" id="checkout">proceed to checkout</p>
    </div>
      <!-- cart-checkout End -->

      <!-- cart place order -->
    <div class="cart-place-order" id="cart-place-order">
          <!-- cart text -->
      <div class="card w-100 ">
        <div class="card-body p-1">
          <div class="row text">
            <div class="col-12">
              <textarea class="w-100" name="" id="" rows="4" placeholder="Write here any additional info"></textarea>
            </div>
          </div>
        </div>
      </div>
        <!-- payment option -->
      <div class="card w-100 payment">
        <div class="card-body px-2 p-2">
          <h5 class="font-weight-bold">Payment Option</h5>
          <div class="row  pb-1 mt-3">
            <div class="col-12 cash d-flex align-items-center">
                <input type="radio">
                <span class="ml-2">Cash on delivery</span>
                <input type="hidden" name="cash" value="cash on delivery">
            </div>
            <div class="col-12 pay mt-2 d-flex align-items-center">
              <input type="radio">
              <img class="ml-2" src="dist/img/credit/payment.png" alt="card option">
            </div>
          </div>
        </div>
      </div>
        <!-- terms and policy -->
      <div class="row terms-item mb-5">
        <p class="mb-0">*<span>Estimated Delivery Time for Dhaka 12-48 Hours</span></p>
        <p class="">*<span>Estimated Delivery Time for Outside Dhaka 1-5 Days</span></p>
        <div class="terms d-flex align-items-center">
          <input type="checkbox" name="agree" id="agree">
          <label for="agree">I agree to <small>Terms & Conditions Privacy</small> & <small>Refund Return Policy</small></label>
        </div>
      </div>
      <hr>
        <!-- total amount -->
      <div class="row amount px-2">
        <div class="col-6">
          <p>Subtotal</p>
          <p>Discount applied</p>
          <p>Delivery Charge</p>
          <p><small>Amount Payable</small></p>
        </div>
        <div class="col-6 text-right">
          <p class="sum-prices text-blue2 font-weight-bold"></p>
          <p>৳ <small class="discount">00.00</small></p>
          <p>৳ <small class="d-charge">50.00</small></p>
          <p>৳ <small class="pay-amount">100.00</small></p>
        </div>
      </div>
      <hr>
      <div class="row amount px-2">
        <div class="col-6">
          <p>Grand Total</p>
        </div>
        <div class="col-6 text-right">
          <p class="total text-blue2 font-weight-bold">$ 000.0</p>
        </div>
      </div>
      <!--total amount End-->
      <p class="text-uppercase text-center btn py-2 rounded bg-blue2 w-100 text-white mt-4 font-weight-bold" id="cart-place-order-btn">place order</p>
    </div> <!-- cart place order End -->

    <!-- delivery Address -->
    <div class="customer" id="customer-div">
      <div class="card w-100 ">
        <div class="card-body">
          <div class="row">
            <h4 class="mb-4 font-weight-bold">Add Shipping Address</h4>
              <!-- customer name -->
            <div class="form-group w-100 ">
              <label for="customer_name" class="text-muted">First name *</label>
              <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Enter your first and last name*">
            </div>
              <!-- customer phone -->
            <div class="form-group w-100">
              <label for="customer_phone" class="text-muted">Phone *</label>
              <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Please enter your phone number*">
            </div>
              <!-- customer city -->
            <div class="form-group w-100">
              <label for="customer_city" class="text-muted"> City *</label>
              <select name="customer_city" id="customer_city" class="form-control text-muted">
                <option selected disabled>Please choose your city</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Sylhet">Sylhet</option>
              </select>
            </div>
              <!-- customer area -->
            <div class="form-group w-100">
              <label for="customer_area" class="text-muted">Area *</label>
              <select name="customer_area" id="customer_area" class="form-control text-muted">
                <option selected disabled>Please choose your city</option>
                <option value="Sutrapur">Sutrapur</option>
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="gulshan">Gulshan</option>
              </select>
            </div>
              <!-- customer_address -->
            <div class="form-group w-100">
              <label for="customer_addr" class="text-muted">Address *</label>
              <input type="text" id="customer_addr" name="customer_addr" class="form-control" placeholder="For Example: House#123, Street#123, ABC Road*">
            </div>
              <!-- label -->
            <div class="form-group w-100">
              <label for="label" class="text-muted">Select a label for effective delivery:</label>
              <select name="label" id="label" class="form-control text-muted">
                <option selected disabled>Please choose your effective delivery</option>
                <option value="Home">Home</option>
                <option value="Office">Office</option>
                <option value="Home Town">Home Town</option>
              </select>
            </div>

            <input type="hidden" id="all-products-array" name="all-products-array">
            <input type="hidden" id="total-product-prices" name="total-product-prices">

            <!-- notes -->
            <div class="form-group w-100">
              <label for="notes" class="text-muted">Order notes (optional)</label>
              <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
            </div>
            <button type="submit" name="buy-product" class="text-uppercase btn bg-blue2 text-white w-100 " id="customer-btn">confirm</button>
          </div>    
        </div>
      </div>
    </div> <!--Delivery Address End-->
  </form>
  </div> <!--container End  -->
</div>

