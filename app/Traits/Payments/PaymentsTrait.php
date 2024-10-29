<?php
namespace App\Traits\Payments;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

trait PaymentsTrait
{

  // ?! my fatoorah

  // ?todo return pay info and return redirect callback
  public function getPayLoadData(User $user, Product $product)
  {
    $callbackURL = route('myfatoorah.callback');

    return [
      'CustomerName' => $user->name,
      'InvoiceValue' => $product->price,
      'DisplayCurrencyIso' => 'SAR',
      'CustomerEmail' => $user->email,
      'CallBackUrl' => $callbackURL,
      'ErrorUrl' => $callbackURL,
      'MobileCountryCode' => '+965',
      'CustomerMobile' => '12345678',
      'Language' => 'en',
      'CustomerReference' => $product->name,
      'SourceInfo' => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package'
    ];
  }



  // ?todo saved process payments
  public function CreatePayments($data)
  {
    $payment = Payment::create([
      'payment_method' => $data->InvoiceTransactions[1]->PaymentGateway,
      'status' => $data->InvoiceStatus,
      'transaction_id' => $data->InvoiceTransactions[1]->TransactionId,
    ]);
    return $payment->id;
  }



  // ?todo saved process orders
  public function CreateOrders($user, $offer, $paymentsId)
  {
    Order::create([
      'order_num' => 1,
      'total_amount' => 1500,
      'user_id' => $user->id,
      'offer_id' => $offer->id,
      'payment_id' => $paymentsId,
      'price' => $offer->price,
    ]);
    return true;
  }



  // ?todo text message of payments
  public function getTestMessage($status, $error)
  {
    if ($status == 'Paid') {
      return 'Invoice is paid.';
    } else if ($status == 'Failed') {
      return 'Invoice is not paid due to ' . $error;
    } else if ($status == 'Expired') {
      return $error;
    }
  }


}