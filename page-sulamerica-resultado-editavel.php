<?php get_header(); ?>

<?php 

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nome_cliente = $_POST['nome_cliente'];
    $cooparticipacao = $_POST['cooparticipacao'];
    $tipo_contratacao = $_POST['tipo_contratacao'];
    $qnt_planos = $_POST['qnt_planos'];
    $atendimento = $_POST['atendimento'];
    $tabela_regiao = $_POST['tabela_regiao'];
    $qtd_vidas  = $_POST['qtd_vidas'];
    $tipo = $_POST['tipo'];
    $tipo_plano  = $_POST['tipo_plano'];

    if($qtd_vidas >= 2 && $qtd_vidas <= 29 && $qnt_titulares >= 1)
    {
        $tabela = "02 a 29 vidas";
    }
    if($qtd_vidas >= 30 && $qtd_vidas <= 99)
    {
        $tabela = "30 a 99 vidas";
    }
    if($qtd_vidas >= 100 && $qtd_vidas <= 199)
    {
        $tabela = "100 a 199 vidas";
    }


    $dados = $wpdb->get_results("SELECT * FROM 	wp7d_dados_sulamerica WHERE tipo = '$tipo' AND atendimento = '$atendimento' AND coparticipacao = '$cooparticipacao' AND remissao = 'Com remissao' AND localidades = '$tabela_regiao' AND categoria = '$tipo_contratacao' AND descricao_do_plano = '$tipo_plano'");


    $values = [];

    $values[0] = $dados[0]->zero_dezoito_anos > 0 ? $dados[0]->zero_dezoito_anos : 0;
    $values[1] = $dados[0]->dezenove_vinte_e_tres_anos > 0 ? $dados[0]->dezenove_vinte_e_tres_anos : 0;
    $values[2] = $dados[0]->vinte_e_quatro_vinte_e_oito_anos > 0 ? $dados[0]->vinte_e_quatro_vinte_e_oito_anos : 0;
    $values[3] = $dados[0]->vinte_e_nove_trinta_e_tres_anos > 0 ? $dados[0]->vinte_e_nove_trinta_e_tres_anos : 0;
    $values[4] = $dados[0]->trinta_e_quatro_trinta_e_oito_anos > 0 ? $dados[0]->trinta_e_quatro_trinta_e_oito_anos : 0;
    $values[5] = $dados[0]->trinta_e_nove_quarenta_e_tres_anos > 0 ? $dados[0]->trinta_e_nove_quarenta_e_tres_anos : 0;
    $values[6] = $dados[0]->quarenta_e_quatro_quarenta_e_oito_anos > 0 ? $dados[0]->quarenta_e_quatro_quarenta_e_oito_anos : 0;
    $values[7] = $dados[0]->quarenta_e_nove_cinquenta_e_tres_anos > 0 ? $dados[0]->quarenta_e_nove_cinquenta_e_tres_anos : 0;
    $values[8] = $dados[0]->cinquenta_e_quatro_cinquenta_e_oito_anos > 0 ? $dados[0]->cinquenta_e_quatro_cinquenta_e_oito_anos : 0;
    $values[9] = $dados[0]->cinquenta_e_nove_ou_mais_anos > 0 ? $dados[0]->cinquenta_e_nove_ou_mais_anos : 0;


?>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pre visualização</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" id="content">
            <div class="row" id="content-img1">
                <? get_template_part( 'template-parts/content', 'apresentacao' ); ?>
                <img src="<?=get_template_directory_uri() . '/img/capa-sulamerica.jpg';?>" alt="Página 1">
            </div>
            <div class="row row-tabela" id="content-img2">
                <div class="col-12 introducao introducao-sulamerica">
                    <h2>COTAÇÃO DOS PLANOS DE SAÚDE</h2>
                    <p>Confira e compare a lista dos nossos melhores planos para a sua região.</p>
                </div>
                <?php
                    for($i=0;$i<$qnt_planos;$i++){
                    ?>
                            <div class="col-4 bradesco sulamerica">
                                <div class="row">
                                    <div class="col-4 logo-empresas">
                                    <img src="<?=get_template_directory_uri() . '/img/logo-sulamerica-white.png';?>" alt="Logo Bradesco">
                                    </div>
                                    <div class="col-8">
                                        <h2>PLANO DE SAÚDE <span class="tipo_plano_alterar"><?=$tipo_plano?></span></h2>
                                        <p>Observações: <span id="obsr<?=$i?>"></span></p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3 text-center">
                                        <p>Faixa Etária</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <p>Vidas</p>
                                    </div>
                                    <div class="col-3 text-center">
                                        <p>(R$) Unit.</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p>(R$) Total</p>
                                    </div>
                                </div>
                                <div class="row tabela txt-sulamerica">
                                    <div class="col-3 text-center">
                                        <p>0 - 18 anos</p>
                                        <p>19 - 23 anos</p>
                                        <p>24 - 28 anos</p>
                                        <p>29 - 33 anos</p>
                                        <p>34 - 38 anos</p>
                                        <p>39 - 43 anos</p>
                                        <p>44 - 48 anos</p>
                                        <p>49 - 53 anos</p>
                                        <p>54 - 58 anos</p>
                                        <p>59 ou + anos</p>
                                        <p>Total:</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <?php
                                            for($j=0;$j<10;$j++){
                                        ?>
                                        <p id="vidas_qtd_<?=$i . '_' . $j . 'r'?>"></p>
                                        <?php
                                            }
                                        ?>
                                        <p id="vidas_total_<?=$i?>_r"></p>
                                    </div>
                                    <div class="col-3 text-center">
                                    <?php
                                     for($j=0;$j<10;$j++){
                                    ?>
                                    <p>R$ <span id="preco_unidade_<?=$i . '_' . $j . 'r' ?>">0</span></p>
                                    <?php
                                        }
                                    ?>
                                        <p></p>

                                    </div>
                                    <div class="col-4 text-center">
                                        <?php
                                            for($j=0;$j<10;$j++){
                                        ?>
                                        <p><span>R$ <span id="valor_<?=$i . '_' . $j . 'r'?>"></span></span></p>
                                        <?php
                                            }
                                        ?>
                                        <p></strong>R$ <span id="valor_total_<?=$i?>_r"></span></strong></p>
                                        
                                    </div>
                                </div>
                            </div>
                    <?
                    }
                ?>
                <div class="valores">
                    <div class="sem-iof sulamerica">
                        <p>TOTAL SEM IOF: R$ <span id="sem-iof">0</span></p>
                    </div>
                    <div class="iof sulamerica">
                        <p>TOTAL COM IOF: R$ <span id="com-iof">0</span></p>
                    </div>
                </div>
            </div>
            <div class="row" id="content-img3">
                <img src="<?=get_template_directory_uri() . '/img/sulamerica-rede-credenciada.png';?>" alt="Página 1">
            </div>
            <div class="row" id="content-img4">
                <img src="<?=get_template_directory_uri() . '/img/sulamerica-rede-credenciada-02.png';?>" alt="Página 1">
            </div>
            <div class="row" id="content-img5">
                <img src="<?=get_template_directory_uri() . '/img/rede-laboratorios-sulamerica.png';?>" alt="Página 1">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
        <button type="button" id="cotar" class="btn btn-primary">BAIXAR PDF</button>
      </div>    
    </div>
  </div>
