<div class="row mb-4 mb-md-2">

    <div class="col-md-7 mb-3 border--">

        <?php if(!empty($this->invoiceHeader->logo)): ?>
            <img src="<?php echo $this->invoiceHeader->logo; ?>" height="60px">
        <?php endif; ?>

        <?php if(!empty($this->invoiceHeader->title)): ?>
            <h3><?php echo $this->invoiceHeader->title; ?></h3>
        <?php endif; ?>

    </div>

    <div class="col-md-5 text-md-end border--">

        <div class="mb-3">
            <h2 class='display-6'>INVOICE</h2>
            <h6># <?php echo $this->invoiceNumber; ?></h6>
        </div>

        <div class="">
            <div class="row row-cols-2 g-0 mb-1">
                <div class="col">
                    <span class="fw-semibold">Invoice Date:</span>
                </div> 
                <div class="col">
                    <?php echo $this->invoiceHeader->date->format('M d, Y'); ?>
                </div>
            </div>
            <?php if(isset($this->invoiceHeader->dueDate)): ?>
                <div class="row row-cols-2 g-0 mb-1">
                    <div class="col">
                        <span class="fw-semibold">Due Date:</span>
                    </div> 
                    <div class="col">
                        <?php echo $this->invoiceHeader->dueDate->format('M d, Y'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>