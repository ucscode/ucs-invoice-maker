<?php
foreach($this->invoiceNote as $invoiceNote):
    ?>

<div class='border-bottom mb-4'></div>

<div class="mb-4">

    <h4 class='fw-light'>
        <?php echo $invoiceNote->title; ?>:
    </h4>

    <?php if(!empty(trim($invoiceNote->description))): ?>
        <p><?php echo $invoiceNote->description; ?>:</p>
    <?php endif; ?>

    <div class='border rounded-2 p-3 <?php echo $invoiceNote->__class; ?>'>
        <?php echo $invoiceNote->content; ?>
    </div>

</div>

<?php endforeach; ?>