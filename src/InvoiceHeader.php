<?php

class InvoiceHeader
{
    public string $title = 'Ucscode';

    public string $logo;

    public \DateTimeImmutable $date;

    public \DateTimeImmutable $dueDate;

    public function __construct()
    {
        $this->logo = UcsInvoice::asset('origin.png');
    }

}
