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
        
            <form action="/sulamerica-resultado" name="cotarForm" id="cotarForm" method="post">
                <div class="row borda mt-5">
                    <div class="col-6 quadro1">
                        <div class="bg-logo bg-sulamerica">
                            <img src="<?=get_template_directory_uri() . '/img/logo-sulamerica-white.png';?>" alt="Logo Sulamerica Saúde">
                        </div>
                        <h1 class="txt-sulamerica">ADICIONE NOS CAMPOS AS INFORMAÇÕES PARA A SUA COTAÇÃO.</h1>
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
                    <div class="col-6 quadro2 bg-sulamerica">
                        <div class="dados">
                            <label for="Qual é o tipo do plano?">
                                <select name="tipo" id="tipo" required>
                                    <option value="">Qual é o tipo do plano?</option>
                                    <option value="PME">PME</option>
                                    <option value="PME MAIS">PME MAIS</option>
                                    <option value="MAIS FLEX">MAIS FLEX</option>
                                    <option value="FLEX">FLEX</option>
                                </select>
                            </label>

                            <label for="O plano tem cooparticipação?">
                                <select name="cooparticipacao" id="cooparticipacao" required>
                                    <option value="">O plano tem cooparticipação?</option>
                                    <option value="Com coparticipação">Sim</option>
                                    <option value="Sem coparticipação">Não</option>
                                </select>
                            </label>
                            <label for="Tipo de contratação?">
                                <select name="tipo_contratacao" id="tipo_contratacao" required>
                                    <option value="">Tipo de contratação?</option>
                                    <option value="Opcional">Opcional</option>
                                    <option value="Compulsório">Compulsorio</option>
                                </select>
                            </label>
                            <label for="Escolha a quantidade de vidas">
                                <input name="qtd_vidas" id="qtd_vidas" type="number" placeholder="Digite a quantidade de vidas" min="2" required>
                            </label>
                            <label for="Tipo do Plano">
                                <select name="atendimento" id="atendimento" required>
                                    <option value="">Qual é o tipo de atendimento?</option>
                                    <option value="Completo">Completo</option>
                                    <option value="Hospitalar">Hospitalar</option>
                                </select>
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
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao1" value="Capital - Tarifa 1">
                                        <label for="tabela_regiao1">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">SÃO PAULO - CAPITAL</span>
                                        </label>
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao2" value="Interior 1 - Tarifa 1">
                                        <label for="tabela_regiao2">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">INTERIOR 1 - TARIFA 1</span>
                                        </label>
                                    </div>
                                    <div class="regiao3e4">
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao3" value="Interior 1 - Tarifa 2">
                                        <label for="tabela_regiao3">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">INTERIOR 1 - TARIFA 2</span>
                                        </label>
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao4" value="Interior 2 - Tarifa 3">
                                        <label for="tabela_regiao4">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">INTERIOR 2 - TARIFA 3</span>
                                        </label>
                                    </div>
                                    <div class="regiao3e4">
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao3" value="Minas Gerais - Tarifa 1">
                                        <label for="tabela_regiao3">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">MINAS GERAIS - TARIFA 1</span>
                                        </label>
                                        <input type="radio" name="tabela_regiao" id="tabela_regiao4" value="Minas Gerais - Tarifa 2">
                                        <label for="tabela_regiao4">
                                            <span class="radio-label"></span>
                                            <span class="radio-text">MINAS GERAIS - TARIFA 2</span>
                                        </label>
                                    </div>
                                </div>
                            </label>
                            <button type="submit" name="cotar" class="btn btn-sulamerica">Continuar</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php get_footer(); ?>