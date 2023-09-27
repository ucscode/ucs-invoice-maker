<?php
foreach($this->invoiceClient as $invoiceClient):
    ?>
    <div class="col border-- ms-auto d-none-- mb-4">

        <h5 class='mb-3'>
            <?php echo $invoiceClient->title; ?>:
        </h5>

        <div class="">
            <?php
                    foreach($invoiceClient->getAll() as $key => $client):

                        if(!empty($client['icon'])) {
                            $title = "<i class='{$client['icon']}'></i>";
                        } else {
                            $title = ucwords($key);
                        };

                        ?>
                <div class="d-flex mb-2">
                    <div class="me-2">
                        <?php echo $title; ?>
                    </div>
                    <div><?php echo $client['content']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
<?php endforeach; ?>