<ul>
    <?php if ($ctrl != 'radars/list') { ?>
        <li><a href="<?= $base ?>">Radarai</a></li>
    <?php } ?>
    <?php if ($ctrl != 'drivers/list') { ?>
        <li><a href="<?= $base . 'drivers/list' ?>">Vairuotojai</a></li>
    <?php } ?>
</ul>
