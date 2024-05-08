<?
$diferenciais = array(
    'reembolso_consulta' => 'Reembolso consulta',
    'reembolso_terapias' => 'Reembolso terapias',
    'prazo_reembolso' => 'Prazo Reembolso',
    'cobertura_internacional' => 'Cobertura Internacional',
    'retaguarda_hospital_albert_einstein' => 'Retaguarda Hospital Albert Einstein',
    'remissao' => 'Remissão',
    'assistencia_em_viagem_nacional' => 'Assistência em viagem nacional',
    'assistencia_em_viagem_internacional' => 'Assistência em viagem internacional',
    'resgate_interhospitalar' => 'Resgate interhospitalar',
    'cobertura_para_vacinas' => 'Cobertura para vacinas',
    'coleta_domiciliar_para_exames' => 'Coleta domiciliar para exames',
    'check_up' => 'Check Up',
    'convenio_farmacia' => 'Convênio farmácia',
    'concierge' => 'Concierge',
    'escleroterapia' => 'Escleroterapia'
);
$numPlanos = 6;
?>

<div class="comparativo-estilo">
    <table class="table table-bordered">
        <thead class="comparativo">
        <tr>
            <th class="fixed-width"><h2>OPERADORAS:</h2></th>
            <th  id="pdf_plano1_logo_th"><p id="pdf_plano0_logo"></p></th>
            <th  id="pdf_plano2_logo_th"><p id="pdf_plano1_logo"></p></th>
            <th  id="pdf_plano3_logo_th"><p id="pdf_plano2_logo"></p></th>
            <th  id="pdf_plano4_logo_th"><p id="pdf_plano3_logo"></p></th>
            <th  id="pdf_plano5_logo_th"><p id="pdf_plano4_logo"></p></th>
            <th  id="pdf_plano6_logo_th"><p id="pdf_plano5_logo"></p></th>
        </tr>
        <tr>
            <th ><p>PLANO</p></th>
            <th  id="pdf_plano1_th"><p id="pdf_plano1_nome"></p></th>
            <th  id="pdf_plano2_th"><p id="pdf_plano2_nome"></p></th>
            <th  id="pdf_plano3_th"><p id="pdf_plano3_nome"></p></th>
            <th  id="pdf_plano4_th"><p id="pdf_plano4_nome"></p></th>
            <th  id="pdf_plano5_th"><p id="pdf_plano5_nome"></p></th>
            <th  id="pdf_plano6_th"><p id="pdf_plano6_nome"></p></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th colspan="5" style="text-align: center; color: red">DIFERENCIAIS POR PLANO</th>
        </tr>
        <?php
                foreach ($diferenciais as $key => $diferencial) {
                    echo '<tr id="tr_'.$key.'" style="display: none">';
                    echo '<th >'.$diferencial.'</th>';
                    for ($i = 0; $i < $numPlanos; $i++) {
                        echo '<th class="'.$key.'_'.$i.'_r" id="'.$key.'_'.$i.'_r"></th>';
                    }
                    echo '</tr>';
                }
        ?>
        </tbody>
    </table>
</div>