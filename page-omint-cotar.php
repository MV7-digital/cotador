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
    
        <form action="/omint-resultado" name="cotarForm" id="cotarForm" method="post">
            <div class="row borda mt-5">
                <div class="col-6 quadro1">
                    <div class="bg-logo omint">
                        <img src="<?=get_template_directory_uri() . '/img/omint-logo-branco.png';?>" height="50px" alt="Logo omint">
                    </div>
                    <h1 class="txt-omint">ADICIONE NOS CAMPOS AS INFORMAÇÕES PARA A SUA COTAÇÃO.</h1>
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
                <div class="col-6 quadro2 omint">
                    <div class="dados">
                        <label for="A empresa possui quantos títulares?">
                            <select name="qnt_titulares" id="qnt_titulares" required>
                                <option value="">A empresa possui quantos títulares?</option>
                                <option value="1">1</option>
                                <option value="2">2 ou mais</option>
                            </select>
                        </label>
                        <label for="Escolha a quantidade de vidas">
                            <input name="qtd_vidas" id="qtd_vidas" type="number" placeholder="Digite a quantidade de vidas" min="1" required>
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
                                    <input type="radio" name="tabela_regiao" id="tabela_regiao1" value="São Paulo">
                                    <label for="tabela_regiao1">
                                        <span class="radio-label"></span>
                                        <span class="radio-text">São Paulo</span>
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