</div>

<div class="main-content">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="logo text-center">
                    <img src="<?=get_template_directory_uri() . '/img/logo-pride.png';?>" alt="Logo Pride">
                </div>
            </div>
        </div>
        <div class="row row-tabela">
            <?php
                for($i=0;$i<$qnt_planos;$i++){
                ?>
                    <div class="col-4 bradesco sulamerica cotando">
                        <div class="row">
                            <div class="col-4 logo-empresas">
                                <img src="<?=get_template_directory_uri() . '/img/logo-sulamerica-white.png';?>" alt="Logo Bradesco">
                            </div>
                            <div class="col-8">
                                <h2>PLANO DE SAÚDE:</h2>
                                <label for="Tipo do Plano">
                                    <select  name="tipo_plano_<?=$i?>" id="tipo_plano_<?=$i?>" required>
                                        <option value="">SELECIONE UM PLANO</option>
                                        <option value="Exato [E]">Exato [E]</option>
                                        <option value="Exato [A]">Exato [A]</option>
                                        <option value="Classico [E]">Classico [E]</option>
                                        <option value="Classico [A]">Classico [A]</option>
                                        <option value="Prestige [A]">Prestige [A]</option>
                                        <option value="Especial 100 R1 [A]">Especial 100 R1 [A]</option>
                                        <option value="Especial 100 R2 [A]">Especial 100 R2 [A]</option>
                                        <option value="Especial 100 R3 [A]">Especial 100 R3 [A]</option>
                                        <option value="Executivo R1 [A]">Executivo R1 [A]</option>
                                        <option value="Executivo R2 [A]">Executivo R2 [A]</option>
                                        <option value="Executivo R3 [A]">Executivo R3 [A]</option>
                                    </select>
                                </label>
                                <p>Observações: <input type="text" id="obs<?=$i?>" placeholder="Digite a observação"></p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3 text-center">
                                <p>Faixa Etária</p>
                            </div>
                            <div class="col-2 text-center">
                                <p>Vidas</p>
                            </div>
                            <div class="col-3 text-center">
                                <p>(R$) Unit.</p>
                            </div>
                            <div class="col-4 text-center">
                                <p>(R$) Total</p>
                            </div>
                        </div>
                        <div class="row tabela txt-sulamerica">
                            <div class="col-3 text-center">
                                <p>0 - 18 anos</p>
                                <p>19 - 23 anos</p>
                                <p>24 - 28 anos</p>
                                <p>29 - 33 anos</p>
                                <p>34 - 38 anos</p>
                                <p>39 - 43 anos</p>
                                <p>44 - 48 anos</p>
                                <p>49 - 53 anos</p>
                                <p>54 - 58 anos</p>
                                <p>59 ou + anos</p>
                            </div>
                            <div class="col-2 text-center">
                                <?php
                                    for($j=0;$j<10;$j++){
                                ?>
                                <p><input type="number" name="vidas_qtd_<?=$i . '_' . $j?>" id="vidas_qtd_<?=$i . '_' . $j?>" class="vidas_qtd" value="0" min="0"></p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-3 text-center">
                                <?php
                                    for($j=0;$j<10;$j++){
                                ?>
                                <p>R$ <span contenteditable="true" class="tamanho" id="preco_unidade_<?=$i . '_' . $j ?>">0</span></p>
                                <?php
                                    }
                                ?>

                            </div>
                            <div class="col-4 text-center">
                                <?php
                                    for($j=0;$j<10;$j++){
                                    $total = $total + $values[$j];
                                ?>
                                <p>R$<input type="text" id="vidas_total_amount_<?=$i . '_' . $j?>" readonly class="vidas_total txt-sulamerica total_amount" value="<?=$values[$j]?>"></p>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                <?
                }
            ?>
        </div>
        <div class="pb-3">
            <button type="submit" name="previsualizar" id="previsualizar" class="btn btn-primary btn-cotar btn-sulamerica" data-toggle="modal" data-target="#exampleModal">Pré Visualizar</button>
        </div>

    </div>
    
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<?php get_footer(); ?>

