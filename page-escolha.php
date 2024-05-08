<?php get_header(); ?>
<div class="container container d-flex align-items-center mr-auto ml-auto bg-escolha" style="min-height: 100vh">
    <span class="column-left"></span>
    <!-- <div class="page-escolha__wrapper"> -->
        <div class="row w-100 page-escolha">

            <img class="logo-escolhas" src="<?=get_template_directory_uri() . '/img/page-escolhas/logo-branco-pride.webp'?>" alt="">

            <h1>Seja bem vindo(a) ao Pride Cotador! A sua ferramenta de cotação diária!</h1>

            <div class="col-12">
                <a href="/homepage" class="btn">Cotador Automatico <span class="seta">→</span></a>
                <a href="/homepage-2" class="btn">Cotador Editavel <span class="seta">→</span></a>
                <a href="/comparativo-manual" class="btn">Comparativo <span class="seta">→</span></a>
            </div>

            <p>Todos os direitos reservados à Pride Corretora & Consultoria</p>
        </div>
    <!-- </div> -->
    <span class="column-right"></span>
</div>
<?php get_footer(); ?>