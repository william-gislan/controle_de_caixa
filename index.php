<?php 
    include_once "./header.php";
    include_once "./index_action.php";
?>

<div class="container border rounded mt-3 p-3 shadow bg-light">
    <div class="row">
        <h4><i class="fa-solid fa-cash-register"> Controle de Caixas</i></h4>
    </div>
    
    <div class="row mt-3">
        <div class="col">
            <button class="btn btn-success" type="button" data-bs-toggle="modal"
            data-bs-target="#add-new-caixa">
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
                    <input type="search" name="busca" id="input-search" class="form-control"
                    placeholder="Busca..." value="<?= $busca ?? '';?>">
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
            if(!empty($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div class="col" style="height: 74px;">
            <nav aria-label="page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a title="Primeira Págin" href="" class="page-link" aria-label="Previous">
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
                        <a title="Primeira Págin" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">3</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a title="Primeira Págin" href="" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row"></div>

</div>



<?php  include_once "./footer.php";?>