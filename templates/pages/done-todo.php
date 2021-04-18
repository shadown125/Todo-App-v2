<div class="content-container">
    <?php require_once('templates/includes/progression.php');?>
    <section class="todos">
        <div class="todos-header">
            <h3 class="h3 headline">Completed Todos</h3>
            <a href="./#todo-popup" class="button add-todo"></a>
            <div class="description">Today</div>
        </div>
        <div class="todos-wrapper">
            <ul>
                <li>
                    <div class="header">
                        <div class="circle"></div>
                        <h3 class="h3 headline">My title</h3>
                        <form action="./?action=delete" method="post">
                            <input type="hidden" name="id" value="">
                            <button class="button-delete"></button>
                        </form>
                    </div>
                    <div class="description">something</div>
                </li>
            </ul>
        </div>
    </section>
</div>