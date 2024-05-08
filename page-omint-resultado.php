<?php get_header(); ?>

<?php 

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nome_cliente = $_POST['nome_cliente'];
    $cooparticipacao = 'SEM COPARTICIPAÇÃO';
    $titulares = $_POST['qnt_titulares'];
    $tipo_contratacao = 'COMPULSÓRIO';
    $qnt_planos = $_POST['qnt_planos'];
    $tipo_plano = $_POST['tipo_plano'];
    $tabela_regiao = $_POST['tabela_regiao'];
    $qtd_vidas  = $_POST['qtd_vidas'];

    if($qtd_vidas >= 1 && $qtd_vidas <= 29 && $titulares == 1)
    {
        $tabela = "01 a 29 vidas (1 titular)";
    }
    if($qtd_vidas >= 4 && $qtd_vidas <= 29 && $titulares >= 2)
    {
        $tabela = "04 a 29 vidas (2 ou + titulares)";
    }

    $dados = $wpdb->get_results("SELECT * FROM wp7d_dados_omint WHERE coparticipacao = '$cooparticipacao' AND tabela = '$tabela' AND  titulares = '$titulares' AND categoria = '$tipo_contratacao' AND descricao_do_plano = '$tipo_plano'");

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
                <img src="<?=get_template_directory_uri() . '/img/capa-omint.png';?>" alt="Página 1">
            </div>
            <div class="row row-tabela" id="content-img2">
                <div class="assinatura">
                    <p>Pride Corretora & Consultoria - CNPJ: 34.104.328/0001-70</p>
                </div>
                <div class="col-12 introducao introducao-omint">
                    <span>VALORES | REEMBOLSOS | CARÊNCIAS</span>
                    <h2 <?=$qnt_planos < 3 ? 'style="font-size: 84px; max-width: 85%"' : ''; ?>>OPÇÕES DE PLANOS DE SAÚDE <span class="txt-omint" <?=$qnt_planos < 3 ? 'style="font-size: 84px!important; max-width: 80%"' : 'style="font-size: 48px"'; ?>>Omint</span></h2>
                </div>
                <?php
                    for($i=0;$i<$qnt_planos;$i++){
                    ?>
                            <div class="col-4 bradesco omint">
                                <div class="row">
                                    <div class="col-4 logo-empresas">
                                    <img src="<?=get_template_directory_uri() . '/img/omint-logo-branco.png';?>" alt="Logo omint">
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
                                <div class="row tabela txt-omint">
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
                                    <p>R$ <span id="preco_unidade_<?=$i . '_' . $j ?>"> <?=$values[$j]?></span></p>
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
                                        <p><strong>R$ <span id="valor_total_<?=$i?>_r"></span></strong></p>
                                        
                                    </div>
                                </div>
                            </div>
                    <?
                    }
                ?>
                <div class="valores">
                    <div class="sem-iof omint">
                        <p>TOTAL SEM IOF: R$ <span id="sem-iof">0</span></p>
                    </div>
                    <div class="iof omint">
                        <p>TOTAL COM IOF: R$ <span id="com-iof">0</span></p>
                    </div>
                </div>
            </div>
            <div class="row" id="content-img3">
                <img src="<?=get_template_directory_uri() . '/img/omint-rede-credenciada.png';?>" alt="Página 1">
            </div>
            <div class="row" id="content-img4">
                <img src="<?=get_template_directory_uri() . '/img/omint-rede-credenciada-02.png';?>" alt="Página 1">
            </div>
            <div class="row" id="content-img5">
                <img src="<?=get_template_directory_uri() . '/img/laboratorios-omint.png';?>" alt="Página 1">
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
                    <div class="col-4 bradesco omint cotando">
                        <div class="row">
                            <div class="col-4 logo-empresas">
                                <img src="<?=get_template_directory_uri() . '/img/omint-logo-branco.png';?>" alt="Logo omint">
                            </div>
                            <div class="col-8">
                            <h2>PLANO DE SAÚDE:</h2>
                                <label for="Tipo do Plano">
                                <select  name="tipo_plano_<?=$i?>" id="tipo_plano_<?=$i?>" required>
                                <option value="">SELECIONE UM PLANO</option>

                                    <option value="Corporate C15 Regional [A]">Corporate C15 Regional [A]</option>
                                    <option value="Corporate C15ME Regional [A]">Corporate C15ME Regional [A]</option>
                                    <option value="Corporate C16 [A]">Corporate C16 [A]</option>
                                    <option value="Corporate C16ME [A]">Corporate C16ME [A]</option>
                                    <option value="Corporate C17 [A]">Corporate C17 [A]</option>
                                    <option value="Hospitalar C10 [A]">Hospitalar C10 [A]</option>
                                    <option value="Hospitalar C11 [A]">Hospitalar C11 [A]</option>
                                    <option value="Hospitalar C12 [A]">Hospitalar C12 [A]</option>
                                    <option value="Hospitalar C13 [A]">Hospitalar C13 [A]</option>
                                    <option value="Premium C19 [A]">Premium C19 [A]</option>
                                    <option value="Premium C19ME [A]">Premium C19ME [A]</option>
                                    <option value="Premium C20 [A]">Premium C20 [A]</option>
                                    <option value="Premium C21 [A]">Premium C21 [A]</option>
                                    <option value="Premium C22 [A]">Premium C22 [A]</option>
                                    <option value="Premium C23 [A]">Premium C23 [A]</option>
                                    <option value="Skill SC1 [A]">Skill SC1 [A]</option>
                                    <option value="Skill SC2 [A]">Skill SC2 [A]</option>
                                    <option value="Skill SC2ME [A]">Skill SC2ME [A]</option>
                                    <option value="Skill SE3 [A]">Skill SE3 [A]</option>
                                    <option value="Skill SE4 Regional [A]">Skill SE4 Regional [A]</option>
                                    <option value="Skill Smax [A]">Skill Smax [A]</option>
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
                        <div class="row tabela txt-omint">
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
                                <p>R$ <span id="preco_unidade_<?=$i . '_' . $j ?>"> <?=$values[$j]?></span></p>
                                <?php
                                    }
                                ?>

                            </div>
                            <div class="col-4 text-center">
                                <?php
                                    for($j=0;$j<10;$j++){
                                    $total = $total + $values[$j];
                                ?>
                                <p>R$<input type="text" id="vidas_total_amount_<?=$i . '_' . $j?>" readonly class="vidas_total txt-omint total_amount" value="<?=$values[$j]?>"></p>
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
            <button type="submit" name="previsualizar" id="previsualizar" class="btn btn-primary btn-cotar omint" data-toggle="modal" data-target="#exampleModal">Pré Visualizar</button>
        </div>

    </div>
    
</div>

<script>
    
;(function($){

for(i=0; i < <?=$qnt_planos?>;i++){
    let plano = $('#tipo_plano_' + i);
    let posicao = i;
    plano.on('change', function(e) {
        e.preventDefault();

        document.querySelectorAll('.tipo_plano_alterar')[posicao].innerHTML = this.value;
        setTimeout(function() {
            for(j=0;j<10;j++){
                preco_unidade = $('#preco_unidade_' + posicao + '_' + j).text();
                $('#vidas_total_amount_' + posicao + '_' + j).val(parseFloat(preco_unidade * $('#vidas_qtd_' + posicao + '_' + j).val().replace(',','.')).toFixed(2));
            }
        }, 1000);
        let u_nome = '<?= $_POST['nome']; ?>';
        let u_telefone = '<?= $_POST['telefone'] ?>';
        let u_nome_cliente = '<?= $_POST['nome_cliente'] ?>';
        let u_cooparticipacao = '<?= $_POST['cooparticipacao'] ?>';
        let u_qnt_titulares = '<?= $_POST['qnt_titulares'] ?>';
        let u_tipo_contratacao = '<?= $_POST['tipo_contratacao'] ?>';
        let u_qnt_planos = <?= $_POST['qnt_planos'] ?>;
        let u_tipo_plano = this.value;
        let u_tabela_regiao = '<?= $_POST['tabela_regiao'] ?>';
        let u_qtd_vidas  = '<?= $_POST['qtd_vidas'] ?>';

        $.ajax({
            url: '<?=get_template_directory_uri() . "/page-omint-plano.php";?>',
            method: 'POST',
            data: {
                nome: u_nome,
                telefone: u_telefone,
                nome_cliente: u_nome_cliente,
                cooparticipacao: u_cooparticipacao,
                qnt_titulares: u_qnt_titulares,
                tipo_contratacao: u_tipo_contratacao,
                qnt_planos: u_qnt_planos,
                tipo_plano: u_tipo_plano,
                tabela_regiao: u_tabela_regiao,
                qtd_vidas: u_qtd_vidas,
            },
            dataType: 'json'
        }).done(function(result){
            if(result == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'As combinações escolhidas não retornaram nenhum resultado! Confira os dados e tente novamente.',
                })
            }
            for(y=0; y < 10; y++){
                if(posicao == 0){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
                if(posicao == 1){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
                if(posicao == 2){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
                if(posicao == 3){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
                if(posicao == 4){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
                if(posicao == 5){
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[0].innerHTML = result[y];
                    document.querySelectorAll('#preco_unidade_'+ posicao + '_' + y)[1].innerHTML = result[y];
                }
            }                
        })
    });
}
})(jQuery);

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<?php get_footer(); ?>