<thead class="table-dark text-capitalize">
    <tr>
        <?php foreach($this->invoiceTable->get('thead') as $value): ?>
        <th><?php echo $value; ?></th>
        <?php endforeach; ?>
    </tr>
</thead>
<tbody>
    <?php
        foreach($this->invoiceTable->get('tbody') as $data):
            ?>
    <tr>
        <?php foreach($data as $value): ?>
        <td><?php echo $value; ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</tbody>