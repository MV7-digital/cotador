<?php

get_header();

global $wpdb;


$arquivo = file_get_contents( get_template_directory() . '/dados/bradesco.json');
$json = json_decode($arquivo);

if($_GET['atualizar'] == 1){
// Atualizar dados

    foreach($json  as $dados){
        $wpdb->insert(
            'wp7d_dados',
            array(
                "localidades" => $dados->localidades,
                "tabela" => $dados->tabela,
                "coparticipacao" => $dados->coparticipacao,
                "remissao" => $dados->remissao,
                "categoria" => $dados->categoria,
                "titulares" => $dados->titulares,
                "descricaoDoPlano" => $dados->descricaoDoPlano,
                "acomodacao" => $dados->acomodacao,
                "zero_dezoito_anos" => $dados->zero_dezoito_anos,
                "dezenove_vinte_e_tres_anos" => $dados->dezenove_vinte_e_tres_anos,
                "vinte_e_quatro_vinte_e_oito_anos" => $dados->vinte_e_quatro_vinte_e_oito_anos,
                "vinte_e_nove_trinta_e_tres_anos" => $dados->vinte_e_nove_trinta_e_tres_anos,
                "trinta_e_quatro_trinta_e_oito_anos" => $dados->trinta_e_quatro_trinta_e_oito_anos,
                "trinta_e_nove_quarenta_e_tres_anos" => $dados->trinta_e_nove_quarenta_e_tres_anos,
                "quarenta_e_quatro_quarenta_e_oito_anos" => $dados->quarenta_e_quatro_quarenta_e_oito_anos,
                "quarenta_e_nove_cinquenta_e_tres_anos" => $dados->quarenta_e_nove_cinquenta_e_tres_anos,
                "cinquenta_e_quatro_cinquenta_e_oito_anos" => $dados->cinquenta_e_quatro_cinquenta_e_oito_anos,
                "cinquenta_e_nove_ou_mais_anos" => $dados->cinquenta_e_nove_ou_mais_anos,
            )
        );
    }
    echo 'Dados atualizados com sucesso!';
}

?>

<a href="?atualizar=1" class="btn btn-success">Atualizar</a>

<?php get_footer(); ?>
