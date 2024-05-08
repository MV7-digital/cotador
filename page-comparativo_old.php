<?php get_header(); ?>
<?php
$arquivoDiferencial = file_get_contents( get_template_directory() . '/dados/comparativo-diferencial.json');
$jsonDiferencial = json_decode($arquivoDiferencial);

$arquivoHospitais = file_get_contents( get_template_directory() . '/dados/comparativo-laboratorios.json');
$jsonLaboratorios = json_decode($arquivoHospitais);

$arquivoReembolso = file_get_contents( get_template_directory() . '/dados/comparativo-reembolso.json');
$jsonReembolso = json_decode($arquivoReembolso);

$hospitais = file_get_contents( get_template_directory() . '/dados/comparativo-hospitais.json');
$jsonHospitais = json_decode($hospitais);

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="container">
    <h1>Comparativo de Planos de Saúde</h1>
    <table class="table table-bordered">
        <thead class="comparativo">
        <tr>
            <th>Plano</th>
            <?php
            $planos = array();
            $numPlanos = 6;

            foreach ($jsonDiferencial as $key => $value) {
                $option = '<option value="'.str_replace(array(' ', '[', ']', '.'), array('_', '', '', '_'), $value->plano).'">'.$value->rede.' '.$value->plano.'</option>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    $planos[$i][] = $option;
                }
            }

            for ($i = 0; $i < $numPlanos; $i += 2) {
                echo '<th colspan="2">';
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo '<img src="'.get_template_directory_uri().'/img/placeholder.jpg" height="50" alt="Logo '.$i.'">';
                echo '<select name="plano_'.$i.'" id="plano_'.$i.'">';
                echo '<option value="">Selecione</option>';
                foreach ($planos[$i] as $option) {
                    echo $option;
                }
                echo '</select>';
                echo '</div>';
                echo '<div class="col-6">';
                echo '<img src="'.get_template_directory_uri().'/img/placeholder.jpg" height="50" alt="Logo '.($i+1).'">';
                echo '<select name="plano_'.($i+1).'" id="plano_'.($i+1).'">';
                echo '<option value="">Selecione</option>';
                foreach ($planos[$i+1] as $option) {
                    echo $option;
                }
                echo '</select>';
                echo '</div>';
                echo '</div>';
                echo '</th>';
            }
            ?>
        </tr>
        <tr>
            <th>Faixa Etaria</th>
            <?php for ($i = 0; $i < $numPlanos; $i++) { ?>
                <th>
                    <div class="row">
                        <div class="col-6 text-center">Vidas</div>
                        <div class="col-6 text-center">(R$) UNIT.</div>
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

        foreach ($faixasEtarias as $faixa) {
            echo '<tr>';
            echo '<th>'.$faixa[0].'</th>';
            for ($i = 0; $i < $numPlanos; $i++) {
                echo '<th>';
                echo '<div class="row">';
                echo '<div class="col-6 text-center">';
                echo '<input type="number" class="idade_'.$faixa[1].'_'.$i.'_'.$j.' w-100" id="idade_'.$faixa[1].'_'.$i.'_'.$j.'">';
                echo '</div>';
                echo '<div class="col-6 text-center">';
                echo '<input type="number" class="unidade_'.$faixa[1].'_'.$i.'_'.$j.' w-100" id="unidade_'.$faixa[1].'_'.$i.'_'.$j.'">';
                echo '</div>';
                echo '</div>';
                echo '</th>';
            }
            echo '</tr>';
        }
        ?>

        </thead>
        <tbody>
        <tr>
            <th colspan="<?php echo $numPlanos + 1; ?>" style="text-align: center; color: red">DIFERENCIAIS POR PLANO</th>
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
            echo '<td>'.$diferencial.'</td>';
            for ($i = 0; $i < $numPlanos; $i++) {
                echo '<td class="'.$key.'_'.$i.'" id="'.$key.'_'.$i.'"></td>';
            }
            echo '</tr>';
        }
        ?>
        <tr>
            <th colspan="<?php echo $numPlanos + 1; ?>" style="text-align: center; color: red">HOSPITAIS</th>
        </tr>
        <?php
            foreach ($jsonHospitais as $key => $value) {
                echo '<tr>';
                echo '<td>'.$value->hospital.'</td>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    echo '<td class="plano_'.$i.'" id="plano_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+'), array('_', '', '', '_', ''), $value->hospital).'"></td>';
                }
                echo '</tr>';
            }
        ?>
        <tr>
            <th colspan="<?php echo $numPlanos + 1; ?>" style="text-align: center; color: red">LABORATÓRIOS</th>
        </tr>
        <?php
            foreach ($jsonLaboratorios as $key => $value) {
                echo '<tr>';
                echo '<td>'.$value->hospital.'</td>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    echo '<td class="plano_'.$i.'" id="plano_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+'), array('_', '', '', '_', ''), $value->hospital).'"></td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
</div>


<script>

    ;(function($){
        function replaceString(str, search, replace) {
            return str.replace(new RegExp(search, 'g'), replace);
        }

        let plano = $('#plano_0');
        let plano_1 = $('#plano_1');
        let plano_2 = $('#plano_2');
        let plano_3 = $('#plano_3');
        let plano_4 = $('#plano_4');
        let plano_5 = $('#plano_5');

        plano.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
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
                        $('#plano_0_' + replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).then(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_0').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_0').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_0').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_0').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_0').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_0').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_0').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_0').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_0').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_0').html(value['check_up']);
                                $('#convenio_farmacia_0').html(value['convenio_farmacia']);
                                $('#concierge_0').html(value['concierge']);
                                $('#escleroterapia_0').html(value['escleroterapia']);
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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_0').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_0').html('R$ ' + value['reemboso_em_terapias']);
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
                                let replace = replaceString(value['hospital'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#hospital_0').html(value['hospital']);
                                }
                            });
                        }
                    })
                )
            )
        });
        plano_1.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {

                        $('#plano_1_'+replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).success(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_1').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_1').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_1').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_1').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_1').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_1').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_1').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_1').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_1').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_1').html(value['check_up']);
                                $('#convenio_farmacia_1').html(value['convenio_farmacia']);
                                $('#concierge_1').html(value['concierge']);
                                $('#escleroterapia_1').html(value['escleroterapia']);

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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_1').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_1').html('R$ ' + value['reemboso_em_terapias']);

                                }
                            });
                        }
                    })
                )
            )
        });
        plano_2.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {

                        $('#plano_2_'+replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).success(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_2').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_2').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_2').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_2').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_2').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_2').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_2').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_2').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_2').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_2').html(value['check_up']);
                                $('#convenio_farmacia_2').html(value['convenio_farmacia']);
                                $('#concierge_2').html(value['concierge']);
                                $('#escleroterapia_2').html(value['escleroterapia']);

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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_2').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_2').html('R$ '    + value['reemboso_em_terapias']);
                                }
                            });
                        }
                    })
                )
            )
        });
        plano_3.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {

                        $('#plano_3_'+replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).success(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_3').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_3').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_3').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_3').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_3').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_3').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_3').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_3').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_3').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_3').html(value['check_up']);
                                $('#convenio_farmacia_3').html(value['convenio_farmacia']);
                                $('#concierge_3').html(value['concierge']);
                                $('#escleroterapia_3').html(value['escleroterapia']);

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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_3').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_3').html('R$ '    + value['reemboso_em_terapias']);
                                }
                            });
                        }
                    })
                )
            )
        });
        plano_4.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {

                        $('#plano_4_'+replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).success(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_4').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_4').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_4').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_4').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_4').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_4').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_4').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_4').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_4').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_4').html(value['check_up']);
                                $('#convenio_farmacia_4').html(value['convenio_farmacia']);
                                $('#concierge_4').html(value['concierge']);
                                $('#escleroterapia_4').html(value['escleroterapia']);

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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_4').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_4').html('R$ '    + value['reemboso_em_terapias']);
                                }
                            });
                        }
                    })
                )
            )
        });
        plano_5.on('change', function(e) {
            e.preventDefault();
            let plano = $(this).val();
            let url = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-laboratorios.json';
            let url2 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-diferencial.json';
            let url3 = '<?php echo get_template_directory_uri(); ?>/dados/comparativo-reembolso.json';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {

                        $('#plano_5_'+replaceString(value['hospital'], ' ', '_')).html(value[plano])
                    });
                }
            }).success(
                $.ajax({
                    url: url2,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        const xhr = $.each(data, function (key, value) {
                            let replace = replaceString(value['plano'], ' ', '_')
                            let replace2 = replaceString(replace, '\\[', '')
                            let replace3 = replaceString(replace2, '\\.', '_')
                            let replaceFinal = replaceString(replace3, '\\]', '')
                            if (replaceFinal === plano) {
                                $('#prazo_reembolso_5').html(value['prazo_reembolso']);
                                $('#cobertura_internacional_5').html(value['cobertura_internacional']);
                                $('#retaguarda_hospital_albert_einstein_5').html(value['retaguarda_hospital_albert_einstein']);
                                $('#remissao_5').html(value['remissao']);
                                $('#assistencia_em_viagem_nacional_5').html(value['assistencia_em_viagem_nacional']);
                                $('#assistencia_em_viagem_internacional_5').html(value['assistencia_em_viagem_internacional']);
                                $('#resgate_interhospitalar_5').html(value['resgate_interhospitalar']);
                                $('#cobertura_para_vacinas_5').html(value['cobertura_para_vacinas']);
                                $('#coleta_domiciliar_para_exames_5').html(value['coleta_domiciliar_para_exames']);
                                $('#check_up_5').html(value['check_up']);
                                $('#convenio_farmacia_5').html(value['convenio_farmacia']);
                                $('#concierge_5').html(value['concierge']);
                                $('#escleroterapia_5').html(value['escleroterapia']);

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
                                let replace = replaceString(value['plano'], ' ', '_')
                                let replace2 = replaceString(replace, '\\[', '')
                                let replace3 = replaceString(replace2, '\\.', '_')
                                let replaceFinal = replaceString(replace3, '\\]', '')
                                if (replaceFinal === plano) {
                                    $('#reembolso_consulta_5').html('R$ ' + value['reembolso_consulta']);
                                    $('#reembolso_terapias_5').html('R$ '    + value['reemboso_em_terapias']);
                                }
                            });
                        }
                    })
                )
            )
        });
    })(jQuery);
</script>
<?php get_footer(); ?>