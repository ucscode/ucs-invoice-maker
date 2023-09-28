<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo UcsInvoice::asset('bootstrap/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo UcsInvoice::asset('bootstrap/bootstrap-icons.css'); ?>">
        <link rel="stylesheet" href="<?php echo UcsInvoice::asset('font-size.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo UcsInvoice::asset('style.css'); ?>">
    </head>
    <body>
        
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">

                    <div class="border rounded-2 p-5">
                        <div class="p-4">

                            <?php require_once INV_VIEW . "/invoice_header.php"; ?>

                            <div class='border-bottom mb-4'></div>

                            <div class="row row-cols-md-2 mb-2 client-area">

                                <?php require_once INV_VIEW . "/invoice_client.php"; ?>

                            </div>

                            <div class='mb-5'></div>
                            
                            <div class='invoice-tableset mb-4'>
                            
                                <div class="table-responsive mb-2">
                                    <table class="table table-bordered table-striped invoice-table">

                                        <?php require_once INV_VIEW . "/invoice_table_rows.php"; ?>

                                    </table>
                                </div>

                                <div class='container-fluid'>
                                    <div class='calculation row row-cols-2'>
                                        <div class='col ms-auto'>

                                            <?php
                                                foreach($this->invoiceTable->get('bills') as $bill):
                                                    ?>
                                            <div class='row row-cols-2 mb-2 <?php echo $bill['info']['class'] ?? null; ?>'>
                                                <div class='col'>
                                                    <?php echo $bill['name']; ?>
                                                </div>
                                                <div class='col text-end'>
                                                    <?php 
                                                        echo ($bill['info']['prefix'] ?? '') .
                                                        $bill['value'] .
                                                        ($bill['info']['suffix'] ?? ''); 
                                                    ?>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </div>

                            </div> <!-- Invoice Tableset -->

                            <?php
                                if(!empty($this->invoiceNote)) {
                                    require_once INV_VIEW . "/invoice_note.php";
                                };
                            ?>

                        </div>
                    </div>
                
                </div>
            </div>
        </div>

    </body>
</html>