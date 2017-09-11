<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory Invoice</title>
</head>

<body>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0" class="invoice_header">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            {{ Html::image('image/logo/InventoryLogo.png', '') }}
                            {{--<img src="logo.png" style="width:100%; max-width:200px;">--}}
                        </td>
						<td>
							<span class="invoice_head">
                            	<p>New Baneshwor, Kathmandu</p>
                            	<p>01-4105106 , 9801101115</p>
                            	<p>info@dokaan.com.np</p>
							</span>
                        </td>
                        
                    </tr>
                </table>
            </td>
        </tr>
		<tr class="sep"></tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
						<td class="customer_detail">
                            <h2 class="customer_name">
                                {{$order->fullname}} <br>
                                Phone no. : {{$order->phone_number}}
                            </h2>
                            <h2>{{$order->address}}</h2>
						</td>
                        <td>
                            <h2 class="invoice_title">Invoice</h2>
                            <p>
                                <?php
                                $date = $order->created_at;
                                $orderDate =  date('Y-m-d', strtotime($date))
                                ?>

                                {{ date('jS F Y',strtotime( $orderDate)) }}
                            </p>

                            <p>
                                Invoice: #{{ $order->invoice_id }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="product_section">
            <td>
                <!-- table main -->
                <table class="invoice_body">
                        <thead>
                        <tr>
                            <th scope="col" width="8%">#</th>
                            <th scope="col" width="39%">Item Description</th>
                            <th scope="col" width="8%">Quantity</th>
                            <th scope="col" width="25%">Unit Price (Rs.)</th>
                            <th scope="col" width="20%">Total(Rs.)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        $i = 1;
                        ?>
                        @foreach($orderItems as $item)
                            <?php
                            $total = $total + $item->price * $item->quantity;
                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <?php
                                    $product = \App\Models\Product::where('id',$item->product_id)->first();
                                    
                                    ?>
                                    {{ $product->item_name }}
                                    <br>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ number_format($item->quantity * $item->price) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4">Subtotal</td>
                            <td>Rs. {{ number_format($total) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Total</td>
                              <td>Rs. {{ number_format($total) }}</td>
                        </tr>
                        </tfoot>
                    
                </table>
                <!-- table main end -->
            </td>
        </tr>

        <tr class="customer_section">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="pull-right signature-line">
                            <hr >
                            <p>Signature</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>
</body>
</html>
<section id="printable">
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Inventory Invoice</title>

        <style>
            p {
                font-size: 16px;
            }

            h1, h2, h3, p {
                margin: 0;
                color: #000;
            }
            .title img{width:100%;max-width:200px;}
            .invoice_date{font-size:14px;}
            .invoice-box {
                max-width: 960px;
                margin: auto;
                /*padding:30px;*/
                font-size: 14px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #000;
            }

            .invoice-box table {
                width: 97%;
                line-height: inherit;
                text-align: left;
                margin: 0 auto;
            }

            .invoice-box table td {
                padding: 0;
                vertical-align: top;
            }

            .invoice_title {
                bottom: 0;
                font-size: 34px;
                text-transform: uppercase;
                color: #000;
            }

            .customer_detail h2, .customer_detail p {
                font-size: 18px;
                font-weight: bold;
                line-height: normal;
            }

            .table_sep {
                margin-bottom: 70px;
                border-bottom: 2px solid #cccccc;
                padding-bottom: 10px;
            }
			tr.sep {
			    display: block;
			    margin: 30px 0;
			}
            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 10px;
            }
			.invoice_head {
			    margin-top: 20px;
			    display: block;
			}
            .invoice-box table tr.top table td.title {
                font-size: 35px;
			    line-height: 45px;
			    color: #333;
			    font-size: 35px;
			    line-height: 45px;
			    color: #333;
			    display: block;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 30px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            table.invoice_body {
                border-collapse: separate;
                border-spacing: 0;
                border: 2px solid #cccccc;
            }

            table.invoice_body td {
                vertical-align: middle !important;
            }

            table.invoice_body tr td:nth-child(2) {
                text-align: left !important;
            }

            table.invoice_body th {
                font-size: 14px;
            }

            table.invoice_body th + th, table.invoice_body tr td + td {
                padding: 6px 15px;
                border-left: 2px solid #ccc;
                border-right: 0;
                color: #000;
            }

            table.invoice_body th,
            table.invoice_body tr td {
                padding: 6px 15px;
            }

            table.invoice_body thead {
                background: #f7f7f7;
                color: #000;
            }

            table.invoice_body th {
                font-weight: bold;
                border-bottom: 2px solid #ccc;

            }

            table.invoice_body tbody tr:nth-child(even), table.invoice_body tfoot tr {
                background: #f7f7f7;
            }

            table.invoice_body tfoot tr td {
                border-top: 2px solid #cccccc;
                font-size: 14px;
                font-weight: bold;
                color: #000;
            }

            table.invoice_body tfoot tr td + td {
                border-left: 2px solid #cccccc;
            }
            .icheckbox_flat-green, .iradio_flat-green {
                display: inline-block;
                vertical-align: middle;
                margin: 0;
                padding: 0;
                width: 20px;
                height: 20px;
                background: green;
                border: none;
                cursor: pointer;
            }

            td.pull-right.signature-line {
                width: 135px;
                text-align: center;
            }
            td.pull-right.signature-line hr {
                border-color: #ccc;

            }
            td.nearby-location {
                width: 57%;
                margin-top: 15px;
                padding: 15px 15px !important;
                background-color: #f7f7f7;
                display: inline-block;
            }
            td.signature-line {
                width:43%;
                float:right;
                margin-top: 60px;
            }
            .signature-line p{
                text-align:center !important;
            }
            td.nearby-location p {
                display: -webkit-inline-box;
                font-size: 14px;
            }
            td.nearby-location h4 {
                font-size: 15px;
                font-weight: bold;
                color: #000;
                margin-top:0px;
                margin-bottom: 5px;
            }
            .time-range h4 {
                display: inline;
            }
            .time-range{
                margin-top: 12px;
            }
        </style>
    </head>

    <body>
    <div class="invoice-box">
    <table cellpadding="0" cellspacing="0" class="invoice_header">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            {{ Html::image('image/logo/InventoryLogo.png', '') }}
                            {{--<img src="logo.png" style="width:100%; max-width:200px;">--}}
                        </td>
						<td>
							<span class="invoice_head">
                            	<p>New Baneshwor, Kathmandu</p>
                            	<p>01-4105106 , 9801101115</p>
                            	<p>info@dokaan.com.np</p>
							</span>
                        </td>
                        
                    </tr>
                </table>
            </td>
        </tr>
		<tr class="sep"></tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
						<td class="customer_detail">
                            <h2 class="customer_name">
                                {{$order->fullname}} <br>
                                Phone no. : {{$order->phone_number}}
                            </h2>
                            <h2>{{$order->address}}</h2>
						</td>
                        <td>
                            <h2 class="invoice_title">Invoice</h2>
                            <p>
                                <?php
                                $date = $order->created_at;
                                $orderDate =  date('Y-m-d', strtotime($date))
                                ?>

                                {{ date('jS F Y',strtotime( $orderDate)) }}
                            </p>

                            <p>
                                Invoice: #{{ $order->invoice_id }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="product_section">
            <td>
                <!-- table main -->
                <table class="invoice_body">
                        <thead>
                        <tr>
                            <th scope="col" width="8%">#</th>
                            <th scope="col" width="39%">Item Description</th>
                            <th scope="col" width="8%">Quantity</th>
                            <th scope="col" width="25%">Unit Price (Rs.)</th>
                            <th scope="col" width="20%">Total(Rs.)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        $i = 1;
                        ?>
                        @foreach($orderItems as $item)
                            <?php
                            $total = $total + $item->price * $item->quantity;
                            ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <?php
                                    $product = \App\Models\Product::where('id',$item->product_id)->first();
                                    
                                    ?>
                                    {{ $product->item_name }}
                                    <br>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ number_format($item->quantity * $item->price) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4">Subtotal</td>
                            <td>Rs. {{ number_format($total) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Total</td>
                              <td>Rs. {{ number_format($total) }}</td>
                        </tr>
                        </tfoot>
                    
                </table>
                <!-- table main end -->
            </td>
        </tr>

        <tr class="customer_section">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="pull-right signature-line">
                            <hr >
                            <p>Signature</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>
    </body>
    </html>
</section>


<script type="text/javascript">
    $('#printable').hide();
    var order_detail = $('#printable').html();
    $('#pdf-data').val(order_detail);
    function PrintElem(element) {
        Popup($(element).html());
    }
    function Popup(data) {
        var mywindow = window.open('', 'printTable', 'height=800,width=800');
        mywindow.document.write('<html><head><title>Order sheet</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        return true;
    }
</script>
