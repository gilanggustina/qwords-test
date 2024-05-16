
<style>
  
/*
  Common invoice styles. These styles will work in a browser or using the HTML
  to PDF anvil endpoint.
*/

body {
  font-size: 16px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table tr td {
  padding: 0;
}

table tr td:last-child {
  text-align: right;
}

.bold {
  font-weight: bold;
}

.right {
  text-align: right;
}

.large {
  font-size: 1.75em;
}

.total {
  font-weight: bold;
  color: #fb7578;
}

.logo-container {
  margin: 20px 0 70px 0;
}

.invoice-info-container {
  font-size: 0.875em;
}
.invoice-info-container td {
  padding: 4px 0;
}

.client-name {
  font-size: 1.5em;
  vertical-align: top;
}

.line-items-container {
  margin: 70px 0;
  font-size: 0.875em;
}

.line-items-container th {
  text-align: left;
  color: #999;
  border-bottom: 2px solid #ddd;
  padding: 10px 0 15px 0;
  font-size: 0.75em;
  text-transform: uppercase;
}

.line-items-container th:last-child {
  text-align: right;
}

.line-items-container td {
  padding: 15px 0;
}

.line-items-container tbody tr:first-child td {
  padding-top: 25px;
}

.line-items-container.has-bottom-border tbody tr:last-child td {
  padding-bottom: 25px;
  border-bottom: 2px solid #ddd;
}

.line-items-container.has-bottom-border {
  margin-bottom: 0;
}

.line-items-container th.heading-quantity {
  width: 50px;
}
.line-items-container th.heading-price {
  text-align: right;
  width: 100px;
}
.line-items-container th.heading-subtotal {
  width: 100px;
}

.payment-info {
  width: 38%;
  font-size: 0.75em;
  line-height: 1.5;
}

.footer {
  margin-top: 100px;
}

.footer-thanks {
  font-size: 1.125em;
}

.footer-thanks img {
  display: inline-block;
  position: relative;
  top: 1px;
  width: 16px;
  margin-right: 4px;
}

.footer-info {
  float: right;
  margin-top: 5px;
  font-size: 0.75em;
  color: #ccc;
}

.footer-info span {
  padding: 0 5px;
  color: black;
}

.footer-info span:last-child {
  padding-right: 0;
}

.page-container {
  display: none;
}

</style>
<div class="page-container">
  Page
  <span class="page"></span>
  of
  <span class="pages"></span>
</div>

<div class="logo-container">
  <img
    style="height: 18px"
    src="https://www.qwords.com/wp-content/themes/qwords/assets/images/icons/logo-qw-light.webp"
  >
</div>

<table class="invoice-info-container">
  <tr>
    <td rowspan="2" class="client-name">
      Client Name
    </td>
    <td>
      {{$invoice->user->name}}
    </td>
  </tr>
  <tr>
    <td>
      Invoice Date: <strong>{{$invoice->created_at}}</strong>
    </td>
  </tr>
  <tr>
    <td>
      Invoice No: <strong>#{{str_pad($invoice->id, 7, '0', STR_PAD_LEFT)}}</strong>
    </td>
    <td>
      {{$invoice->user->email}}
    </td>
  </tr>
</table>


<table class="line-items-container">
  <thead>
    <tr>
      <th class="heading-quantity">Qty</th>
      <th class="heading-description">Description</th>
      <th class="heading-price">Price</th>
      <th class="heading-subtotal">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Pembelian Domain {{$invoice->domain_name}}</td>
      <td class="right">Rp.{{number_format($invoice->total,2,",",".")}}</td>
      <td class="bold">Rp.{{number_format($invoice->total,2,",",".")}}</td>
    </tr>
  </tbody>
</table>


<table class="line-items-container has-bottom-border">
  <thead>
    <tr>
      <th>Payment Info</th>
      <th>Due By</th>
      <th>Total Due</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="payment-info">
        <div>
          Account No: <strong>{{$invoice->user->id}}</strong>
        </div>
      </td>
      <td class="large">May 30th, 2024</td>
      <td class="large total">Rp.{{number_format($invoice->total,2,",",".")}}</td>
    </tr>
  </tbody>
</table>

<div class="footer">
  <div class="footer-info">
    <span>qwords@gmail.com</span> |
    <span>02289178747874</span> |
    <span>qwords.com</span>
  </div>
  <div class="footer-thanks">
    <span>Thank you!</span>
  </div>
</div>
