<?php get_header(); ?>		
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="main-content-cotar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo text-center">
                    <img src="<?=get_template_directory_uri() . '/img/logo-pride.png';?>" alt="Logo Pride">
                </div>
            </div>
        </div>
    
        <form action="/amil-resultado" id="cotarForm" name="cotar" method="post">
            <div class="row borda mt-5">
                <div class="col-6 quadro1">
                    <div class="bg-logo amil">
                        <img src="<?=get_template_directory_uri() . '/img/logo-amil-branco.webp';?>" height="50px" alt="Logo Amil">
                    </div>
                    <h1 class="txt-amil">ADICIONE NOS CAMPOS AS INFORMAÇÕES PARA A SUA COTAÇÃO.</h1>
                    <div class="dados">
                        <label for="Nome do Corretor">
                            <input type="text" name="nome" placeholder="Nome do Corretor" required>
                        </label>
                        <label for="Telefone">
                            <input type="tel" name="telefone" placeholder="Telefone" required>
                        </label>
                        <label for="Nome do Cliente">
                            <input type="text" name="nome_cliente" placeholder="Nome do Cliente" required>
                        </label>
                    </div>
                </div>
                <div class="col-6 quadro2 amil">
                    <div class="dados">
                        <label for="O plano tem cooparticipação?">
                            <select name="cooparticipacao" id="cooparticipacao" required>
                                <option value="">O plano tem cooparticipação?</option>
                                <option value="Com coparticipação | 30%">Sim | 30%</option>
                                <option value="Com coparticipação | Parcial TP">Sim | Parcial TP</option>
                                <option value="SEM COPARTICIPAÇÃO">Não</option>
                            </select>
                        </label>
                        <label for="Tipo de contratação?">
                            <select name="tipo_contratacao" id="tipo_contratacao" required>
                                <option value="">Tipo de contratação?</option>
                                <option value="OPCIONAL">Opcional</option>
                                <option value="COMPULSÓRIO">Compulsorio</option>
                            </select>
                        </label>
                        <label for="Escolha a quantidade de vidas">
                            <input name="qtd_vidas" id="qtd_vidas" type="number" placeholder="Digite a quantidade de vidas" min="2" required>
                        </label>

                        <label for="Quer cotar quantos planos?" >
                            <select name="qnt_planos" id="qnt_planos" required>
                                <option value="">Quer cotar quantos planos?</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </label>

                        <label for="Qual é o plano Amil?" >
                            <select name="plano_amil" id="plano_amil" required>
                                <option value="">Qual é o plano Amil?</option>
                                <option value="1">Amil</option>
                                <option value="2">Amil Facil</option>
                                <option value="3">Amil One</option>
                            </select>
                        </label>


                        <h2>Tabela de acordo com a região</h2>
                        <label for="Tabela de acordo com a região" required>
                            <!-- Radio with 4 options -->
                            <div class="radio">
                                <div class="regiao1e2">
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao1" value="São Paulo">
                                    <label for="tabela_regiao1">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">São Paulo</span>
                                    </label>
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao2" value="Interior">
                                    <label for="tabela_regiao2">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">Interior</span>
                                    </label>
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao4" value="Minas Gerais">
                                    <label for="tabela_regiao4">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">Minas Gerais</span>
                                    </label>
                                </div>
                            </div>
                        </label>
                        <button type="submit" name="cotar" class="btn">Continuar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    ;(function validateForm($) {


        $('#cotarForm').on('submit', function(e) {
            e.preventDefault();

            let plano_amil = $('#plano_amil').val();
            console.log(plano_amil);

            if(plano_amil == 1) {
               $('#cotarForm').attr('action', '/amil-resultado');
               console.log('1');
            } else if(plano_amil == 2) {
                $('#cotarForm').attr('action', '/amil-facil-resultado');
                console.log('2');
            } else if(plano_amil == 3) {
                $('#cotarForm').attr('action', '/amil-one-resultado');
                console.log('3');
            }

            $('#cotarForm').unbind('submit').submit();
        });

    })(jQuery);
</script>

<?php get_footer(); ?>