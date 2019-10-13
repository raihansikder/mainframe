@extends('template.app-frame')

<?php
/**
 * Variables used in this view file.
 * @var $module_name string 'superheroes'
 * @var $mod         \App\Module
 * @var $uuid        string '1709c091-8114-4ba4-8fd8-91f0ba0b63e8'
 */
?>

@section('sidebar-left')
    @include('modules.base.include.sidebar-left')
@endsection

@section('title')

    Integration
@endsection

@section('content')
    <b>Testing Credentials</b><br/>
    Test the tracker using the following credentials on the LetsBab app:
    <table class="table">
        <tr>
            <td>Email</td>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <td>Password</td>
            <td>{{$password}}</td>
        </tr>
    </table>


    <h2>Custom integration</h2>

    <p><strong>The following script needs to be inserted into the ‘Single Product Detail Page’
            field.</strong></p>
    <pre>&lt;script src="https://s3.us-east-2.amazonaws.com/letsbab/index.js"&gt;&lt;script&gt;
&lt;script&gt;
Caterpillar.recommend();
Caterpillar.product(<!--?= PRODUCT_ID ?-->, { price: <!--?= PRODUCT_PRICE ?-->,currency: <!--?= CURRENCY ?-->, name:
        <!--?= PRODUCT_NAME ?--> });
&lt;/script&gt;
</pre>
    <p style="font-size: 15px;">NOTE: The PRODUCT_PRICE is the Price*100. Make sure there are no decimal
        points in the PRODUCT_PRICE. The reason why we multiply it by 100 is to remove the decimal.</p>
    <pre>&lt;script src="https://s3.us-east-2.amazonaws.com/letsbab/index.js"&gt;&lt;script&gt;
&lt;script&gt;
Caterpillar.invited();
Caterpillar.purchase(<!--?= ORDER_ID ?-->, {line_items: <!--?= LIST_OF_ORDER_LINE_ITEMS ?-->
});
&lt;/script&gt;
</pre>
    <p><strong>Dummy data format for LIST_OF_ORDER_LINE_ITEMS is attached.</strong></p>
    <p><a class="et_pb_button"
          href="https://www.letsbab.com/wp-content/uploads/2019/02/Order_Line_Item_Code.txt" target="_blank"
          rel="noopener">Click here</a></p>
    <p style="font-size: 15px;"><strong>NOTE:</strong> This dummy data contains only 1 purchased item’s
        details. You need to add all of the items’ details in the same format. Here, the original product
        price should show.<br>
        There is no need to multiply it by 100.</p>
    <p style="font-size: 15px;"><strong>NOTE:</strong> The above code sample is indicative and should be
        adjusted with your values for all the tags, for example: PRODUCT_ID, PRODUCT PRICE, CURRENCY, ORDER
        ID, LIST_OF_ORDER_LINE_ITEMS and PRODUCT_NAME.</p>
    <p style="font-size: 15px;"><strong>NOTE:</strong> Once integration has been completed please inform us at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>. We will test and confirm you’re all set up.
        Should you prefer for us to manage the integration please contact us for technical support at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>.
    </p>

    <h2>Magento1</h2>

    <ol>
        <li>Download the LetsBab Magento Integration Extension update,<strong><a
                        href="https://www.letsbab.com/plugins/LetsBab_Integration_magento_1.zip"> here</a></strong></li>
        <li>Extract the files and upload them via FTP as per the directory structure</li>
        <li>After you have uploaded, login into the Administrator Panel. Go to system &gt;&gt; configuration and then on
            left hand side find “LetsBab Integration” extension and enable it.
        </li>
        <li>Clear Cache and refresh</li>
    </ol>
    <p style="font-size: 15px;"><strong>NOTE:</strong> Once integration has been completed please inform us at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>. We will test and confirm you’re all set up.
        Should you prefer for us to manage the integration please contact us for technical support at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>.
    </p>

    <h2>Magento2</h2>

    <ol>
        <li>Download the LetsBab Magento Integration Extension update, <a
                    href="https://www.letsbab.com/plugins/LetsBab_Integration_magento_2.zip"><strong>here</strong></a>
        </li>
        <li>Extract the files and upload them via FTP as per the directory structure</li>
        <li>Enable the module by following the command via SSH<br>
            <span>php bin/magento module:enable Letsbab_Integration</span></li>
        <li>Clear cache by following the command via SSH<br>
            <span>php bin/magento cache:clean</span><br>
            <span>php bin/magento c:c</span><br>
            <span>php bin/magento cache:flush</span><br>
            <span>php bin/magento c:f</span><br>
            <span>php bin/magento setup:upgrade</span><br>
            <span>php bin/magento setup:static-content:deploy</span></li>
        <li>Login into the Administrator Panel and go to Stores &gt;&gt; Configuration &gt;&gt; Letsbab Script Extension
            Panel &gt;&gt; enable the module &gt; select the save configuration button
        </li>
        <li>Clear cache and refresh</li>
    </ol>
    <p style="font-size: 15px;"><strong>NOTE:</strong> Once integration has been completed please inform us at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>. We will test and confirm you’re all set up.
        Should you prefer for us to manage the integration please contact us for technical support at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>.
    </p>

    <h2>Shopify</h2>

    <ol>
        <li>Add the following code the “product.liquid” template.
            <pre>&lt;script src="https://s3.us-east-2.amazonaws.com/letsbab/index.js"&gt;&lt;/script&gt;
&lt;script&gt;
Caterpillar.recommend();
Caterpillar.products(@{{product.id | json}}, {price:@{{product.price | json}}, currency:@{{shop.currency | json}} });
&lt;/script&gt;
</pre>
        </li>
        <li>Add the following code in the “Additional scripts” section under “Settings &gt; Checkout &gt; Order
            processing”:
            <pre>&lt;script src="https://s3.us-east-2.amazonaws.com/letsbab/index.js"&gt;&lt;/script&gt;
&lt;script&gt;
Caterpillar.invited();
Caterpillar.purchase(@{{order_number}},{line_items:@{{order.line_items | json}} } );
&lt;/script&gt;
</pre>
        </li>
    </ol>
    <p style="font-size: 15px;"><strong>NOTE:</strong> Once integration has been completed please inform us at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>. We will test and confirm you’re all set up.
        Should you prefer for us to manage the integration please contact us for technical support at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>.
    </p>

    <h2>Wordpress</h2>

    <ol>
        <li>Download the LetsBab WooCommerce plugin update, <strong><a
                        href="https://www.letsbab.com/plugins/letsbab_wocommerce_update.zip">here</a></strong></li>
        <li>Install the plugin and activate it</li>
    </ol>
    <p style="font-size: 15px;"><strong>NOTE:</strong> Once integration has been completed please inform us at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>. We will test and confirm you’re all set up.
        Should you prefer for us to manage the integration please contact us for technical support at <a
                href="mailto:letshelp@letbab.com">letshelp@letbab.com</a>.
    </p>
@endsection
