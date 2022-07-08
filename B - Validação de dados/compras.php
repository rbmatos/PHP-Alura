<?php include_once("includes/header.php") ?>
<?php include_once("includes/formatador.php") ?>
<?php require_once("controller/ComprasController.php"); ?>

<div class="bg-hero">
    <div class="bg-overlay"></div>
    <div class="bg-cover" data-stellar-background-ratio="0.5">
        <div class="info">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <div class="tabulation">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a role="tab" data-toggle="tab">Passagens Compradas</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="passagens">
                                    <div class="row table-text">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class='text-center'>Nome</th>
                                                    <th class='text-center'>CPF/CNPJ</th>
                                                    <th class='text-center'>Telefone</th>
                                                    <th class='text-center'>Ida</th>
                                                    <th class='text-center'>Volta</th>
                                                    <th class='text-center'>Preço</th>
                                                    <th class='text-center'>Email</th>
                                                    <th class='text-center'>CEP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class='text-center'>
                                                        <?php echo $cliente->nome ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formataCpfCnpj($cliente->cpf_cnpj); ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formataTel($cliente->telefone) ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formataData($viagem->data_ida) ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formataData($viagem->data_volta) ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formatapreco($viagem->preco) ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo $cliente->email ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php echo formataCep($cliente->cep) ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("includes/footer.php") ?>