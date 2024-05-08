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
    
        <form action="/bradesco-resultado-editavel" name="cotarForm" id="cotarForm" method="post">
            <div class="row borda mt-5">
                <div class="col-6 quadro1">
                    <div class="bg-logo">
                        <img src="<?=get_template_directory_uri() . '/img/logo-bradesco-saude-white.png';?>" alt="Logo Bradesco Saúde">
                    </div>
                    <h1>ADICIONE NOS CAMPOS AS INFORMAÇÕES PARA A SUA COTAÇÃO.</h1>
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
                <div class="col-6 quadro2">
                    <div class="dados">
                        <label for="A empresa possui quantos títulares?">
                            <select name="qnt_titulares" id="qnt_titulares" required>
                                <option value="">A empresa possui quantos títulares?</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </label>
                        <label for="O plano tem cooparticipação?">
                            <select name="cooparticipacao" id="cooparticipacao" required>
                                <option value="">O plano tem cooparticipação?</option>
                                <option value="COM COPARTICIPAÇÃO">Sim</option>
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
                            <input name="qtd_vidas" type="number" id="qtd_vidas" placeholder="Digite a quantidade de vidas" min="3" required>
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
                        <h2>Tabela de acordo com a região</h2>
                        <label for="Tabela de acordo com a região" required>
                            <!-- Radio with 4 options -->
                            <div class="radio">
                                <div class="regiao1e2">
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao1" value="SÃO PAULO - CAPITAL">
                                    <label for="tabela_regiao1">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">SÃO PAULO - CAPITAL</span>
                                    </label>
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao2" value="SÃO PAULO - INTERIOR I">
                                    <label for="tabela_regiao2">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">SÃO PAULO - INTERIOR 1</span>
                                    </label>
                                </div>
                                <div class="regiao3e4">
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao3" value="SÃO PAULO - INTERIOR II">
                                    <label for="tabela_regiao3">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">SÃO PAULO - INTERIOR 2</span>
                                    </label>
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao4" value="MINAS GERAIS">
                                    <label for="tabela_regiao4">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">MINAS GERÁIS</span>
                                    </label>
                                </div>
                            </div>
                        </label>
                        <button type="submit" name="cotar" class="btn">Continuar</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php get_footer(); ?>