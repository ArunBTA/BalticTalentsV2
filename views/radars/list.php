<table>
    <tr>
        <th>Nr</th>
        <th>Numeris</th>
        <th>Data</th>
        <th>Greitis (km/h)</th>
        <th></th>
    </tr>

<?php
// output data of each row
/** @var Radar $radar */
foreach ($radars as $key => $radar): ?>
    <tr>
        <td><?= $radar->getId() ?></td>
        <td><?= $radar->getNumber() ?></td>
        <td><?= $radar->getDate()->format('Y-m-d') ?></td>
        <td><?= $radar->getSpeed() ?></td>
        <td>
            <a href="<?= $base ?>radars/edit?id=<?= $radar->getId() ?>">Redaguoti</a>
            <a href="<?= $base ?>radars/delete?id=<?= $radar->getId() ?>">Trinti</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
