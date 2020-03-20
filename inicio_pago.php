<?php

    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");

    $payment = new MercadoPago\Payment();

    $payment->transaction_amount = $_POST['price'];
    $payment->token = "APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398";
    $payment->description = $_POST['title'];
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
      "email" => "test_user_97555375@testuser.com​"
    );

    $payment->save();

    echo $payment->status;

  ?>