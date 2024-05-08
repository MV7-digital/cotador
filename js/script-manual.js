
;(function($){

    
    for (let i = 0; i < 10; i++) {
        
        $(`#preco_unidade_0_${i}`).on('input', function() {
            const preco_unidade_0_i = parseFloat($(this).html());
            $(`#vidas_total_amount_0_${i}`).val(parseFloat(preco_unidade_0_i * parseFloat($(`#vidas_qtd_0_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_0_${i}r`).html(parseFloat(preco_unidade_0_i).toFixed(2).replace('.', ','));
        }).change();

        $(`#vidas_qtd_0_${i}`).change(function() {
            const preco_unidade_0_i = parseFloat($(`#preco_unidade_0_${i}`).html());
            $(`#vidas_total_amount_0_${i}`).val(parseFloat(preco_unidade_0_i * parseFloat($(this).val() || 0)).toFixed(2));
            $(`#preco_unidade_0_${i}r`).html(parseFloat(preco_unidade_0_i).toFixed(2).replace('.', ','));
        }).change();
    }

    for (let i = 0; i < 10; i++) {
        $(`#preco_unidade_1_${i}`).on('input', function() {
            const preco_unidade_1_i = parseFloat($(this).html());
            $(`#vidas_total_amount_1_${i}`).val(parseFloat(preco_unidade_1_i * parseFloat($(`#vidas_qtd_1_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_1_${i}r`).html(parseFloat(preco_unidade_1_i).toFixed(2).replace('.', ','));
        }).change();

        $(`#vidas_qtd_1_${i}`).change(function() {
          const preco_unidade_1_i = parseFloat($(`#preco_unidade_1_${i}`).html());
          $(`#vidas_total_amount_1_${i}`).val(parseFloat(preco_unidade_1_i * parseFloat($(this).val() || 0)).toFixed(2));
        }).change();
    }
    
    for (let i = 0; i < 10; i++) {
        $(`#preco_unidade_2_${i}`).on('input', function() {
            const preco_unidade_2_i = parseFloat($(this).html());
            $(`#vidas_total_amount_2_${i}`).val(parseFloat(preco_unidade_2_i * parseFloat($(`#vidas_qtd_2_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_2_${i}r`).html(parseFloat(preco_unidade_2_i).toFixed(2).replace('.', ','));
        }).change();

        $(`#vidas_qtd_2_${i}`).change(function() {
            const preco_unidade_2_i = parseFloat($(`#preco_unidade_2_${i}`).html());
            $(`#vidas_total_amount_2_${i}`).val(parseFloat(preco_unidade_2_i * parseFloat($(this).val() || 0)).toFixed(2));
        }).change();
    }

    for (let i = 0; i < 10; i++) {
        $(`#preco_unidade_3_${i}`).on('input', function() {
            const preco_unidade_3_i = parseFloat($(this).html());
            $(`#vidas_total_amount_3_${i}`).val(parseFloat(preco_unidade_3_i * parseFloat($(`#vidas_qtd_3_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_3_${i}r`).html(parseFloat(preco_unidade_3_i).toFixed(2).replace('.', ','));
        }).change();
        $(`#vidas_qtd_3_${i}`).change(function() {
            const preco_unidade_3_i = parseFloat($(`#preco_unidade_3_${i}`).html());
            $(`#vidas_total_amount_3_${i}`).val(parseFloat(preco_unidade_3_i * parseFloat($(this).val() || 0)).toFixed(2));
        }).change();
    }

    for (let i = 0; i < 10; i++) {
        $(`#preco_unidade_4_${i}`).on('input', function() {
            const preco_unidade_4_i = parseFloat($(this).html());
            $(`#vidas_total_amount_4_${i}`).val(parseFloat(preco_unidade_4_i * parseFloat($(`#vidas_qtd_4_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_4_${i}r`).html(parseFloat(preco_unidade_4_i).toFixed(2).replace('.', ','));
        }).change();
        $(`#vidas_qtd_4_${i}`).change(function() {
            const preco_unidade_4_i = parseFloat($(`#preco_unidade_4_${i}`).html());
            $(`#vidas_total_amount_4_${i}`).val(parseFloat(preco_unidade_4_i * parseFloat($(this).val() || 0)).toFixed(2));
        }).change();
    }

    for (let i = 0; i < 10; i++) {
        $(`#preco_unidade_5_${i}`).on('input', function() {
            const preco_unidade_5_i = parseFloat($(this).html());
            $(`#vidas_total_amount_5_${i}`).val(parseFloat(preco_unidade_5_i * parseFloat($(`#vidas_qtd_5_${i}`).val() || 0)).toFixed(2));
            $(`#preco_unidade_5_${i}r`).html(parseFloat(preco_unidade_5_i).toFixed(2).replace('.', ','));
        }).change();
        $(`#vidas_qtd_5_${i}`).change(function() {
            const preco_unidade_5_i = parseFloat($(`#preco_unidade_5_${i}`).html());
            $(`#vidas_total_amount_5_${i}`).val(parseFloat(preco_unidade_5_i * parseFloat($(this).val() || 0)).toFixed(2));
        }).change();
    }

    for (let j = 0; j < 6; j++) {
        for (let i = 0; i < 10; i++) {
            $(`#idade_${j}_${i}`).change(function () {  
                atualizarTotal();
            });
        }
    }


    function atualizarTotal(){
        let vidas = [];
        const totalPreco = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        const totalPrecoC = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        const totalVidas = [0, 0, 0, 0, 0, 0];

        let planos = 6;

        for(let i = 0; i < planos; i++){
            for(let j = 0; j < 10; j++){
                let idadeValue = $(`#idade_${i}_${j}`).val();
                let unidadeValue = $(`#unidade_${i}_${j}`).val();
                let unidadecValue = $(`#unidadec_${i}_${j}`).val();
        
                // Verifica se os valores não são undefined antes de chamar replace
                let vidas = idadeValue ? idadeValue.replace(',', '.') : '';
                let unidade = unidadeValue ? parseFloat(unidadeValue.replace(',', '.')) : 0;
                let unidadec = unidadecValue ? parseFloat(unidadecValue.replace(',', '.')) : 0;
        
                totalPreco[i] += unidade * parseFloat(vidas);
                totalPrecoC[i] += unidadec * parseFloat(vidas);
                totalVidas[i] += parseFloat(vidas);
            }
            $(`#total_${i}`).text(totalPreco[i].toFixed(2).replace('.', ','));
            $(`#total_vida_${i}`).text(totalVidas[i]);

            $(`#totalc_${i}`).text(totalPrecoC[i].toFixed(2).replace('.', ','));
            $(`#totalc_vida_${i}`).text(totalVidas[i]);

            $(`#pdf_total_${i}`).text('R$' + totalPreco[i].toFixed(2).replace('.', ','));
            $(`#pdf_totalc_${i}`).text('R$' + totalPrecoC[i].toFixed(2).replace('.', ','));
            
            $(`#pdf_total_vida_${i}`).text(totalVidas[i]);
            $(`#pdf_totalc_vida_${i}`).text(totalVidas[i]);

        }
    }

    // Gera Pré Visualização
    $('#previsualizar').click(function() {
        const obs = [];
        const qnt = $('.col-4.bradesco.cotando').length;
        for(let i = 0; i < qnt; i++){
          obs[i] = $('#obs' + i).val();
          $(`#obsr${i}`).text(obs[i]);
        }
        
        const vidas = [];
        const valor = [];
        const totalVidas = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        const totalValor = [0.00, 0.00, 0.00, 0.00, 0.00, 0.00];
        
        let qntVidas = $('.col-4.bradesco.cotando').length;
        let totalIof = 0.00;
        for (let i = 0; i < qntVidas; i++) {
            for (let j = 0; j < 10; j++) {
                vidas[i, j] = $(`#vidas_qtd_${i}_${j}`).val().replace(',', '.');
                valor[i, j] = $(`#vidas_total_amount_${i}_${j}`).val().replace(',', '.');
                console.log(valor[i, j]);
                totalVidas[i] += parseFloat(vidas[i, j]);
                totalValor[i] += parseFloat(valor[i, j]);
        
                $(`#vidas_qtd_${i}_${j}r`).text(vidas[i, j]);
                $(`#valor_${i}_${j}r`).text(parseFloat(valor[i, j]).toFixed(2).replace('.', ','));
        
            }
        
            $(`#vidas_total_${i}_r`).text(totalVidas[i]);
            $(`#valor_total_${i}_r`).text(totalValor[i].toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).replace('.', ','));
        
            totalIof += parseFloat(totalValor[i]);
        
            $('#sem-iof').text(totalIof.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).replace('.', ','));
            $('#com-iof').text((totalIof * 1.0238).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).replace('.', ','));
        }  
      });

    // Gera Pré Visualização 2
    $('#previsualizar2').click(function() {
        adjustTableCellSizes();
        let plano1 = document.getElementById('rede_0').value;
        let plano2 = document.getElementById('rede_1').value;
        let plano3 = document.getElementById('rede_2').value;
        let plano4 = document.getElementById('rede_3').value;
        let plano5 = document.getElementById('rede_4').value;
        let plano6 = document.getElementById('rede_5').value;
        if(plano1 == ''){
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano1_logo_th"]');
            let elementos2 = $('[id^="pdf_plano1_th"]');
            let hospitais = $('[class^="hospitais_0"]');
            let laboratorios = $('[class^="laboratorios_0"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano1_th').hide();
            $('#valor_unidade1_th').hide();
            $('#0_18_th1').hide();
            $('#19_23_th1').hide();
            $('#24_28_th1').hide();
            $('#29_33_th1').hide();
            $('#34_38_th1').hide();
            $('#39_43_th1').hide();
            $('#44_48_th1').hide();
            $('#49_53_th1').hide();
            $('#54_58_th1').hide();
            $('#59_mais_th1').hide();
            $('#reembolso_consulta_0_r').hide();
            $('#reembolso_terapias_0_r').hide();
            $('#prazo_reembolso_0_r').hide();
            $('#cobertura_internacional_0_r').hide();
            $('#retaguarda_hospital_albert_einstein_0_r').hide();
            $('#remissao_0_r').hide();
            $('#assistencia_em_viagem_nacional_0_r').hide();
            $('#assistencia_em_viagem_internacional_0_r').hide();
            $('#resgate_interhospitalar_0_r').hide();
            $('#cobertura_para_vacinas_0_r').hide();
            $('#coleta_domiciliar_para_exames_0_r').hide();
            $('#check_up_0_r').hide();
            $('#convenio_farmacia_0_r').hide();
            $('#concierge_0_r').hide();
            $('#escleroterapia_0_r').hide();
            $('#th_total_0').hide();
            $('#th_totalc_0').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano1_logo_th"]');
            let elementos2 = $('[id^="pdf_plano1_th"]');
            let elementos3 = $('[id^="pdf_plano1_th"]');
            let hospitais = $('[class^="hospitais_0"]');
            let laboratorios = $('[class^="laboratorios_0"]');

            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_0').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano1_logo_th').show();
            $('#pdf_plano1_th').show();
            $('#valor_unidade1_th').show();
            $('#0_18_th1').show();
            $('#19_23_th1').show();
            $('#24_28_th1').show();
            $('#29_33_th1').show();
            $('#34_38_th1').show();
            $('#39_43_th1').show();
            $('#44_48_th1').show();
            $('#49_53_th1').show();
            $('#54_58_th1').show();
            $('#59_mais_th1').show();
            $('#reembolso_consulta_0_r').show();
            $('#reembolso_terapias_0_r').show();
            $('#prazo_reembolso_0_r').show();
            $('#cobertura_internacional_0_r').show();
            $('#retaguarda_hospital_albert_einstein_0_r').show();
            $('#remissao_0_r').show();
            $('#assistencia_em_viagem_nacional_0_r').show();
            $('#assistencia_em_viagem_internacional_0_r').show();
            $('#resgate_interhospitalar_0_r').show();
            $('#cobertura_para_vacinas_0_r').show();
            $('#coleta_domiciliar_para_exames_0_r').show();
            $('#check_up_0_r').show();
            $('#convenio_farmacia_0_r').show();
            $('#concierge_0_r').show();
            $('#escleroterapia_0_r').show();
            $('#th_total_0').show();
            $('#th_totalc_0').show();
        }
        if(plano2 == ''){
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano2_logo_th"]');
            let elementos2 = $('[id^="pdf_plano2_th"]');
            let hospitais = $('[class^="hospitais_1"]');
            let laboratorios = $('[class^="laboratorios_1"]');

            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano2_logo_th').hide();
            $('#pdf_plano2_th').hide();
            $('#valor_unidade2_th').hide();
            $('#0_18_th2').hide();
            $('#19_23_th2').hide();
            $('#24_28_th2').hide();
            $('#29_33_th2').hide();
            $('#34_38_th2').hide();
            $('#39_43_th2').hide();
            $('#44_48_th2').hide();
            $('#49_53_th2').hide();
            $('#54_58_th2').hide();
            $('#59_mais_th2').hide();
            $('#reembolso_consulta_1_r').hide();
            $('#reembolso_terapias_1_r').hide();
            $('#prazo_reembolso_1_r').hide();
            $('#cobertura_internacional_1_r').hide();
            $('#retaguarda_hospital_albert_einstein_1_r').hide();
            $('#remissao_1_r').hide();
            $('#assistencia_em_viagem_nacional_1_r').hide();
            $('#assistencia_em_viagem_internacional_1_r').hide();
            $('#resgate_interhospitalar_1_r').hide();
            $('#cobertura_para_vacinas_1_r').hide();
            $('#coleta_domiciliar_para_exames_1_r').hide();
            $('#check_up_1_r').hide();
            $('#convenio_farmacia_1_r').hide();
            $('#concierge_1_r').hide();
            $('#escleroterapia_1_r').hide();
            $('#th_total_1').hide();
            $('#th_totalc_1').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano2_logo_th"]');
            let elementos2 = $('[id^="pdf_plano2_th"]');
            let elementos3 = $('[id^="pdf_plano2_nome"]');
            let hospitais = $('[class^="hospitais_1"]');
            let laboratorios = $('[class^="laboratorios_1"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_1').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano2_th').show();
            $('#valor_unidade2_th').show();
            $('#0_18_th2').show();
            $('#19_23_th2').show();
            $('#24_28_th2').show();
            $('#29_33_th2').show();
            $('#34_38_th2').show();
            $('#39_43_th2').show();
            $('#44_48_th2').show();
            $('#49_53_th2').show();
            $('#54_58_th2').show();
            $('#59_mais_th2').show();
            $('#pdf_plano2').html($('#plano_1').val());
            $('#reembolso_consulta_1_r').show();
            $('#reembolso_terapias_1_r').show();
            $('#prazo_reembolso_1_r').show();
            $('#cobertura_internacional_1_r').show();
            $('#retaguarda_hospital_albert_einstein_1_r').show();
            $('#remissao_1_r').show();
            $('#assistencia_em_viagem_nacional_1_r').show();
            $('#assistencia_em_viagem_internacional_1_r').show();
            $('#resgate_interhospitalar_1_r').show();
            $('#cobertura_para_vacinas_1_r').show();
            $('#coleta_domiciliar_para_exames_1_r').show();
            $('#check_up_1_r').show();
            $('#convenio_farmacia_1_r').show();
            $('#concierge_1_r').show();
            $('#escleroterapia_1_r').show();
            $('#th_total_1').show();
            $('#th_totalc_1').show();
        }
        if(plano3 == ''){
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano3_logo_th"]');
            let elementos2 = $('[id^="pdf_plano3_th"]');
            let hospitais = $('[class^="hospitais_2"]');
            let laboratorios = $('[class^="laboratorios_2"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano3_logo_th').hide();
            $('#pdf_plano3_th').hide();
            $('#valor_unidade3_th').hide();
            $('#0_18_th3').hide();
            $('#19_23_th3').hide();
            $('#24_28_th3').hide();
            $('#29_33_th3').hide();
            $('#34_38_th3').hide();
            $('#39_43_th3').hide();
            $('#44_48_th3').hide();
            $('#49_53_th3').hide();
            $('#54_58_th3').hide();
            $('#59_mais_th3').hide();
            $('#reembolso_consulta_2_r').hide();
            $('#reembolso_terapias_2_r').hide();
            $('#prazo_reembolso_2_r').hide();
            $('#cobertura_internacional_2_r').hide();
            $('#retaguarda_hospital_albert_einstein_2_r').hide();
            $('#remissao_2_r').hide();
            $('#assistencia_em_viagem_nacional_2_r').hide();
            $('#assistencia_em_viagem_internacional_2_r').hide();
            $('#resgate_interhospitalar_2_r').hide();
            $('#cobertura_para_vacinas_2_r').hide();
            $('#coleta_domiciliar_para_exames_2_r').hide();
            $('#check_up_2_r').hide();
            $('#convenio_farmacia_2_r').hide();
            $('#concierge_2_r').hide();
            $('#escleroterapia_2_r').hide();
            $('#th_total_2').hide();
            $('#th_totalc_2').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano3_logo_th"]');
            let elementos2 = $('[id^="pdf_plano3_th"]');
            let elementos3 = $('[id^="pdf_plano3_nome"]');
            let hospitais = $('[class^="hospitais_2"]');
            let laboratorios = $('[class^="laboratorios_2"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_2').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano3_logo_th').show();
            $('#pdf_plano3_th').show();
            $('#valor_unidade3_th').show();
            $('#0_18_th3').show();
            $('#19_23_th3').show();
            $('#24_28_th3').show();
            $('#29_33_th3').show();
            $('#34_38_th3').show();
            $('#39_43_th3').show();
            $('#44_48_th3').show();
            $('#49_53_th3').show();
            $('#54_58_th3').show();
            $('#59_mais_th3').show();
            $('#pdf_plano3').html($('#plano_2').val());
            $('#reembolso_consulta_2_r').show();
            $('#reembolso_terapias_2_r').show();
            $('#prazo_reembolso_2_r').show();
            $('#cobertura_internacional_2_r').show();
            $('#retaguarda_hospital_albert_einstein_2_r').show();
            $('#remissao_2_r').show();
            $('#assistencia_em_viagem_nacional_2_r').show();
            $('#assistencia_em_viagem_internacional_2_r').show();
            $('#resgate_interhospitalar_2_r').show();
            $('#cobertura_para_vacinas_2_r').show();
            $('#coleta_domiciliar_para_exames_2_r').show();
            $('#check_up_2_r').show();
            $('#convenio_farmacia_2_r').show();
            $('#concierge_2_r').show();
            $('#escleroterapia_2_r').show();
            $('#th_total_2').show();
            $('#th_totalc_2').show();
        }
        if(plano4 == '') {
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano4_logo_th"]');
            let elementos2 = $('[id^="pdf_plano4_th"]');
            let hospitais = $('[class^="hospitais_3"]');
            let laboratorios = $('[class^="laboratorios_3"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano4_logo_th').hide();
            $('#pdf_plano4_th').hide();
            $('#valor_unidade4_th').hide();
            $('#0_18_th4').hide();
            $('#19_23_th4').hide();
            $('#24_28_th4').hide();
            $('#29_33_th4').hide();
            $('#34_38_th4').hide();
            $('#39_43_th4').hide();
            $('#44_48_th4').hide();
            $('#49_53_th4').hide();
            $('#54_58_th4').hide();
            $('#59_mais_th4').hide();
            $('#reembolso_consulta_3_r').hide();
            $('#reembolso_terapias_3_r').hide();
            $('#prazo_reembolso_3_r').hide();
            $('#cobertura_internacional_3_r').hide();
            $('#retaguarda_hospital_albert_einstein_3_r').hide();
            $('#remissao_3_r').hide();
            $('#assistencia_em_viagem_nacional_3_r').hide();
            $('#assistencia_em_viagem_internacional_3_r').hide();
            $('#resgate_interhospitalar_3_r').hide();
            $('#cobertura_para_vacinas_3_r').hide();
            $('#coleta_domiciliar_para_exames_3_r').hide();
            $('#check_up_3_r').hide();
            $('#convenio_farmacia_3_r').hide();
            $('#concierge_3_r').hide();
            $('#escleroterapia_3_r').hide();
            $('#th_total_3').hide();
            $('#th_totalc_3').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano4_logo_th"]');
            let elementos2 = $('[id^="pdf_plano4_th"]');
            let elementos3 = $('[id^="pdf_plano4_nome"]');
            let hospitais = $('[class^="hospitais_3"]');
            let laboratorios = $('[class^="laboratorios_3"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_3').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano4_logo_th').show();
            $('#pdf_plano4_th').show();
            $('#valor_unidade4_th').show();
            $('#0_18_th4').show();
            $('#19_23_th4').show();
            $('#24_28_th4').show();
            $('#29_33_th4').show();
            $('#34_38_th4').show();
            $('#39_43_th4').show();
            $('#44_48_th4').show();
            $('#49_53_th4').show();
            $('#54_58_th4').show();
            $('#59_mais_th4').show();
            $('#pdf_plano4').html($('#plano_3').val());
            $('#reembolso_consulta_3_r').show();
            $('#reembolso_terapias_3_r').show();
            $('#prazo_reembolso_3_r').show();
            $('#cobertura_internacional_3_r').show();
            $('#retaguarda_hospital_albert_einstein_3_r').show();
            $('#remissao_3_r').show();
            $('#assistencia_em_viagem_nacional_3_r').show();
            $('#assistencia_em_viagem_internacional_3_r').show();
            $('#resgate_interhospitalar_3_r').show();
            $('#cobertura_para_vacinas_3_r').show();
            $('#coleta_domiciliar_para_exames_3_r').show();
            $('#check_up_3_r').show();
            $('#convenio_farmacia_3_r').show();
            $('#concierge_3_r').show();
            $('#escleroterapia_3_r').show();
            $('#th_total_3').show();
            $('#th_totalc_3').show();

        }
        if(plano5 == ''){
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano5_logo_th"]');
            let elementos2 = $('[id^="pdf_plano5_th"]');
            let hospitais = $('[class^="hospitais_4"]');
            let laboratorios = $('[class^="laboratorios_4"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano5_logo_th').hide();
            $('#pdf_plano5_th').hide();
            $('#valor_unidade5_th').hide();
            $('#0_18_th5').hide();
            $('#19_23_th5').hide();
            $('#24_28_th5').hide();
            $('#29_33_th5').hide();
            $('#34_38_th5').hide();
            $('#39_43_th5').hide();
            $('#44_48_th5').hide();
            $('#49_53_th5').hide();
            $('#54_58_th5').hide();
            $('#59_mais_th5').hide();
            $('#reembolso_consulta_4_r').hide();
            $('#reembolso_terapias_4_r').hide();
            $('#prazo_reembolso_4_r').hide();
            $('#cobertura_internacional_4_r').hide();
            $('#retaguarda_hospital_albert_einstein_4_r').hide();
            $('#remissao_4_r').hide();
            $('#assistencia_em_viagem_nacional_4_r').hide();
            $('#assistencia_em_viagem_internacional_4_r').hide();
            $('#resgate_interhospitalar_4_r').hide();
            $('#cobertura_para_vacinas_4_r').hide();
            $('#coleta_domiciliar_para_exames_4_r').hide();
            $('#check_up_4_r').hide();
            $('#convenio_farmacia_4_r').hide();
            $('#concierge_4_r').hide();
            $('#escleroterapia_4_r').hide();
            $('#th_total_4').hide();
            $('#th_totalc_4').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano5_logo_th"]');
            let elementos2 = $('[id^="pdf_plano5_th"]');
            let elementos3 = $('[id^="pdf_plano5_nome"]');
            let hospitais = $('[class^="hospitais_4"]');
            let laboratorios = $('[class^="laboratorios_4"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_4').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano5_logo_th').show();
            $('#pdf_plano5_th').show();
            $('#valor_unidade5_th').show();
            $('#0_18_th5').show();
            $('#19_23_th5').show();
            $('#24_28_th5').show();
            $('#29_33_th5').show();
            $('#34_38_th5').show();
            $('#39_43_th5').show();
            $('#44_48_th5').show();
            $('#49_53_th5').show();
            $('#54_58_th5').show();
            $('#59_mais_th5').show();
            $('#pdf_plano5').html($('#plano_4').val());
            $('#reembolso_consulta_4_r').show();
            $('#reembolso_terapias_4_r').show();
            $('#prazo_reembolso_4_r').show();
            $('#cobertura_internacional_4_r').show();
            $('#retaguarda_hospital_albert_einstein_4_r').show();
            $('#remissao_4_r').show();
            $('#assistencia_em_viagem_nacional_4_r').show();
            $('#assistencia_em_viagem_internacional_4_r').show();
            $('#resgate_interhospitalar_4_r').show();
            $('#cobertura_para_vacinas_4_r').show();
            $('#coleta_domiciliar_para_exames_4_r').show();
            $('#check_up_4_r').show();
            $('#convenio_farmacia_4_r').show();
            $('#concierge_4_r').show();
            $('#escleroterapia_4_r').show();
            $('#th_total_4').show();
            $('#th_totalc_4').show();
        }
        if(plano6 == ''){
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano6_logo_th"]');
            let elementos2 = $('[id^="pdf_plano6_th"]');
            let hospitais = $('[class^="hospitais_5"]');
            let laboratorios = $('[class^="laboratorios_5"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).hide();
            });
            elementos2.each(function() {
                $(this).hide();
            });
            hospitais.each(function() {
                $(this).hide();
            });
            laboratorios.each(function() {
                $(this).hide();
            });
            $('#pdf_plano6_logo_th').hide();
            $('#pdf_plano6_th').hide();
            $('#valor_unidade6_th').hide();
            $('#0_18_th6').hide();
            $('#19_23_th6').hide();
            $('#24_28_th6').hide();
            $('#29_33_th6').hide();
            $('#34_38_th6').hide();
            $('#39_43_th6').hide();
            $('#44_48_th6').hide();
            $('#49_53_th6').hide();
            $('#54_58_th6').hide();
            $('#59_mais_th6').hide();
            $('#reembolso_consulta_5_r').hide();
            $('#reembolso_terapias_5_r').hide();
            $('#prazo_reembolso_5_r').hide();
            $('#cobertura_internacional_5_r').hide();
            $('#retaguarda_hospital_albert_einstein_5_r').hide();
            $('#remissao_5_r').hide();
            $('#assistencia_em_viagem_nacional_5_r').hide();
            $('#assistencia_em_viagem_internacional_5_r').hide();
            $('#resgate_interhospitalar_5_r').hide();
            $('#cobertura_para_vacinas_5_r').hide();
            $('#coleta_domiciliar_para_exames_5_r').hide();
            $('#check_up_5_r').hide();
            $('#convenio_farmacia_5_r').hide();
            $('#concierge_5_r').hide();
            $('#escleroterapia_5_r').hide();
            $('#th_total_5').hide();
            $('#th_totalc_5').hide();
        }
        else{
            // Obtém todos os elementos com IDs semelhantes
            let elementos = $('[id^="pdf_plano6_logo_th"]');
            let elementos2 = $('[id^="pdf_plano6_th"]');
            let elementos3 = $('[id^="pdf_plano6_nome"]');
            let hospitais = $('[class^="hospitais_5"]');
            let laboratorios = $('[class^="laboratorios_5"]');
            // Loop pelos elementos e oculta cada um deles
            elementos.each(function() {
                $(this).show();
            });
            elementos2.each(function() {
                $(this).show();
            });
            elementos3.each(function() {
                $(this).html($('#plano_5').val());
            });
            hospitais.each(function() {
                $(this).show();
            });
            laboratorios.each(function() {
                $(this).show();
            });
            $('#pdf_plano6_logo_th').show();
            $('#pdf_plano6_th').show();
            $('#valor_unidade6_th').show();
            $('#0_18_th6').show();
            $('#19_23_th6').show();
            $('#24_28_th6').show();
            $('#29_33_th6').show();
            $('#34_38_th6').show();
            $('#39_43_th6').show();
            $('#44_48_th6').show();
            $('#49_53_th6').show();
            $('#54_58_th6').show();
            $('#59_mais_th6').show();
            $('#pdf_plano6').html($('#plano_5').val());
            $('#reembolso_consulta_5_r').show();
            $('#reembolso_terapias_5_r').show();
            $('#prazo_reembolso_5_r').show();
            $('#cobertura_internacional_5_r').show();
            $('#retaguarda_hospital_albert_einstein_5_r').show();
            $('#remissao_5_r').show();
            $('#assistencia_em_viagem_nacional_5_r').show();
            $('#assistencia_em_viagem_internacional_5_r').show();
            $('#resgate_interhospitalar_5_r').show();
            $('#cobertura_para_vacinas_5_r').show();
            $('#coleta_domiciliar_para_exames_5_r').show();
            $('#check_up_5_r').show();
            $('#convenio_farmacia_5_r').show();
            $('#concierge_5_r').show();
            $('#escleroterapia_5_r').show();
            $('#th_total_5').show();
            $('#th_totalc_5').show();
        }

        for(let i = 0; i < 6; i++){
           for(let j = 0 ; j < 10; j++){
                $(`#pdf_valor_${i}_${j}`).html('R$' + $(`#unidade_${i}_${j}`).val());
                $(`#pdf_valorc_${i}_${j}`).html('R$' + $(`#unidadec_${i}_${j}`).val());
               $(`#pdf_vidas_${i}_${j}`).html($(`#idade_${i}_${j}`).val());
           }
        }
        
        const faixasIdades = [
            { inicio: 0, fim: 18 },
            { inicio: 19, fim: 23 },
            { inicio: 24, fim: 28 },
            { inicio: 29, fim: 33 },
            { inicio: 34, fim: 38 },
            { inicio: 39, fim: 43 },
            { inicio: 44, fim: 48 },
            { inicio: 49, fim: 53 },
            { inicio: 54, fim: 58 },
            { inicio: 59, fim: 'mais' }  // Usando Infinity para a faixa final
        ];

        for (let j = 0; j < 10; j++) {
            let todasAsCelulasIguaisAZero = true;
            let faixa = faixasIdades[j];
            let colunaSelector = `#${faixa.inicio}_${faixa.fim}_coluna`;

            for (let i = 0; i < 6; i++) {
                let coluna = $(`#pdf_vidas_${i}_${j}`).html();
                
                if (coluna != 0) {
                    todasAsCelulasIguaisAZero = false;
                    break;
                }
            }


            if (todasAsCelulasIguaisAZero) {
                $(colunaSelector).hide();
            }else{
                $(colunaSelector).show();
            }
        }
        
    });

    // Gerar PDF
    $('#cotar').click(function() {
        var HTML_Width = $("#content-img1").width();
        var HTML_Height = $("#content-img1").height();
        var top_left_margin = 0;
        var PDF_Width = HTML_Width;
        var PDF_Height = $("#content-img1").height();
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 2;

        html2canvas($("#content-img1")[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("cotacao.pdf");
        });
    });

    $('#comparar').click(function() {
        var contentWidth = $("#content-img1").width();
        var contentHeight = $("#content-img1").height();
    
        var PDF_Width = 595.28;
        var PDF_Height = 841.89;
    
        var scale = Math.min(PDF_Width / contentWidth, 1);
        var scaledWidth = contentWidth * scale;
        var scaledHeight = contentHeight * scale;
    
        var horizontalMargin = (PDF_Width - scaledWidth) / 2;
        var verticalMargin = 0; // 
    
        html2canvas($("#content-img1")[0], {scale: 2}).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
    
            pdf.addImage(imgData, 'JPG', horizontalMargin, verticalMargin, scaledWidth, scaledHeight);

            var totalPDFPages = Math.ceil(scaledHeight / PDF_Height);
    
            for (var i = 1; i < totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', horizontalMargin, -(PDF_Height * i) + verticalMargin, scaledWidth, scaledHeight);
            }
            pdf.save("comparativo.pdf");
        });
    });
    

    $(document).ready(function() {
        adjustTableCellSizes();
    });

    $(window).on('resize', function() {
        adjustTableCellSizes();
    });

    function adjustTableCellSizes() {
        var firstCellWidth = $('.fixed-width').get(0).offsetWidth;
        var tableWidth = $('table').width();
        var remainingWidth = tableWidth - firstCellWidth;

        var visibleCells = $('th:not(.fixed-width):visible');
        var cellCount = visibleCells.length;

        var cellWidth = remainingWidth / cellCount;

        visibleCells.css('width', cellWidth + 'px');
    }

})(jQuery);