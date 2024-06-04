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
    'escleroterapia' => 'Escleroterapia',
    'servico_online' => 'Serviço Online',
    'programas_de_promocao_a_saude' => 'Programas de Promoção à Saúde',
    'telemedicina' => 'Telemedicina'
);

$hospitais = file_get_contents( get_template_directory() . '/dados/comparativo-hospitais.json');
$jsonHospitais = json_decode($hospitais);

$arquivoHospitais = file_get_contents( get_template_directory() . '/dados/comparativo-laboratorios.json');
$jsonLaboratorios = json_decode($arquivoHospitais);

$numPlanos = 6;

?>

<div class="comparativo-estilo">
    <div class="d-flex justify-content-around align-items-center">
        <div class="logo-pdf mb-4">
            <?= '<img src="'.get_template_directory_uri().'/img/logo-pride.png" height="50" alt="Logo">';?>
        </div>
        <div class="titulo-comparativo-pdf mb-4">
            <h1>comparativo de planos de saúde</h1>
            <span><?= date_i18n('d \d\e F \d\e Y')?>.</span>
        </div>
    </div>
    <table class="table comparativo-pdf">
        <thead class="comparativo-pdf">
            <tr>
                <td class="fixed-width"><h2 style="display: flex; align-items: center; justify-content: center; height: 100px;">OPERADORAS:</h2></td>
                <td  id="pdf_plano1_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano0_logo"></p></td>
                <td  id="pdf_plano2_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano1_logo"></p></td>
                <td  id="pdf_plano3_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano2_logo"></p></td>
                <td  id="pdf_plano4_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano3_logo"></p></td>
                <td  id="pdf_plano5_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano4_logo"></p></td>
                <td  id="pdf_plano6_logo_th" ><p style="display: flex; align-items: center; justify-content: center; height: 100px;" id="pdf_plano5_logo"></p></td>
            </tr>
            <tr class="plano-pdf bg-cinza">
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

            <!-- Faixas etárias no preview/PDF -->
            <tr class="cor-fundo">
                <th class="fixed-width faixa-etaria">
                    Faixa Etaria
                </th>
                <th id="valor_unidade1_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
                <th id="valor_unidade2_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
                <th id="valor_unidade3_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
                <th  id="valor_unidade4_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
                <th  id="valor_unidade5_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
                <th id="valor_unidade6_th">
                    <div class="vidas_unidades_pdf">
                        <div>Vidas</div>
                        <div>Valor (Un)</div>
                    </div>
                </th>
            </tr>

            <!-- Faixas etárias + vidas -->

            <tr class="cor-fundo" id="0_18_coluna">
                <td>
                    <p>0 - 18 anos</p>
                </td>
                <td class="th1_0_18" id="0_18_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_0"></p></div>
                        <div><p id="pdf_valor_0_0"></p></div>
                    </div>
                </td>
                <td class="th2_0_18" id="0_18_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_0"></p></div>
                        <div><p id="pdf_valor_1_0"></div>
                    </div>
                </td>
                <td class="th3_0_18" id="0_18_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_0"></p></div>
                        <div><p id="pdf_valor_2_0"></p>
                       </div>
                    </div>
                </td>
                <td class="th4_0_18" id="0_18_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_0"></p></div>
                        <div><p id="pdf_valor_3_0"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_0_18" id="0_18_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_0"></p></div>
                        <div><p id="pdf_valor_4_0"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_0_18" id="0_18_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_0"></p></div>
                        <div><p id="pdf_valor_5_0"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="19_23_coluna">
                <td>
                    <p>19 - 23 anos</p>
                </td>
                <td class="th1_19_23" id="19_23_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_1"></p></div>
                        <div><p id="pdf_valor_0_1"></p>
                       </div>
                    </div>
                </td>
                <td class="th2_19_23" id="19_23_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_1"></p></div>
                        <div><p id="pdf_valor_1_1"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_19_23" id="19_23_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_1"></p></div>
                        <div><p id="pdf_valor_2_1"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_19_23" id="19_23_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_1"></p></div>
                        <div><p id="pdf_valor_3_1"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_19_23" id="19_23_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_1"></p></div>
                        <div><p id="pdf_valor_4_1"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_19_23" id="19_23_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_1"></p></div>
                        <div><p id="pdf_valor_5_1"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="24_28_coluna">
                <td>
                    <p>24 - 28 anos</p>
                </td>
                <td class="th1_24_28" id="24_28_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_2"></p></div>
                        <div><p id="pdf_valor_0_2"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_24_28" id="24_28_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_2"></p></div>
                        <div><p id="pdf_valor_1_2"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_24_28" id="24_28_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_2"></p></div>
                        <div><p id="pdf_valor_2_2"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_24_28" id="24_28_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_2"></p></div>
                        <div><p id="pdf_valor_3_2"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_24_28" id="24_28_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_2"></p></div>
                        <div><p id="pdf_valor_4_2"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_24_28" id="24_28_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_2"></p></div>
                        <div><p id="pdf_valor_5_2"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="29_33_coluna">
                <td>
                    <p>29 - 33 anos</p>
                </td>
                <td class="th1_29_33" id="29_33_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_3"></p></div>
                        <div><p id="pdf_valor_0_3"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_29_33" id="29_33_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_3"></p></div>
                        <div><p id="pdf_valor_1_3"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_29_33" id="29_33_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_3"></p></div>
                        <div><p id="pdf_valor_2_3"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_29_33" id="29_33_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_3"></p></div>
                        <div><p id="pdf_valor_3_3"></p>
                       </p></div>
                    </div>
                </td>
                <td class="th5_29_33" id="29_33_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_3"></p></div>
                        <div><p id="pdf_valor_4_3"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_29_33" id="29_33_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_3"></p></div>
                        <div><p id="pdf_valor_5_3"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr  class="cor-fundo" id="34_38_coluna">
                <td>
                    <p>34 - 38 anos</p>
                </td>
                <td class="th1_34_38" id="34_38_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_4"></p></div>
                        <div><p id="pdf_valor_0_4"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_34_38" id="34_38_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_4"></p></div>
                        <div><p id="pdf_valor_1_4"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_34_38" id="34_38_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_4"></p></div>
                        <div><p id="pdf_valor_2_4"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_34_38" id="34_38_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_4"></p></div>
                        <div><p id="pdf_valor_3_4"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_34_38" id="34_38_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_4"></p></div>
                        <div><p id="pdf_valor_4_4"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_34_38" id="34_38_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_4"></p></div>
                        <div><p id="pdf_valor_5_4"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="39_43_coluna">
                <td>
                    <p>39 - 43 anos</p>
                </td>
                <td class="th1_39_43" id="39_43_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_5"></p></div>
                        <div><p id="pdf_valor_0_5"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_39_43" id="39_43_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_5"></p></div>
                        <div><p id="pdf_valor_1_5"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_39_43" id="39_43_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_5"></p></div>
                        <div><p id="pdf_valor_2_5"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_39_43" id="39_43_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_5"></p></div>
                        <div><p id="pdf_valor_3_5"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_39_43" id="39_43_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_5"></p></div>
                        <div><p id="pdf_valor_4_5"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_39_43" id="39_43_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_5"></p></div>
                        <div><p id="pdf_valor_5_5"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="44_48_coluna">
                <td>
                    <p>44 - 48 anos</p>
                </td>
                <td  class="th1_44_48" id="44_48_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_6"></p></div>
                        <div><p id="pdf_valor_0_6"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_44_48" id="44_48_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_6"></p></div>
                        <div><p id="pdf_valor_1_6"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_44_48" id="44_48_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_6"></p></div>
                        <div><p id="pdf_valor_2_6"></p>
                       </div>
                    </div>
                </td>
                <td class="th4_44_48" id="44_48_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_6"></p></div>
                        <div><p id="pdf_valor_3_6"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_44_48" id="44_48_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_6"></p></div>
                        <div><p id="pdf_valor_4_6"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_44_48" id="44_48_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_6"></p></div>
                        <div><p id="pdf_valor_5_6"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="49_53_coluna">
                <td>
                    <p>49 - 53 anos</p>
                </td>
                <td class="th1_49_53" id="49_53_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_7"></p></div>
                        <div><p id="pdf_valor_0_7"></p>
                       </div>
                    </div>
                </td>
                <td class="th2_49_53" id="49_53_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_7"></p></div>
                        <div><p id="pdf_valor_1_7"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_49_53" id="49_53_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_7"></p></div>
                        <div><p id="pdf_valor_2_7"></p>
                       </div>
                    </div>
                </td>
                <td class="th4_49_53" id="49_53_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_7"></p></div>
                        <div><p id="pdf_valor_3_7"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_49_53" id="49_53_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_7"></p></div>
                        <div><p id="pdf_valor_4_7"></p>
                       </div>
                    </div>
                </td>
                <td class="th6_49_53" id="49_53_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_7"></p></div>
                        <div><p id="pdf_valor_5_7"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="54_58_coluna">
                <td>
                    <p>54 - 58 anos</p>
                </td>
                <td class="th1_54_58" id="54_58_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_8"></p></div>
                        <div><p id="pdf_valor_0_8"></p>
                       </div>
                    </div>
                </td>
                <td class="th2_54_58" id="54_58_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_8"></p></div>
                        <div><p id="pdf_valor_1_8"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_54_58" id="54_58_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_8"></p></div>
                        <div><p id="pdf_valor_2_8"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_54_58" id="54_58_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_8"></p></div>
                        <div><p id="pdf_valor_3_8"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_54_58" id="54_58_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_8"></p></div>
                        <div><p id="pdf_valor_4_8"></p>
                        </div>
                    </div>
                </td>
                <td class="th6_54_58" id="54_58_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_8"></p></div>
                        <div><p id="pdf_valor_5_8"></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cor-fundo" id="59_mais_coluna">
                <td>
                    <p>59 anos ou mais</p>
                </td>
                <td class="th1_59_mais" id="59_mais_th1">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_0_9"></p></div>
                        <div><p id="pdf_valor_0_9"></p>
                        </div>
                    </div>
                </td>
                <td class="th2_59_mais" id="59_mais_th2">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_1_9"></p></div>
                        <div><p id="pdf_valor_1_9"></p>
                        </div>
                    </div>
                </td>
                <td class="th3_59_mais" id="59_mais_th3">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_2_9"></p></div>
                        <div><p id="pdf_valor_2_9"></p>
                        </div>
                    </div>
                </td>
                <td class="th4_59_mais" id="59_mais_th4">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_3_9"></p></div>
                        <div><p id="pdf_valor_3_9"></p>
                        </div>
                    </div>
                </td>
                <td class="th5_59_mais" id="59_mais_th5">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_4_9"></p></div>
                        <div><p id="pdf_valor_4_9"></p>
                       </div>
                    </div>
                </td>
                <td class="th6_59_mais" id="59_mais_th6">
                    <div class="vidas_unidades_pdf">
                        <div><p id="pdf_vidas_5_9"></p></div>
                        <div><p id="pdf_valor_5_9"></p>
                       </p></div>
                    </div>
                </td>
            </tr>

            <!-- Valor total -->

            <?php
                echo '<tr class="cor-fundo">';
                echo '<th>Total</th>';
                echo '<th class="text-center" id="th_total_0">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_0"></p></div>
                    <div>
                        <p id="pdf_total_0"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_1">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_1"></p></div>
                    <div>
                        <p id="pdf_total_1"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_2">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_2"></p></div>
                    <div>
                        <p id="pdf_total_2"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_3">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_3"></p></div>
                    <div>
                        <p id="pdf_total_3"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_4">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_4"></p></div>
                    <div>
                        <p id="pdf_total_4"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_5">
                <div class="vidas_unidades_pdf">
                    <div><p id="pdf_total_vida_5"></p></div>
                    <div>
                        <p id="pdf_total_5"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '</tr>';
            ?>

            <!-- Total com IOF -->

            <!-- <?php
                echo '<tr class="cor-fundo">';
                echo '<th>Total com IOF</th>';
                echo '<th class="text-center" id="th_total_iof_0">
                <div class="vidas_unidades_pdf">
                    <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_0"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_iof_1">
                <div class="vidas_unidades_pdf">
                <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_1"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_iof_2">
                <div class="vidas_unidades_pdf">
                <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_2"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_iof_3">
                <div class="vidas_unidades_pdf">
                <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_3"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_iof_4">
                <div class="vidas_unidades_pdf">
                <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_4"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '<th class="text-center" id="th_total_iof_5">
                <div class="vidas_unidades_pdf">
                <div><p></p></div>
                    <div>
                        <p id="pdf_total_iof_5"></p>
                    </div>
                </div>';
                echo '</th>';
                echo '</tr>';
            ?> -->

        <!-- Diferenciais -->

            <tr class="bg-cinza">
                <th colspan="8" class="title-pdf">DIFERENCIAIS</th>
            </tr>
            <?php
                foreach ($diferenciais as $key => $diferencial) {
                    echo '<tr class="cor-fundo" id="tr_'.$key.'" style="display: none">';
                    echo '<td>'.$diferencial.'</td>';
                    for ($i = 0; $i < $numPlanos; $i++) {
                        echo '<td class="'.$key.'_'.$i.'_r" id="'.$key.'_'.$i.'_r"></td>';
                    }
                    echo '</tr>';
                }
            ?>

            <!-- Hospitais -->

            <tr class="bg-cinza">
                <th colspan="8" class="title-pdf">DESTAQUES DE HOSPITAIS DA REDE CREDENCIADA</th>
            </tr>
            <?php
                foreach ($jsonHospitais as $key => $value) {
                    echo '<tr class="cor-fundo" id="'.$value->hospital.'_r" style="display: none">';
                    echo '<td>'.$value->hospital.'</td>';
                    for ($i = 0; $i < $numPlanos; $i++) {
                        echo '<td class="hospitais_'.$i.'_r" id="hospitais_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+', '(', ')'), array('_', '', '', '_', '', '', ''), $value->hospital).'_r"></td>';
                    }
                    echo '</tr>';
                }
            ?>

            <!-- Laboratórios -->

            <tr class="bg-cinza">
                <th colspan="8" class="title-pdf">DESTAQUES DE LABORATÓRIOS DA REDE CREDENCIADA</th>
            </tr>
            <?php
            foreach ($jsonLaboratorios as $key => $value) {
                echo '<tr class="cor-fundo" id="'.$value->hospital.'_r" style="display: none">';
                echo '<td>'.$value->hospital.'</td>';
                for ($i = 0; $i < $numPlanos; $i++) {
                    echo '<td class="laboratorios_'.$i.'" id="plano_'.$i.'_'.str_replace(array(' ', '[', ']', '.', '+'), array('_', '', '', '_', ''), $value->hospital).'_r"></td>';
                }
                echo '</tr>';
            }
            ?>

            <!-- Regras de Coparticipação -->
<tr class="bg-cinza">
    <th colspan="8" class="title-pdf" style="text-transform: uppercase;">Regras de Coparticipação</th>
</tr>

<?php
$regras = [
    'Coparticipação' => 'copart',
    'Cobre cirurgias e internações' => 'copart_cirurgias_internacoes',
    'Valor da coparticipação' => 'valor_coparticipacao'
];

foreach ($regras as $regra => $classPrefix) {
    echo '<tr class="cor-fundo" id="tr_' . $classPrefix . '" style="display: none">';
    echo '<td>' . $regra . '</td>';
    for ($i = 0; $i < $numPlanos; $i++) {
        echo '<td class="' . $classPrefix . '_' . $i . '_r" id="' . $classPrefix . '_' . $i . '_r"></td>';
    }
    echo '</tr>';
}
?>

        </tbody>
        <tfoot>
            <tr >
                <td colspan="8"><p>Todos os Direitos Reservados a Pride Corretora & Consultoria CNPJ - 34.104.328/0001-70</p></td>
            </tr>
        </tfoot>
    </table>
</div>