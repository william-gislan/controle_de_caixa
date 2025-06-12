<?php
include_once "./header.php";
include_once "./index-action.php";
?>

<div class="container border rounded mt-3 p-3 shadow bg-light">
    <div class="row">
        <h4><i class="fa-solid fa-cash-register"> Controle de Caixas</i></h4>
    </div>

    <div class="row mt-3">
        <div class="col">
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#add-new-caixa">
                <i class="fa-solid fa-plus"></i> Criar novo caixa
            </button>
        </div>
        <div class="col">
            <form action="" method="get" id="form-search">
                <div class="input-group">
                    <span class="input-group-text" title="Limpar Busca" id="btn-clean">
                        <i class="fa-solid fa-rotate-left"></i>
                    </span>
                    <span class="input-group-text" title="Limpar Busca" id="btn-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="search" name="busca" id="input-search" class="form-control" placeholder="Busca..."
                        value="<?= $busca ?? ''; ?>">
                </div>
            </form>
        </div>

        <div class="col">
            <form method="get" class="d-flex w-full justify-content-center" id="form-select-rpp">
                <input type="hidden" name="p" value="<?= '1'; ?>">
                <input type="hidden" name="buscar" value="<?= $busca ?? ''; ?>">
                <div class="input-group">
                    <span class="input-group-text">Mostrar</span>

                    <select name="rpp" id="rpp" class="border btn btn-outline-secondary">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="todos">Todos</option>
                    </select>

                    <span class="input-group-text">Resultados por página</span>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="busca-result d-flex justify-content-between">
            <p>Mostrando 1 a 2 de 2</p>
            <p>Página 1 de 1</p>
        </div>
    </div>

    <div class="row-mt-3">
        <div class="col">
            <?php
            if (!empty($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="col" style="height: 74px;">
            <nav aria-label="page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a title="Primeira Página" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a title="Primeira Página" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">1</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a title="Primeira Página" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">2</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a title="Primeira Página" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">3</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a title="Primeira Página" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="table responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Caixa</th>
                        <th>Saldo Atual</th>
                        <th colspan="2" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123</td>
                        <td>caixa</td>
                        <td>R$ 1.234,56</td>
                        <td class="text-center">
                            <a title="Detalhes do Caixa" href="">
                                <i class="fa-solid fa-circle-info action-icon icon-delete text-warning"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <i title="Excluir Caixa" class="fa-solid fa-trash  action-icon icon-delete text-danger"
                                data-bs-toggle="modal" data-bs-target="#delete-caixa" data-id=""></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--modal caixa-->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="add-new-caixa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add-caixa-action.php" method="post" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Criar Novo Caixa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Nome do Caixa</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                            <div class="invalid-feedback">O campo é obrigatório</div>
                        </div>
                        <div class="form-group">
                            <label for="saldo_incial" class="form-label">Saldo Inicial</label>
                            <input type="number" name="saldo_incial" id="saldo_incial" class="form-control mask_value">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="delete-caixa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <input class="hidden" name="id" value="">
                <form action="delete-caixa-action.php" method="get">
                    <div class="modal-header bg-danger text-light">
                        <h5 class="modal-title" id="exampleModalLabel"><i
                                class="fa-solid fa-triangle-exclamation"></i>ATENÇÃO
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Confirma a exclusão do caixa e todos os lançamentos vinculdaos</p>
                        <p>Importante: Essa ação não pode ser desfeita</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
</script>

<?php include_once "./footer.php"; ?>