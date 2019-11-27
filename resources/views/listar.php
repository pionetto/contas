<h1>Lista de Contas Pagar</h1>
<table>
    <tr>
        <td>ID</td>
        <td>DESCRIÇÃO</td>
        <td>VALOR</td>

    </tr>
<?php foreach ($contas_pagar as $value) { ?>
    <tr>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->descricao; ?></td>
        <td><?php echo $value->valor; ?></td>

    </tr>
<?php } ?>
</table>