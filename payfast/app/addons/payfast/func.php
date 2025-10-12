<?php

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

/**
 * Registers the Payfast payment processor and language values
 */
function fn_payfast_install()
{
    // Insert Payfast as a payment processor
    db_query("DELETE FROM ?:payment_processors WHERE processor_script = ?s", "payfast.php");
    db_query(
        "INSERT INTO ?:payment_processors (`processor`, `processor_script`, `processor_template`, `admin_template`, `callback`, `type`, `addon`) VALUES ('Payfast Aggregation', 'payfast.php', 'views/orders/components/payments/payfast.tpl', 'payfast.tpl', 'Y', 'P', 'payfast')"
    );
}

/**
 * Removes the Payfast payment processor and language values on uninstall
 */
function fn_payfast_uninstall()
{
    // Remove the Payfast payment processor
    db_query("DELETE FROM ?:payment_processors WHERE processor = ?s", 'Payfast Aggregation');
    db_query("DELETE FROM ?:payment_processors WHERE processor_script = ?s", "payfast.php");
}
