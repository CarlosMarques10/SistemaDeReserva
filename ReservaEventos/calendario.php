
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sab</th>
            </tr>
        </thead>
        <tbody class="table-light">
        <?php for($l = 0; $l<$linhas; $l++): ?>
            <tr class="">
                <?php for($q = 0; $q<7; $q++): ?>
                    <?php
                        $t = strtotime(($q +($l * 7)).' days', strtotime($dataEntrada)); 
                        $w = date('Y-m-d', $t); ?>
                    <td>
                        <?php
                        echo date('d/m', $t)."<br><br>";
                        $w = strtotime($w);
                        foreach($lista as $item){
                            $drEntradada = strtotime($item['data_entrada']);
                            $drSaida = strtotime($item['data_saida']);

                            if($w>=$drEntradada && $w<=$drSaida){
                                echo
                                 $item['nome']."<br>". 
                                 "Tel: ".$item['telefone']."<br>".
                                "Valor do Evento: ".$item['valor_total']."R$"."<br>".
                                 "Valor Pago: ".$item['valor_pago']."R$"."<br><br>";?>
                                 <a href="editar.php?id=<?=$item['id'];?>" class="btn btn-secondary">Editar</a>
                                 <a href="excluir.php?id=<?= $item['id'];?>" class="btn btn-danger " onclick="return confirm('Deseja excluir o evento do dia <?=date('d/m', $t);?> ?')">Excluir</a>
                                 
                                <?php
                            }
                        }
                        ?>
                    </td>
                <?php endfor;?>
            </tr>


        <?php endfor;?>
        </tbody>
    </table>
</div>


