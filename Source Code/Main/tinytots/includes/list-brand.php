<ul class="list-group">
    <li class="list-group-item text-center" style="border-bottom: 2px solid rgba(146,144,234,0.61)  ;">
        <?php if (!empty($dataBrand)): ?>
            <?php foreach ($dataBrand as $data): ?>
                <i class="fas fa-baby-carriage" style="font-size: 22px;width: 30px;color: rgb(241,130,0);"></i>
                <a href="index.php?page=brand&brandid=<?php echo $data['BrandID'] ?>" style="font-family: Alatsi, sans-serif;font-size: 18px;"><?php echo $data["Brand_Name"] ?>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; ?>
        <?php endif; ?>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    </li>
</ul>