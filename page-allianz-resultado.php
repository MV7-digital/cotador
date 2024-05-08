<?php get_header(); ?>

<?php 

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nome_cliente = $_POST['nome_cliente'];
    $cooparticipacao = $_POST['cooparticipacao'];
    $tipo_contratacao = $_POST['tipo_contratacao'];
    $qnt_planos = $_POST['qnt_planos'];
    $tipo_plano = $_POST['tipo_plano'];
    $tabela_regiao = $_POST['tabela_regiao'];
    $qtd_vidas  = $_POST['qtd_vidas'];

    if($qtd_vidas >= 3 && $qtd_vidas <= 49)
    {
        $tabela = "03 a 49 vidas";
    }
    if($qtd_vidas >= 50 && $qtd_vidas <= 99)
    {
        $tabela = "50 a 99 vidas";
    }

    $dados = $wpdb->get_results("SELECT * FROM wp7d_dados_allianz WHERE tabela = '$tabela' AND coparticipacao = '$cooparticipacao' AND localidades = '$tabela_regiao' AND descricao_do_plano = '$tipo_plano'");

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
                <img src="<?=get_template_directory_uri() . '/img/capa-allianz.png';?>" alt="Página 1">
            </div>
            <div class="row row-tabela" id="content-img2">
                <div class="assinatura">
                    <p>Pride Corretora & Consultoria - CNPJ: 34.104.328/0001-70</p>
                </div>
                <div class="col-12 introducao introducao-allianz">
                    <span>VALORES | REEMBOLSOS | CARÊNCIAS</span>
                    <h2 <?=$qnt_planos < 3 ? 'style="font-size: 84px; max-width: 85%"' : ''; ?>>OPÇÕES DE PLANOS DE SAÚDE <span class="txt-allianz" <?=$qnt_planos < 3 ? 'style="font-size: 84px!important; max-width: 80%"' : 'style="font-size: 48px"'; ?>>Allianz</span></h2>
                </div>
                <?php
                    for($i=0;$i<$qnt_planos;$i++){
                    ?>
                            <div class="col-4 bradesco allianz">
                                <div class="row">
                                    <div class="col-4 logo-empresas">
                                    <img src="<?=get_template_directory_uri() . '/img/allianz-logo.svg';?>" alt="Logo allianz">
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
                                <div class="row tabela txt-allianz">
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
                    <div class="sem-iof allianz">
                        <p>TOTAL SEM IOF: R$ <span id="sem-iof">0</span></p>
                    </div>
                    <div class="iof allianz">
                        <p>TOTAL COM IOF: R$ <span id="com-iof">0</span></p>
                    </div>
                </div>
            </div>
            <div class="row" id="content-img3">
                <img src="<?=get_template_directory_uri() . '/img/allianz-rede-credenciada.png';?>" alt="Página 1">
            </div>
            <div class="row" id="content-img4">
                <img src="<?=get_template_directory_uri() . '/img/rede-credenciada-allianz-laboratorios.png';?>" alt="Página 1">
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
                    <div class="col-4 bradesco allianz cotando">
                        <div class="row">
                            <div class="col-4 logo-empresas">
                                <img src="<?=get_template_directory_uri() . '/img/allianz-logo.svg';?>" alt="Logo allianz">
                            </div>
                            <div class="col-8">
                            <h2>PLANO DE SAÚDE:</h2>
                                <label for="Tipo do Plano">
                                    <select  name="tipo_plano_<?=$i?>" id="tipo_plano_<?=$i?>" required>
                                        <option value="">SELECIONE UM PLANO</option>
                                        <option value="Essencial 20 [A]">Essencial 20 [A]</option>
                                        <option value="Ampliado 10 [A]">Ampliado 10 [A]</option>
                                        <option value="Ampliado 20 [A]">Ampliado 20 [A]</option>
                                        <option value="Completo 10 [A]">Completo 10 [A]</option>
                                        <option value="Completo 20 [A]">Completo 20 [A]</option>
                                        <option value="Exclusivo 10 [A]">Exclusivo 10 [A]</option>
                                        <option value="Exclusivo 20 [A]">Exclusivo 20 [A]</option>
                                        <option value="Exclusivo 30 [A]">Exclusivo 30 [A]</option>
                                        <option value="Exclusivo 40 [A]">Exclusivo 40 [A]</option>
                                        <option value="Essencial 20 [A]">Essencial 20 [A]</option>
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
                        <div class="row tabela txt-allianz">
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
                                <p>R$<input type="text" id="vidas_total_amount_<?=$i . '_' . $j?>" readonly class="vidas_total txt-allianz total_amount" value="<?=$values[$j]?>"></p>
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
            <button type="submit" name="previsualizar" id="previsualizar" class="btn btn-primary btn-cotar allianz" data-toggle="modal" data-target="#exampleModal">Pré Visualizar</button>
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
        let u_tipo_contratacao = '<?= $_POST['tipo_contratacao'] ?>';
        let u_qnt_planos = <?= $_POST['qnt_planos'] ?>;
        let u_tipo_plano = this.value;
        let u_tabela_regiao = '<?= $_POST['tabela_regiao'] ?>';
        let u_qtd_vidas  = '<?= $_POST['qtd_vidas'] ?>';
        let u_acomodacao = '<?= $_POST['acomodacao'] ?>';
        let u_tabela = '<?=$tabela?>';

        $.ajax({
            url: '<?=get_template_directory_uri() . "/page-allianz-plano.php";?>',
            method: 'POST',
            data: {
                nome: u_nome,
                telefone: u_telefone,
                nome_cliente: u_nome_cliente,
                cooparticipacao: u_cooparticipacao,
                tipo_contratacao: u_tipo_contratacao,
                qnt_planos: u_qnt_planos,
                tipo_plano: u_tipo_plano,
                tabela_regiao: u_tabela_regiao,
                qtd_vidas: u_qtd_vidas,
                tabela: u_tabela,
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