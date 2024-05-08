<?php

get_header();

global $wpdb;


$arquivo = file_get_contents( get_template_directory() . '/dados/sulamerica.json');
$json = json_decode($arquivo);

if($_GET['atualizar'] == 1){
// Atualizar dados

    foreach($json  as $dados){
        $wpdb->insert(
            'wp7d_dados_sulamerica',
            array(
                "resultado" => $dados->resultado,
                "tipo" => $dados->tipo,
                "atendimento" => $dados->atendimento,
                "tabela" => $dados->tabela,
                "coparticipacao" => $dados->coparticipacao,
                "remissao" => $dados->remissao,
                "localidades" => $dados->localidades,
                "categoria" => $dados->categoria,
                "descricao_do_plano" => $dados->descricao_do_plano,
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

// Buscar dados
$dados = $wpdb->get_results("SELECT * FROM wp7d_dados WHERE localidades = 'SÃO PAULO - CAPITAL' AND tabela = '3 a 29 Vidas (1 ou + titulares)' AND coparticipacao = 'SEM coparticipacao' AND remissao = 'Com remissao' AND categoria ='OPCIONAL' AND titulares = '1' AND descricaoDoPlano = 'Efetivo (TNWE)' AND acomodacao = 'Enfermaria'");

// Exibir dados
foreach($dados as $dado){
    echo $dado->id . ' - ' . $dado->resultado . ' - ' . $dado->localidades . '<br>';
}

?>

<a href="?atualizar=1" class="btn btn-success">Atualizar</a>

<?php get_footer(); ?>
