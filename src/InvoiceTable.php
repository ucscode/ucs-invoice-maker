<?php

class InvoiceTable
{
    private array $thead = [];
    private array $tbody = [];
    private array $bills = [];

    public function get(string $property)
    {
        if(!property_exists($this, $property)) {
            throw new \Exception(
                __METHOD__ . "(): Undefined property " . __CLASS__ . "::\${$property}"
            );
        }
        return $this->{$property};
    }

    /**
     * Create the "thead" sections
     *
     * @param array $thead: Array values containing the column names
     */
    public function setHeader(array $thead): self
    {
        $this->thead = array_values($thead);
        return $this;
    }

    /**
     * Create the "tbody" sections
     *
     * @param array $tbody:
     * An array containing children arrays;
     * each child array representing a table row;
     * each index represents the column values
     */
    public function setData(array $tbody): self
    {
        foreach($tbody as $key => $data) {
            if(!is_array($data)) {
                $type = gettype($data);
                throw new \Exception(__METHOD__ . "(): Argument must be an array that contains children arrays; each child array represents a table row in the invoice. Found `{$type}` as datatype on index '{$key}'");
            }
            $this->tbody[] = array_values($data);
        };
        return $this;
    }

    /**
     * Format each data in the "tbody"
     *
     * This allows you to compute and modify the column values of a data
     *
     * @param callable $func: A function that accepts (array) data as an argument.
     * The function must also return an array of the formated data
     */
    public function formatData(callable $func): self
    {
        foreach($this->tbody as $key => $data) {
            $result = $func($data) ?? $data;
            if(!is_array($result)) {
                $result = $data;
            }
            $this->tbody[$key] = $result;
        };
        return $this;
    }

    /**
     * Set bill information after table rows
     *
     * Bills such as "subtotal, total, discount, tax etc..." are predefined with this method
     *
     * @param string $name: The name of the bill E.g "Sub Total"
     * @param string|callable $value: The value of the bill. If value is a callable, it accepts 2 argument:
     * 1. (array) Containing a list of all available data added to the table
     * 2. (array) Containing a list of all previous bills added to the table
     * @param string $class: The classname to style the bill when rendered
     */
    public function addBill(string $name, string|callable $value, array $info = [])
    {
        $bill['name'] = $name;
        $bill['info'] = $info;
        if(is_string($value)) {
            $bill['value'] = $value;
        } else {
            $bill['value'] = $value($this->tbody, $this->bills);
        };
        if(!is_scalar($bill['value'])) {
            $type = getType($bill['value']);
            throw new \Exception(__METHOD__ . "(): (# argument 2) callable must return a scalar value; `{$type}` returned instead");
        }
        $this->bills[] = $bill;
    }

}
