(function ($) {
  for (let i = 0; i < 10; i++) {
    $(`#preco_unidade_0_${i}`)
      .on('input', function () {
        const preco_unidade_0_i = parseFloat($(this).html());
        $(`#vidas_total_amount_0_${i}`).val(
          parseFloat(
            preco_unidade_0_i * parseFloat($(`#vidas_qtd_0_${i}`).val() || 0),
          ).toFixed(2),
        );
        $(`#preco_unidade_0_${i}r`).html(
          parseFloat(preco_unidade_0_i).toFixed(2).replace('.', ','),
        );
      })
      .change();

    $(`#vidas_qtd_0_${i}`)
      .change(function () {
        const preco_unidade_0_i = parseFloat($(`#preco_unidade_0_${i}`).html());
        $(`#vidas_total_amount_0_${i}`).val(
          parseFloat(
            preco_unidade_0_i * parseFloat($(this).val() || 0),
          ).toFixed(2),
        );
        $(`#preco_unidade_0_${i}r`).html(
          parseFloat(preco_unidade_0_i).toFixed(2).replace('.', ','),
        );
      })
      .change();
  }

  for (let i = 0; i < 10; i++) {
    $(`#preco_unidade_1_${i}`)
      .on('input', function () {
        const preco_unidade_1_i = parseFloat($(this).html());
        $(`#vidas_total_amount_1_${i}`).val(
          parseFloat(
            preco_unidade_1_i * parseFloat($(`#vidas_qtd_1_${i}`).val() || 0),
          ).toFixed(2),
        );
        $(`#preco_unidade_1_${i}r`).html(
          parseFloat(preco_unidade_1_i).toFixed(2).replace('.', ','),
        );
      })
      .change();

    $(`#vidas_qtd_1_${i}`)
      .change(function () {
        const preco_unidade_1_i = parseFloat($(`#preco_unidade_1_${i}`).html());
        $(`#vidas_total_amount_1_${i}`).val(
          parseFloat(
            preco_unidade_1_i * parseFloat($(this).val() || 0),
          ).toFixed(2),
        );
      })
      .change();
  }

  for (let i = 0; i < 10; i++) {
    $(`#preco_unidade_2_${i}`)
      .on('input', function () {
        const preco_unidade_2_i = parseFloat($(this).html());
        $(`#vidas_total_amount_2_${i}`).val(
          parseFloat(
            preco_unidade_2_i * parseFloat($(`#vidas_qtd_2_${i}`).val() || 0),
          ).toFixed(2),
        );
        $(`#preco_unidade_2_${i}r`).html(
          parseFloat(preco_unidade_2_i).toFixed(2).replace('.', ','),
        );
      })
      .change();

    $(`#vidas_qtd_2_${i}`)
      .change(function () {
        const preco_unidade_2_i = parseFloat($(`#preco_unidade_2_${i}`).html());
        $(`#vidas_total_amount_2_${i}`).val(
          parseFloat(
            preco_unidade_2_i * parseFloat($(this).val() || 0),
          ).toFixed(2),
        );
      })
      .change();
  }

  for (let i = 0; i < 10; i++) {
    $(`#preco_unidade_3_${i}`)
      .on('input', function () {
        const preco_unidade_3_i = parseFloat($(this).html());
        $(`#vidas_total_amount_3_${i}`).val(
          parseFloat(
            preco_unidade_3_i * parseFloat($(`#vidas_qtd_3_${i}`).val() || 0),
          ).toFixed(2),
        );
        $(`#preco_unidade_3_${i}r`).html(
          parseFloat(preco_unidade_3_i).toFixed(2).replace('.', ','),
        );
      })
      .change();
    $(`#vidas_qtd_3_${i}`)
      .change(function () {
        const preco_unidade_3_i = parseFloat($(`#preco_unidade_3_${i}`).html());
        $(`#vidas_total_amount_3_${i}`).val(
          parseFloat(
            preco_unidade_3_i * parseFloat($(this).val() || 0),
          ).toFixed(2),
        );
      })
      .change();
  }

  for (let j = 0; j < 6; j++) {
    for (let i = 0; i < 10; i++) {
      $(`#idade_${j}_${i}`).change(function () {
        atualizarTotal();
      });
    }
  }

  function atualizarTotal() {
    const totalPreco = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
    const totalPrecoIof = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
    const totalPrecoC = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
    const totalPrecoCIof = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
    const totalVidas = [0, 0, 0, 0, 0, 0];

    let planos = 4;

    for (let i = 0; i < planos; i++) {
      for (let j = 0; j < 10; j++) {
        let idadeValue = $(`#idade_${i}_${j}`).val();
        let unidadeValue = $(`#unidade_${i}_${j}`).val();
        let unidadecValue = $(`#unidadec_${i}_${j}`).val();

        // Verifica se os valores não são undefined antes de chamar replace
        let vidas = idadeValue ? idadeValue.replace(',', '.') : '0';
        let unidade = unidadeValue ? unidadeValue.replace(',', '.') : '0';
        let unidadec = unidadecValue ? unidadecValue.replace(',', '.') : '0';

        // Converte para float e verifica se não é NaN
        let vidasFloat = parseFloat(vidas) || 0;
        let unidadeFloat = parseFloat(unidade) || 0;
        let unidadecFloat = parseFloat(unidadec) || 0;

        totalPreco[i] += unidadeFloat * vidasFloat;
        totalPrecoC[i] += unidadecFloat * vidasFloat;
        totalVidas[i] += vidasFloat;

        totalPrecoIof[i] = totalPreco[i] * 0.0238 + totalPreco[i];
        totalPrecoCIof[i] = totalPrecoC[i] * 0.0238 + totalPrecoC[i];
      }

      // Formata os totais como moeda brasileira
      let totalPrecoFormatted = totalPreco[i].toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
      });
      let totalPrecoCFormatted = totalPrecoC[i].toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
      });
      let totalPrecoIofFormatted = totalPrecoIof[i].toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
      });
      let totalPrecoCIofFormatted = totalPrecoCIof[i].toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
      });

      $(`#total_${i}`).text(totalPrecoFormatted);
      $(`#total_vida_${i}`).text(totalVidas[i]);

      $(`#totalc_${i}`).text(totalPrecoCFormatted);
      $(`#totalc_vida_${i}`).text(totalVidas[i]);

      $(`#pdf_total_${i}`).text(totalPrecoFormatted);
      $(`#pdf_totalc_${i}`).text(totalPrecoCFormatted);

      $(`#pdf_total_vida_${i}`).text(totalVidas[i]);
      $(`#pdf_totalc_vida_${i}`).text(totalVidas[i]);

      $(`#pdf_total_iof_${i}`).text(totalPrecoIofFormatted);
      $(`#pdf_totalc_iof_${i}`).text(totalPrecoCIofFormatted);
    }
  }

  // Gera Pré Visualização
  $('#previsualizar').click(function () {
    const obs = [];
    const qnt = $('.col-4.bradesco.cotando').length;
    for (let i = 0; i < qnt; i++) {
      obs[i] = $('#obs' + i).val();
      $(`#obsr${i}`).text(obs[i]);
    }

    const vidas = [];
    const valor = [];
    const totalVidas = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];
    const totalValor = [0.0, 0.0, 0.0, 0.0, 0.0, 0.0];

    let qntVidas = $('.col-4.bradesco.cotando').length;
    let totalIof = 0.0;
    for (let i = 0; i < qntVidas; i++) {
      for (let j = 0; j < 10; j++) {
        vidas[(i, j)] = $(`#vidas_qtd_${i}_${j}`).val().replace(',', '.');
        valor[(i, j)] = $(`#vidas_total_amount_${i}_${j}`)
          .val()
          .replace(',', '.');
        console.log(valor[(i, j)]);
        totalVidas[i] += parseFloat(vidas[(i, j)]);
        totalValor[i] += parseFloat(valor[(i, j)]);

        $(`#vidas_qtd_${i}_${j}r`).text(vidas[(i, j)]);
        $(`#valor_${i}_${j}r`).text(
          parseFloat(valor[(i, j)])
            .toFixed(2)
            .replace('.', ','),
        );
      }

      $(`#vidas_total_${i}_r`).text(totalVidas[i]);
      $(`#valor_total_${i}_r`).text(
        totalValor[i]
          .toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          })
          .replace('.', ','),
      );

      totalIof += parseFloat(totalValor[i]);

      $('#sem-iof').text(
        totalIof
          .toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          })
          .replace('.', ','),
      );
      $('#com-iof').text(
        (totalIof * 1.0238)
          .toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
          })
          .replace('.', ','),
      );
    }
  });

  // Gera Pré Visualização 2
  $('#previsualizar2').click(function () {
    adjustTableCellSizes();
    let plano1 = document.getElementById('rede_0').value;
    let plano2 = document.getElementById('rede_1').value;
    let plano3 = document.getElementById('rede_2').value;
    let plano4 = document.getElementById('rede_3').value;
    if (plano1 == '') {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano1_logo_th"]');
      let elementos2 = $('[id^="pdf_plano1_th"]');
      let copay = $('[id^="pdf_copay0_th"]');
      let hospitais = $('[class^="hospitais_0"]');
      let laboratorios = $('[class^="laboratorios_0"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).hide();
      });
      elementos2.each(function () {
        $(this).hide();
      });
      copay.each(function () {
        $(this).hide();
      });
      hospitais.each(function () {
        $(this).hide();
      });
      laboratorios.each(function () {
        $(this).hide();
      });
      copart.each(function () {
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
      $('#copart_0_r').hide();
      $('#copart_cirurgias_internacoes_0_r').hide();
      $('#valor_coparticipacao_0_r').hide();
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
      $('#servico_online_0_r').hide();
      $('#programas_de_promocao_a_saude_0_r').hide();
      $('#telemedicina_0_r').hide();
      $('#th_total_0').hide();
      $('#th_totalc_0').hide();
      $('#th_total_iof_0').hide();
      $('#th_totalc_iof_0').hide();
    } else {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano1_logo_th"]');
      let elementos2 = $('[id^="pdf_plano1_th"]');
      let elementos3 = $('[id^="pdf_plano1_nome"]');
      let copay = $('[id^="pdf_copay0_th"]');
      let hospitais = $('[class^="hospitais_0"]');
      let laboratorios = $('[class^="laboratorios_0"]');
      let copart = $('[id^="pdf_copart_th"]');

      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).show();
      });
      elementos2.each(function () {
        $(this).show();
      });
      elementos3.each(function () {
        $(this).html($('#plano_0').val());
      });
      copay.each(function () {
        $(this).show();
      });
      hospitais.each(function () {
        $(this).show();
      });
      laboratorios.each(function () {
        $(this).show();
      });
      copart.each(function () {
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
      $('#copart_0_r').show();
      $('#copart_cirurgias_internacoes_0_r').show();
      $('#valor_coparticipacao_0_r').show();
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
      $('#servico_online_0_r').show();
      $('#programas_de_promocao_a_saude_0_r').show();
      $('#telemedicina_0_r').show();
      $('#th_total_0').show();
      $('#th_totalc_0').show();
      $('#th_total_iof_0').show();
      $('#th_totalc_iof_0').show();
    }
    if (plano2 == '') {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano2_logo_th"]');
      let elementos2 = $('[id^="pdf_plano2_th"]');
      let copay = $('[id^="pdf_copay1_th"]');
      let hospitais = $('[class^="hospitais_1"]');
      let laboratorios = $('[class^="laboratorios_1"]');
      let copart = $('[id^="pdf_copart_th"]');

      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).hide();
      });
      elementos2.each(function () {
        $(this).hide();
      });
      copay.each(function () {
        $(this).hide();
      });
      hospitais.each(function () {
        $(this).hide();
      });
      laboratorios.each(function () {
        $(this).hide();
      });
      copart.each(function () {
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
      $('#copart_1_r').hide();
      $('#copart_cirurgias_internacoes_1_r').hide();
      $('#valor_coparticipacao_1_r').hide();
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
      $('#servico_online_1_r').hide();
      $('#programas_de_promocao_a_saude_1_r').hide();
      $('#telemedicina_1_r').hide();
      $('#th_total_1').hide();
      $('#th_totalc_1').hide();
      $('#th_total_iof_1').hide();
      $('#th_totalc_iof_1').hide();
    } else {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano2_logo_th"]');
      let elementos2 = $('[id^="pdf_plano2_th"]');
      let elementos3 = $('[id^="pdf_plano2_nome"]');
      let copay = $('[id^="pdf_copay1_th"]');
      let hospitais = $('[class^="hospitais_1"]');
      let laboratorios = $('[class^="laboratorios_1"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).show();
      });
      elementos2.each(function () {
        $(this).show();
      });
      elementos3.each(function () {
        $(this).html($('#plano_1').val());
      });
      copay.each(function () {
        $(this).show();
      });
      hospitais.each(function () {
        $(this).show();
      });
      laboratorios.each(function () {
        $(this).show();
      });
      copart.each(function () {
        $(this).hide();
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
      $('#copart_1_r').show();
      $('#copart_cirurgias_internacoes_1_r').show();
      $('#valor_coparticipacao_1_r').show();
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
      $('#servico_online_1_r').show();
      $('#programas_de_promocao_a_saude_1_r').show();
      $('#telemedicina_1_r').show();
      $('#th_total_1').show();
      $('#th_totalc_1').show();
      $('#th_total_iof_1').show();
      $('#th_totalc_iof_1').show();
    }
    if (plano3 == '') {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano3_logo_th"]');
      let elementos2 = $('[id^="pdf_plano3_th"]');
      let copay = $('[id^="pdf_copay2_th"]');
      let hospitais = $('[class^="hospitais_2"]');
      let laboratorios = $('[class^="laboratorios_2"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).hide();
      });
      elementos2.each(function () {
        $(this).hide();
      });
      copay.each(function () {
        $(this).hide();
      });
      hospitais.each(function () {
        $(this).hide();
      });
      laboratorios.each(function () {
        $(this).hide();
      });
      copart.each(function () {
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
      $('#copart_2_r').hide();
      $('#copart_cirurgias_internacoes_2_r').hide();
      $('#valor_coparticipacao_2_r').hide();
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
      $('#servico_online_2_r').hide();
      $('#programas_de_promocao_a_saude_2_r').hide();
      $('#telemedicina_2_r').hide();
      $('#th_total_2').hide();
      $('#th_totalc_2').hide();
      $('#th_total_iof_2').hide();
      $('#th_totalc_iof_2').hide();
    } else {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano3_logo_th"]');
      let elementos2 = $('[id^="pdf_plano3_th"]');
      let elementos3 = $('[id^="pdf_plano3_nome"]');
      let copay = $('[id^="pdf_copay2_th"]');
      let hospitais = $('[class^="hospitais_2"]');
      let laboratorios = $('[class^="laboratorios_2"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).show();
      });
      elementos2.each(function () {
        $(this).show();
      });
      elementos3.each(function () {
        $(this).html($('#plano_2').val());
      });
      copay.each(function () {
        $(this).show();
      });
      hospitais.each(function () {
        $(this).show();
      });
      laboratorios.each(function () {
        $(this).show();
      });
      copart.each(function () {
        $(this).hide();
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
      $('#copart_2_r').show();
      $('#copart_cirurgias_internacoes_2_r').show();
      $('#valor_coparticipacao_2_r').show();
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
      $('#servico_online_2_r').show();
      $('#programas_de_promocao_a_saude_2_r').show();
      $('#telemedicina_2_r').show();
      $('#th_total_2').show();
      $('#th_totalc_2').show();
      $('#th_total_iof_2').show();
      $('#th_totalc_iof_2').show();
    }
    if (plano4 == '') {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano4_logo_th"]');
      let elementos2 = $('[id^="pdf_plano4_th"]');
      let copay = $('[id^="pdf_copay3_th"]');
      let hospitais = $('[class^="hospitais_3"]');
      let laboratorios = $('[class^="laboratorios_3"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).hide();
      });
      elementos2.each(function () {
        $(this).hide();
      });
      copay.each(function () {
        $(this).hide();
      });
      hospitais.each(function () {
        $(this).hide();
      });
      laboratorios.each(function () {
        $(this).hide();
      });
      copart.each(function () {
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
      $('#copart_3_r').hide();
      $('#copart_cirurgias_internacoes_3_r').hide();
      $('#valor_coparticipacao_3_r').hide();
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
      $('#servico_online_3_r').hide();
      $('#programas_de_promocao_a_saude_3_r').hide();
      $('#telemedicina_3_r').hide();
      $('#th_total_3').hide();
      $('#th_totalc_3').hide();
      $('#th_total_iof_3').hide();
      $('#th_totalc_iof_3').hide();
    } else {
      // Obtém todos os elementos com IDs semelhantes
      let elementos = $('[id^="pdf_plano4_logo_th"]');
      let elementos2 = $('[id^="pdf_plano4_th"]');
      let elementos3 = $('[id^="pdf_plano4_nome"]');
      let copay = $('[id^="pdf_copay3_th"]');
      let hospitais = $('[class^="hospitais_3"]');
      let laboratorios = $('[class^="laboratorios_3"]');
      let copart = $('[id^="pdf_copart_th"]');
      // Loop pelos elementos e oculta cada um deles
      elementos.each(function () {
        $(this).show();
      });
      elementos2.each(function () {
        $(this).show();
      });
      elementos3.each(function () {
        $(this).html($('#plano_3').val());
      });
      copay.each(function () {
        $(this).show();
      });
      hospitais.each(function () {
        $(this).show();
      });
      laboratorios.each(function () {
        $(this).show();
      });
      copart.each(function () {
        $(this).hide();
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
      $('#copart_3_r').show();
      $('#copart_cirurgias_internacoes_3_r').show();
      $('#valor_coparticipacao_3_r').show();
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
      $('#servico_online_3_r').show();
      $('#programas_de_promocao_a_saude_3_r').show();
      $('#telemedicina_3_r').show();
      $('#th_total_3').show();
      $('#th_totalc_3').show();
      $('#th_total_iof_3').show();
      $('#th_totalc_iof_3').show();
    }

    for (let i = 0; i < 6; i++) {
      for (let j = 0; j < 10; j++) {
        let unidadeValue = $(`#unidade_${i}_${j}`).val();
        let unidadecValue = $(`#unidadec_${i}_${j}`).val();
        let idadeValue = $(`#idade_${i}_${j}`).val();

        // Verifica se os valores são válidos antes de atualizar o HTML
        if (unidadeValue) {
          let unidadeValFormatted = parseFloat(
            unidadeValue.replace(',', '.'),
          ).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
          $(`#pdf_valor_${i}_${j}`).html(unidadeValFormatted);
        } else {
          $(`#pdf_valor_${i}_${j}`).html('');
        }

        if (unidadecValue) {
          let unidadecValFormatted = parseFloat(
            unidadecValue.replace(',', '.'),
          ).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
          $(`#pdf_valorc_${i}_${j}`).html(unidadecValFormatted);
        } else {
          $(`#pdf_valorc_${i}_${j}`).html('');
        }

        if (idadeValue) {
          $(`#pdf_vidas_${i}_${j}`).html(idadeValue);
        } else {
          $(`#pdf_vidas_${i}_${j}`).html('');
        }
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
      { inicio: 59, fim: 'mais' },
    ];

    for (let j = 0; j < 10; j++) {
      let todasAsCelulasIguaisAZero = true;
      let faixa = faixasIdades[j];
      let colunaSelector = `#${faixa.inicio}_${faixa.fim}_coluna`;

      for (let i = 0; i < 6; i++) {
        let coluna = $(`#idade_${i}_${j}`).val();

        if (coluna && parseFloat(coluna.replace(',', '.')) !== 0) {
          todasAsCelulasIguaisAZero = false;
          break;
        }
      }

      if (todasAsCelulasIguaisAZero) {
        $(colunaSelector).hide();
      } else {
        $(colunaSelector).show();
      }
    }

    for (let i = 0; i < 6; i++) {
      let copart = document.getElementById('coparticipacao_' + i);
      let pdfCopart = document.getElementById('copart_' + i + '_r');

      if (copart && pdfCopart) {
        pdfCopart.innerText = copart.value;
      } else {
        console.warn('Elemento não encontrado: ', i);
      }
    }

    for (let i = 0; i < 6; i++) {
      let copart_cirurgia_internacao = document.getElementById(
        'coparticipacao_cirurgia_internacao' + i,
      );
      let pdfCopart_cirurgia_internacao = document.getElementById(
        'copart_cirurgias_internacoes_' + i + '_r',
      );

      if (copart_cirurgia_internacao && pdfCopart_cirurgia_internacao) {
        pdfCopart_cirurgia_internacao.innerText =
          copart_cirurgia_internacao.value;
      } else {
        console.warn('Elemento não encontrado: ', i);
      }
    }

    for (let i = 0; i < 6; i++) {
      let valor_copart = document.getElementById('valor_coparticipacao_' + i);
      let pdf_valorCopart = document.getElementById(
        'valor_coparticipacao_' + i + '_r',
      );

      if (valor_copart && pdf_valorCopart) {
        // Garantir que o valor seja numérico
        let valor = parseFloat(valor_copart.value.replace(',', '.'));
        if (!isNaN(valor)) {
          // Formatar o valor como moeda em reais
          let valorPercentual = valor.toFixed(2) + '%';
          pdf_valorCopart.innerText = valorPercentual;
        } else {
          pdf_valorCopart.innerText = '-';
        }
      } else {
        console.warn('Elemento não encontrado: ', i);
      }
    }
  });

  // Gerar PDF
  $('#cotar').click(function () {
    var HTML_Width = $('#content-img1').width();
    var HTML_Height = $('#content-img1').height();
    var top_left_margin = 0;
    var PDF_Width = HTML_Width;
    var PDF_Height = $('#content-img1').height();
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 2;

    html2canvas($('#content-img1')[0]).then(function (canvas) {
      var imgData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
      pdf.addImage(
        imgData,
        'JPG',
        top_left_margin,
        top_left_margin,
        canvas_image_width,
        canvas_image_height,
      );
      for (var i = 1; i <= totalPDFPages; i++) {
        pdf.addPage(PDF_Width, PDF_Height);
        pdf.addImage(
          imgData,
          'JPG',
          top_left_margin,
          -(PDF_Height * i) + top_left_margin * 4,
          canvas_image_width,
          canvas_image_height,
        );
      }
      pdf.save('cotacao.pdf');
    });
  });

  $('#comparar').click(function () {
    var contentWidth = $('#content-img1').width();
    var contentHeight = $('#content-img1').height();

    var PDF_Width = 595.28;
    var PDF_Height = 841.89;

    var scale = Math.min(PDF_Width / contentWidth, 1);
    var scaledWidth = contentWidth * scale;
    var scaledHeight = contentHeight * scale;

    var horizontalMargin = (PDF_Width - scaledWidth) / 2;
    var verticalMargin = 0; //

    html2canvas($('#content-img1')[0], { scale: 2 }).then(function (canvas) {
      var imgData = canvas.toDataURL('image/jpeg', 1.0);
      var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);

      pdf.addImage(
        imgData,
        'JPG',
        horizontalMargin,
        verticalMargin,
        scaledWidth,
        scaledHeight,
      );

      var totalPDFPages = Math.ceil(scaledHeight / PDF_Height);

      for (var i = 1; i < totalPDFPages; i++) {
        pdf.addPage(PDF_Width, PDF_Height);
        pdf.addImage(
          imgData,
          'JPG',
          horizontalMargin,
          -(PDF_Height * i) + verticalMargin,
          scaledWidth,
          scaledHeight,
        );
      }
      pdf.save('comparativo.pdf');
    });
  });

  $(document).ready(function () {
    adjustTableCellSizes();
  });

  $(window).on('resize', function () {
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
