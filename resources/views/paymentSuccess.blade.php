<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful - Thank You!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F4F4F4
;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }        h1 {
            color: #4CAF50
;
            font-size: 36px;
        }        p {
            color: #666;
            font-size: 18px;
        }        .confirmation-icon {
            font-size: 100px;
            color: #4CAF50
;
            margin: 20px 0;
        }        .order-details {
            margin-top: 20px;
        }        .order-details p {
            font-weight: bold;
        }        .back-to-home {
            margin-top: 30px;
        }        .back-to-home a {
            text-decoration: none;
            background-color: #4CAF50
;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }        .back-to-home a:hover {
            background-color: #45A049
;
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="fa fa-check-circle confirmation-icon"></i>
        <h1>Payment Successful</h1>
        <p>Thank you for your purchase!</p>
        <div class="order-details">
          
            <p>Order Number: #000 {{$order_data->id}}
</p>
             <p>Quantity:  {{$total_qty}}</p>
            <p>Total Amount: ${{$order_data->total}}</p>
        </div>
        <div class="back-to-home">
            <a href="/">Back to Home</a>
        </div>
    </div>
</body>
</html>