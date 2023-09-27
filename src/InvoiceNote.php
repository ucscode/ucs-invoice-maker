<?php

class InvoiceNote
{
    public string $description = '';

    public string $content;

    public function __construct(
        public string $title,
        public string $__class = ''
    ) {
    }

}
