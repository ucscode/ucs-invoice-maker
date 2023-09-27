<?php

class UcsInvoice
{
    private string $invoiceNumber;

    private \InvoiceHeader $invoiceHeader;

    private array $invoiceClient = [];

    private \InvoiceTable $invoiceTable;

    private array $invoiceNote = [];

    /**
     * Constructor
     */
    public function __construct(?string $number = null)
    {
        $this->setInvoiceNumber($number);
    }

    /**
     * Create Unique Invoice Number
     */
    public function setInvoiceNumber(?string $number): void
    {
        if(empty($number)) {
            $number = "INV-" . date('Ymd');
        }
        $this->invoiceNumber = $number;
    }

    /**
     * Set Meta Information about Invoice
     */
    public function setInvoiceHeader(\InvoiceHeader $header): void
    {
        $class = $header::class;
        if(empty($header->date)) {
            throw new \Exception(
                __METHOD__ . "(): `{$class}::\$date` property is require"
            );
        } elseif(empty($header->title) && empty($header->logo)) {
            throw new \Exception(
                __METHOD__ . "(): `{$class}::\$title` & `{$class}::\$logo` cannot be empty at the same time"
            );
        }
        $this->invoiceHeader = $header;
    }

    /**
     * Add Associated client such as "Bill To, Ship To etc..."
     */
    public function addInvoiceClient(\InvoiceClient $client): void
    {
        $this->invoiceClient[] = $client;
    }

    /**
     * Generate Invoice Table
     */
    public function setInvoiceTable(\InvoiceTable $table): void
    {
        $required = [
            'thead' => 'setHeader',
            'tbody' => 'setData',
            'bills' => 'addBill',
        ];
        foreach($required as $property => $method) {
            if(empty($table->get($property))) {
                $class = $table::class;
                throw new \Exception(
                    __METHOD__ . "(): `{$property}` property must be configured using the `{$class}::{$method}()` method"
                );
            };
        };
        $this->invoiceTable = $table;
    }

    /**
     * Add Invoice Note
     */
    public function addInvoiceNote(\InvoiceNote $note): void
    {
        if(empty($note->content)) {
            $class = $note::class;
            throw new \Exception(
                __METHOD__ . "(): `{$class}::\$content` property cannot be empty"
            );
        };
        $this->invoiceNote[] = $note;
    }

    /**
     * Render the invoice as HTML
     */
    public function render(bool $print = false): ?string
    {
        $this->validate();
        ob_start();
        require_once INV_VIEW . "/invoice.php";
        $result = ob_get_clean();
        if($print) {
            return print($result);
        };
        return $result;
    }

    protected function validate()
    {
        $required = ['invoiceNumber', 'invoiceHeader', 'invoiceClient', 'invoiceTable'];
        foreach($required as $property) {
            if(empty($this->{$property})) {
                throw new \Exception(
                    "Please configure `{$property}` to process or render the invoice"
                );
            };
        }
    }

    protected function get(string $property)
    {
        if(!property_exists($this, $property)) {
            $class = $this::class;
            throw new \Exception(__METHOD__ . "(): Undefined Property `{$class}::{$property}`");
        }
    }

}
