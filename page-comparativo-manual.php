<?php get_header();

$arquivoDiferencial = file_get_contents( get_template_directory() . '/dados/comparativo-diferencial.json');
$jsonDiferencial = json_decode($arquivoDiferencial);

$arquivoHospitais = file_get_contents( get_template_directory() . '/dados/comparativo-laboratorios.json');
$jsonLaboratorios = json_decode($arquivoHospitais);

$arquivoReembolso = file_get_contents( get_template_directory() . '/dados/comparativo-reembolso.json');
$jsonReembolso = json_decode($arquivoReembolso);

$hospitais = file_get_contents( get_template_directory() . '/dados/comparativo-hospitais.json');
$jsonHospitais = json_decode($hospitais);

get_template_part('template-parts/pdfs/pdf', 'comparativo');

?>

<div class="container comparativo-body">
    <h1 class="title-dif">COMPARATIVO DE <span>PLANOS</span></h1>
    <p class="desc-dif">Comparativo dos planos de saúde que mais se adequam a você.</p>

    <table class="table table-bordered">
        <thead class="comparativo">
        <tr style="background-color: unset">
            <th style="font-size: 18px">Selecione a seguir os planos para começar:</th>
            <?php
            $planos = array();
            $numPlanos = 6; // Número de planos

            // Criação dos arrays de redes e planos
            $redes = array();
            $planosPorRede = array();

            foreach ($jsonDiferencial as $key => $value) {
                $redes[] = $value->rede;
                $planosPorRede[$value->rede][] = $value->plano;
            }

            // Criação dos arrays de grupos
            $grupos = array();
            $planosPorGrupo = array();

            foreach ($jsonHospitais as $key => $value) {
                $grupos[] = $value->categoria;
                $planosPorGrupo[$value->categoria][] = $value->plano;
            }

            // Criação dos arrays de grupos laboratorios
            $gruposLaboratorios = array();
            $planosPorGrupoLaboratorios = array();

            foreach ($jsonLaboratorios as $key => $value) {
                $gruposLaboratorios[] = $value->grupo;
                $planosPorGrupoLaboratorios[$value->grupo][] = $value->plano;
            }

            for ($i = 0; $i < $numPlanos; $i += 2) {
                echo '<th colspan="2">';
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo '<p id="pdf_plano'.$i.'_logo_r">';
                echo '<img src="'.get_template_directory_uri().'/img/placeholder.jpg" height="50" alt="Logo '.$i.'">';
                echo '</p>';
                // Select de rede
                echo '<select name="rede_'.$i.'" id="rede_'.$i.'" onchange="atualizarPlanos('.$i.')">';
                echo '<option value="">Selecione a Rede</option>';
                foreach (array_unique($redes) as $rede) {
                    echo '<option value="'.$rede.'">'.$rede.'</option>';
                }
                echo '</select>';
                // Select de plano
                echo '<select name="plano_'.$i.'" id="plano_'.$i.'" disabled>';
                echo '<option value="">Selecione a Rede Primeiro</option>';
                echo '</select>';
                echo '<div class="coop" id="copart_'.$i.'"></div>';
                echo '</div>';
                echo '<div class="tamanho-coluna col-6">';
                echo '<p id="pdf_plano'.($i+1).'_logo_r">';
                echo '<img src="'.get_template_directory_uri().'/img/placeholder.jpg" height="50" alt="Logo '.$i.'">';
                echo '</p>';
                // Select de rede
                echo '<select name="rede_'.($i + 1).'" id="rede_'.($i + 1).'" onchange="atualizarPlanos('.($i + 1).')">';
                echo '<option value="">Selecione a Rede</option>';
                foreach (array_unique($redes) as $rede) {
                    echo '<option value="'.$rede.'">'.$rede.'</option>';
                }
                echo '</select>';
                // Select de plano
                echo '<select name="plano_'.($i + 1).'" id="plano_'.($i + 1).'" disabled>';
                echo '<option value="">Selecione a Rede Primeiro</option>';
                echo '</select>';
                echo '<div class="coop" id="copart_'.($i + 1).'"></div>';
                echo '</div>';
                echo '</th>';
            }
            ?>
        </tr>
        <tr>
            <th>Faixa Etaria</th>
            <?php for ($i = 0; $i < $numPlanos; $i++) { ?>
                <th>
                    <div class="row vunit">
                        <div class="col-6 text-center">Vidas</div>
                        <div class="col-6 text-center">(R$) Unit.</div>
                    </div>
                </th>
            <?php } ?>
        </tr>
        <?php
        $faixasEtarias = array(
            array('0 - 18 anos', '0_18'),
            array('19 - 23 anos', '19_23'),
            array('24 - 28 anos', '24_28'),
            array('29 - 33 anos', '29_33'),
            array('34 - 38 anos', '34_38'),
            array('39 - 43 anos', '39_43'),
            array('44 - 48 anos', '44_48'),
            array('49 - 53 anos', '49_53'),
            array('54 - 58 anos', '54_58'),
            array('59 ou +', '59')
        );

        foreach ($faixasEtarias as $j => $faixa) {
            echo '<tr>';
            echo '<th>'.$faixa[0].'</th>';
            for ($i = 0; $i < $numPlanos; $i++) {
                echo '<th>';
                echo '<div class="row">';
                echo '<div class="col-6 text-center">';
                echo '<input type="number" class="idade_'.$i.'_'.$j.' w-100" id="idade_'.$i.'_'.$j.'" value="0" disabled>';
                echo '</div>';
                echo '<div class="col-6 text-center">';
                echo '<input value="0" class="unidade_'.$i.'_'.$j.' w-100" id="unidade_'.$i.'_'.$j.'" oninput="habilitarIdade('.$i.','.$j.')">';
                echo '</div>';
                echo '</div>';
                echo '</th>';
            }
            echo '</tr>';
        }
            echo '<tr style="background: rgba(202, 153, 30, 0.50);">';
            echo '<th>TOTAL</th>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_0">0</p>';
            echo '</div><div class="col-6 text-center">
            <p class="total_0 w-100" id="total_0">0</p>
            </div></div>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_1">0</p>';
            echo '</div><div class="col-6 text-center"><p class="total_1 w-100" id="total_1">0</p></div></div>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_2">0</p>';
            echo '</div><div class="col-6 text-center"><p class="total_1 w-100" id="total_2">0</p></div></div>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_3">0</p>';
            echo '</div><div class="col-6 text-center"><p class="total_1 w-100" id="total_3">0</p></div></div>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_4">0</p>';
            echo '</div><div class="col-6 text-center"><p class="total_1 w-100" id="total_4">0</p></div></div>';
            echo '</th>';
            echo '<th class="text-center">';
            echo '<div class="row"> <div class="col-6 text-center">';
            echo '<p class="total_vida_0 w-100" id="total_vida_5">0</p>';
            echo '</div><div class="col-6 text-center"><p class="total_1 w-100" id="total_5">0</p></div></div>';
            echo '</th>';
            echo '</tr>';


        echo '</tr>';


        ?>

        </thead>
        <tbody>
        <tr>
            <th colspan="7"><p class="title-dif">DIFERENCIAIS POR <span>PLANOS</span></p>
            <p class="desc-dif">Selecione os diferenciais que fazem parte do seu comparativo</p></th>
        </tr>
        <?php
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

        foreach ($diferenciais as $key => $diferencial) {
            echo '<tr>';
            echo '<td style="display: flex; justify-content: space-between;">' . $diferencial . '<input onclick="inserirDiferencial(\'' . $key . '\')" class="diferenciaisCheck" type="checkbox" id="' . $key . '"></td>';

            for ($i = 0; $i < $numPlanos; $i++) { 
                echo '<td class="'.$key.'_'.$i.'" id="'.$key.'_'.$i.'"></td>';
            }
            echo '</tr>';
        }
        ?>
        <tr>
            <th colspan="7" class="title-dif">HOSPITAIS</th>
        </tr>
        <tr>
            <th>
                <p>
                    <select name="grupo_hospitais" id="grupo_hospitais" onchange="atualizarGrupo(this.value)">
                        <option value="">Selecione o Grupo de Hospitais</option>
                        <?php
                        foreach (array_unique($grupos) as $value) {
                            echo '<option value="'.$value.'">'.$value.'</option>';
                        }
                        ?>
                    </select>
                </p>
                <p>Selecionar</p>
                <p>
                    AA <input type="checkbox" onclick="selecionarGrupo('AA')">
                    A <input type="checkbox" onclick="selecionarGrupo('A')">
                    B <input type="checkbox" onclick="selecionarGrupo('B')">
                    C <input type="checkbox" onclick="selecionarGrupo('C')">
                </p>
            </th>
        </tr>
        <?php
            foreach ($jsonHospitais as $key => $value) {
                echo '<tr id="grupo_'.$value->categoria.'">';
                echo '<td style="display: flex; justify-content: space-between;">' . htmlspecialchars($value->hospital) . ' <input onclick="inserirHospital()" class="hospitaisCheck" type="checkbox" id="' . htmlspecialchars($value->hospital) . '"></td>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    echo '<td id="hospitais_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+', '(', ')'), array('_', '', '', '_', '', '', ''), $value->hospital).'"></td>';
                }
                    echo '</tr>';
            }
        ?>
        <tr>
            <th colspan="7" class="title-dif">LABORATÓRIOS</th>
        </tr>
        <?php
            foreach ($jsonLaboratorios as $key => $value) {
                echo '<tr id="grupo_'.$value->grupo.'">';
                echo '<td style="display: flex; justify-content: space-between;">'.$value->hospital.' <input onclick="inserirHospital()" class="laboratoriosCheck" type="checkbox" id="'.$value->hospital.'"></td>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    echo '<td class="plano_'.$i.'" id="plano_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+'), array('_', '', '', '_', ''), $value->hospital).'"></td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
    <p>
        <!-- Button trigger modal -->
        <button type="button" id="previsualizar2" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Pre-visualizar
        </button>
    </p>
</div>


<script>

    function habilitarIdade(i, j) {
        var unidade = document.getElementById('unidade_'+i+'_'+j).value;
        var idadeInput = document.getElementById('idade_'+i+'_'+j);

        // Se a unidade for preenchida, habilitar a idade e redefinir a idade para 0
        if (unidade !== '') {
            idadeInput.disabled = false;
            idadeInput.value = '0';
        } else {
            // Se a unidade estiver vazia, desabilitar a idade
            idadeInput.disabled = true;
        }
    }

    function inserirHospital(){
        // checar todos os checkbox de hospitais com a classe hospitaisCheck que estiverem marcados e inserir o nome do hospital na tabela
        let hospitais = document.getElementsByClassName('hospitaisCheck');
        let laboratorios = document.getElementsByClassName('laboratoriosCheck');
        for (let i = 0; i < hospitais.length; i++) {
            if (hospitais[i].checked) {
                document.getElementById(hospitais[i].id+'_r').style.display = 'table-row';
            }else{
                document.getElementById(hospitais[i].id+'_r').style.display = 'none';
            }
        }
        for (let i = 0; i < laboratorios.length; i++) {
            if (laboratorios[i].checked) {
                document.getElementById(laboratorios[i].id+'_r').style.display = 'table-row';
            }else{
                document.getElementById(laboratorios[i].id+'_r').style.display = 'none';
            }
        }
    }


    let display = [];

    function inserirDiferencial(key) {
        const index = display.indexOf(key);

        if (index === -1) {
            // Parameter is not in the array, so add it and display the row
            display.push(key);
            document.getElementById('tr_' + key).style.display = 'table-row';
        } else {
            // Parameter is already in the array, so remove it and hide the row
            display.splice(index, 1);
            document.getElementById('tr_' + key).style.display = 'none';
        }
    }


    function atualizarPlanos(ordem) {
        let selectRede = document.getElementById('rede_' + ordem);
        let selectPlano = document.getElementById('plano_' + ordem);
        const bradesco = <?php get_template_part('template-parts/planos/plano', 'bradesco') ?>;
        const sulamerica = <?php get_template_part('template-parts/planos/plano', 'sulamerica') ?>;
        const amil = <?php get_template_part('template-parts/planos/plano', 'amil') ?>;
        const amilOne = <?php get_template_part('template-parts/planos/plano', 'amilOne') ?>;
        const gndi = <?php get_template_part('template-parts/planos/plano', 'gndi') ?>;
        const unimed = <?php get_template_part('template-parts/planos/plano', 'unimed') ?>;
        const carePlus = <?php get_template_part('template-parts/planos/plano', 'carePlus') ?>;
        const omint = <?php get_template_part('template-parts/planos/plano', 'omint') ?>;
        const portoSeguro = <?php get_template_part('template-parts/planos/plano', 'portoseguro') ?>;

        document.getElementById("copart_" + ordem).innerHTML =
            selectRede.value === 'Bradesco' ? bradesco :
            selectRede.value === 'Amil' ? amil :
            selectRede.value === 'Amil One' ? amilOne :
            selectRede.value === 'NDI' ? gndi :
            selectRede.value === 'CNU' ? unimed :
            selectRede.value === 'Seguros Unimed' ? unimed :    
            selectRede.value === 'Care Plus' ? carePlus :    
            selectRede.value === 'Omint' ? omint :
            selectRede.value === 'Porto' ? portoSeguro :
            selectRede.value === 'Sulamérica' ? sulamerica :
            '';

        document.getElementById("pdf_plano"+ordem+"_logo").innerHTML =
        selectRede.value === 'Bradesco' ? '<img src="/wp-content/themes/pride/img/logo-bradesco-saude.png" width="100" alt="">' :
        selectRede.value === 'Amil' ? '<img src="/wp-content/themes/pride/img/logo-amil.png" width="100" alt="">' :
        selectRede.value === 'Amil One' ? '<img src="/wp-content/themes/pride/img/logo-amil-one.png" width="100" alt="">' :
        selectRede.value === 'NDI' ? '<img src="/wp-content/themes/pride/img/logo-grupo-notredame-intermedica.png" width="100" alt="">' :
        selectRede.value === 'Seguros Unimed' ? '<img src="/wp-content/themes/pride/img/logo-unimed.png" width="100" alt="">' :
        selectRede.value === 'Omint' ? '<img src="/wp-content/themes/pride/img/omint-logo.png" width="100" alt="">' :
        selectRede.value === 'Porto' ? '<img src="/wp-content/themes/pride/img/logo-portoseguro.png" width="100" alt="">' :
        selectRede.value === 'Sulamérica' ? '<img src="/wp-content/themes/pride/img/logo-sulamerica.png" width="100" alt="">' :
        selectRede.value === 'Care Plus' ? '<img src="/wp-content/themes/pride/img/logo-care-plus.png" width="100" alt="">' :
        selectRede.value === 'CNU' ? '<img src="/wp-content/themes/pride/img/logo-cnu.png" width="100" alt="">' :
        '';

        document.getElementById("pdf_plano"+ordem+"_logo_r").innerHTML =
        selectRede.value === 'Bradesco' ? '<img src="/wp-content/themes/pride/img/logo-bradesco-saude.png" width="100" height="50" alt="">' :
        selectRede.value === 'Amil' ? '<img src="/wp-content/themes/pride/img/logo-amil.png" width="100" height="50" alt="">' :
        selectRede.value === 'Amil One' ? '<img src="/wp-content/themes/pride/img/logo-amil-one.png" width="100" height="50" alt="">' :
        selectRede.value === 'NDI' ? '<img src="/wp-content/themes/pride/img/logo-grupo-notredame-intermedica.png" width="100" height="50" alt="">' :
        selectRede.value === 'Seguros Unimed' ? '<img src="/wp-content/themes/pride/img/logo-unimed.png" width="100" height="50" alt="">' :
        selectRede.value === 'Omint' ? '<img src="/wp-content/themes/pride/img/omint-logo.png" width="100" height="50" alt="">' :
        selectRede.value === 'Porto' ? '<img src="/wp-content/themes/pride/img/logo-portoseguro.png" width="100" height="50" alt="">' :
        selectRede.value === 'Sulamérica' ? '<img src="/wp-content/themes/pride/img/logo-sulamerica.png" width="100" height="50" alt="">' :
        selectRede.value === 'Care Plus' ? '<img src="/wp-content/themes/pride/img/logo-care-plus.png" width="100" height="50" alt="">' :
        selectRede.value === 'CNU' ? '<img src="/wp-content/themes/pride/img/logo-cnu.png" width="100" height="50" alt="">' :
        '';

        selectRede.addEventListener("change", function() {

            document.getElementById("copart_" + ordem).innerHTML =
                selectRede.value === 'Bradesco' ? bradesco :
                selectRede.value === 'Amil' ? amil :
                selectRede.value === 'Amil One' ? amilOne :
                selectRede.value === 'NDI' ? gndi :
                selectRede.value === 'CNU' ? unimed :
                selectRede.value === 'Seguros Unimed' ? unimed :
                selectRede.value === 'Omint' ? omint :
                selectRede.value === 'Care Plus' ? carePlus :
                selectRede.value === 'Porto' ? portoSeguro :
                selectRede.value === 'Sulamérica' ? sulamerica :
                '';
        });
        // Limpar select de planos
        selectPlano.innerHTML = '';
        selectPlano.disabled = true;
        // Obter a rede selecionada
        let redeSelecionada = selectRede.value;
        // Verificar se uma rede foi selecionada
        if (redeSelecionada !== '') {
            // Obter os planos correspondentes à rede selecionada
            let planos = <?php echo json_encode($planosPorRede); ?>;

            // Verificar se há planos para a rede selecionada
            if (redeSelecionada in planos) {
                let planoOptions = planos[redeSelecionada];

                // Preencher o select de planos com as opções correspondentes
                selectPlano.innerHTML = '<option value="">Selecione o Plano</option>';
                for (let i = 0; i < planoOptions.length; i++) {
                    let option = document.createElement('option');
                    option.value = planoOptions[i];
                    option.text = planoOptions[i];
                    selectPlano.appendChild(option);
                }
                // Habilitar o select de planos
                selectPlano.disabled = false;
            }
        }
    }

    function buscarValores(ordem, urlPlano) {
        ;(function($){
            function replaceString(str, search, replace) {
                return str.replace(new RegExp(search, 'g'), replace);
            }

            let plano = $('#plano_'+ordem).val();

            $('#prazo_reembolso_'+ordem).html('');
            $('#cobertura_internacional_'+ordem).html('');
            $('#retaguarda_hospital_albert_einstein_'+ordem).html('');
            $('#remissao_'+ordem).html('');
            $('#assistencia_em_viagem_nacional_'+ordem).html('');
            $('#assistencia_em_viagem_internacional_'+ordem).html('');
            $('#resgate_interhospitalar_'+ordem).html('');
            $('#cobertura_para_vacinas_'+ordem).html('');
            $('#coleta_domiciliar_para_exames_'+ordem).html('');
            $('#check_up_'+ordem).html('');
            $('#convenio_farmacia_'+ordem).html('');
            $('#concierge_'+ordem).html('');
            $('#escleroterapia_'+ordem).html('');

            $('#prazo_reembolso_'+ordem+'_r').html('');
            $('#cobertura_internacional_'+ordem+'_r').html('');
            $('#retaguarda_hospital_albert_einstein_'+ordem+'_r').html('');
            $('#remissao_'+ordem+'_r').html('');
            $('#assistencia_em_viagem_nacional_'+ordem+'_r').html('');
            $('#assistencia_em_viagem_internacional_'+ordem+'_r').html('');
            $('#resgate_interhospitalar_'+ordem+'_r').html('');
            $('#cobertura_para_vacinas_'+ordem+'_r').html('');
            $('#coleta_domiciliar_para_exames_'+ordem+'_r').html('');
            $('#check_up_'+ordem+'_r').html('');
            $('#convenio_farmacia_'+ordem+'_r').html('');
            $('#concierge_'+ordem+'_r').html('');
            $('#escleroterapia_'+ordem+'_r').html('');

            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            let url4 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-hospitais.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#plano_'+ordem+'_' + replaceString(value['hospital'], ' ', '_')).html('');
                        $('#plano_'+ordem+'_' + replaceString(value['hospital'], ' ', '_')+'_r').html('');
                        $('#plano_'+ordem+'_' + replaceString(value['hospital'], ' ', '_')).html(value[plano]);
                        $('#plano_'+ordem+'_' + replaceString(value['hospital'], ' ', '_')+'_r').html(value[plano]);
                    });
                }
            }).then(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            if (value['plano'] === plano) {
                                $('#prazo_reembolso_'+ordem).html(value['prazo_reembolso']);
                                $('#cobertura_internacional_'+ordem).html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_'+ordem).html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_'+ordem).html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_'+ordem).html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_'+ordem).html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_'+ordem).html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_'+ordem).html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_'+ordem).html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_'+ordem).html(value['check_up']);
                                $('#convenio_farmacia_'+ordem).html(value['convenio_farmacia']);
                                $('#concierge_'+ordem).html(value['concierge']);
                                $('#escleroterapia_'+ordem).html(value['escleroterapia']);

                                $('#prazo_reembolso_'+ordem+'_r').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_'+ordem+'_r').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_'+ordem+'_r').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_'+ordem+'_r').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_'+ordem+'_r').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_'+ordem+'_r').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_'+ordem+'_r').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_'+ordem+'_r').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_'+ordem+'_r').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_'+ordem+'_r').html(value['check_up']);
                                $('#convenio_farmacia_'+ordem+'_r').html(value['convenio_farmacia']);
                                $('#concierge_'+ordem+'_r').html(value['concierge']);
                                $('#escleroterapia_'+ordem+'_r').html(value['escleroterapia']);

                                $('#reembolso_consulta_'+ordem).html('');
                                $('#reembolso_terapias_'+ordem).html('');

                                $('#reembolso_consulta_'+ordem+'_r').html('');
                                $('#reembolso_terapias_'+ordem+'_r').html('');
                            }
                        });
                    }
                }).then(
                    $.ajax({
                        url: url3,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            const xhr = $.each(data, function (key, value) {
    
                                if (value['plano'] === plano) {

                                    $('#reembolso_consulta_'+ordem).html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_'+ordem).html('R$ ' + value['reemboso_em_terapias']);

                                    $('#reembolso_consulta_'+ordem+'_r').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_'+ordem+'_r').html('R$ ' + value['reemboso_em_terapias']);
                                }
                            });
                        }
                    })
                ).then(
                    $.ajax({
                        url: url4,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            const xhr = $.each(data, function (key, value) {
                                let replace = replaceString(plano, ' ', '_');
                                let replace2 = replaceString(replace, '\\[', '');   
                                let replace3 = replaceString(replace2, '\\.', '_');
                                let replace4 = replaceString(replace3, 'ó', 'o');
                                let replace5 = replaceString(replace4, '\\/', '_');
                                let replace6 = replaceString(replace5, '\\+', 'mais');
                                let replace7 = replaceString(replace6, '\\ê', 'e');
                                let replace8 = replaceString(replace7, '\\á', 'a');
                                let replace9 = replaceString(replace8, '\\ú', 'u');
                                let replaceFinal = replaceString(replace9, '\\]', '');
                                

                                let replacehosp = replaceString(value['hospital'], ' ', '_')
                                let replacehosp2 = replaceString(replacehosp, '\\[', '')
                                let replacehosp3 = replaceString(replacehosp2, '\\.', '_')
                                let replacehosp4 = replaceString(replacehosp3, '\\+', '')
                                let replacehosp5 = replaceString(replacehosp4, '\\)', '')
                                let replacehosp6 = replaceString(replacehosp5, '\\(', '')
                                let replacehospFinal = replaceString(replacehosp6, '\\]', '')
                                console.log(plano, replaceFinal);
                                $('#hospitais_'+ordem+'_' + replacehospFinal).html('');
                                $('#hospitais_'+ordem+'_' + replacehospFinal+'_r').html('');
                                $('#hospitais_'+ordem+'_' + replacehospFinal).html(value[replaceFinal]);
                                $('#hospitais_'+ordem+'_' + replacehospFinal+'_r').html(value[replaceFinal]);
                            });
                        }
                    })
                )
            );

        })(jQuery);
    }

    for (let i = 0; i <= 5; i++) {
        document.getElementById("plano_" + i).addEventListener("change", function() {
            let rede = document.getElementById("rede_" + i).value;
            buscarValores(i, rede);
            let tipo_contratacao = document.getElementById("tipo_contratacao_" + i);
            if(tipo_contratacao != null){
                tipo_contratacao.addEventListener("change", function() {
                    let rede = document.getElementById("rede_" + i).value;
                    buscarValores(i, rede);
                });
            }

        });

    }

    function atualizarGrupo(grupoSelecionado) {
        const grupoHospitais = document.querySelectorAll('tr[id^="grupo_"]');
        for (let i = 0; i < grupoHospitais.length; i++) {
            const hospital = grupoHospitais[i];
            const grupoHospital = hospital.getAttribute('id');
            if (grupoSelecionado === 'grupo_' || 'grupo_'+grupoSelecionado === grupoHospital) {
                hospital.style.display = 'table-row';
            } else {
                hospital.style.display = 'none';
            }
        }
    }

    function selecionarGrupo(grupo) {
        const hospitais = document.querySelectorAll('tr[id="grupo_' + grupo + '"] td input[type="checkbox"]');
        const selectAllCheckbox = document.querySelector('input[type="checkbox"][onclick="selecionarGrupo(\'' + grupo + '\')"]');
        const isChecked = selectAllCheckbox.checked;
        for (let i = 0; i < hospitais.length; i++) {
            hospitais[i].checked = isChecked;
        }
        inserirHospital();
    }



</script>
<script type="text/javascript" src="/wp-content/themes/pride/js/script-manual.js"></script>

<?php get_footer(); ?>