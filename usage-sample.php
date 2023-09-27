<?php

require_once __DIR__ . "/invoice-compiler.php";

$invoice = new UcsInvoice('INV-20230927');

### CONFIGURE INVOICE HEADER

$header = new InvoiceHeader();

$header->title = "Ucscode";
$header->logo = "https://www.cdnlogo.com/logos/t/74/t3.svg";
$header->date = new DateTimeImmutable("2023-05-14");
$header->dueDate = new DateTimeImmutable("2023-05-22");

$invoice->setInvoiceHeader($header);


### CONFIGURE INVOICE CLIENTS

$issuer = (new InvoiceClient("Issued By"))
    ->set("name", "Uchenna Ajah", "bi bi-person")
    ->set("email", "Uche23mail@gmail.com", "bi bi-envelope")
    ->set("phone", "(234) 9122065408", "bi bi-telephone-inbound");
    // set as much as you want

$recipient = (new InvoiceClient("Recipient"))
    ->set("name", "Receiver Name", "bi bi-person-circle")
    ->set("company", "Receiver Company LTD", "bi bi-buildings")
    ->set("email", "receiver@email.com", "bi bi-at")
    ->set("address", "Receiver Location: Address Line, City, Country, Postcode ETC", "bi bi-geo-alt");
    // set as much as you want

$invoice->addInvoiceClient($issuer);
$invoice->addInvoiceClient($recipient);
// add as many invoiceClient as you want


### CONFIGURE INVOICE TABLE

$table = new InvoiceTable();

// Define the table columns
$table->setHeader(['description', 'hours', 'rate', 'amount']);

// Create rows for each column
$table->setData([
    ['Development for August 2023', 40, 7.5, null],
    ['Development for August 2023', 40, 7.5, null],
    ['Development for August 2023', 40, 7.5, null],
]);

// Dynamically re-format the data for each rows
$table->formatData(function(array $data) {
    $data[3] = $data[1] * $data[2];
    $data[2] = '$' . $data[2];
    return $data;
});

// Add as many bill information as you want

$table->addBill('Sub Total', function(array $allData, array $allBills) {
    return array_sum(array_column($allData, 3));
});

$table->addBill('Tax (20%)', '0.00');

$table->addBill('Total', function(array $allData, array $allBills) {
    return '$' . array_sum(array_column($allBills, 'value')); 
}, 'fs-22px');

$invoice->setInvoiceTable($table);


### CONFIGURE INVOICE NOTES

$payment = new InvoiceNote('Payment Info');

$payment->description = "Please make payment via bank transfer to the following account:";

$payment->content = "
    <table class='table table-borderless'>
        <tbody>
            <tr>
                <th>Account Holder</th>
                <td>Uchenna Ajah</td>
            </tr>
            <tr>
                <th>Account Number</th>
                <td>XXXXXX</td>
            </tr>
            <tr>
                <th>Bank Name</th>
                <td>My Bank Name</td>
            </tr>
        </tbody>
    </table>
";

$invoice->addInvoiceNote($payment);


### YOU CAN CREATE ADDITIONAL NOTES (as much as you want)

$note = new InvoiceNote("Note", 'text-bg-light');

$note->content = "Trying to get the information";

$invoice->addInvoiceNote($note);


### RENDER INVOICE:

$invoice->render(true); // false to return the invoice string