
<table class='listing'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Date d'anniversaire</th>
    </tr>
  <thead>
  <tbody>
  <?php foreach($data as $row) { ?>
    <tr class="user-table">
      <td><?php echo $row['name'] ?></td>
      <td><?php echo date_format(date_create($row['birthday']),"Y/m/d") ?></td>
    </tr>
  <?php } ?>
  <tbody>
</table>